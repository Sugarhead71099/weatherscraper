<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<style>
			:root {
				--display: block;
			}

			body {
				height: <?php echo empty($_GET) ? '100vh' : ''; ?>;
				background: url(Images/background.jpeg) no-repeat center center fixed;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
			}

			#weatherToggleContainer {
				margin-top: 20vh;
			}

			#weatherInfoDisplayToggle {
				opacity: 0.8;
			}
			
			#weatherContainer {
				margin-top: 5vh;
				opacity: <?php echo !empty($_GET) ? 0.7 : 1; ?>;
				transition: opacity 1s ease-in-out;
				-moz-transition: opacity 1s ease-in-out;
				-webkit-transition: opacity 1s ease-in-out;
			}
			
			#weatherDisplay {
				margin-top: 5vh;
			}

	       	#map {
				position: absolute;
				top: 0;
				left: 0;
		       	height: 100vh;
		       	width: 100%;
		       	z-index: 0;
	       	}

	       	.alert-success {
	       		color: black;
	       		font-weight: bold;
	       	}

	       	.hide {
	       		opacity: 0 !important;
	       		display: var(--display);
	       	}
		</style>
		<title>Weather Scraper</title>
	</head>
	<body>