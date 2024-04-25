<?php

include_once "bd.inc.php";

function getTypesEspece() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from TypeEspece");
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getEspece() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Espece");
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function getTypesEspeceByIdA($idA){
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select TypeEspece.* FROM Animal, Espece, etre, TypeEspece WHERE Animal.idEspece = Espece.idEspece AND Espece.idEspece = etre.idEspece AND etre.idTE = TypeEspece.idTE AND Animal.idAnimal = :idA");
        $req->bindValue(':idA', $idA, PDO::PARAM_INT);
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
    
}

function EspeceByIdA($idA){
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select Espece.* FROM Animal, Espece, etre WHERE Animal.idEspece = Espece.idEspece AND Espece.idEspece = etre.idEspece AND Animal.idAnimal = :idA");
        $req->bindValue(':idA', $idA, PDO::PARAM_INT);
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;

    
}

?>


