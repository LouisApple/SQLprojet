<?php
require_once 'vue/formulaireConnexion.php';
require_once 'models/connexion.php';
require_once 'function/connexionUser.php';

session_start();
//On récupere l'utilisateur
if ( isset($_POST['email'])) {
    $user = connexion::getUserData();
//Mise en session des données de l'utilisateur

    if ($user) {
        connexionUser::setUserInSession($user);
        header("Location: index.php");
    }
}
