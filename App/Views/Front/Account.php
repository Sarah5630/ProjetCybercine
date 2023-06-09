<?php
// Include the Head and Header templates
include_once('./App/Views/Front/Layouts/Head.php');
include_once('./App/Views/Front/Layouts/Header.php');
?>


<section id="displayUserInfo" class="container">
   <?php if (!empty($message)) {
      echo $message;
   } ?>

   <h2>Mes informations</h2>
   <?php if (!empty($userInfo)) : ?>
      <hr>
      <ul>
         <!-- Display the user information -->
         <li>Pseudo : <?php echo $userInfo['Pseudo']; ?></li>
         <li>Nom : <?php echo $userInfo['Name']; ?></li>
         <li>Prénom : <?php echo $userInfo['Firstname']; ?></li>
         <li>Email : <?php echo $userInfo['Email']; ?></li>
      </ul>
   <?php endif; ?>

</section>
<section id="deleteUser" class="container bg-contact text-right">
   <h2>Supprimer mon compte</h2>
   <hr>
   <!-- Form to delete the user account -->
   <form action="index.php?action=deleteUser" method="post">
      <div class="form-row">
         <div class="col-md-6">
            <input type="text" class="form-control my-form-control" name="pseudo" placeholder="Pseudo" value="<?php echo isset($_POST['pseudo']) ? $_POST['pseudo'] : ''; ?>">
         </div>
         <div class="col">
            <input type="password" class="form-control my-form-control" name="password" placeholder="Mot de passe">
         </div>
      </div>
      <div>
         <input type="submit" class="btn btn-primary btnCon" name="submit" value="Supprimer mon compte">
      </div>
   </form>
</section>

<section id="updateUser" class="container bg-contact">
   <h2>Modifier mes informations</h2>
   <hr>
   <!-- Form to update the user information -->
   <form action="index.php?action=updateUser" method="post">
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
      <div>
         <input type="submit" class="btn btn-primary btnCon" name="submit" value="Modifier">
      </div>
   </form>
</section>

<a href class="btnUp" title="Bouton up">
   <img src="Public/img/up-arrow-button-svgrepo-com.svg" alt="bouton up" class="icone">
</a>

<?php include_once('./App/Views/Front/Layouts/Footer.php'); ?>