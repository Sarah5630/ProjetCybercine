<?php include_once('./App/Views/Front/Layouts/Head.php'); ?>

<header id="headerAdmin">

    <a title="deconnexion" class="btn btn-adm btn-logout" href="index.php?action=logout" type="submit">Déconnexion</a>

    <!-- Image container -->
    <div class="image-container">
        <img src="./Public/img/bandeau2.jpg" class="img-fluid my-img-fluid" alt="bandeau">
        <div class="text-container">
            <h1>CYBERCINÉ</h1>
        </div>
    </div>

    <!-- nav -->
    <nav role="navigation" class="navbar navbar-expand-md navbar-light my-4 justify-content-center">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- links -->
        <div class="collapse navbar-collapse justify-content-center">
            <ul class="navbar-nav my-navbar-nav justify-content-center">
                <li class="nav-item d-flex justify-content-center"><a title="Accueil" class="nav-link my-nav-link" href="index.php?action=goHome">ACCUEIL</a></li>
                <li class="nav-item d-flex justify-content-center"><a title="Ajouter un film" class="nav-link my-nav-link" href="indexAdmin.php?action=addMovie">AJOUTER UN FILM</a></li>
                <li class="nav-item d-flex justify-content-center"><a title="Ajouter un genre" class="nav-link my-nav-link" href="indexAdmin.php?action=addGenre">AJOUTER UN GENRE</a></li>
                <li class="nav-item d-flex justify-content-center"><a title="Mon compte" class="nav-link my-nav-link" href="index.php?action=displayUserInfo">MON COMPTE</a></li>
            </ul>
        </div>
    </nav>
</header>
