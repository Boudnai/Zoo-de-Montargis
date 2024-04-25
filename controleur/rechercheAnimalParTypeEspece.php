<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.animal.inc.php";
include_once "$racine/modele/bd.typeespece.inc.php";
include_once "$racine/modele/bd.photo.inc.php";

// creation du menu burger
$menuBurger = array();
$menuBurger[] = Array("url"=>"./?action=recherche&critere=nom","label"=>"Recherche par nom");
$menuBurger[] = Array("url"=>"./?action=recherche&critere=espece","label"=>"Recherche par espece");
$menuBurger[] = Array("url"=>"./?action=recherche&critere=type","label"=>"Recherche par type d'espèce");

// critere de recherche par defaut
$critere = "nom";
if (isset($_GET["critere"])) {
    $critere = $_GET["critere"];
}

// recuperation des donnees GET, POST, et SESSION
if (isset($_GET["critere"])){
    $critere = $_GET["critere"];
}
$nomR="";
if (isset($_POST["nomAnimal"])){
    $nomR = $_POST["nomAnimal"];
}
$nomEscpece="";
if (isset($_POST["NomEspece"])){
    $voieAdrR = $_POST["NomEspece"];
}
$libelleTC="";
if (isset($_POST["libelleTE"])){
    $cpR = $_POST["libelleTE"];
}

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 


switch($critere){
    case 'nom':
        // recherche par nom
        $listeRestos = getAnimalByNomA($nomR);
        break;
    case 'nomEspece':
        // recherche par adresse
        $listeRestos = getAnimauxByNomEsp($voieAdrR, $cpR, $villeR);
        break;
    case 'libelleTE':
        // recherche par type
        $listeRestos = getAnimauxByNomTypeEsp($tabIdTC);
        break;
}

// recuperer les types de cuisine si on est en recherche par type de cuisine ou multicritere


// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Recherche d'un restaurant";
include "$racine/vue/entete.html.php";
include "$racine/vue/RechercheAnimal.php";
if (!empty($_POST)) {
    // affichage des resultats de la recherche
    include "$racine/vue/ResultRecherche.php";
}
include "$racine/vue/pied.html.php";


?>