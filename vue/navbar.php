<header id="nav-wrapper" style="height: 40px">
    <nav id="nav">
        <div class="nav right">
            <button style="margin-left: 2%"><a href='index.php' class="nav-link active"><span class="nav-link-span"><span class="u-nav">Livres</span></span></a></button>
            <?php if(isset ($_SESSION['isGestionnaire']) and $_SESSION['isGestionnaire']){echo '<button style="margin-left: 2%"><a href="abonne.php" class="nav-link"><span class="nav-link-span"><span class="u-nav">Abonnées</span></span></a></button>';} ?>
            <?php if(isset ($_SESSION['isGestionnaire']) and !$_SESSION['isGestionnaire']){echo '<button style="margin-left: 2%"><a href="fiche.php?id='.$_SESSION["id_abonne"].'"class="nav-link"><span class="nav-link-span"><span class="u-nav">Ma fiche</span></span></a></button>';} ?>
            <?php if(!isset ($_SESSION['isGestionnaire']))
            {echo'<button style="margin-left: 2%"><a href="userConnexion.php" class="nav-link"><span class="nav-link-span"><span class="u-nav">Connexion</span></span></a></button>';} ?>
            <?php if(isset ($_SESSION['isGestionnaire']))
            {echo'<button style="margin-left: 2%"><a href="deconnexion.php" class="nav-link"><span class="nav-link-span"><span class="u-nav">Déconnexion</span></span></a></button>';} ?>

    </nav>
</header>
