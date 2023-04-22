<?php include_once('./App/Views/Admin/Layouts/Head.php');
include_once('./App/Views/Admin/Layouts/Header.php');
?>


<div class="container">
    <section class="container  bg-contact">
        <h2 class="mt-5 mb-3">Ajouter un film</h2>
        <hr>
        <form method="post" action="indexAdmin.php?action=addMovie">
            <div class="form-group mt-4">
                <label for="title">Titre du film<span class="required">*</span></label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="releaseDate">Année de sortie<span class="required">*</span></label>
                <input type="text" id="releaseDate" name="releaseDate" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="director">Réalisateur<span class="required">*</span></label>
                <input type="text" id="director" name="director" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="synopsis">Synopsis<span class="required">*</span></label>
                <textarea id="synopsis" name="synopsis" rows="5" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="casting">Acteurs principaux<span class="required">*</span></label>
                <input type="text" id="casting" name="casting" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="picture">Image du film<span class="required">*</span></label>
                <input type="file" class="form-control-file" id="picture" name="picture" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="duration">Durée<span class="required">*</span></label>
                <input type="text" id="duration" name="duration" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="dateAdded">Date d'ajout<span class="required">*</span></label>
                <input type="text" id="dateAdded" name="dateAdded" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="idGenre">Genre<span class="required">*</span></label>
                <select class="form-control" id="idGenre" name="idGenre" required>

                    <option value="1">Drame</option>
                    <option value="2">Comédie</option>
                    <option value="3">Thriller</option>
                    <option value="4">Policier</option>
                    <option value="5">Romance</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-adm-mov">Ajouter le film</button>
        </form>
    </section>
    <section id="deleteMovie" class="container bg-contact text-right mt-4">
        <h2>Supprimer le film</h2>
        <hr>
        <form action="indexAdmin.php?action=deleteMovie" method="post">
            <div class="form-group mt-4">
                <label for="idMovie">Id du film<span class="required">*</span></label>
                <input type="text" id="idMovie" name="idMovie" class="form-control" required>
            </div>
            <button type="submit" name="deleteMovie" class="btn btn-primary btn-adm-mov">Supprimer le film</button>
        </form>
    </section>
</div>

<?php
include_once('./App/Views/Admin/AddMovie.php');
include_once('./App/Views/Admin/Layouts/Footer.php');
?>