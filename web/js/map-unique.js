function initMap() {
    // Fonction qui récupère les variables GET dans une url
    // Permet d'afficher le resultat de toute la base de données via google map
    function $_GET(param) {
        var vars = {};
        window.location.href.replace( location.hash, '' ).replace(
            /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
            function( m, key, value ) { // callback
                vars[key] = value !== undefined ? value : '';
            }
        );

        if ( param ) {
            return vars[param] ? vars[param] : null;
        }
        return vars;
    }

    var latP = $_GET('positionL');
    var lngP = $_GET('positionN');

    var latt = Number(latP);
    var lngg = Number(lngP);

    var uluru = {lat: latt, lng: lngg};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: uluru
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map
    });
}
