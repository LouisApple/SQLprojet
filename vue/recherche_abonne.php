<?php
$nom = '';
$prenom = '';
$ville = '';
$abonne = '';
if (isset($_SESSION['nom']) && $_SESSION['nom'] != null) {
    $nom = $_SESSION['nom'];
}
if (isset($_SESSION['prenom']) && $_SESSION['prenom'] != null) {
    $prenom = $_SESSION['prenom'];
}
if (isset($_SESSION['ville']) && $_SESSION['ville'] != null) {
    $ville = $_SESSION['ville'];
}
if (isset($_SESSION['abonne']) && $_SESSION['abonne'] != null) {
    $abonne = $_SESSION['abonne'];
}
?>

<form action="abonne.php" method="post" class="form-example" style="text-align: center">
    <div class="form-example">
        <label for="nom">Nom: </label>
        <input type="text" name="nom" value="<?php echo $nom ?>" id="nom"/>
    </div>
    <div class="form-example" style="margin-top: 7px">
        <label for="prenom">Prénom: </label>
        <input type="text" name="prenom" value="<?php echo $prenom ?>" id="prenom"/>
    </div>
    <div class="form-example" style="margin-top: 7px">
        <label for="ville">Ville: </label>
        <input type="text" name="ville" value="<?php echo $ville ?>" id="ville"/>
    </div>
    <div style="margin-top: 7px">
        <label for="abonne">Abonnement :</label>
        <select name="abonne" id="abonne">
            <option value="none" <?php if ($abonne === 'none') {
                echo 'selected';
            } ?> >N'importe
            </option>
            <option value="abonne"<?php if ($abonne === 'abonne') {
                echo 'selected';
            } ?> >Abonné
            </option>
            <option value="non_abonne" <?php if ($abonne === 'non_abonne') {
                echo 'selected';
            } ?>>Expiré</option>
        </select>
    </div>
    <div class="form-example" style="margin-top: 7px">
        <input type="submit" value="Rechercher"/>
    </div>
</form>
