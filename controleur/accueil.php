<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.animal.inc.php";
include_once "$racine/modele/bd.typeesp.inc.php";
include_once "$racine/modele/bd.photo.inc.php";

// creation du menu burger
$menuBurger = array();
$menuBurger[] = Array("url"=>"./?action=recherche&critere=nom","label"=>"Recherche par nom");
$menuBurger[] = Array("url"=>"./?action=recherche&critere=espece","label"=>"Recherche par espece");
$menuBurger[] = Array("url"=>"./?action=recherche&critere=type","label"=>"Recherche par type d'espèce");


// recuperation des donnees GET, POST, et SESSION
;


// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Zoo de Montargis";
include "$racine/vue/index.html.php";


?>