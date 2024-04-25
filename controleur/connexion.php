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
if (!isset($_POST["MailUtilisateur"]) || !isset($_POST["mdpUtilisateur"])){
    // on affiche le formulaire de connexion
    $titre = "authentification";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/Authentification.html.php";
    include "$racine/vue/pied.html.php";
}
else
{
    $mailU=$_POST["MailUilisateur"];
    $mdpU=$_POST["mdpUtilisateur"];
    
    login($mailU,$mdpU);

    if (isLoggedOn()){ // si l'utilisateur est connecté on redirige vers le controleur monProfil
        include "$racine/controleur/monProfil.php";
    }
    else{
        // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
        $titre = "authentification";
        include "$racine/vue/entete.html.php";
        include "$racine/vue/Authentification.html.php";
        include "$racine/vue/pied.html.php";
    }
}

?>