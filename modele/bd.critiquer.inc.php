<?php

include_once "bd.inc.php";

function getCritiquerByIdSpectacle($idS) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from critiquer where idSpectacle=:idSpectacle");
        $req->bindValue(':idSpectacle', $idS, PDO::PARAM_INT);
        
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getNoteMoyenneByIdSpectacle($idS) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select avg(note) from critiquer where idSpectacle=:idSpectacle");
        $req->bindValue(':idR', $idS, PDO::PARAM_INT);
        
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    if ($req->rowCount()>0){
        return $resultat["avg(note)"];
    }
    else{
        return 0;
    }
}

function getCritiquerByMailU($mailU) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from critiquer where MailUtilisateur=:MailUtilisateur");
        $req->bindValue(':mailU', $mailU, PDO::PARAM_STR);
        
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getCritiquerById($idS, $MailU) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from critiquer where idSpectacle=:idSpectacle and MailUtilisateur=:MailUtilisateur");
        $req->bindValue(':idR', $idS, PDO::PARAM_INT);
        $req->bindValue(':mailU', $MailU, PDO::PARAM_STR);
        
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getCritiquerByNote($operateur, $note) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from critiquer where note $operateur :note");
        $req->bindValue(':note', $note, PDO::PARAM_STR);
        
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addCritiquer($idS, $MailU) {
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("insert into critiquer (idSpectacle, MailUtilisateur) values(:idSpectacle, :MailUtilisateur)");
        $req->bindValue(':idSpectacle', $idS, PDO::PARAM_INT);
        $req->bindValue(':mailUtilisateur', $MailU, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function delCritiquerById($idS, $MailU) {
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("delete from critiquer  where idSpectacle=:idSpectacle and MailUtilisateur=:MailUtilisateur");
        $req->bindValue(':idSpectacle', $idS, PDO::PARAM_INT);
        $req->bindValue(':MailUtilisateur', $MailU, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function updCritiquerNote($idS, $idU, $note) {
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("update critiquer set  note=:note where idSpectacle=:idSpectacle and MailUtilisateur=:MailUtilisateur ");
        $req->bindValue(':idSpectacle', $idS, PDO::PARAM_INT);
        $req->bindValue(':MailUtilisateur', $idU, PDO::PARAM_STR);
        $req->bindValue(':note', $note, PDO::PARAM_INT);


        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function updCritiquerCommentaire($idS, $MailU, $commentaire) {
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("update critiquer set commentaire=:commentaire where idSpectacle=:idSpectacle and MailUtilisateur =:MailUtilisateur ");
        $req->bindValue(':idSpectacle', $idS, PDO::PARAM_INT);
        $req->bindValue(':MailUtilisateur', $MailU, PDO::PARAM_STR);
        $req->bindValue(':commentaire', $commentaire, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

?>