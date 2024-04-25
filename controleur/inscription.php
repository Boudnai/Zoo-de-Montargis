<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.utilisateur.inc.php";

// creation du menu burger
$menuBurger = array();
$menuBurger[] = Array("url"=>"./?action=connexion","label"=>"Connexion");
$menuBurger[] = Array("url"=>"./?action=inscription","label"=>"Inscription");


$inscrit = false;
$msg="";
// recuperation des donnees GET, POST, et SESSION
if (isset($_POST["MailUtilisateur"]) && isset($_POST["mdpUtilisateur"]) && isset($_POST["NomUtilisateur"]) && isset($_POST["PrenomUtilisateur"])) {

    if ($_POST["MailUtilisateur"] != "" && $_POST["mdpUtilisateur"] != "" && $_POST["NomUtilisateur"] != "" && $_POST["PrenomUtilisateur"] != "") {
        $mailU = $_POST["MailUtilisateur"];
        $mdpU = $_POST["mdpUtilisateur"];
        $nom = $_POST["NomUtilisateur"];
        $prenom = $_POST["PrenomUtilisateur"];

        // enregistrement des donnees
        $ret = addUtilisateur($nom, $prenom,$mailU,$mdpU);
        if ($ret) {
            $inscrit = true;
        } else {
            $msg = "l'utilisateur n'a pas été enregistré.";
        }
    }
 else {
    $msg="Renseigner tous les champs...";    
    }
}

if ($inscrit) {
    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Inscription confirmée";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/ConfirmationInscription.html.php";
    include "$racine/vue/pied.html.php";
} else {
    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Inscription pb";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/Inscription.html.php";
    include "$racine/vue/pied.html.php";
}
?>