<?php
session_start();
$title = "Accueil Studio Son - La Plateforme";
ob_start();
?>

<main>
    Bienvenue sur le site de réservation du Studio Son de la Plateforme!
</main>

<?php
$content = ob_get_clean();
require('template.php');
?>