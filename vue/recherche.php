<form action="index.php" method="post" class="form-example" style="text-align: center">
    <div class="form-example">
        <label for="titre">Titre: </label>
        <input type="text" name="titre" value="<?= isset($_SESSION['titre']) ? $_SESSION['titre'] : '' ?>" id="titre"/>
    </div>
    <div class="form-example" style="margin-top: 7px">
        <label for="auteur">Nom de l'auteur: </label>
        <input type="text" name="auteur" value="<?= isset($_SESSION['auteur']) ? $_SESSION['auteur'] : '' ?>" id="auteur"/>
    </div>
    <div class="form-example" style="margin-top: 7px">
        <label for="editeur">Nom de l'éditeur: </label>
        <input type="text" name="editeur" value="<?= isset($_SESSION['editeur']) ? $_SESSION['editeur'] : '' ?>" id="editeur"/>
    </div>
    <div style="margin-top: 7px">
        <label for="disponible">Disponibilité :</label>
        <select name="disponible" id="disponible">
            <option <?php if (isset($_SESSION['disponible'])  && ($_SESSION['disponible'] === 'disponible')) {echo 'selected';} ?> value="disponible">Disponible</option>
            <option <?php if (isset ($_SESSION['disponible']) && ($_SESSION['disponible'] === 'non_disponible')) {echo 'selected';} ?> value="non_disponible">Non disponible</option>
            <option <?php if (isset ($_SESSION['disponible']) && $_SESSION['disponible'] === 'n_importe' && isset($_SESSION['disponible'])) {echo 'selected';} ?>value="n_importe">N'importe</option>
        </select>
    </div>
    <div class="form-example" style="margin-top: 7px">
        <input type="submit" value="Rechercher"/>
    </div>
</form>