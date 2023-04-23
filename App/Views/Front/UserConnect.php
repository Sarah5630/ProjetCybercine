<?php
// Include the head and header sections
include_once('./App/Views/Front/Layouts/Head.php');
include_once('./App/Views/Front/Layouts/Header.php');

// Check if there is a message to display
$message = isset($_GET['message']) ? $_GET['message'] : ''; ?>

<section id="userConnect" class="container text-center">

    <?php
    // Display error message if it exists
    if (!empty($message)) {
        echo '<div class="alert alert-danger">' . $message . '</div>';
    } ?>

    <!-- Display login form -->
    <form action="index.php?action=login" method="post">
        <div class="form-group">
            <label for="pseudo">Votre pseudo</label>
            <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Pseudo">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Votre mot de passe">
        </div>
        <input type="submit" class="btn btnCon btn-info" value="Se connecter">
    </form>

    <div class="noAccount">
        <p>Vous n'avez pas de compte ? <a href="index.php?action=createUser" title="Créer un compte">Créer un compte</a></p>
    </div>
</section>

<!-- Include the footer section -->
<?php include_once('./App/Views/Front/Layouts/Footer.php'); ?>