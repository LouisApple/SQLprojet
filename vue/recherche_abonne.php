<form action="abonne.php" method="post" class="form-example" style="text-align: center">
    <div class="form-example">
        <label for="nom">Nom: </label>
        <input type="text" name="nom" value="" id="nom"/>
    </div>
    <div class="form-example" style="margin-top: 7px">
        <label for="prenom">Prénom: </label>
        <input type="text" name="prenom" value="" id="prenom"/>
    </div>
    <div class="form-example" style="margin-top: 7px">
        <label for="ville">Ville: </label>
        <input type="text" name="ville" value="" id="ville"/>
    </div>
    <div style="margin-top: 7px">
        <label for="abonne">Abonnement :</label>
        <select name="abonne" id="abonne">
            <option value="abonne">Abonné</option>
            <option value="non_abonne">Expiré</option>
        </select>
    </div>
    <div class="form-example" style="margin-top: 7px">
        <input type="submit" value="Rechercher"/>
    </div>
</form>
