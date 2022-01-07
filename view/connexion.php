<?php
$title = 'Connexion';

include 'header.php';
?>

<main class="container">
    <form action="controller/login.inc.php" method="post">
        <div class="container">
            <h1 class="box-title">Connexion</h1>

            <input type="text" class="box-input" name="login" placeholder="Nom d'utilisateur">

            <input type="password" class="box-input" name="password" placeholder="Mot de passe">

            <button type="submit" class="registerbtn" name="submit">Connexion</button>
            <div class="container2 bottom">
                <p>Vous êtes nouveau ici? <a href="inscription.php">S'inscrire</a></p>
            </div>
        </div>
    </form>
</main>
<?php

if (isset($_GET["error"])) {
  if ($_GET["error"] == "champsrequis") {
    echo "<p>Remplissez tous les champs!</p>";
  }
  else if ($_GET["error"] == "mauvaispseudo") {
    echo "<p>Pseudo incorrect</p>";
  }
  else if ($_GET["error"] == "mauvaismdp") {
    echo "<p>Le mot de passe ne correspond pas</p>";
  }
  else if ($_GET["error"] == "echecstmt") {
    echo "<p>Problème de connexion avec la base de donnée, veuillez contacter un admin.</p>";
  }
  else if ($_GET["error"] == "aucune") {
    echo "<p>Vous vous êtes inscrit!</p>";
  }
}

include_once 'footer.php';
?>