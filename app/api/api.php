[<?php
/**
 * Created by PhpStorm.
 * User: lamri
 * Date: 17/10/2017
 * Time: 14:24
 */

foreach ($articles as $article) {
    $titre = $article->getTitle();



    echo <<<END
{"image":"./images/1533126-3.jpg","number":31705,"name":"31705 .$titre.  - CHAMPEAUX (BAGNOLET)","address":"RUE DES CHAMPEAUX (PRES DE LA GARE ROUTIERE) - 93170 BAGNOLET","position":{"lat":48.8645278209514,"lng":2.416170724425901},"banking":true,"bonus":true,"status":"OPEN","contract_name":"Paris","bike_stands":50,"available_bike_stands":45,"available_bikes":4,"last_update":1507326804000},
END;

}

?>{"image":"./images/1533126-3.jpg","number":31705,"name":"31705 .First article. - CHAMPEAUX (BAGNOLET)","address":"RUE DES CHAMPEAUX (PRES DE LA GARE ROUTIERE) - 93170 BAGNOLET","position":{"lat":48.8645278209514,"lng":2.416170724425901},"banking":true,"bonus":true,"status":"OPEN","contract_name":"Paris","bike_stands":50,"available_bike_stands":45,"available_bikes":4,"last_update":1507326804000}]<?php
