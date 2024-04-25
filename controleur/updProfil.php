<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/authentification.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";
include_once "$racine/modele/bd.typeespece.inc.php";
include_once "$racine/modele/bd.resto.inc.php";

// creation du menu burger
$menuBurger = array();
$menuBurger[] = Array("url" => "./?action=profil", "label" => "Consulter mon profil");
$menuBurger[] = Array("url" => "./?action=updProfil", "label" => "Modifier mon profil");

// init messages 
$messageMdp = "";

// recuperation des donnees GET, POST, et SESSION
if (isLoggedOn()) {
    $mailU = getMailULoggedOn();
    $util = getUtilisateurByMailU($mailU);

        // traitement si necessaire des donnees recuperees
    
    if (isset($_POST["mdpUtilisateur"]) && isset($_POST["mdpUtilisateur2"])) {
        if ($_POST["mdpUtilisateur"] != "") {
            if (($_POST["mdpUtilisateur"] == $_POST["mdpUtilisateur2"])) {
                updtMdpUtilisateur($mailU, $_POST["mdpUtilisateur"]);
            } else {
                $messageMdp = "erreur de saisie du mot de passe";
            }
        }
    }


    
    // appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
    
    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Mon profil";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/UpdProfil.php";
    include "$racine/vue/pied.html.php";
}
else{
    $titre = "Mon profil";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/pied.html.php";
}
?>