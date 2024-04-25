<?php

include_once "bd.inc.php";

function getNomAnimal($idA){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select NomAnimal from Animal where idAnimal = :idAnimal");
        $req->bindValue(':idAnimal', $idA, PDO::PARAM_INT);
    
        $req->execute();
    
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getLibelleAnimal($idA){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select LibelleAnimal from Animal where idAnimal = :idAnimal");
        $req->bindValue(':idAnimal', $idA, PDO::PARAM_INT);
    
        $req->execute();
    
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getProvenanceAnimal($idA){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select Provenance from Animal where idAnimal = :idAnimal");
        $req->bindValue(':idAnimal', $idA, PDO::PARAM_INT);
    
        $req->execute();
    
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getNomEspeceAnimal($idA){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select Espece.NomEspece from Animal, Espece where Animal.idEspece = Espece.idEspece AND Animal.idAnimal = :idAnimal");
        $req->bindValue(':idAnimal', $idA, PDO::PARAM_INT);
    
        $req->execute();
    
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getFamilleEspeceAnimal($idA){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select Espece.FamilleEspece from Animal, Espece where Animal.idEspece = Espece.idEspece AND Animal.idAnimal = :idAnimal");
        $req->bindValue(':idAnimal', $idA, PDO::PARAM_INT);
    
        $req->execute();
    
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getHabitatEspeceAnimal($idA){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select Espece.Habitat from Animal, Espece where Animal.idEspece = Espece.idEspece AND Animal.idAnimal  = :idAnimal");
        $req->bindValue(':idAnimal', $idA, PDO::PARAM_INT);
    
        $req->execute();
    
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getAlimentationEspeceAnimal($idA){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select Espece.Alimentation from Animal, Espece where Animal.idEspece = Espece.idEspece AND Animal.idAnimal  = :idAnimal");
        $req->bindValue(':idAnimal', $idA, PDO::PARAM_INT);
    
        $req->execute();
    
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getTailleEspeceAnimal($idA){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select Espece.Taille from Animal, Espece where Animal.idEspece = Espece.idEspece AND Animal.idAnimal  = :idAnimal");
        $req->bindValue(':idAnimal', $idA, PDO::PARAM_INT);
    
        $req->execute();
    
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getLibelleTypeEspeceAnimal($idA){
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select TypeEspece.libelleTE FROM Animal, Espece, etre, TypeEspece WHERE Animal.idEspece = Espece.idEspece AND Espece.idEspece = etre.idEspece AND etre.idTE = TypeEspece.idTE AND Animal.idAnimal = :idAnimal");
        $req->bindValue(':idAnimal', $idA, PDO::PARAM_INT);
    
        $req->execute();
    
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


?>