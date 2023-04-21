    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" title="Connexion" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Connexion
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" title="Inscription" href="index.php?action=createUser">Inscription</a>
                        <a class="dropdown-item" title="Connexion" href="index.php?action=userConnect">Connexion</a>
                        <a class="dropdown-item" title="Déconnexion" href="index.php?action=logout">Déconnexion</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Image container -->
    <div class="image-container">
        <img src="./Public/img/bandeau2.jpg" class="img-fluid my-img-fluid" alt="bandeau">
        <div class="text-container">
            <h1>CYBERCINÉ</h1>
            <!-- <p>Description</p> -->
        </div>
    </div>

    <!-- Navigation menu -->
    <nav role="navigation" id="main-menu" class="navbar navbar-expand-md navbar-light my-4 justify-content-center">
        <button id="burger" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Links -->
        <div class="collapse navbar-collapse justify-content-center" id="menu">
            <ul class="navbar-nav my-navbar-nav justify-content-center">
                <li class="nav-item d-flex justify-content-center">
                    <a class="nav-link my-nav-link" title="Accueil" href="index.php?action=goHome">ACCUEIL</a>
                </li>
                <li class="nav-item d-flex justify-content-center">
                    <a class="nav-link my-nav-link" title="Tous les films" href="index.php?action=allMovies">TOUS LES FILMS</a>
                </li>
                <li class="nav-item d-flex justify-content-center">
                    <a class="nav-link my-nav-link" title="Top 3" href="index.php?action=topMovies">TOP 3</a>
                </li>
                <li class="nav-item d-flex justify-content-center">
                    <a class="nav-link my-nav-link" title="Mon compte" href="index.php?action=displayUserInfo">MON COMPTE</a>
                </li>
                <li class="nav-item d-flex justify-content-center">
                    <a class="nav-link my-nav-link" title="Nous contacter" href="index.php?action=contact">NOUS CONTACTER</a>

                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- End of header -->