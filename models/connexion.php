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

        return $db->execute_query($query)->fetch_array();
    }
}