function initMap() {
	var eltec = {lat: 48.110785, lng: -77.790158};
	//var hlRegion = [{ lat: 48.112783, lng: -77.806338}, { lat: 48.109001, lng: -77.787659}];
	var hlRegion = [{ lat: 48.098217, lng: -77.843568}, { lat: 48.109001, lng: -77.787659}];

	var map = new google.maps.Map(document.getElementById('GoogleMap'), {
	  zoom: 16,
	  center: eltec,
	  scrollwheel: false,
	  styles: [{"featureType":"all","elementType":"labels","stylers":[{"visibility":"on"}]},
	  {"featureType":"all","elementType":"labels.text.fill","stylers":[,{"color":"#000000"}]},
	  {"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},
	  {"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]}, /* Icons avec points d'intérêts */
	  {"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#e4e4e4"},{"lightness":20}]},
	  {"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#e4e4e4"},{"lightness":17},{"weight":1.2}]},
	  {"featureType":"administrative.locality","elementType":"labels.text.fill","stylers":[{"color":"#000000"}]},
	  {"featureType":"administrative.neighborhood","elementType":"labels.text.fill","stylers":[{"color":"#000000"}]},
	  {"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#e4e4e4"}]},
	  {"featureType":"poi","elementType":"geometry","stylers":[{"color":"#c5c5c5"},{"visibility":"on"}]},
	  {"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#a0a0a0"}]},
	  {"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},
	  {"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#a0a0a0"},{"lightness":18}]},
	  {"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#a0a0a0"}]},
	  {"featureType":"road.arterial","elementType":"geometry.stroke","stylers":[{"color":"#a0a0a0"}]},
	  {"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#a0a0a0"},{"lightness":16}]},
	  {"featureType":"transit","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":19}]},
	  {"featureType":"water","elementType":"geometry","stylers":[{"color":"#c5c5c5"}]}],
	});

	var scripts = document.getElementsByTagName("script");
	var dir = scripts[scripts.length-3].src;
	var imgMarker = dir.toString().replace("js/initMap.js","img/pin.png");
	var marker = new google.maps.Marker({
	  position: eltec,
	  map: map,
	  icon: imgMarker
	});
	
	//
	var polylineOptionsActual = new google.maps.Polyline({ strokeColor: '#ff0000', strokeOpacity: 0.7, strokeWeight: 8 });
	var directionsService = new google.maps.DirectionsService();
	directionsService.route({origin: hlRegion[0], destination: hlRegion[1], travelMode: google.maps.TravelMode.DRIVING}, function(response, status) {
		if (status === google.maps.DirectionsStatus.OK) {
			var directionsDisplay = new google.maps.DirectionsRenderer({map: map, preserveViewport: true, polylineOptions: polylineOptionsActual});
			directionsDisplay.setDirections(response);
			directionsDisplay.setOptions({suppressMarkers: true});
		} else {
			window.alert('Directions request failed due to ' + status);
		}
	});  
}