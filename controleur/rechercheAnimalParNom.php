<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.animal.inc.php";
include_once "$racine/modele/bd.typeespece.inc.php";
include_once "$racine/modele/bd.photo.inc.php";

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


// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 


switch($critere){
    case 'nom':
        // recherche par nom
        $listeRestos = getAnimalByNomA($nomR);
        break;
}

// recuperer les types de cuisine si on est en recherche par type de cuisine ou multicritere


// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Recherche d'un restaurant";
include "$racine/vue/index.html.php";
include "$racine/vue/rechercheAnimalParNom.php";
if (!empty($_POST)) {
    // affichage des resultats de la recherche
    include "$racine/vue/ResultRecherche.php";
}
include "$racine/vue/pied.html.php";


?>