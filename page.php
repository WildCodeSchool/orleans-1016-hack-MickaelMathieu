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

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<!-- CSS PERSO-->
		<link rel="stylesheet" href="css/page.css">

		<!-- FONT PERSO -->
		<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">

</head>
<body>
	<div class="container-fluid">
		<?php
			if (isset($_POST['submit'])){
				if (empty($_POST['search'])){
					echo '<br/> Vous n\'avez pas entré le nom d\'une ville dans le champ';
				} else {
					$post = trim(htmlentities(str_replace(' ', '',ucfirst($_POST['search']))));
					//Send http request to openweathermap
					$jsonMeteo = file_get_contents('http://api.openweathermap.org/data/2.5/forecast/city?q='.$post.'&APPID=244bbac7d5d04ef80d28de1271d7cf1a&units=metric&lang=fr');
					$meteo = json_decode($jsonMeteo,true);
					//var_dump($meteo);
					//Answer from openweathermap
					$conditions=['Clear'=>'Dégagé','Rain'=>'Pluvieux','Snow'=>'Neigeux','Clouds'=>'Nuageux','Thunderstorm'=>'Orageux','Drizzle'=>'Bruineux','Atmosphere'=>'Brumeux'];
				}
			}
		?>
		<div class="row">
			<div class="col-xs-12  col-lg-4">
				<div class="meteo text-center">
					<div class="tuile">
						<?php
						echo '<h1 class="titleTuile"> Bienvenue à '.$meteo['city']['name'].' '.$meteo['city']['country'].'</h1>
						<p> Nous sommes le '. Date('d-m-Y') .' </p>
						<p> Il est '.Date('H').'h '.Date('i').'m '.Date('s').'s </p>';
						?>
					</div>
				</div>
			</div>
			<div class="col-xs-12  col-lg-8">
				<div class="meteo text-center">
					<div class="tuile">
						<?php
						echo '<h1 class="titleTuile"> Bienvenue à '.$meteo['city']['name'].' '.$meteo['city']['country'].'</h1>';
						?>
					</div>
				</div>
			</div>
