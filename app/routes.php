<?php
/**
 * Created by PhpStorm.
 * User: lamri
 * Date: 13/10/2017
 * Time: 12:47
 */

// Home page
$app->get('/', function () {
    require '../src/model.php';
    $returnResultat = getArticles(); // M'en servir pour afficher le contenue d'une base de données avec la boucle foreach

    ob_start();             // start buffering HTML output
    require '../views/view.php';
    $view = ob_get_clean(); // assign HTML output to $view
    return $view;
});