<?php

class abonne
{
    public static function getRequest($where, $limit = false, $offset = false)
    {
        $db = connection::getSqlConnection();

        $query = "SELECT abonne.id, abonne.prenom, abonne.nom, abonne.date_naissance,abonne.adresse ,abonne.ville, abonne.code_postal, abonne.date_inscription, abonne.date_fin_abo from abonne ";

        if ($where !== '') {
            $query .= "where " . $where;
        }

        if ($limit) {
            $query .= " limit 20";
        }

        if ($offset) {
            $query .= " offset $offset";
        }

        $result = $db->execute_query($query);
        return $result;
    }

    public static function getPagination()
    {
        $db = connection::getSqlConnection();

        $query = "SELECT count(*) from  abonne";

        return $db->execute_query($query);

    }
}