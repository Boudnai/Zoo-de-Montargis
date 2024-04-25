<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.animal.inc.php";
include_once "$racine/modele/bd.typeespece.inc.php";
include_once "$racine/modele/bd.photo.inc.php";
include_once "$racine/modele/bd.critiquer.inc.php";
include_once "$racine/modele/authentification.inc.php";

// creation du menu burger
$menuBurger = array();
$menuBurger[] = Array("url"=>"#nom","label"=>"Nom");
$menuBurger[] = Array("url"=>"#libelle","label"=>"Libelle");
$menuBurger[] = Array("url"=>"#photo","label"=>"Photo");
$menuBurger[] = Array("url"=>"#provenance","label"=>"Provenance");
$menuBurger[] = Array("url"=>"#espece","label"=>"Espèce");
$menuBurger[] = Array("url"=>"#typeespece","label"=>"Type d'escpèce");

// recuperation des donnees GET, POST, et SESSION
$idR = $_GET["idAnimal"];

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
$unAnimal = getAnimalByIdA($idR);
$typeEspece = getTypeEspeceByIdA($idR);
$espece = getEspeceByIdA($idR);
$photo = getPhotoSByIdA($idR);

// traitement si necessaire des donnees recuperees
;


// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "detail d'un restaurant";
include "$racine/vue/entete.html.php";
include "$racine/vue/animal.php";
include "$racine/vue/pied.html.php";
?>