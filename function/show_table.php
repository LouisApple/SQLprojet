<?php

class show_table
{

    public static function generateTable($data, $nbRes = 0)
    {
        ?>
        <table style="border-collapse: collapse">
            <thead>
            <tr>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Editeur</th>
                <th>Date dernier emprunt</th>
                <th>Disponible</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $index = 0;
            foreach ($data as $row) {
                if ($index % 2 == 1) {
                    echo '<tr style = "background-color:darkgray" >';

                } else {
                    echo '<tr style = "background-color:lightgray" >';
                }

                echo '<td>' . $row["titre"] . '</td>';

                echo '<td>' . $row["nom_auteur"] . '</td>';

                echo '<td>' . $row["nom_editeur"] . '</td>';

                echo '<td>' . $row["date_emprunt"] . '</td>';

                $dispo = "Non";
                if ($row['emprunt'] > 0) {
                    $dispo = "Oui";
                }
                echo '<td> ' . $dispo . '</td>';

                echo '   </tr>';
                $index++;
            }
            ?>
            </tbody>
        </table>
        <?php

        $nbPages = $nbRes / 20;
        for ($i = 1; $i < $nbPages + 1; $i++) {
            echo '<a style="margin-right:6px" href="index.php?page=' . $i . '"><button style=" margin-top:5px">' . $i . '</button></a>';
        }
    }

    public static function createWhere()
    {
        if (isset($_POST['titre'])) {
            $_SESSION['titre'] = $_POST['titre'];
        }
        if (isset($_POST['auteur'])) {
            $_SESSION['auteur'] = $_POST['auteur'];
        }
        if (isset($_POST['editeur'])) {
            $_SESSION['editeur'] = $_POST['editeur'];
        }
        if (isset($_POST['disponible'])) {
            $_SESSION['disponible'] = $_POST['disponible'];
        }


        $where = '';
        if (isset($_SESSION['titre']) && $_SESSION['titre'] != '') {
            $where .= 'titre like ' . '"%' . $_SESSION['titre'] . '%"';
        }

        if (isset($_SESSION['auteur']) && $_SESSION['auteur'] != '') {
            if ($where === '') {
                $where .= 'auteur.nom like ' . '"%' . $_SESSION['auteur'] . '%"';
            } else {
                $where .= ' and auteur.nom like ' . '"%' . $_SESSION['auteur'] . '%"';

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

    public static function getGet($get)
    {
        $offset = false;
        if (isset($_GET['page'])) {
            if (intval($_GET['page']) === 1) {
                $offset = 0;
            } else {
                $offset = 0 + 20 * intval($_GET['page'] - 1);
                $offset = $offset - 1;
            }
        }

        return $offset;
    }
}