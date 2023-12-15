<?php

class abonne_functions
{
    public static function generateTable($data, $nbRes = 0)
    {
        ?>
        <table style="border-collapse: collapse; margin:auto; margin-bottom: 2%">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Ville</th>
                <th>Date de naissance</th>
                <th>Date fin abonnement</th>
                <th>Voir fiche </th>
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

                echo '<td>' . $row["nom"] . '</td>';

                echo '<td>' . $row["prenom"] . '</td>';

                echo '<td>' . $row["ville"] . '</td>';

                echo '<td>' . $row["date_naissance"] . '</td>';

                echo '<td>' . $row["date_fin_abo"] . '</td>';

                echo '<td><a href="fiche.php?id='.$row["id"].'">Fiche</a></td>';


                echo '   </tr>';
                $index++;
            }
            ?>
            </tbody>
        </table>
        <?php

        $nbPages = $nbRes / 20;
        for ($i = 1; $i < $nbPages + 1; $i++) {
            echo '<a style="margin-right:6px" href="abonne.php?page=' . $i . '"><button type="button" style=" margin-top:5px">' . $i . '</button></a>';
        }
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

    public static function createWhere()
    {
        if (isset($_POST['nom'])) {
            $_SESSION['nom'] = $_POST['nom'];
        }
        if (isset($_POST['prenom'])) {
            $_SESSION['prenom'] = $_POST['prenom'];
        }
        if (isset($_POST['ville'])) {
            $_SESSION['ville'] = $_POST['ville'];
        }
        if (isset($_POST['abonne'])) {
            $_SESSION['abonne'] = $_POST['abonne'];
        }


        $where = '';
        if (isset($_SESSION['nom']) && $_SESSION['nom'] != '') {
            $where .= 'lower(nom) like ' . 'lower("%' . $_SESSION['nom'] . '%")';
        }

        if (isset($_SESSION['prenom']) && $_SESSION['prenom'] != '') {
            if ($where === '') {
                $where .= 'lower(abonne.prenom) like ' . 'lower("%' . $_SESSION['prenom'] . '%")';
            } else {
                $where .= ' and lower(abonne.prenom) like ' . '"%' . $_SESSION['prenom'] . '%")';

            }
        }

        if (isset($_SESSION['ville']) && $_SESSION['ville'] != '') {
            if ($where === '') {
                $where .= 'lower(abonne.ville) like ' . 'lower("%' . $_SESSION['ville'] . '%")';
            } else {
                $where .= ' and lower(abonne.ville) like ' . 'lower("%' . $_SESSION['ville'] . '%")';
            }
        }

        if (isset($_SESSION['abonne']) && $_SESSION['abonne'] === 'abonne') {
            if ($where === '') {
                $where .= '  abonne.date_fin_abo > now() ';
            } else {
                $where .= ' and abonne.date_fin_abo > now() ';
            }
        }

        if (isset($_SESSION['abonne']) && $_SESSION['abonne'] === 'non_abonne') {
            if ($where === '') {
                $where .= '  abonne.date_fin_abo < now() ';
            } else {
                $where .= ' and abonne.date_fin_abo < now() ';
            }
        }

        return $where;
    }
}