<?php
require_once 'connection/connection.php';
require_once 'function/show_table.php';
require 'models/tableau/tableau.php';

session_start();

//Affichage des champs de recherche
require_once './vue/recherche.php';
//Créer le where à la volée
$where = show_table::createWhere();
//Calcul le offset en fonction de la page
$offset = show_table::getGet($_GET);
//Effectuer le requête
$result = tableau::getRequest($where, true, $offset);
//Nombres de résultats pour la pagination
$nbRes = tableau::getRequest($where)->num_rows;
//Genere l'affichage du tableau
show_table::generateTable($result, $nbRes);

