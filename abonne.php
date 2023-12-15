<?php

session_start();
include_once 'function/abonne_functions.php';

$where = abonne_functions::createWhere();

include_once 'connection/connection.php';
include_once 'models/tableau/abonne.php';
//Affichage des champs de recherche et de la navbar
require_once 'vue/navbar.php';
include_once 'vue/recherche_abonne.php';

//Calcul le offset en fonction de la page
$offset = abonne_functions::getGet($_GET);
//Effectuer le requête
$result = abonne::getRequest($where, true, $offset);
//Nombres de résultats pour la pagination
$nbRes = abonne::getRequest($where)->num_rows;
//Genere l'affichage du tableau
abonne_functions::generateTable($result, $nbRes);



