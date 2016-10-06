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
		<script type="text/javascript">
			/*$(function() {
			    //var autocompleteTags = $.parseJSON("city_list.json");
			    //alert(autocompleteTags.name);
			    var my_json = [];
					$.getJSON("city_list.json", function(json) {
					  my_json = json;
					  // here you have the value
					});
			    $( "#search" ).autocomplete({
			     	source: my_json[0][name],
			    });
			});*/
		</script>
	</head>
	<body>
		<div class="container-fluid text-center">
			<div class="row">
				<div class="col-xs-12 col-lg-offset-3 col-lg-6 formulaire">
					<video class="bgvid" playsinline autoplay muted loop poster="image/ciel.jpeg">
						<source src="image/sky.mp4" type="video/mp4">
					</video>
					<form method="POST" action="page.php">
						<label class="titleSearch" for="search">WeatherMood Search!</label>
						<div class="input-group">
							<input class="form-control" type="text" name="search" id="search" placeholder="Entrez une ville">
							<span class="input-group-btn">
        						<input type="submit" class="btn btn-primary" name="submit" id="submit" value="GO!">
      						</span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>