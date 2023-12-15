<?php

class connexionUser
{
    public static function setUserInSession($user): void
    {
        //Si l'utilisateur est gestionnaire, on aura certainement moins de données sur celui-ci puisqu'il n'aura
        //surement de lien avec la table abonne
        if ($user['isGestionnaire']) {
            $_SESSION['isGestionnaire'] = true;
            $_SESSION['id'] = $user[0];
        } else {
            $_SESSION['isGestionnaire'] = false;
            $_SESSION['id'] = $user[0];
            $_SESSION['id_abonne'] = $user['id_abonne'];
        }
    }
}