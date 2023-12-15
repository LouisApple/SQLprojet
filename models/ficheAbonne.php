<?php

class ficheAbonne
{
    public static function getAbonneDataAdmin(int $id)
    {
        $db = connection::getSqlConnection();

        $query = "SELECT abonne.* from abonne where abonne.id = $id";

        return $db->execute_query($query)->fetch_array();
    }

    public static function getAbonneDataAbonne(int $id)
    {
        $db = connection::getSqlConnection();

        $query = "SELECT abonne.date_naissance, abonne.adresse, abonne.ville, abonne.code_postal from abonne where abonne.id = $id";

        return $db->execute_query($query)->fetch_array();
    }

    public static function modifierFicheAdmin()
    {
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $date_naissance = $_POST['date_naissance'];
        $adresse = $_POST['adresse'];
        $code_postal = $_POST['code_postal'];
        $ville = $_POST['ville'];
        $date_inscription = $_POST['date_inscription'];
        $date_fin_abo = $_POST['date_fin_abo'];
        $id = $_POST['idFicheModifiee'];


        $db = connection::getSqlConnection();

        $query = "UPDATE abonne SET nom = '$nom',prenom = '$prenom',date_naissance = '$date_naissance',adresse = '$adresse',code_postal = '$code_postal',ville = '$ville',date_inscription = '$date_inscription',date_fin_abo = '$date_fin_abo' WHERE abonne.id = $id";

        return $db->execute_query($query);
    }

    public static function modifierFicheAbonne()
    {
        $date_naissance = $_POST['date_naissance'];
        $adresse = $_POST['adresse'];
        $code_postal = $_POST['code_postal'];
        $id = $_SESSION['id'];
        $ville = $_POST['ville'];

        $db = connection::getSqlConnection();

        $query = "UPDATE abonne SET date_naissance = '$date_naissance',adresse = '$adresse',code_postal = '$code_postal',ville = '$ville' WHERE abonne.id = $id";

        return $db->execute_query($query);
    }

    public static function livresLesPlusEmpruntes(int $id): array
    {
        $db = connection::getSqlConnection();

        $query = "select livre.titre, emprunt.date_emprunt  from emprunt
                           inner join livre on emprunt.id_livre = livre.id
                           where emprunt.id_abonne  = $id
                           order by emprunt.date_emprunt desc limit 20";

        return $db->execute_query($query)->fetch_all();
    }

    private function getCategoriePlusLuesPourUnAbonne(int $id): array
    {
        $db = connection::getSqlConnection();

        $query = "select count(livre.categorie) as categorie, livre.categorie 
                            from emprunt
                            inner join livre on emprunt.id_livre = livre.id
                            where emprunt.id_abonne = 10
                            group by livre.categorie 
                            order by categorie desc
                            limit 1";

        return $db->execute_query($query)->fetch_all();
    }

    public static function getRecommandationsParCatégorie(int $id): array
    {
        $categorie = (new ficheAbonne)->getCategoriePlusLuesPourUnAbonne($id)[0][1];

        $db = connection::getSqlConnection();
        $query = "select count(emprunt.id_livre) as nbEmprunt, livre.titre, livre.id, MIN(COALESCE(date_retour  ,-1) )as isFree
                            from emprunt 
                            inner join livre on emprunt.id_livre = livre.id
                            where livre.categorie  = '$categorie' 
                            group by livre.id
                            HAVING isFree = -1
                            order by nbEmprunt desc limit 5";

        return $db->execute_query($query)->fetch_all();
    }
}