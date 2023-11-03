<?php

class connection
{
    public static function getSqlConnection()
    {
        return mysqli_connect('localhost', 'root', '', 'abonne');
    }
}