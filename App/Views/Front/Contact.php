<?php
include_once('./App/Views/Front/Layouts/Head.php');
include_once('./App/Views/Front/Layouts/Header.php');
?>

<section id="contact" class="container bg-contact">

    <h2>Nous contacter</h2>
    <hr>
    <div class="custom-control custom-radio">
        <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
        <label class="custom-control-label mt-4" for="customRadio1">Madame</label>
    </div>
    <div class="custom-control custom-radio">
        <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
        <label class="custom-control-label" for="customRadio2">Monsieur</label>
    </div>
    <div class="custom-control custom-radio">
        <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
        <label class="custom-control-label mb-4" for="customRadio2">Autre</label>
    </div>

    <form action="index.php?action=contact" method="post">

        <div class="form-group mb-4">
            <label for="pseudo">Pseudo</label>
            <input type="text" class="form-control" name="pseudo" placeholder="Pseudo">
        </div>

        <div class="form-group mb-4">
            <label for="name">Nom</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Nom">
        </div>

        <div class="form-group mb-4">
            <label for="firstname">Prénom</label>
            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Prénom">
        </div>

        <div class="form-group mb-4">
            <label for="object">Objet du message</label>
            <input type="text" class="form-control" name="object" id="object" placeholder="Objet du message">
        </div>

        <div class="form-group">
            <label for="message">Message<span class="required">*</span></label>
            <textarea id="message" name="message" rows="5" class="form-control" placeholder="Votre message" required></textarea>
        </div>

        <button type="button" class="btn btnCon btn-info"><a href="index.php?action=goHome" title="Bouton envoyer">Envoyer</a></button>
    </form>

</section>



<?php include_once('./App/Views/Front/Layouts/Footer.php'); ?>