<<<<<<< HEAD


			<div class="col-lg-6 music">
			<?php
				if ($meteo['list'][0]['weather'][0]['main'] == 'Clear'){
					echo '<iframe  scrolling="no" allowTransparency="true" src="http://www.deezer.com/plugins/player?format=square&autoplay=true&playlist=true&width=500&height=500&color=007FEB&layout=dark&size=big&type=playlist&id=2297949342&app_id=1" width="500" height="500"></iframe>'
						.'<video class="bgvid" playsinline autoplay muted loop>
								<source src="image/clear.mp4" type="video/mp4">
						</video>';
				} else if ($meteo['list'][0]['weather'][0]['main'] == 'Rain'){
					echo '<iframe  scrolling="no" allowTransparency="true" src="http://www.deezer.com/plugins/player?format=square&autoplay=true&playlist=true&width=500&height=500&color=007FEB&layout=dark&size=big&type=playlist&id=2297967262&app_id=1" width="500" height="500"></iframe>'
						.'<video class="bgvid" playsinline autoplay muted loop>
								<source src="image/rain.mp4" type="video/mp4">
						</video>';
				} else if ($meteo['list'][0]['weather'][0]['main'] == 'Snow'){
					echo '<iframe  scrolling="no" allowTransparency="true" src="http://www.deezer.com/plugins/player?format=square&autoplay=true&playlist=true&width=500&height=500&color=007FEB&layout=dark&size=big&type=playlist&id=2298172422&app_id=1" width="500" height="500"></iframe>'
						.'<video class="bgvid" playsinline autoplay muted loop>
								<source src="image/snow.mp4" type="video/mp4">
						</video>';
				} else if ($meteo['list'][0]['weather'][0]['main'] == 'Clouds'){
					echo '<iframe scrolling="no" allowTransparency="true" src="http://www.deezer.com/plugins/player?format=square&autoplay=true&playlist=true&width=500&height=500&color=007FEB&layout=dark&size=big&type=playlist&id=2298208042&app_id=1" width="500" height="500"></iframe>'
						.'<video class="bgvid" playsinline autoplay muted loop>
								<source src="image/clouds.mp4" type="video/mp4">
						</video>';
				}else if ($meteo['list'][0]['weather'][0]['main'] == 'Thunderstorm'){
					echo '<iframe scrolling="no" allowTransparency="true" src="http://www.deezer.com/plugins/player?format=square&autoplay=true&playlist=true&width=500&height=500&color=007FEB&layout=dark&size=big&type=playlist&id=2299545462&app_id=1" width="500" height="500"></iframe>'
						.'<video class="bgvid" playsinline autoplay muted loop>
								<source src="image/thunderstorm.mp4" type="video/mp4">
						</video>';
				} else if ($meteo['list'][0]['weather'][0]['main'] == 'Drizzle') {
					echo '<iframe  scrolling="no" allowTransparency="true" src="http://www.deezer.com/plugins/player?format=square&autoplay=true&playlist=true&width=500&height=500&color=007FEB&layout=dark&size=big&type=playlist&id=2297967262&app_id=1" width="500" height="500"></iframe>'
						. '<video class="bgvid" playsinline autoplay muted loop>
								<source src="image/rain.mp4" type="video/mp4">
						</video>';
				} else if ($meteo['list'][0]['weather'][0]['main'] == 'Atmosphere') {
					echo '<iframe  scrolling="no" allowTransparency="true" src="http://www.deezer.com/plugins/player?format=square&autoplay=true&playlist=true&width=500&height=500&color=007FEB&layout=dark&size=big&type=playlist&id=2299550442&app_id=1" width="500" height="500"></iframe>'
						. '<video class="bgvid" playsinline autoplay muted loop>
								<source src="image/atmosphere.mp4" type="video/mp4">
						</video>';
				}
				/*$tab = array($idClear[800]=>'playlistBeau',
					$idRain[500,501,502 to 531]=>'playlistPluie'),
					$idCloud[600 to 655]=>'playlistNuage');*/
	}
		?>
		</div>
		<div class="row">
			<div class="col-xs-12  col-lg-4">
				<div class="wrapCol col-xs-12  col-lg-12">
					<div class="meteo text-center">
						<div class="tuile">
							<?php
							echo '<p>Le temps est : '.$conditions[$meteo['list'][0]['weather'][0]['main']].' <img src=http://openweathermap.org/img/w/'.$meteo['list'][0]['weather'][0]['icon'].'.png></p>
								<p>La température est de : ' .$meteo['list'][0]['main']['temp'].' °C </p>
								<p> Vitesse du vent : '.$meteo['list'][0]['wind']['speed'].' km/h </p>';
							?>
						</div>
					</div>
				</div>
				<div class="wrapCol col-xs-12  col-lg-12">
					<div class="meteo text-center">
						<div class="tuile">
							<div class="player text-center">
								<?php
									if ($meteo['list'][0]['weather'][0]['main'] == 'Clear'){
										echo '<iframe  class="music" scrolling="no" allowTransparency="true" src="http://www.deezer.com/plugins/player?format=square&autoplay=true&playlist=true&width=500&height=400&color=007FEB&layout=dark&size=small&type=playlist&id=2297949342&app_id=1" width="500" height="500"></iframe>'
											.'<video class="bgvid" playsinline autoplay muted loop>
													<source src="image/clear.mp4" type="video/mp4">
											</video>';
									} else if ($meteo['list'][0]['weather'][0]['main'] == 'Rain'){
										echo '<iframe class="music" scrolling="no" allowTransparency="true" src="http://www.deezer.com/plugins/player?format=square&autoplay=true&playlist=true&width=500&height=400&color=007FEB&layout=dark&size=medium&type=playlist&id=2297967262&app_id=1" width="500" height="500"></iframe>'
											.'<video class="bgvid" playsinline autoplay muted loop>
													<source src="image/rain.mp4" type="video/mp4">
											</video>';
									} else if ($meteo['list'][0]['weather'][0]['main'] == 'Snow'){
										echo '<iframe class="music" scrolling="no" allowTransparency="true" src="http://www.deezer.com/plugins/player?format=square&autoplay=true&playlist=true&width=500&height=400&color=007FEB&layout=dark&size=medium&type=playlist&id=2298172422&app_id=1" width="500" height="500"></iframe>'
											.'<video class="bgvid" playsinline autoplay muted loop>
													<source src="image/snow.mp4" type="video/mp4">
											</video>';
									} else if ($meteo['list'][0]['weather'][0]['main'] == 'Clouds'){
										echo '<iframe class="music" scrolling="no" allowTransparency="true" src="http://www.deezer.com/plugins/player?format=square&autoplay=true&playlist=true&width=500&height=400&color=007FEB&layout=dark&size=medium&type=playlist&id=2298208042&app_id=1" width="500" height="500"></iframe>'
											.'<video class="bgvid" playsinline autoplay muted loop>
													<source src="image/clouds.mp4" type="video/mp4">
											</video>';
									}else if ($meteo['list'][0]['weather'][0]['main'] == 'Thunderstorm'){
										echo '<iframe class="music" scrolling="no" allowTransparency="true" src="http://www.deezer.com/plugins/player?format=square&autoplay=true&playlist=true&width=500&height=400&color=007FEB&layout=dark&size=medium&type=playlist&id=2298208042&app_id=1" width="500" height="500"></iframe>'
											.'<video class="bgvid" playsinline autoplay muted loop>
													<source src="image/thunderstorm.mp4" type="video/mp4">
											</video>';
									} else if ($meteo['list'][0]['weather'][0]['main'] == 'Drizzle') {
										echo '<iframe class="music" scrolling="no" allowTransparency="true" src="http://www.deezer.com/plugins/player?format=square&autoplay=true&playlist=true&width=500&height=400&color=007FEB&layout=dark&size=medium&type=playlist&id=2297967262&app_id=1" width="500" height="500"></iframe>'
											. '<video class="bgvid" playsinline autoplay muted loop>
													<source src="image/rain.mp4" type="video/mp4">
											</video>';
									} else if ($meteo['list'][0]['weather'][0]['main'] == 'Atmosphere') {
										echo '<iframe class="music" scrolling="no" allowTransparency="true" src="http://www.deezer.com/plugins/player?format=square&autoplay=true&playlist=true&width=500&height=400&color=007FEB&layout=dark&size=medium&type=playlist&id=2297967262&app_id=1" width="500" height="500"></iframe>'
											. '<video class="bgvid" playsinline autoplay muted loop>
													<source src="image/atmosphere.mp4" type="video/mp4">
											</video>';
									}
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
		<div class="row">
			<div class="col-xs-12 col-lg-offset-3 col-lg-6">
				
			</div>
		</div>
	</div>
</body>
</html>


