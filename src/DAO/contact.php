<?php
/**
 * Created by PhpStorm.
 * User: lamri
 * Date: 06/02/2018
 * Time: 12:52

 */
session_start();

ini_set('display_errors',1);

// Envoie de mail
if ($_POST['name'] != "" && $_POST['email'] != "" && strlen($_POST['message']) > 10) {


    $mail = 'djamallamri@yahoo.fr'; // Déclaration de l'adresse de destination.
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
    {
        $passage_ligne = "\r\n";
    }
    else
    {
        $passage_ligne = "\n";
    }
    //=====Déclaration des messages au format texte et au format HTML.
    $message_txt = $_POST['name'] . $_POST['email'] . $_POST['mobile'] . $_POST['message'];
    $message_html = "<html><head></head><body><b>" . $_POST['name'] . $_POST['email'] . $_POST['mobile'] . $_POST['message'] . "</body></html>";
    //==========

    //=====Création de la boundary
    $boundary = "-----=".md5(rand());
    //==========

    //=====Définition du sujet.
    $sujet = $_POST['subject'];
    //=========

    //=====Création du header de l'e-mail.
    $header = "From: \"WeaponsB\"<weaponsb@mail.fr>".$passage_ligne;
    $header.= "Reply-to: \"WeaponsB\" <weaponsb@mail.fr>".$passage_ligne;
    $header.= "MIME-Version: 1.0".$passage_ligne;
    $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
    //==========

    //=====Création du message.
    $message = $passage_ligne."--".$boundary.$passage_ligne;
    //=====Ajout du message au format texte.
    $message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_txt.$passage_ligne;
    //==========
    $message.= $passage_ligne."--".$boundary.$passage_ligne;
    //=====Ajout du message au format HTML
    $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_html.$passage_ligne;
    //==========
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    //==========

    //=====Envoi de l'e-mail.
    mail($mail,$sujet,$message,$header);

    echo "<br /><p><h2>Votre message à bien été envoyer.</h2></p><br />";

    header('location: /contact');
} else {
    echo "Veuillez remplir tous les champ";
}

