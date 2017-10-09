<?php

require_once __DIR__ . './vendor/autoload.php';

$app = new Silex\Application();

$app->get('/', function () {
    return 'Hello world';
});



// chercher la solution pour afficher le contenue de la page modules/pages/loisirs.php
$app->get('/loisirs.html', function () {
    echo 'loisssiiiir';
});

$app->run();