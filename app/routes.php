<?php

// Home page
$app->get('/', function () use ($app) {
    $loisirs = $app['dao.loisir']->findAll();
    // la méthode find me permet d'afficher un loisir en particulier ex: find(1) ou find($id)
    $loisir = $app['dao.loisir']->find(1);
    return $app['twig']->render('index.html.twig', array('loisirs' => $loisirs, 'loisir' => $loisir));
})->bind('home');

// loisir details with comments
$app->get('/sejours/{id}', function ($id) use ($app) {
    $loisir = $app['dao.loisir']->find($id);
    $comments = $app['dao.comment']->findAllByLoisir($id);
    return $app['twig']->render('unique.html.twig', array('loisir' => $loisir, 'comments' => $comments));
})->bind('sejours/');

// loisir details with comments
$app->get('/liste/', function () use ($app) {
    $loisir = $app['dao.loisir']->findAll();
    return $app['twig']->render('liste.html.twig', array('loisir' => $loisir));
})->bind('liste/');


// loisir details with comments
$app->get('/admin', function () use ($app) {

    return $app['twig']->render('admin.html.twig');
})->bind('admin');



$app->get('/api/', function () use ($app) {
    $loisirs = $app['dao.loisir']->findAll();
    return $app['twig']->render('api/api.html.twig', array('loisirs' => $loisirs));
})->bind('api/');