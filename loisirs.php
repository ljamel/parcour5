<!DOCTYPE html>

<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title><?= isset($title) ? $title : 'Voyage' ?></title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="./css/style.css">

</head>
<div id="menu-header">
    <h1>
        <a class="title" href="#slide">
            Loisirs et Vacances
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
    <nav>
        <ul>
            <li><a href="/parcour5/"> Accueil </a></li>
            <li><a href="loisirs.php"> Idée loisirs </a></li>
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
            <li><a href="loisirs.php"> Idée loisirs </a></li>
            <li><a href="/parcour5/contacte.html"> contacte </a></li>

        </ul>
    </nav>
</div>
<body>


<section id="main">
    <div class="liste-resultat">
        <img class="liste-main-resultat" src="./images/1533126-3.jpg">
        <P>Séjours de rêve a petit prix</P>
        <P>Plus qu'une semaine pour résérver</P>
        <P class="fa-min"><i class="fa fa-map-marker fa-min" aria-hidden="true"></i> Maroc</P>
        <P class="prix">Prix 120 €</P>
    </div>

    <div class="liste-resultat">
        <img class="liste-main-resultat" src="./images/1533126-3.jpg">
        <P>Séjours de rêve a petit prix</P>
        <P>Plus qu'une semaine pour résérver</P>
        <P class="fa-min"><i class="fa fa-map-marker fa-min" aria-hidden="true"></i> Maroc</P>
        <P class="prix">Prix 120 €</P>
    </div>

    <div class="liste-resultat">
        <img class="liste-main-resultat" src="./images/1533126-3.jpg">
        <P>Séjours de rêve a petit prix</P>
        <P>Plus qu'une semaine pour résérver</P>
        <P class="fa-min"><i class="fa fa-map-marker fa-min" aria-hidden="true"></i> Maroc</P>
        <P class="prix">Prix 120 €</P>
    </div>

    <div class="liste-resultat">
        <img class="liste-main-resultat" src="./images/1533126-3.jpg">
        <P>Séjours de rêve a petit prix</P>
        <P>Plus qu'une semaine pour résérver</P>
        <P class="fa-min"><i class="fa fa-map-marker fa-min" aria-hidden="true"></i> Maroc</P>
        <P class="prix">Prix 120 €</P>
    </div>

</section>


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="./js/ajax.js"></script>
<script src="./js/menu.js"></script>
<script src="./js/slide.js"></script>
<script src="./js/date.js"></script>
