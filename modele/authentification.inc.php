<?php

include_once "bd.utilisateur.inc.php";

function login($mailU, $mdpU) {
    if (!isset($_SESSION)) {
        session_start();
    }

    $util = getUtilisateurByMailU($mailU);
    $mdpBD = $util["mdpUtilisateur"];

    if (trim($mdpBD) == trim(crypt($mdpU, $mdpBD))) {
        // le mot de passe est celui de l'utilisateur dans la base de donnees
        $_SESSION["MailUtilisateur"] = $mailU;
        $_SESSION["mdpUtilisateur"] = $mdpBD;
    }
}

function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["MailUtilisateur"]);
    unset($_SESSION["mdpUtilisateur"]);
}

function getMailULoggedOn(){
    if (isLoggedOn()){
        $ret = $_SESSION["MailUtilisateur"];
    }
    else {
        $ret = "";
    }
    return $ret;
        
}

function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["MailUtilisateur"])) {
        $util = getUtilisateurByMailU($_SESSION["MailUtilisateur"]);
        if ($util["MailUtilisateur"] == $_SESSION["MailUtilisateur"] && $util["mdpUtilisateur"] == $_SESSION["mdpUtilisateur"]
        ) {
            $ret = true;
        }
    }
    return $ret;
}

?>