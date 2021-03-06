<?php

use Symfony\Component\HttpFoundation\Request;
use MicroCMS\Domain\Comment;
use MicroCMS\Domain\Loisir;
use MicroCMS\Domain\User;
use MicroCMS\Form\Type\CommentType;
use MicroCMS\Form\Type\LoisirType;
use MicroCMS\Form\Type\LoisirAddType;
use MicroCMS\Form\Type\LoisirSearchType;
use MicroCMS\Form\Type\UserType;

// Login form
$app->get('/login', function(Request $request) use ($app) {
    return $app['twig']->render('views/backend/login.html.twig', array(
        'error'         => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
    ));
})->bind('login');

// Home page
$app->match('/', function (Request $request) use ($app) {

    $loisirss = $app['dao.loisir']->findAllIndex();
    $loisirs = new Loisir();
    $loisirForm = $app['form.factory']->create(LoisirSearchType::class, $loisirs);
    $loisirForm->handleRequest($request);
    // la méthode find me permet d'afficher un loisir en particulier ex: find(1) ou find($id)
    $loisir = $app['dao.loisir']->find(1);
    return $app['twig']->render('views/frontend/index.html.twig', array('loisirs' => $loisirss, 'loisir' => $loisir,
        'title' => 'Accueil',
        'loisirForm' => $loisirForm->createView()));
})->bind('home');


// Resultat de recherche methode match accepte get et post
$app->match('/result', function (Request $request) use ($app) {
    $loisir = $app['dao.loisir']->findResult($request);
    return $app['twig']->render('views/frontend/result.html.twig', array('loisir' => $loisir));
})->bind('result/');

// pour afficher les cluster
$app->match('/result/1', function (Request $request) use ($app) {
    $loisir = $app['dao.loisir']->findResult($request);
    return $app['twig']->render('views/map/clustersResult.html.twig', array('loisir' => $loisir));
})->bind('result/1');

$app->match('/contact', function () use ($app) {

    return $app['twig']->render('views/frontend/contact.html.twig');

})->bind('/contact');

// Resultat de recherche methode match accepte get et post
$app->match('/ville/', function ( Request $request) use ($app) {
    $loisir = $app['dao.loisir']->findResult($request);

    return $app['twig']->render('views/frontend/result-ville.html.twig', array('loisir' => $loisir));
})->bind('ville/');

// Resultat de recherche methode match accepte get et post
$app->match('/api/', function () use ($app) {

    $app['dao.loisir']->api();
    return $app['twig']->render('views/default.html.twig');

})->bind('/api/');

// Loisir details with comments
$app->match('/sejours/{id}', function ($id, Request $request) use ($app) {
    $loisir = $app['dao.loisir']->find($id);
    $commentFormView = null;
        // A user is fully authenticated : he can add comments
        $comment = new Comment();
        $comment->setLoisir($loisir);
        $commentForm = $app['form.factory']->create(CommentType::class, $comment);
        $commentForm->handleRequest($request);
        if ($commentForm->isSubmitted() && $commentForm->isValid()) {
            $app['dao.comment']->save($comment);
            $app['session']->getFlashBag()->add('success', 'Your comment was successfully added.');
        }
        $commentFormView = $commentForm->createView();

    $comments = $app['dao.comment']->findAllByLoisir($id);

    $commentsNote = $app['dao.comment']->findAllByLoisirMoyenne($id);

    return $app['twig']->render('views/frontend/unique.html.twig', array(
        'loisir' => $loisir,
        'comments' => $comments,
        'commentsNote' => $commentsNote,
        'commentForm' => $commentFormView));
})->bind('sejours/');


$app->get('/liste/', function () use ($app) {
    $loisirs = $app['dao.loisir']->findAllMap();
    return $app['twig']->render('views/frontend/liste.html.twig', array('loisir' => $loisirs));
})->bind('liste/');


$app->get('/geoloc', function () use ($app) {
    return $app['twig']->render('views/frontend/geoloc.html.twig');
})->bind('geoloc');


$app->get('/admin', function () use ($app) {

    return $app['twig']->render('views/backend/admin.html.twig');
})->bind('admin');


$app->get('/clusters/', function () use ($app) {
    $loisirs = $app['dao.loisir']->findAllIndex();
    return $app['twig']->render('views/map/clusters.html.twig', array('loisirs' => $loisirs));
})->bind('api/');

$app->match('/clustersAll/', function () use ($app) {
    $loisirs = $app['dao.loisir']->geoloc();
    return $app['twig']->render('views/map/clustersAll.html.twig', array('loisirs' => $loisirs));
})->bind('clusters/');

$app->match('/clustersResult/', function () use ($app) {
    $loisirs = $app['dao.loisir']->findResult();
    return $app['twig']->render('views/map/clustersResult.html.twig', array('loisirs' => $loisirs));
})->bind('clustersResult/');


// Admin home page
$app->get('/admin', function() use ($app) {
    $loisirs = $app['dao.loisir']->findAll();
    $comments = $app['dao.comment']->findAll();
    $users = $app['dao.user']->findAll();
    return $app['twig']->render('views/backend/admin.html.twig', array(
        'loisirs' => $loisirs,
        'comments' => $comments,
        'users' => $users));
})->bind('admin');


