		<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
		<script>
			function initMap() {
				var uluru = {lat: <?php echo $weatherInfo['coord']['lat']; ?>, lng: <?php echo $weatherInfo['coord']['lon']; ?>};
				var map = new google.maps.Map(document.getElementById("map"), {
				  zoom: 8,
				  center: uluru
				});
				
				var marker = new google.maps.Marker({
				  position: uluru,
				  map: map
				});
			}

			function fadeWeatherContainer() {
				const toggleButton = this;
				toggleButton.parentElement.nextElementSibling.classList.toggle("hide");
				setTimeout(function() { document.documentElement.style.setProperty("--display", ( toggleButton.parentElement.nextElementSibling.classList.contains("hide") ? "none" : "block" )); }, 1000);
			}

			document.getElementById("weatherInfoDisplayToggle").addEventListener("click", fadeWeatherContainer);
		</script>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDunHb0GRb_M69Uf4ZsgS9EB9tSUkd7Doc&callback=initMap"></script>
	</body>
</html>