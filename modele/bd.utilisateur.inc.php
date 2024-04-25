<?php

include_once "bd.inc.php";

function getUtilisateurs() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Utilisateur");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getUtilisateurByMailU($mailU) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Utilisateur where MailUtilisateur=:MailUtilisateur");
        $req->bindValue(':MailUtilisateur', $mailU, PDO::PARAM_STR);
        $req->execute();
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addUtilisateur($nomU, $prenomU,$mailU,$mdpU) {
    try {
        $cnx = connexionPDO();

        $mdpUCrypt = crypt($mdpU, "sel");
        $req = $cnx->prepare("insert into Utilisateur (NomUtilisateur,PrenomUtillisateur,MailUtilisateur,mdpUtilisateur) values(:NomUtilisateur,:PrenomUtillisateur,:MailUtilisateur,:mdpUtilisateur)");
        $req->bindValue(':NomUtilisateur', $nomU, PDO::PARAM_STR);
        $req->bindValue(':PrenomUtillisateur', $prenomU, PDO::PARAM_STR);
        $req->bindValue(':MailUtilisateur', $mailU, PDO::PARAM_STR);
        $req->bindValue(':mdpUtilisateur', $mdpU, PDO::PARAM_STR);
        
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function updtMdpUtilisateur($mailU, $mdpU) {
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $mdpUCrypt = crypt($mdpU, "sel");
        $req = $cnx->prepare("update Utilisateur set mdpUtilisateur=:mdpUtilisateur where MailUtilisateur=:MailUtilisateur");
        $req->bindValue(':MailUtilisateur', $mailU, PDO::PARAM_STR);
        $req->bindValue(':mdpUtiliateur', $mdpUCrypt, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}