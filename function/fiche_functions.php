<?php
class fiche_functions
{
public static function afficherFiche(array $data)
{
?>
<link rel="stylesheet" href="style/mystyle.css">

<!--Div avec les champs de la fiche (Nom, prénom, etc...) -->
<div style="margin : 2%" class="container">
    <div class="text">
        Fiche abonné
    </div>
    <form action="fiche.php" method="post">
        <div class="form-row">
            <div class="input-data">
                <input name="prenom" value="<?php echo $data['prenom'] ?>" type="text" required>
                <div class="underline"></div>
                <label for="">Prénom</label>
            </div>
            <div class="input-data">
                <input name="nom" value="<?php echo $data['nom'] ?>" type="text" required>
                <div class="underline"></div>
                <label for="">Nom de famille</label>
            </div>
        </div>
        <div class="form-row">
            <div class="input-data">
                <input name="date_naissance" value="<?php echo $data['date_naissance'] ?>" type="date" required>
                <div class="underline"></div>
                <label for="">Date de naissance</label>
            </div>
            <div class="input-data">
                <input name="adresse" value="<?php echo $data['adresse'] ?>" type="text" required>
                <div class="underline"></div>
                <label for="">Adresse</label>
            </div>
        </div>
        <div class="form-row">
            <div class="input-data">
                <input name="code_postal" value="<?php echo $data['code_postal'] ?>" type="text" required>
                <div class="underline"></div>
                <label for="">Code postal</label>
            </div>
            <div class="input-data">
                <input name="ville" value="<?php echo $data['ville'] ?>" type="text" required>
                <div class="underline"></div>
                <label for="">Ville</label>
            </div>
        </div>
        <div class="form-row">
            <div class="input-data">
                <input name="date_inscription" value="<?php echo $data['date_inscription'] ?>" type="date"
                       required>
                <div class="underline"></div>
                <label for="">Date inscription</label>
            </div>
            <div class="input-data">
                <input name="date_fin_abo" value="<?php echo $data['date_fin_abo'] ?>" type="date" required>
                <div class="underline"></div>
                <label for="">Date fin abonnement</label>
            </div>
        </div>
        <div class="form-row">
            <div class="input-data textarea">
                <div class="form-row submit-btn">
                    <div class="input-data">
                        <div class="inner"></div>
                        <input type="submit" value="Enregistrer">
                    </div>
                </div>
            </div>
        </div>
        <div hidden>
            <label>
                <input name="idFicheModifiee" value="<?php echo $data['id'] ?>" type="text">
            </label>
        </div>
    </form>
</div>
<!--Div qui affiche les livres les plus empruntés et les recommandations-->
<div style="margin : 2%" class="container">
    <h3 style="text-align: center; text-decoration: underline">Quelques recommandations </h3>
    <table>
        <tr>
            <th>Titre</th>
        </tr>
        <?php
        foreach (ficheAbonne::getRecommandationsParCatégorie($data['id']) as $aBook) {
            echo '<tr><td>' . $aBook[1] . '</td>';
        }
        ?>
    </table>
    <h3 style="text-align: center; text-decoration: underline">Vos derniers emprunts </h3>
    <table>
        <tr>
            <th>Titre</th>
            <th>Date d'emprunt</th>
        </tr>
        <?php
        foreach (ficheAbonne::livresLesPlusEmpruntes($data['id']) as $aBook) {
            echo '<tr><td>' . $aBook[0] . '</td>';
            echo '<td>' . $aBook[1] . '</td></tr>';
        }
        }
        }
        ?>
    </table>
</div>