$app->match('/loisir/add', function(Request $request) use ($app) {
    $loisir = new Loisir();
    $loisirForm = $app['form.factory']->create(LoisirAddType::class, $loisir);
    $loisirForm->handleRequest($request);
    if ($loisirForm->isSubmitted() && $loisirForm->isValid()) {
        $app['dao.loisir']->save($loisir);
        $app['session']->getFlashBag()->add('success', 'The loisir was successfully created.');
    }
    return $app['twig']->render('views/backend/loisir_add_form.html.twig', array(
        'title' => 'Nouveau loisir',
        'loisir' => $loisir,
        'loisirForm' => $loisirForm->createView()));
})->bind('admin_loisir_add');

// Edit an existing
$app->match('/admin/loisir/{id}/edit', function($id, Request $request) use ($app) {
    $loisir = $app['dao.loisir']->find($id);
    $loisirForm = $app['form.factory']->create(LoisirType::class, $loisir);
    $loisirForm->handleRequest($request);
    if ($loisirForm->isSubmitted() && $loisirForm->isValid()) {
        $app['dao.loisir']->save($loisir);
        $app['session']->getFlashBag()->add('success', 'The loisir was successfully updated.');
    }
    return $app['twig']->render('views/backend/loisir_add_form.html.twig', array(
        'title' => 'Edit loisir',
        'loisir' => $loisir,
        'loisirForm' => $loisirForm->createView()));

})->bind('admin_loisir_edit');

// Remove
$app->get('/admin/loisir/{id}/delete', function($id, Request $request) use ($app) {
    // Delete all associated comments
    $app['dao.comment']->deleteAllByLoisir($id);
    // Delete
    $app['dao.loisir']->delete($id);
    $app['session']->getFlashBag()->add('success', 'The loisir was successfully removed.');
    // Redirect to admin home page
    return $app->redirect($app['url_generator']->generate('admin'));
})->bind('admin_loisir_delete');

// Edit an existing comment
$app->match('/admin/comment/{id}/edit', function($id, Request $request) use ($app) {
    $comment = $app['dao.comment']->find($id);
    $commentForm = $app['form.factory']->create(CommentType::class, $comment);
    $commentForm->handleRequest($request);
    if ($commentForm->isSubmitted() && $commentForm->isValid()) {
        $app['dao.comment']->save($comment);
        $app['session']->getFlashBag()->add('success', 'The comment was successfully updated.');
    }
    return $app['twig']->render('views/backend/comment_form.html.twig', array(
        'title' => 'Edit comment',
        'commentForm' => $commentForm->createView()));
})->bind('admin_comment_edit');

// Remove a comment
$app->get('/admin/comment/{id}/delete', function($id, Request $request) use ($app) {
    $app['dao.comment']->delete($id);
    $app['session']->getFlashBag()->add('success', 'The comment was successfully removed.');
    // Redirect to admin home page
    return $app->redirect($app['url_generator']->generate('admin'));
})->bind('admin_comment_delete');

$app->get('/comment/{id}/signale/{postId}', function($id, $postId, Request $request) use ($app) {
    $app['dao.comment']->signale($id);
    $app['session']->getFlashBag()->add('success', 'Commentaire signalé.');
    $url = '/sejours/' . $postId;
    return $app->redirect($url);
})->bind('signale');

$app->get('/note/{id}/loisir/', function($id, Request $request) use ($app) {
    $app['dao.comment']->note($id);
    $app['session']->getFlashBag()->add('success', 'Noté.');
    return $app->redirect('/');
})->bind('notePlus');


// Add a user
$app->match('/user/add', function(Request $request) use ($app) {
    $user = new User();
    $userForm = $app['form.factory']->create(UserType::class, $user);
    $userForm->handleRequest($request);
    if ($userForm->isSubmitted() && $userForm->isValid()) {
        // generate a random salt value
        $salt = substr(md5(time()), 0, 23);
        $user->setSalt($salt);
        $plainPassword = $user->getPassword();
        // find the default encoder
        $encoder = $app['security.encoder.bcrypt'];
        // compute the encoded password
        $password = $encoder->encodePassword($plainPassword, $user->getSalt());
        $user->setPassword($password);
        $app['dao.user']->save($user);
        $app['session']->getFlashBag()->add('success', 'The user was successfully created.');
    }
    return $app['twig']->render('views/backend/user_form.html.twig', array(
        'title' => 'New user',
        'userForm' => $userForm->createView()));
})->bind('admin_user_add');

// Edit an existing user
$app->match('/admin/user/{id}/edit', function($id, Request $request) use ($app) {
    $user = $app['dao.user']->find($id);
    $userForm = $app['form.factory']->create(UserType::class, $user);
    $userForm->handleRequest($request);
    if ($userForm->isSubmitted() && $userForm->isValid()) {
        $plainPassword = $user->getPassword();
        // find the encoder for the user
        $encoder = $app['security.encoder_factory']->getEncoder($user);
        // compute the encoded password
        $password = $encoder->encodePassword($plainPassword, $user->getSalt());
        $user->setPassword($password);
        $app['dao.user']->save($user);
        $app['session']->getFlashBag()->add('success', 'The user was successfully updated.');
    }
    return $app['twig']->render('views/backend/user_form.html.twig', array(
        'title' => 'Edit user',
        'userForm' => $userForm->createView()));
})->bind('admin_user_edit');

// Remove a user
$app->get('/admin/user/{id}/delete', function($id, Request $request) use ($app) {
    // Delete all associated comments
    $app['dao.comment']->deleteAllByUser($id);
    // Delete the user
    $app['dao.user']->delete($id);
    $app['session']->getFlashBag()->add('success', 'The user was successfully removed.');
    // Redirect to admin home page
    return $app->redirect($app['url_generator']->generate('admin'));
})->bind('admin_user_delete');

// redirection pour le CSS



