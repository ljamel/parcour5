<?php

// Home page
$app->get('/', function () use ($app) {
    $articles = $app['dao.article']->findAll(); // Variable $articles utiliser dans la boucle foreach du fichier view.php

    ob_start();             // start buffering HTML output
    require '../views/view.php';
    $view = ob_get_clean(); // assign HTML output to $view

    return $view;
});

$app->get('/loisirs.html', function () use ($app) {
    $articles = $app['dao.article']->findAll(); // Variable $articles utiliser dans la boucle foreach du fichier view.php

    ob_start();             // start buffering HTML output
    require '../views/loisirs.php';
    $view = ob_get_clean(); // assign HTML output to $view
    return $view;
});