<?php

	$weather = "";
	$error = "";
	if(!empty($_GET)) {
		$city = $_GET['city'];
		// $city = str_replace(" ", "", $_GET["city"]);
       //  $file_headers = @get_headers("http://www.weather-forecast.com/locations/{$city}/forecasts/latest");
      	// $error = $file_headers[0] == "HTTP/1.1 404 Not Found" ? $file_headers[0] : "";

        // if(!$error) {
			$pageDisplay = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=' . urlencode($city) . ',uk&appid=140b66f59c18c14d1a68072437e05c17');
			$weatherInfo = json_decode($pageDisplay, true);

			if($weatherInfo['cod'] == 200) {
				$temperatureInFahrenheit = intval($weatherInfo['main']['temp'] * 9 / 5 - 459.67);
				$weather = "The weather in " . ucfirst($city) . " is currenty " . $weatherInfo['weather'][0]['description'] . ". The temperature is {$temperatureInFahrenheit}&deg;F and the wind speed is " . $weatherInfo['wind']['speed'] . "m/s.";
			} else
				$error = 'Could not find city - Please try again.';
			// $topHalfPageDisplay = explode('1 &ndash; 3 Day Weather Forecast Summary:</b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">', $pageDisplay);
			// $bottomHalfPageDisplay = explode('</span></span></span></p><div class="forecast-cont"><div class="units-cont"><a class="units metric active">', $topHalfPageDisplay[1]);
			// $weather = $bottomHalfPageDisplay[0];
		// }
	}

	include_once('Includes/header.php');

?>

    	<div id="map"></div>

		<div class="container text-center col-lg-5" id="weatherToggleContainer">
    		<button type="button" class="btn btn-info" id="weatherInfoDisplayToggle">Toggle Weather Display</button>
		</div>

		<div id="weatherContainer" class="container text-center col-lg-5">

			<h1>What's The Weather?</h1>

			<form method="GET">
				<fieldset class="form-group">
					<label for="city">Enter a name of a city</label>
					<input type="text" id="city" class="form-control" name="city" aria-describedby="cityInput" placeholder="<?php if(count($_GET)) echo ucfirst($_GET['city']); else echo 'e.g. London, Tokyo, Chicago, etc...'; ?>" value="">
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

<?php include_once('Includes/footer.php');