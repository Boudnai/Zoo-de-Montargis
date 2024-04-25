<?php

include_once "bd.inc.php";

function getAnimalByIdA($idA) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Animal where idAnimal=:idAnimal");
        $req->bindValue(':idA', $idA, PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getAnimaux() {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Animal");
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

function getAnimalByTypeEspece($tabIdTE) {
    $resultat = array();

    if (count($tabIdTE) > 0) {
        $filtre = "idTE = $tabIdTE[0] ";
        for ($i = 1; $i < count($tabIdTE); $i++) {
            $filtre .= " or  idTE = $tabIdTE[$i] ";
        }

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select distinct Animal.* FROM Animal, Espece, etre, TypeEspece WHERE Animal.idEspece = Espece.idEspece AND Espece.idEspece = etre.idEspece and etre.idEspece = TypeEspece.idTE and (" . $filtre . ") order by NomAnimal");
            $req->execute();

            while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
                $resultat[] = $ligne;
            }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    } else {
        return false;
    }
}

function getAnimalByEspece($tabIdE) {
    $resultat = array();

    if (count($tabIdE) > 0) {
        $filtre = "idEspece = $tabIdE[0] ";
        for ($i = 1; $i < count($tabIdE); $i++) {
            $filtre .= " or  idEspece = $tabIdE[$i] ";
        }

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select distinct Animal.* FROM Animal, Espece, etre WHERE Animal.idEspece = Espece.idEspece AND Espece.idEspece = etre.idEspece and (" . $filtre . ") order by NomAnimal");
            $req->execute();

            while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
                $resultat[] = $ligne;
            }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    } else {
        return false;
    }
}

function getAnimalByNomA($nomA) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Animal where NomAnimal like :NomAnimal");
        $req->bindValue(':NomAnimal', "%" . $nomA . "%", PDO::PARAM_STR);

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

function getAnimauxByNomEsp($nomEsp) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Animal,Espece where Espece.idEspece = Animal.idEspace and Espece.NomEspece like :NomEspece");
        $req->bindValue(':NomEspece', "%" . $nomEsp . "%", PDO::PARAM_STR);

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

function getAnimauxByNomTypeEsp($LibEsp) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from Animal,Espece,etre,TypeEspece where Espece.idEspece = Animal.idEspace and Espece.idEspece=etre.idEspece and etre.idTE = TypeEspece.idTE and TypeEspece.libelleTE like :libelleTE");
        $req->bindValue(':libelleTE', "%" . $LibEsp . "%", PDO::PARAM_STR);

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


function getSpectacleNotation() {
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select Spectacle.idSpectacle,Spectacle.LibelleSpectacle, count(*)as
        'critiques', avg(note) as 'moyenne'
        from Spectacle,critiquer
        where critiquer.idSpectacle=Spectacle.idSpectacle
        group by Spectacle.idSpectacle,LibelleSpectacle");
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

function getEspeceByIdA($idA) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select Espece.NomEspece, Espece.FamilleEspece, Espece.Habitat, Espece.Alimentation,Espece.Taille from Animal, Espece where Animal.idAnimal=:idAnimal and Animal.idEspece = Espece.idEspece");
        $req->bindValue(':idA', $idA, PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getTypeEspeceByIdA($idA) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select TypeEspece.libelleTE FROM Animal, Espece, etre, TypeEspece WHERE Animal.idEspece = Espece.idEspece AND Espece.idEspece = etre.idEspece AND etre.idTE = TypeEspece.idTE AND Animal.idAnimal = :idAnimal");
        $req->bindValue(':idA', $idA, PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

?>