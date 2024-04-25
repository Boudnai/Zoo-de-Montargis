<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/authentification.inc.php";

// creation du menu burger
$menuBurger = array();
$menuBurger[] = Array("url"=>"./?action=connexion","label"=>"Connexion");
$menuBurger[] = Array("url"=>"./?action=inscription","label"=>"Inscription");

// recuperation des donnees GET, POST, et SESSION
if (isset($_POST["MailUtilisateur"]) && isset($_POST["mdpUtilisateur"])){
    $mailU=$_POST["MailUtilisateur"];
    $mdpU=$_POST["mdpUtilisateur"];
}
else
{
    $mailU="";
    $mdpU="";
}

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 


// traitement si necessaire des donnees recuperees
login($mailU,$mdpU);

if (isLoggedOn()){ // si l'utilisateur est connecté on redirige vers le controleur monProfil
    include "$racine/controleur/monProfil.php";
}
else{ // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
    // appel du script de vue 
    $titre = "authentification";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/Authentification.html.php";
    include "$racine/vue/pied.html.php";
}

?>