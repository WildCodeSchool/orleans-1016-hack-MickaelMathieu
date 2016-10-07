<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>WeatherMood</title>
		<!--CSS Jquery UI-->
		<!--link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css"-->
		<!-- CSS BOOTSTRAP -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">		
		<!-- CSS PERSO-->
		<link rel="stylesheet" href="css/index.css">
		<!-- FONT PERSO -->
		<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">	
		<!-- Jquery JS-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<!-- JqueryUI JS-->
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
		<!-- BOOTSTRAPP JS -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container-fluid text-center formulaire">
			<div class="row">
				<div class="col-xs-12 col-lg-offset-3 col-lg-6">
					<video class="bgvid" playsinline autoplay muted loop poster="image/ciel.jpeg">
						<source src="image/sky.mp4" type="video/mp4">
					</video>
					<form method="POST" action="page.php">
						<label class="titleSearch" for="search">
							WeatherMood Search!
							<h3>Stream your weather...</h3>
						</label>
						<div class="input-group">
							<input class="form-control" type="text" name="search" id="search" placeholder="City, Country if you need">
							<span class="input-group-btn">
        						<input type="submit" class="btn btn-primary" name="submit" id="submit" value="GO!">
      						</span>
						</div>
					</form>
					<?php
						if (isset($_GET['msg']) and !empty($_GET['msg'])){
							if ($_GET['msg'] == 'badCity'){
								echo '<h1>Aucun résultat pour la ville '.$_GET['value'].'</h1>';
							} else if ($_GET['msg'] == 'null'){
								echo '<h1>Vous n\'avez rien rentré dans le champ</h1>';
							}
						}
					?>
				</div>
			</div>
		</div>		
	</body>
</html>