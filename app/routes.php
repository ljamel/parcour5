<?php

// Home page
$app->get('/', function () use ($app) {
    $articles = $app['dao.article']->findAll();
    return $app['twig']->render('index.html.twig', array('articles' => $articles));
})->bind('home');

// Article details with comments
$app->get('/sejours/{id}', function ($id) use ($app) {
    $article = $app['dao.article']->find($id);
    $comments = $app['dao.comment']->findAllByArticle($id);
    return $app['twig']->render('unique.html.twig', array('article' => $article, 'comments' => $comments));
})->bind('sejours/');

// Article details with comments
$app->get('/liste/', function () use ($app) {
    $article = $app['dao.article']->findAll();
    return $app['twig']->render('liste.html.twig', array('article' => $article));
})->bind('liste/');

// Article details with comments
$app->get('/geoloc', function () use ($app) {
    $article = $app['dao.article']->findAll();
    return $app['twig']->render('geoloc.html.twig', array('article' => $article));
})->bind('geoloc');

// Article details with comments
$app->get('/admin', function () use ($app) {
    $article = $app['dao.article']->findAll();
    return $app['twig']->render('admin/index.html.twig');
})->bind('admin');
// Article details with comments
$app->post('/connect', function () use ($app) {
    $article = $app['dao.article']->findAll();
    return $app['twig']->render('admin/index.html.twig');
})->bind('connect');


$app->get('/api/', function () use ($app) {
    $articles = $app['dao.article']->findAll();
    return $app['twig']->render('api/api.html.twig', array('articles' => $articles));
})->bind('api/');