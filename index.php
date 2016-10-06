<!DOCTYPE html>
<html lang="fr">
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
		<link rel="stylesheet" href="css/index.css">

		<!-- FONT PERSO -->
		<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">

	</head>
	<body>
	<video class="bgvid" playsinline autoplay muted loop>
		<!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->
		<source src="image/sky.mp4" type="video/mp4">
	</video>
		<div class="container-fluid formulaire">
			<div class="row">
				<div class="col-xs-12 ">
					<form method="POST" action="page.php">
						<label class="titleSearch" for="search">WeatherMood Search!</label><br/>
						<input class="form-control" type="text" name="search" id="search" placeholder="Entrez une ville"></input>
						<input type="submit" class="btn btn-primary" name="submit" id="submit" value="GO!"></input><br/>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>