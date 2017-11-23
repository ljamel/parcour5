function map() {

    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 47.0, lng: 2.287592000000018},
        zoom: 6
    });


    // Try HTML5 geolocation.
    if (navigator.geolocation || $_GET('position')) {

        var infoWindow = new google.maps.InfoWindow({map: map});

        navigator.geolocation.getCurrentPosition(function (position) {

            // redirection pour pointer dans la section map
            document.location.href = "#map";

            // Pour afficher ma position actuel
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            var map = new google.maps.Map(document.getElementById('map'), {

                zoom: 12
            });

            infoWindow.setPosition(pos);
            infoWindow.setContent('Vous êtes ICI.');
            map.setCenter(pos);


            // Position du marker cercle
            var marker = new google.maps.Marker({
                position: pos,
                icon: {
                    path: google.maps.SymbolPath.CIRCLE,
                    scale: 90,
                    strokeOpacity: 0.2,
                },
                draggable: true,
                map: map
            });


            // Create an array of alphabetical characters used to label the markers.
            var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';


            // Appel ajax avec une boucle foreach pour affiche la listes des activités sur google map
            ajaxGet("http://parcour-5/api", function (reponse) {

                // Transforme la réponse en un tableau d'adresses
                var objects = JSON.parse(reponse);
                objects.forEach(function (object) {

                    var paris = {
                        lat: object.position.lat,
                        lng: object.position.lng
                    }


                    var marker = new google.maps.Marker({
                        position: paris,
                        map: map,
                        zIndex: 2000
                    });

                    marker.addListener('click', function () {
                        console.log(object.name);
                        document.getElementById('infoLoisirs').style.display = "block";
                        document.getElementById('map').style.width = "80%";
                        document.getElementById('infoLoisirs').innerHTML = '<img id="imageMap" src=' + object.image + ' alt=Aperçu><br />' + object.address + object.name;
                    });

                    // la fonction push me ser a exporter des données pour qui puisse être réutiliser.
                    locations.push({
                        lat: object.position.lat,
                        lng: object.position.lng,

                    });

                });

                /* Trouver une solution pour que les groupes de markers ne cache pas les markers individuels
                    console.log(map.zoom);
                    // Add some markers to the map.
                    // Note: The code uses the JavaScript Array.prototype.map() method to
                    // The map() method here has nothing to do with the Google Maps API.
                    var markers = locations.map(function (location, i) {
                        return new google.maps.Marker({
                            position: location,
                            label: labels[i % labels.length],
                            zIndex: 0,
                        });
                    });

                    // Add a marker clusterer to manage the markers.
                    var markerCluster = new MarkerClusterer(map, markers,
                        {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});

                */

            });
        });

        var locations = [];

    } else {
        // Browser doesn't support Geolocation
        document.getElementById('infoLoisirs').innerHTML = "La géolocalisation n'est pas supporter par votre navigateur";
    }
}






