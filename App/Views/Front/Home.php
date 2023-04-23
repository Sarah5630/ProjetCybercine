<?php
// Include the head and header templates
include_once('./App/Views/Front/Layouts/Head.php');
include_once('./App/Views/Front/Layouts/Header.php');
?>

<!-- Carousel -->
<div id="goHome" class="carousel slide  d-none d-lg-block" data-ride="carousel">
  <div class="carousel-inner">
    <?php if (isset($movies) && !empty($movies)) : ?>
      <?php $count = 0; ?>
      <?php foreach ($movies as $movie) : ?>
        <?php if ($count % 3 == 0) : ?>
          <div class="carousel-item <?php echo $count == 0 ? 'active' : ''; ?>">
            <div class="row">
            <?php endif; ?>
            <div class="col-md-4">
              <img src="Data/images/<?php echo $movie['Picture']; ?>" class="img-fluid d-block w-100" alt="<?php echo $movie['Title']; ?>">
            </div>
            <?php if ($count % 3 == 2 || $count == count($movies) - 1) : ?>
            </div>
          </div>
        <?php endif; ?>
        <?php $count++; ?>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
  <a class="carousel-control-prev" href="#goHome" role="button" data-slide="prev" title="Précédent">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#goHome" role="button" data-slide="next" title="suivant">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- Container -->
<div class="container">
  <!-- Row -->
  <div class="row">
    <!-- Welcome Text -->
    <div class="col-12">
      <?php
      if (isset($_SESSION['pseudo'])) {
        echo '<h2 class="mt-5 mb-2">Bienvenue ' . $_SESSION['firstname'] . '</h2>';
      } else {
        echo '<h2 class="mt-5 mb-2">Bienvenue</h2>';
      }
      ?>
      <hr>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <p>
              Nous sommes ravis de vous accueillir parmi nous. En tant que nouveau membre, vous avez accès à des fonctionnalités exclusives pour découvrir notre collection de films. Pour commenter ou noter les films, vous devez vous inscrire en tant que membre. L'inscription est simple et rapide, vous pouvez cliquer sur le bouton "Inscription" en haut de la page d'accueil. Bonne visite !!!
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Display the latest movies added to the site -->
  <h3 class="my-4">Les derniers films arrivés</h3>
  <hr>
  <div id="lastMovies" class="row my-row">
    <?php if (isset($latestMovies) && !empty($latestMovies)) : ?>
      <?php foreach ($latestMovies as $movie) : ?>
        <div class="col-md-12 col-lg-6 my-4">
          <div class="card h-lg-100 h-md-50">
            <div class="row no-gutters">
              <?php if (isset($movie['Picture'])) : ?>
                <div class="col-md-6 text-center">
                  <img src="Data/images/<?php echo $movie['Picture']; ?>" class="img-fluid card-img-top myImg" alt="<?php echo isset($movie['Title']) ? $movie['Title'] : ''; ?>">
                </div>
              <?php endif; ?>
              <div class="col-md-6">
                <div class="card-body d-flex flex-column h-100">
                  <?php if (isset($movie['Title'])) : ?>
                    <h3 class="card-title"><?php echo $movie['Title']; ?></h3>
                  <?php endif; ?>

                  <?php if (isset($movie['Synopsis'])) : ?>
                    <p class="card-text flex-grow-1"><?php echo mb_strimwidth($movie['Synopsis'], 0, 200, '...'); ?></p>
                  <?php endif; ?>

                  <?php if (isset($movie['DateAdded'])) : ?>
                    <p class="card-text"><small class="text-muted">Ajouté le : <?php echo date('d/m/Y', strtotime($movie['DateAdded'])); ?></small></p>
                  <?php endif; ?>

                  <a class="btn my-btn-info d-flex justify-content-center text-align-center" title="Plus d'infos" data-toggle="modal" data-target="#movieModal<?php echo $movie['IdMovie']; ?>">Plus d'infos</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>

<?php
// include the modal box
$movies = $latestMovies;
include_once('./App/Views/Front/ModalMovies.php'); ?>

<!-- Button to scroll back to the top of the page -->
<a href class="btnUp" title="Bouton up">
  <img src="Public/img/up-arrow-button-svgrepo-com.svg" alt="bouton up" class="icone">
</a>

<!-- Include the footer layout -->
<?php include_once('./App/Views/Front/Layouts/Footer.php'); ?>