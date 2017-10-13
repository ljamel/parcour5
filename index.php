<?php

require_once __DIR__ . './vendor/autoload.php';

$loisirs = new Silex\Application();

$loisirs->get('/', function () {
    return 'Hello world';
});


// chercher la solution pour afficher le contenue de la page modules/pages/loisirs.php
// $app->get('/loisirs2.html', function () {
//    echo 'loisssiiiir';
// });

$loisirs->run();