<?php

class tableau
{
    public static function getRequest($where, $limit = false, $offset = false)
    {
        $db = connection::getSqlConnection();

        $query = "SELECT livre.titre, auteur.nom as nom_auteur, editeur.nom as nom_editeur,max(emprunt.date_emprunt) as date_emprunt ,emprunt.date_retour, (
                    select count(*) from emprunt where emprunt.id_livre = livre.id and date_retour is null
                    ) AS emprunt
                    FROM abonne.livre
                    inner join auteur on livre.auteur_id = auteur.id
                    inner join editeur on livre.editeur_id = editeur.id
                    inner join emprunt  on livre.id  = emprunt.id_livre
                 ";

        if ($where !== '') {
            $query .= "where " . $where;
        }
        $query .= " group by id_livre";

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

        $query = "SELECT count(*) from  auteur";

        return $db->execute_query($query);

    }
}