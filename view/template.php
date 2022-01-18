<?php session_start(); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="../public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <header>
            <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="planning.php">Planning</a></li>
            <?php
            if (isset($_SESSION["id"])) {
                echo "<li><a href='reservation-form.php'>Réserver</a></li>";
                echo "<li><a href='profil.php'>Profil</a></li>";
                echo "<li><a href='../index.php=?action=logout'>Déconnexion</a></li>";
            } else {
                echo    '<li><a href="inscription.php">Inscription</a></li>';
                echo    '<li><a href="connexion.php">Connexion</a></li>';
            }
            ?>
            </ul>
    </header>

        <?= $content ?>
    
    </body>
</html>