<footer id="footer">

  <!-- Navigation menu -->
  <nav class="nav nav-fill">
    <?php
    if (!empty($_SESSION)) {
      if ($_SESSION['role'] == 1) {
        echo '<a class="nav-link" href="indexAdmin.php?action=addMovie" title="Espace Admin">Espace Admin</a>';
      } else {
        echo '<a class="nav-link" href="index.php?action=userConnect" title="Espace admin">Espace Admin</a>';
      }
    } else {
      echo '<a class="nav-link" href="index.php?action=userConnect" title="Espace Admin">Espace Admin</a>';
    }
    ?>
    <a class="nav-link" title="Cyberciné">Cyberciné - Kercode@2023</a>
    <a class="nav-link" href="index.php?action=legal" title="Mentions légales">Mentions légales</a>
  </nav>

</footer>
</body>

</html>