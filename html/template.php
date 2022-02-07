<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8"/>

        <title><?= $title ?></title>

        <link href="https://schnaps.it/archive/css/reset.css" rel="stylesheet" />

        <link href="../public/css/style.css" rel="stylesheet" />        

    </head>

    <body>

        <header>

            <h1>Studio Son de la Plateforme</h1>

            <nav>

                <ul>

                    <li><a href="index.html.php">Accueil</a></li>

                    <li><a href="planning.html.php">Planning</a></li>

                    <?php

                    if (isset($_SESSION["id"])) {

                        echo "<li><a href='reservation-form.html.php'>Réserver</a></li>";

                        echo "<li><a href='profil.html.php'>Profil</a></li>";

                        echo "<li><a href='../includes/logout.inc.php'>Déconnexion</a></li>";
                    } else {

                        echo '<li><a href="inscription.html.php">Inscription</a></li>';

                        echo '<li><a href="connexion.html.php">Connexion</a></li>';
                    }

                    ?>

                </ul>

            </nav>

        </header>

        <?= $content ?>

        <footer>

            <nav>

                <ul>
                    
                    <li><a href="index.html.php">Accueil</a></li>

                    <li><a href="planning.html.php">Planning</a></li>

                    <?php
                    if (isset($_SESSION["id"])) {

                        echo "<li><a href='reservation-form.html.php'>Réserver</a></li>";

                        echo "<li><a href='profil.html.php'>Profil</a></li>";

                        echo "<li><a href='../includes/logout.inc.php'>Déconnexion</a></li>";
                    } else {

                        echo '<li><a href="inscription.html.php">Inscription</a></li>';

                        echo '<li><a href="connexion.html.php">Connexion</a></li>';
                    }

                    ?>

                </ul>

            </nav>
            
        </footer>

    </body>

</html>