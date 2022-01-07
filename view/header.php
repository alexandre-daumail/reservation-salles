<?php
include("class-autoload.inc.php");
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Accueil - Salle Audio La Plateforme</title>
</head>

<body>
  <header>
    <ul>
      <li><a href="index.php">Accueil</a></li>
      <li><a href="planning.php">Planning</a></li>
      <?php
      if (isset($_SESSION["login"])) {
        echo "<li><a href='reservation-form.php'>Réserver</a></li>";
        echo "<li><a href='profil.php'>Page de profil</a></li>";
        echo "<li><a href='assets/includes/logout.inc.php'>Déconnexion</a></li>";
      } else {
        echo    '<li><a href="inscription.php">Inscription</a></li>';
        echo    '<li><a href="connexion.php">Connexion</a></li>';
      }
      ?>
    </ul>
  </header>