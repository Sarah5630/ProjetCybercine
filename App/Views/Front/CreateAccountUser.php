<?php
include_once('./App/Views/Front/Layouts/Head.php');
include_once('./App/Views/Front/Layouts/Header.php');
?>


<section id="infoUser" class="container bg-contact">
   <h2>Créer un compte</h2>
   <hr>

   <form action="index.php?action=createUser" method="post">
      <div class="form-row">
         <div class="col-md-6">
            <input type="text" class="form-control my-form-control" name="pseudo" placeholder="Pseudo" value="<?php echo isset($_POST['pseudo']) ? $_POST['pseudo'] : ''; ?>">
         </div>
         <div class="col">
            <input type="email" class="form-control my-form-control" name="email" placeholder="Votre Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
         </div>
      </div>
      <div class="form-row">
         <div class="col-md-6">
            <input type="password" class="form-control my-form-control" name="password" placeholder="Mot de passe">
         </div>
         <div class="col">
            <input type="text" class="form-control my-form-control" name="name" placeholder="Nom" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">
         </div>
      </div>
      <div class="form-row">
         <div class="col-md-6 ">
            <input type="text" class="form-control my-form-control" name="firstname" placeholder="Prénom" value="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : ''; ?>">
         </div>
      </div>
      <div class="form-check my-4">
         <input class="form-check-input" type="checkbox" value="1" id="rgpd" name="rgpd">
         <label class="form-check-label" for="rgpd">
            J'accepte la politique de confidentialité.
         </label>
      </div>
      <div>
         <input type="submit" class="btn btn-primary btnCon" name="submit" value="Créer un compte">
      </div>
   </form>
</section>


<?php include_once('./App/Views/Front/Layouts/Footer.php'); ?>