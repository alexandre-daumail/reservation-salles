<?php
session_start();
$title = "Planning réservation Studio Son";
include_once '../model/calendar.class.php';
include_once '../model/planning.class.php';
ob_start();

?>

<main>
    <h1>Bienvenue<?php if (isset($_SESSION["login"])){echo " " . $_SESSION["login"];}?>, voici le planning de la semaine :</h1>
    <?php
    // $calendar = new Calendar();

    // echo $calendar->show();

    $planning = new Planning();

    echo $planning->show();
    ?>
</main>

<?php
$content = ob_get_clean();
require('template.php');
?>