<?php

require_once 'connection/connection.php';
require_once 'function/fiche_functions.php';
require_once 'models/ficheAbonne.php';
session_start();

//Récupere les infos du membre pour les gestionnaires
if (isset($_GET['id']) and $_SESSION['isGestionnaire']) {
    $data = ficheAbonne::getAbonneDataAdmin($_GET['id']);
    //Afficher la fiche membre
    fiche_functions::afficherFicheAdmin($data);
}

//Récupere les infos du membre pour les abonnés
if (isset($_GET['id']) and !$_SESSION['isGestionnaire']) {
    $data = ficheAbonne::getAbonneDataAbonne(($_SESSION['id']));
    //Afficher la fiche membre
    fiche_functions::afficherFicheAbonne($data);
}

//Si on reçoit un post avec un idModification cela signifie qu'une fiche a était modifée et qu'il faut procéder
//à l'enregistrement de ces modfications.
if (isset($_POST['idFicheModifiee']) and $_SESSION['isGestionnaire']) {
    header("Location: abonne.php");
    ficheAbonne::modifierFicheAdmin();
}

if (isset($_POST['idFicheModifiee']) and !$_SESSION['isGestionnaire']) {
    header("Location: index.php");
    ficheAbonne::modifierFicheAbonne();
}
