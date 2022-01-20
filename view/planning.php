<?php
session_start();
$title = "Accueil Studio Son - La Plateforme";
ob_start();
?>

<main>
    <?php
    include '../model/calendar.class.php';

    $calendar = new Calendar();

    echo $calendar->show();
    ?>
</main>

<?php
$content = ob_get_clean();
require('template.php');
?>