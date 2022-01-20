<?php
session_start();
$title = "Planning réservation Studio Son";
include_once '../model/calendar.class.php';
ob_start();

?>

<main>
    <h1>Bienvenue  <?= $_SESSION["login"];?>, voici le planning de la semaine</h1>
    <?php
    $calendar = new Calendar();

    echo $calendar->show();
    ?>
</main>

<?php
$content = ob_get_clean();
require('template.php');
?>