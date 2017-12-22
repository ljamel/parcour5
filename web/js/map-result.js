function result() {

    function $_GET(param) {
        var vars = {};
        window.location.href.replace(location.hash, '').replace(
            /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
            function (m, key, value) { // callback
                vars[key] = value !== undefined ? value : '';
            }
        );

        if (param) {
            return vars[param] ? vars[param] : null;
        }
        return vars;
    }
    console.log(localStorage.getItem(('geocode')))
    var geo = localStorage.getItem(('geocode'));

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 14,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: {   lat: parseFloat($_GET('lat')),
                    lng: parseFloat($_GET('lng'))
                }
    });


    var budget = "/clustersResult/?budget=" + $_GET('budget')+"&lat="+$_GET('lat')+"&lng="+$_GET('lng')+"&Distance="+$_GET('Distance');

    // Modifi le cluster
    var image = 'http://localhost/parcour-5/web/images/cycles.png';
    var image1 = '../images/Calque0.png';
    ajaxGet(budget, function (reponse) {

        // Transforme la rÃ©ponse en un tableau d'adresses
        var objects = JSON.parse(reponse);
        objects.forEach(function (object) {

            // Les markers individuel ne sont afficher qu'aprÃ¨s l'Ã©vÃ©nement du changement de zoom.
            google.maps.event.addListener(map, 'zoom_changed', function () {
                console.log(map.zoom);
                if (map.zoom > 12) {
                    // position pour cluster individuel
                    var paris = {
                        lat: object.position.lat,
                        lng: object.position.lng
                    }
                }

                var marker = new google.maps.Marker({
                    position: paris,
                    icon: image,
                    map: map,
                    title: 'Location vÃ©lib',
                    zIndex: 2000
                });

                // affiche les infos de la station au clique
                marker.addListener('click', function () {

                    console.log('ok');
                    if (window.matchMedia("(max-width: 700px)").matches) {
                        // Mobile
                        document.getElementById('map').style.width = 100 + "%";
                    } else {
                        // ordinateur
                        document.getElementById('map').style.width = 65 + "%";
                    }

                });
            });
            // position pour groupe de clusters
            locations.push({
                lat: object.position.lat,
                lng: object.position.lng,
            });


        });


        // Ajoute les groupes clusters dans la map.
        var markers = locations.map(function (location, i) {
            return new google.maps.Marker({
                position: location,

            });

        });
        var markerCluster = new MarkerClusterer(map, markers, {
            imagePath: 'http://localhost/parcour-5/web/images/m'
        });


    });


}

var locations = []