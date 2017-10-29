<?php

	$weather = "";
	$error = "";
	if(!empty($_GET)) {
		$city = str_replace(" ", "", $_GET["city"]);
        $file_headers = @get_headers("http://www.weather-forecast.com/locations/".$city."/forecasts/latest");
      	$error = $file_headers[0] == "HTTP/1.1 404 Not Found" ? $file_headers[0] : "";

        if(!$error) {
			$pageDisplay = file_get_contents("http://www.weather-forecast.com/locations/$city/forecasts/latest");
			$topHalfPageDisplay = explode('1 &ndash; 3 Day Weather Forecast Summary:</b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">', $pageDisplay);
			$bottomHalfPageDisplay = explode('</span></span></span></p><div class="forecast-cont"><div class="units-cont"><a class="units metric active">', $topHalfPageDisplay[1]);
			$weather = $bottomHalfPageDisplay[0];
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css">
		<title>Weather Scraper</title>
	</head>
	<body>
		<div id="weatherContainer" class="container text-center col-lg-5">

			<h1>What's The Weather?</h1>

			<form method="GET">
				<fieldset class="form-group">
					<label for="city">Enter a name of a city</label>
					<input type="text" id="city" class="form-control" name="city" aria-describedby="cityInput" placeholder="e.g. London, Tokyo, Chicago, etc..." value="<?php if(sizeof($_GET) > 0) $_GET['city']; ?>">
				</fieldset>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
			
			<div id="weatherDisplay">
				<?php
					if($weather)
						echo "<div class='alert alert-success'>" . ucwords($city) . "<br>$weather</div>";
					else if($error)
						echo "<div class='alert alert-danger'>$error</div>";
				?>
			</div>

		</div>

		<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	</body>
</html>
