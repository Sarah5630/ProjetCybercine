<?php
include_once('./App/Views/Front/Layouts/Head.php');
include_once('./App/Views/Front/Layouts/Header.php');
include_once('./App/Views/Front/Tools/Functions.php');
?>

<div id="allMovies" class="container">
    <?php if (!empty($movies)) : ?>
        <div class="row justify-content-center">
            <?php foreach ($movies as $movie) : ?>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                    <div class="card my-card">
                        <img src="Data/images/<?php echo $movie['Picture']; ?>" class="img-fluid card-img-top my-card-img" alt="<?php echo $movie['Title']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $movie['Title']; ?></h5>
                            <p class="card-text"><?php echo truncateText($movie['Synopsis'], 120); ?></p>
                            <div class="card-footer no-background card-footer-custom">
                                <a class="btn my-btn-info d-flex justify-content-center text-align-center" title="Plus d'infos" data-toggle="modal" data-target="#movieModal<?php echo $movie['IdMovie']; ?>">Plus d'infos</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <p>Aucun film à afficher</p>
    <?php endif; ?>
</div>

<?php
include_once('./App/Views/Front/ModalMovies.php');
?>

<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">

        <li class="page-item"><a class="page-link" title="Page 1" href="#">1</a></li>
        <li class="page-item"><a class="page-link" title="Page 2" href="#">2</a></li>
        <li class="page-item"><a class="page-link" title="Page 3" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" title="Suivant" href="#">Suivant</a>
        </li>
    </ul>
</nav>

<a href class="btnUp" title="bouton up">
    <img src="Public/img/up-arrow-button-svgrepo-com.svg" alt="bouton up" class="icone">
</a>
<?php
include_once('./App/Views/Front/Layouts/Footer.php');
?>