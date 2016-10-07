<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<title>WeatherMood</title>

		<!-- CSS BOOTSTRAP -->
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		
		<!-- Jquery JS-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<!-- CSS PERSO-->
		<link rel="stylesheet" href="css/page.css">
		
		<!-- WEATHER ICONS -->
		<link rel="stylesheet" href="weather-icons-master/css/weather-icons.min.css">

		<!-- FONT PERSO -->
		<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">

</head>
	<body>
		<div class="container-fluid">
			<?php
				if (isset($_POST['submit'])){
					if (empty($_POST['search'])){
						header('Location: index.php?msg=null');
					} else {
						$post = trim(htmlentities(str_replace(' ', '',ucfirst($_POST['search']))));
						//Send http request to openweathermap
						$jsonMeteo = file_get_contents('http://api.openweathermap.org/data/2.5/forecast/city?q='.$post.'&APPID=244bbac7d5d04ef80d28de1271d7cf1a&units=metric&lang=fr');
						//var_dump($jsonMeteo);
						if ($jsonMeteo == false){
							header("Location: index.php?msg=badCity&value=$post");
						} else {
						$meteo = json_decode($jsonMeteo,true);
						//var_dump($meteo);
						//Answer from openweathermap
						$conditions=['Clear'=>'Dégagé','Rain'=>'Pluvieux','Snow'=>'Neigeux','Clouds'=>'Nuageux','Thunderstorm'=>'Orageux','Drizzle'=>'Bruineux','Atmosphere'=>'Brumeux'];
						$icons=['01d'=>'wi-day-sunny',
								'02d'=>'wi-day-cloudy',
								'03d'=>'wi-cloud',
								'04d'=>'wi-cloudy',
								'09d'=>'wi-rain',
								'10d'=>'wi-day-showers',
								'11d'=>'wi-thunderstorm',
								'13d'=>'wi-snow',
								'50d'=>'wi-fog',
								'01n'=>'wi-night-clear',
								'02n'=>'wi-night-alt-cloudy',
								'03n'=>'wi-cloud',
								'04n'=>'wi-cloudy',
								'09n'=>'wi-rain',
								'10n'=>'wi-night-alt-showers',
								'11n'=>'wi-thunderstorm',
								'13n'=>'wi-snow',
								'50n'=>'wi-fog',
								];
						}
					}
				}
			?>
			<div class="row">
				<div class="col-xs-12  col-lg-4">
					<div class="meteo text-center">
						<div class="tuile">
							<?php
							echo '<h1> Bienvenue à '.$meteo['city']['name'].' '.$meteo['city']['country'].'</h1>
							<p> Nous sommes le '. Date('d-m-Y') .'<br/>
							<span class="queryDate"> Dernière mise à jour à : '.Date('H').' heure et '.Date('i').' minutes </span></p><br/>
							<a id="returnLink" href="index.php">Retour</a>';
							?>
						</div>
					</div>
				</div>
				<div class="col-xs-12  col-lg-8">
					<div class="meteo text-center">
						<div id="top" class="tuile">
							<h1>Conditions Actuelles</h1>
							<div class="col-lg-3 hover">
								<?php
								echo '<h3>Temps '.$conditions[$meteo['list'][0]['weather'][0]['main']].'</h3>
									<i class="iconTop wi '.$icons[$meteo['list'][0]['weather'][0]['icon']].'"></i>';
								?>
							</div>
							<div class="col-lg-3 hover">
								<?php
								echo '<h3>Température '.$meteo['list'][0]['main']['temp'].' °C</h3>'
								?>
								<?php
									if ($meteo['list'][0]['main']['temp'] < 10) {
										echo '<i class="iconTop wi wi-thermometer-exterior"></i>';
									}
									else {
										echo '<i class="iconTop wi wi-thermometer"></i>';
									}	
								?>
							</div>
							<div class="col-lg-3 hover">
								<?php
								echo '<h3>Humidité '.$meteo['list'][0]['main']['humidity'].' %</h3>
									<i class="iconTop wi wi-humidity"></i>';
								?>
							</div>
							<div class="col-lg-3 hover">
								<?php
								echo '<h3>Vent '.$meteo['list'][0]['wind']['speed'].' km/h</h3>
									<i class="iconTop wi wi-strong-wind"></i>';
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12  col-lg-4">
					<div class="wrapCol col-xs-12  col-lg-12">
						<div class="meteo text-center">
							<div class="tuile">
								<?php
								echo '
								<h1>Les conditions pour demain</h1>
								<ul>
									<li class="hover"><i class="wi '.$icons[$meteo['list'][6]['weather'][0]['icon']].'"></i> '.$conditions[$meteo['list'][6]['weather'][0]['main']].' </li>
									<li class="hover"><i class="iconSide wi wi-thermometer"></i> ' .$meteo['list'][6]['main']['temp'].' °C </li>
									<li class="hover"><i class="iconSide wi wi-humidity"></i> '.$meteo['list'][6]['main']['humidity'].' % </li>
									<li class="hover"><i class="iconSide wi wi-strong-wind"></i> '.$meteo['list'][6]['wind']['speed'].' km/h </li>
								</ul>';
								?>
							</div>
						</div>
					</div>
					<div class="wrapCol col-xs-12  col-lg-12">
						<div class="meteo text-center">
							<div class="tuile">
								<div class="player text-center">
									<?php
										$playlist=['Clear'=>array(2297949342,'clear.mp4'),
													'Rain' =>array(2297967262,'rain.mp4'),
													'Drizzle'=>array(2297967262,'rain.mp4'),
													'Snow'=>array(2298172422,'snow.mp4'),
													'Clouds'=>array(2298208042,'clouds.mp4'),
													'Atmosphere'=>array(2299550442,'atmosphere.mp4')];
										echo '
										<iframe  class="music" scrolling="no" allowTransparency="true" src="http://www.deezer.com/plugins/player?format=square&autoplay=true&playlist=true&width=540000&height=400&color=007FEB&layout=dark&size=big&type=playlist&id='.$playlist[$meteo['list'][0]['weather'][0]['main']][0].'&app_id=1">
										</iframe>
										<video class="bgvid" playsinline autoplay muted loop>
											<source src="image/'.$playlist[$meteo['list'][0]['weather'][0]['main']][1].'" type="video/mp4">
										</video>';
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-lg-8">
					<div class="mapTuile text-center">
						<div class="tuile">
							<?php
								$http = 'https://maps.darksky.net/@precipitation_rate,'. $meteo['city']['coord']['lat'].','.$meteo['city']['coord']['lon'].',4';
								echo '<iframe class="map" src="'.$http.'" frameborder="0"></iframe>';
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>