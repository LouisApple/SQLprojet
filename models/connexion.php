<?php
require_once 'connection/connection.php';

class connexion
{
    public static function getUserData()
    {
        $mail = $_POST['email'];
        $password = $_POST['password'];

        $db = connection::getSqlConnection();

        $query = "select * 
                    from utilisateurs 
                    left join abonne on utilisateurs.id_abonne = abonne.id
                    where utilisateurs.email = '$mail'";

        $res = $db->execute_query($query)->fetch_array();

        if (isset($res['password']) && self::checkMotDePasse($res['password'], $password)) {
            return $res;
        } else {
            return false;
        }
    }

    static function checkMotDePasse($passwordHashedFromBdd, $passwordFromForm)
    {
        if (password_verify($passwordFromForm, $passwordHashedFromBdd)) {
            return true;
        }
        return false;
    }
}