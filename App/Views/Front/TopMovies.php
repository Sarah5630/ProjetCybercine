<?php
include_once('./App/Views/Front/Layouts/Head.php');
include_once('./App/Views/Front/Layouts/Header.php');
?>

<section id="topMovies">
    <div class="container mt-4">
        <div class="row">

            <?php foreach ($topRatedMovies as $movie) : ?>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card my-card-img-top">
                        <img class="card-img-top my-img top-card my-card" src="Data\images\<?php echo $movie['Picture']; ?>" alt="<?php echo $movie['Title']; ?>">

                        <div class="card-body top-card">
                            <h5 class="card-title"><?php echo $movie['Title']; ?></h5>
                            <p class="card-text"><?php echo mb_strimwidth($movie['Synopsis'], 0, 100, '...'); ?></p>
                            <p class="card-text"><strong>Réalisateur: </strong><?php echo $movie['Director']; ?></p>
                            <p class="card-text"><strong>Acteurs principaux: </strong><?php echo $movie['Casting']; ?></p>
                            <p class="card-text"><strong>Année de sortie: </strong><?php echo $movie['ReleaseDate']; ?></p>
                            <p class="card-text"><strong>Durée: </strong><?php echo $movie['Duration']; ?> min</p>

                            <div class="card-footer no-background card-footer-custom">
                                <a class="btn my-btn-info d-flex justify-content-center text-align-center" title="Plus d'infos" data-toggle="modal" data-target="#movieModal<?php echo $movie['IdMovie']; ?>">Plus d'infos</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php
    $movies = $topRatedMovies;
    include_once('./App/Views/Front/ModalMovies.php');
    ?>
</section>


<?php include_once('./App/Views/Front/Layouts/Footer.php'); ?>