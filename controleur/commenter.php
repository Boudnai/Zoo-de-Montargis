<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.critiquer.inc.php";
include_once "$racine/modele/authentification.inc.php";

// recuperation des donnees GET, POST, et SESSION
$idR = $_GET["idSpectacle"];
$commentaire = $_POST["commentaire"];

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

$mailU = getMailULoggedOn();
if ($mailU != "") {
    $critiquer = getCritiquerById($idR, $mailU);

// traitement si necessaire des donnees recuperees
    ;
    if ($critiquer == false) {

        addCritiquer($idR, $mailU);
        updCritiquerCommentaire($idR, $mailU, $commentaire);
    } else {
        updCritiquerCommentaire($idR, $mailU, $commentaire);
    }
}

// redirection vers le referer
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>