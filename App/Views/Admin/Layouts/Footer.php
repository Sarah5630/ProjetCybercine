<footer id="footer">

  <!-- Navigation menu -->
  <nav class="nav nav-fill">
    <?php
         // Check if the user is logged in
    if (!empty($_SESSION)) {
      if ($_SESSION['role'] == 1) {
        echo '<a class="nav-link" href="index.php?action=goHome" title="Espace utilisateur">Espace utilisateur</a>';
      } else {
        echo '<a class="nav-link" href="index.php?action=goHome" title="Espace utilisateur">Espace utilisateur</a>';
      }
    } else {
      echo '<a class="nav-link" href="index.php?action=userConnect" title="Espace utilisateur">Espace utilisateur</a>';
    }
    ?>
    <a class="nav-link" title="Cyberciné">Cyberciné - Kercode@2023</a>

     <!-- Display a link to the legal notice page -->
    <a class="nav-link" href="index.php?action=legal" title="Mentions légales">Mentions légales</a>
  </nav>

</footer>
</body>

</html>