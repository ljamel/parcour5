<?php
/**
 * Created by PhpStorm.
 * User: lamri
 * Date: 13/10/2017
 * Time: 10:57
 */


// Return all articles
function getArticles() {
    $bdd = new PDO('mysql:host=localhost;dbname=microcms;charset=utf8', 'microcms_user', 'secret');
    $returnResultat = $bdd->query('select * from t_article order by art_id desc');
    return $returnResultat; // remettre $articles en cas de probleme pour la suite du cours
}