<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

// Gestion des erreurs
// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();

// Le service$app['db'] est défini automatiquement lors de l'enregistrement du fournisseurDoctrineServiceProvider.
// Register service providers.
$app->register(new Silex\Provider\DoctrineServiceProvider());

// Ajout de services DAO qui est ensuite utiliser.
$app['dao.article'] = function ($app) {
    return new MicroCMS\DAO\ArticleDAO($app['db']);
};