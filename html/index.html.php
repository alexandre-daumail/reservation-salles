<?php
session_start();
$title = "Accueil Studio Son - La Plateforme";
ob_start();
?>

    <main>
        <h1>Bienvenue sur le site de réservation du Studio Son de la Plateforme!</h1>
        <?php
        if (isset($_SESSION["login"])) {
            echo "<p> Vous êtes bien connectés en tant que " . $_SESSION['login'] . " :)</p>";
        }
        ?>
    </main>

<?php
$content = ob_get_clean();
require('template.php');
?>