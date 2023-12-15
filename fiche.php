<?php

require_once 'connection/connection.php';
require_once 'function/fiche_functions.php';
require_once 'models/ficheAbonne.php';

//Récupere les infos du membre
if (isset($_GET['id'])) {
    $data = ficheAbonne::getAbonneData($_GET['id']);
    //Afficher la fiche membre
    fiche_functions::afficherFiche($data);
}

//Si on reçoit un post avec un idModification cela signifie qu'une fiche a était modifée et qu'il faut procéder
//à l'enregistrement de ces modfications.
if (isset($_POST['idFicheModifiee'])) {
    header("Location: abonne.php");
    ficheAbonne::modifierFiche();
}
