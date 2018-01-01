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
    console.log(localStorage.getItem(('geocode')));

    if($_GET('Distance') <= 0.10) { var zoom = 12}
    if($_GET('Distance') == 0.20) { var zoom = 10}
    if($_GET('Distance') == 0.56) { var zoom = 9}
    if($_GET('Distance') == 1.10) { var zoom = 8}


    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: zoom,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: {   lat: parseFloat($_GET('loisirpositionLat')),
                    lng: parseFloat($_GET('loisirpositionLng'))
                }
    });


    var url = "/clustersResult/?budget=" + $_GET('budget')+"&lat="+$_GET('loisirpositionLat')+"&lng="+$_GET('loisirpositionLng')+"&loisirpositionLat="+$_GET('loisirpositionLat')+"&loisirpositionLng="+$_GET('loisirpositionLng')+"&Distance="+$_GET('Distance');

    // Modifi le cluster
    var image = 'http://localhost/parcour-5/web/images/cycles.png';
    var image1 = '../images/Calque0.png';
    ajaxGet(url, function (reponse) {

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
                    title: 'Mes loisirs',
                    zIndex: 2000
                });

                // affiche les infos de la station au clique
                marker.addListener('click', function () {

                    if (window.matchMedia("(max-width: 700px)").matches) {
                        // Mobile
                        document.getElementById('map').style.width = 100 + "%";
                    } else {
                        // ordinateur
                        document.getElementById('map').style.width = 65 + "%";
                    }

                    document.getElementById('infoLoisirs').style.display = "block";
                    document.getElementById('infoLoisirs').innerHTML = object.name + "<img src="+ object.image + "alt=" + object.name + ">";

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