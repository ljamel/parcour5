<!DOCTYPE html>

<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title><?= isset($title) ? $title : 'Voyage' ?></title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="http://localhost/parcour-5/web/css/style.css">

</head>
<div id="menu-header">
    <h1>
        <a class="title" href="#slide">
            <img src="http://localhost/parcour-5/web/images/parasol-icon.png" alt="parasol" style="width: 40px;"> Loisirs et Vacances
        </a>
    </h1>
    <nav>
        <div class="title"></div>
        <ul> <!-- Penser a ajouter des images pour que l'écrivain puisse ajouter des images -->
            <li><a href="/parcour5/"> Accueil </a></li>
            <li><a href="Loisirs.php"> Idée loisirs </a></li>
            <li><a href="contacte.html"> contacte </a></li>

        </ul>
    </nav>
</div>
<div id="menu-header-scrollBas">
    <p>Loisirs et Vacances</p>
    <nav>
        <ul >
            <li><a href="/parcour5/"> Accueil </a></li>
            <li><a href="pageUnique/loisirs.php"> Idée loisirs </a></li>
            <li><a href="contacte.html"> contacte </a></li>

        </ul>
    </nav>
</div>
<div id="none">
    <nav>

        <i id="menu-mobile" class="fa fa-bars fa-3x" aria-hidden="true"></i> <i id="menu-close"
                                                                                class="fa fa-times fa-3x none"
                                                                                aria-hidden="true"></i>


        <ul id="deroul-menu">
            <li><a href="/parcour5/"> Accueil </a></li>
            <li><a href="pageUnique/loisirs.php"> Idée loisirs </a></li>
            <li><a href="/parcour5/contacte.html"> contacte </a></li>

        </ul>
    </nav>
</div>
<body>

<!-- Section 1 slide -->
<div id="slide">
    <div id="img-slide1">

        <div class="texte-slide1">
            <p>Vous chercher une idée loisirs où vacances. Vous êtes au bon endroit</p>
            <p>Vous pouvez voire la liste mise a jours régulièrement sur une plans en cliquant sur le bouton en dessous </p>
            <a href="#map"><p class="rectangle">Plans</p></a>
        </div>
    </div>

    <div id="img-slide2">
        <div class="texte-slide2">
            <p>Remplissez le formulaire si dessous et découvrez les loisirs, lieux touristiques et séjours.</p>
            <p>Une liste de suggestion de loisirs et vacances via le lien si dessous.</p>
            <a href="#main"><p class="rectangle">Liste</p></a>
        </div>
    </div>

    <div class="boutons">
        <div id="bouton-slide-left"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
        <div id="bouton-slide-right"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
    </div>
</div>

<div id="formulaire-recherche">
    <input placeholder="Départ"><input placeholder="Budget" type="selector"><input type="text" id="datepicker" id="from"
                                                                                   name="from" placeholder="Du"> <input
            type="text" id="to" name="to" placeholder="Au"> <input class="recherche" value="Chercher" type="button">
</div>
<div id="main">

    <div class="display"><h1> BON PLANS </h1> <P><a href="pageUnique/loisirs.php"> VOIR TOUT <i class="fa fa-angle-double-right fa-moyen" aria-hidden="true"></i> </a></P> </div>

    <div class="liste-main shadow-none">
        <img class="liste-main" src="http://localhost/parcour-5/web/images/1533126-3.jpg">
        <h2>Séjours de rêve a petit prix</h2>
        <P>Plus qu'une semaine pour réserver</P>
        <div class="display">
            <P class="fa-min"><i class="fa fa-map-marker fa-min" aria-hidden="true"></i> Maroc</P>
            <P class="prix">Prix 120 €</P>
        </div>
        <p class="reserver">Réserver</p>
    </div>

    <div class="liste-main shadow-none">
        <img class="liste-main" src="http://localhost/parcour-5/web/images/1533126-3.jpg">
        <h2>Séjours de rêve a petit prix</h2>
        <P>Plus qu'une semaine pour réserver</P>
        <div class="display">
            <P class="fa-min"><i class="fa fa-map-marker fa-min" aria-hidden="true"></i> Maroc</P>
            <P class="prix">Prix 120 €</P>
        </div>
        <p class="reserver">Réserver</p>
    </div>

    <div class="liste-main shadow-none">
        <img class="liste-main" src="http://localhost/parcour-5/web/images/1533126-3.jpg">
        <h2>Séjours de rêve a petit prix</h2>
        <P>Plus qu'une semaine pour réserver</P>
        <div class="display">
            <P class="fa-min"><i class="fa fa-map-marker fa-min" aria-hidden="true"></i> Maroc</P>
            <P class="prix">Prix 120 €</P>
        </div>
        <p class="reserver">Réserver</p>
    </div>



</div>

<?php foreach ($articles as $article):  // geteur du fichier Domain/article.php permet d'afficher ce qui a était envoyer au seteur?>
    <article>
        <h2><?php echo $article->getTitle() ?></h2>
        <p><?php echo $article->getContent() ?></p>
        <p><?php echo $article->getId() ?></p>
    </article>
<?php endforeach ?>


<div id="mapInfo">
    <div id="map"></div>
    <div id="infoLoisirs">essai</div>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="http://localhost/parcour-5/web/js/ajax.js"></script>
<script src="http://localhost/parcour-5/web/js/map.js"></script>
<script src="http://localhost/parcour-5/web/js/menu.js"></script>
<script src="http://localhost/parcour-5/web/js/slide.js"></script>
<script src="http://localhost/parcour-5/web/js/date.js"></script>


<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyCLCyZdCatCyO348_1vXQr4yEQkDheyQ3A&callback=initMap"></script>
