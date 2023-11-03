<form action="index.php" method="post" class="form-example" style="text-align: center">
    <div class="form-example">
        <label for="titre">Titre: </label>
        <input type="text" name="titre" value="<?php echo $_SESSION['titre'] ?>" id="titre"/>
    </div>
    <div class="form-example" style="margin-top: 7px">
        <label for="auteur">Nom de l'auteur: </label>
        <input type="text" name="auteur" value="<?php echo $_SESSION['auteur'] ?>" id="auteur"/>
    </div>
    <div class="form-example" style="margin-top: 7px">
        <label for="editeur">Nom de l'éditeur: </label>
        <input type="text" name="editeur" value="<?php echo $_SESSION['editeur'] ?>" id="editeur"/>
    </div>
    <div style="margin-top: 7px">
        <label for="disponible">Disponibilité :</label>
        <select name="disponible" id="disponible">
            <option <?php if ($_SESSION['disponible'] === 'disponible') {echo 'selected';} ?> value="disponible">Disponible</option>
            <option <?php if ($_SESSION['disponible'] === 'non_disponible') {echo 'selected';} ?> value="non_disponible">Non disponible</option>
            <option <?php if ($_SESSION['disponible'] === 'n_importe') {echo 'selected';} ?>value="n_importe">N'importe</option>
        </select>
    </div>
    <div class="form-example" style="margin-top: 7px">
        <input type="submit" value="Rechercher"/>
    </div>
</form>
