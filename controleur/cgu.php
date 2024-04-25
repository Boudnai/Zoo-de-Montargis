<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}


// recuperation des donnees GET, POST, et SESSION

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

// traitement si necessaire des donnees recuperees
// creation du menu burger
$menuBurger = array();
$menuBurger[] = Array("url"=>"#top","label"=>"Raison sociale et siège social");
$menuBurger[] = Array("url"=>"#accpt","label"=>"Directeur de la Publication");
$menuBurger[] = Array("url"=>"#desc","label"=>"Hébergeur du site");
$menuBurger[] = Array("url"=>"#fonc","label"=>"Protection des données personnelles");
$menuBurger[] = Array("url"=>"#mode","label"=>"Propriété intellectuelle");
$menuBurger[] = Array("url"=>"#sanc","label"=>"Clause de non responsabilité");
$menuBurger[] = Array("url"=>"#moti","label"=>"Loi applicable et juridiction compétente");



// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Mentions légales";
include "$racine/vue/mentions_légales.html.php";


?>