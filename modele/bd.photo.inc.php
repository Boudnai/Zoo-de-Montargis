<?php

include_once "bd.inc.php";

function getPhotosByIdA($idA) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Photo where idAnimal=:idAnimal");
        $req->bindValue(':idAnimal', $idA, PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getPhotoByIdP($idP) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Photo where idP=:idP");
        $req->bindValue(':idP', $idP, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addPhoto($idP, $chemin, $idA) {
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("insert into Photo (idP, chemin, idAnimal) values(:idP,:chemin,:idAnimal)");
        $req->bindValue(':idP', $idP, PDO::PARAM_INT);
        $req->bindValue(':chemin', $chemin, PDO::PARAM_STR);
        $req->bindValue(':idAnimal', $idA, PDO::PARAM_INT);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

?>