<?php

// Home page
// Home page PS penser a remplacer tous les routes pas pour twig si dessous sa améliore la sécurité
$app->get('/', function () use ($app) {
    $articles = $app['dao.article']->findAll();
    return $app['twig']->render('index.html.twig', array('articles' => $articles));
});

// Home page PS penser a remplacer tous les routes pas pour twig si dessous sa améliore la sécurité
$app->get('/parcour-5/', function () use ($app) {
    $articles = $app['dao.article']->findAll();
    return $app['twig']->render('index.html.twig', array('articles' => $articles));
});

$app->get('/loisirs', function () use ($app) {
    $articles = $app['dao.article']->findAll(); // Variable $articles utiliser dans la boucle foreach du fichier view.php

    return $app['twig']->render('pageUnique/loisirs.html.twig', array('articles' => $articles));
});

$app->get('/admin', function () use ($app) {
    $articles = $app['dao.article']->findAll(); // Variable $articles utiliser dans la boucle foreach du fichier view.php

    return $app['twig']->render('admin/index.html.twig', array('articles' => $articles));
});

$app->post('/admin', function () use ($app) {
    $articles = $app['dao.article']->findAll(); // Variable $articles utiliser dans la boucle foreach du fichier view.php

    return $app['twig']->render('admin/index.html.twig', array('articles' => $articles));
});

$app->get('/api', function () use ($app) {
    $articles = $app['dao.article']->findAll(); // Variable $articles utiliser dans la boucle foreach du fichier view.php

    return $app['twig']->render('api/api.html.twig', array('articles' => $articles));
});