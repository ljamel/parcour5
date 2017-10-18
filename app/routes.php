<?php

// Home page
$app->get('/', function () use ($app) {
    $articles = $app['dao.article']->findAll(); // Variable $articles utiliser dans la boucle foreach du fichier view.php

    ob_start();             // start buffering HTML output
    require '../views/index.php';
    $view = ob_get_clean(); // assign HTML output to $view

    return $view;
});

$app->get('/loisirs.html', function () use ($app) {
    $articles = $app['dao.article']->findAll(); // Variable $articles utiliser dans la boucle foreach du fichier view.php

    ob_start();             // start buffering HTML output
    require '../views/pageUnique/loisirs.php';
    $view = ob_get_clean(); // assign HTML output to $view
    return $view;
});

$app->get('/admin', function () use ($app) {
    $articles = $app['dao.article']->findAll(); // Variable $articles utiliser dans la boucle foreach du fichier view.php
    if(isset($id))
    {
        $del = $app['dao.article']->delete($id);
    }

    ob_start();             // start buffering HTML output
    require '../views/admin/index.php';
    $view = ob_get_clean(); // assign HTML output to $view
    return $view;
});

$app->get('/api', function () use ($app) {
    $articles = $app['dao.article']->findAll(); // Variable $articles utiliser dans la boucle foreach du fichier view.php

    ob_start();             // start buffering HTML output
    require '../app/api/api.php';
    $view = ob_get_clean(); // assign HTML output to $view
    return $view;
});