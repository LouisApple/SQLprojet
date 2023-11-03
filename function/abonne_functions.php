<?php

class abonne_functions
{
    public static function createWhere()
    {
        if (isset($_POST['nom'])) {
            $_SESSION['nomAbonne'] = $_POST['nom'];
        }
        if (isset($_POST['prenom'])) {
            $_SESSION['prenomAbonne'] = $_POST['prenom'];
        }
        if (isset($_POST['ville'])) {
            $_SESSION['villeAbonne'] = $_POST['ville'];
        }
        if (isset($_POST['abonne'])) {
            $_SESSION['abonnementAbonne'] = $_POST['abonne'];
        }


        $where = '';
        if (isset($_SESSION['nom']) && $_SESSION['nom'] != '') {
            $where .= 'nom like ' . '"%' . $_SESSION['nom'] . '%"';
        }

        if (isset($_SESSION['prenom']) && $_SESSION['prenom'] != '') {
            if ($where === '') {
                $where .= 'auteur.prenom like ' . '"%' . $_SESSION['prenom'] . '%"';
            } else {
                $where .= ' and auteur.prenom like ' . '"%' . $_SESSION['prenom'] . '%"';

            }
        }

        if (isset($_SESSION['editeur']) && $_SESSION['editeur'] != '') {
            if ($where === '') {
                $where .= 'editeur.nom like ' . '"%' . $_SESSION['editeur'] . '%"';
            } else {
                $where .= ' and editeur.nom like ' . '"%' . $_SESSION['editeur'] . '%"';
            }
        }

        if (isset($_SESSION['disponible']) && $_SESSION['disponible'] === 'disponible') {
            if ($where === '') {
                $where .= '  (select count(*) from emprunt where emprunt.id_livre = livre.id and date_retour is null) > 0 ';
            } else {
                $where .= ' and (select count(*) from emprunt where emprunt.id_livre = livre.id and date_retour is null) > 0 ';
            }
        }

        if (isset($_SESSION['disponible']) && $_SESSION['disponible'] === 'non_disponible') {
            if ($where === '') {
                $where .= '  (select count(*) from emprunt where emprunt.id_livre = livre.id and date_retour is null) = 0 ';
            } else {
                $where .= ' and (select count(*) from emprunt where emprunt.id_livre = livre.id and date_retour is null) = 0 ';
            }
        }

        return $where;
    }
}