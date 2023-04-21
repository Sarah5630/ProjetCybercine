<?php include_once('./App/Views/Admin/Layouts/Head.php');
include_once('./App/Views/Admin/Layouts/Header.php');

?>

<div class="container">
    <h2 class="mt-5 mb-3">Ajouter un genre</h2>
    <hr>
    <form method="post" action="indexAdmin.php?action=addGenre">
        <div class="form-group mt-4">
            <label for="genre">Genre<span class="required">*</span></label>
            <input type="text" id="category" name="category" class="form-control" required>
        </div>
        <input type="submit" name="submit" class="btn btn-adm-mov" value="Ajouter">
    </form>
    
    <div id="deleteGenre" class="form-group">
        <h2 class="mt-5 mb-4 text-right">Supprimer un genre</h2>
        <hr>
        <form action="indexAdmin.php?action=deleteGenre" method="post">
            <label for="idGenre">Genre<span class="required">*</span></label>
            <select class="form-control" id="idGenre" name="idGenre" required>

                <option value="1">Drame</option>
                <option value="2">Comédie</option>
                <option value="3">Thriller</option>
                <option value="4">Policier</option>
                <option value="5">Romance</option>
                <option value="6">test</option>
            </select>

            <button type="submit" name="deleteGenre" class="btn btn-adm-mov btn-adm">Supprimer</button>
        </form>
    </div>
</div>

<?php
include_once('./App/Views/Admin/Layouts/Footer.php');
?>