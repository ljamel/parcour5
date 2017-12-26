function initAutocomplete() {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        center: {lat: -34.397, lng: 150.644}
    });

    var geocoder = new google.maps.Geocoder();

    document.getElementById('pac-input').addEventListener('mouseover', function () {
        geocodeAddress(geocoder, map);
    });


// Create the search box and link it to the UI element.
// j'ai été obliger de rassembler autocomplete avec géocode pour les faire fonctionner les deux
    var input = document.getElementById('address');
    var searchBox = new google.maps.places.SearchBox(input);


    var markers = [];
// Listen for the event fired when the user selects a prediction and retrieve
// more details for that place.
    searchBox.addListener('places_changed', function () {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
        }

        // Clear out the old markers.
        markers.forEach(function (marker) {
            marker.setMap(null);
        });
        markers = [];

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function (place) {
            if (!place.geometry) {
                console.log("Returned place contains no geometry");
                return;
            }
            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };


            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location
                );
            }
        });
    });

}

function geocodeAddress(geocoder, resultsMap) {
    var address = document.getElementById('address').value;
    geocoder.geocode({'address': address}, function (results, status) {
        if (status === 'OK') {

            console.log(results[0].geometry.location);

            document.getElementById("pac-input").disabled = false;
            document.getElementById("pac-input").style.backgroundColor = "#23527c";


            localStorage.setItem('geocode', results[0].geometry.location);

            console.log("Valeur = " + localStorage.getItem('geocode'));

            var geo = localStorage.getItem('geocode');
            var essai = geo.replace(/([^])/, '<input  type=text class=none name=lat value=');
            var geo2 = essai.replace(',', ' ><input type=text class=none name=lng value=');
            var geo3 = geo2.replace(/([)$])/, ' >');

            localStorage.setItem('geocode', geo3);

            document.getElementById('position').innerHTML = geo3;

            console.log(geo3);
        } else {
            console.log('Geocode was not successful for the following reason: ' + status);
        }
    });


}
