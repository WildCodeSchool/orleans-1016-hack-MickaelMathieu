<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>WeatherMood</title>
		<link rel="stylesheet" href="custom.css">
	</head>
	<body>
		<form method="POST" action="index.php">
			<label for="search">WeatherMood Search!</label><br/>
			<input type="text" name="search" id="search" placeholder="Entrez une ville"></input>
			<input type="submit" name="submit" id="submit" value="GO!"></input><br/>
			<?php
				if (isset($_POST['submit'])){
					if (empty($_POST['search'])){
						echo '<br/> Vous n\'avez pas entré le nom d\'une ville dans le champ';
					} else {
						$post = trim(htmlentities(str_replace(' ', '',ucfirst($_POST['search']))));
						//Decode json for id cities
						/*$jsonIds = file_get_contents("city_list.json");
						$ids = json_decode($jsonIds,true);
						//var_dump($ids);
						//Find the city id to use in http request
						//if (in_array($post, $ids)){
						//	echo 'true';
						//}else{
						//	echo 'false';
						//}*/
						//Send http request to openweathermap			
						$jsonMeteo = file_get_contents('http://api.openweathermap.org/data/2.5/forecast/city?q='.$post.'&APPID=244bbac7d5d04ef80d28de1271d7cf1a&units=metric&lang=fr');
						$meteo = json_decode($jsonMeteo,true);
						//var_dump($meteo);
						//Answer from openweathermap
						echo $meteo['city']['name'].'<br/>';
						echo Date('Y-m-d H:i:s').'<br/>'.
							'Vitesse du vent : '.$meteo['list'][0]['weather'][0]['id'].'<br/>'.
							'Orientation du vent : '.$meteo['list'][0]['wind']['deg'].'<br/>'.
							'Conditions : '.$meteo['list'][0]['weather'][0]['main'].'<br/>'.
							'<img src=http://openweathermap.org/img/w/'.$meteo['list'][0]['weather'][0]['icon'].'.png>';
					}
					if ($meteo['list'][0]['weather'][0]['main'] == 'Clear'){
						echo 'il fait beau à '.$meteo['city']['name'].'<br/>'.
						'<iframe  scrolling="no" allowTransparency="true" src="http://www.deezer.com/plugins/player?format=square&autoplay=true&playlist=true&width=500&height=500&color=007FEB&layout=dark&size=big&type=playlist&id=2297949342&app_id=1" width="500" height="500"></iframe>';
					} else if ($meteo['list'][0]['weather'][0]['main'] == 'Rain'){
						echo 'il pleut à '.$meteo['city']['name'].'<br/>'.
						'<iframe  scrolling="no" allowTransparency="true" src="http://www.deezer.com/plugins/player?format=square&autoplay=true&playlist=true&width=500&height=500&color=007FEB&layout=dark&size=big&type=playlist&id=2297967262&app_id=1" width="500" height="500"></iframe>';
					} else if ($meteo['list'][0]['weather'][0]['main'] == 'Snow'){
						echo 'il neige à '.$meteo['city']['name'].'<br/>'.
						'<iframe  scrolling="no" allowTransparency="true" src="http://www.deezer.com/plugins/player?format=square&autoplay=true&playlist=true&width=500&height=500&color=007FEB&layout=dark&size=big&type=playlist&id=2298172422&app_id=1" width="500" height="500"></iframe>';
					} else if ($meteo['list'][0]['weather'][0]['main'] == 'Clouds'){
						echo 'il y a des nuages à '.$meteo['city']['name'].'<br/>'.
						'<iframe scrolling="no" allowTransparency="true" src="http://www.deezer.com/plugins/player?format=square&autoplay=true&playlist=true&width=500&height=500&color=007FEB&layout=dark&size=big&type=playlist&id=2298208042&app_id=1" width="500" height="500"></iframe>';
					}

					/*$tab = array($idClear[800]=>'playlistBeau',
						$idRain[500,501,502 to 531]=>'playlistPluie'),
						$idCloud[600 to 655]=>'playlistNuage');*/
				}
			?>
		</form>
	</body>
</html>