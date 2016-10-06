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
		<link rel="stylesheet" href="page.css">
</head>
<body>
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
</body>
</html>


