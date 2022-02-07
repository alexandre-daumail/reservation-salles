<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location:connexion.html.php');
} else {
    require_once('../includes/class-autoload.inc.php');
    $title = "Réservation";
    ob_start();

    $reservation = new Reservation;

    $res = $reservation->getEvent($_GET['id']);
?>

    <main>
        
        <h2>Créneau réservé</h2>

        <?php

        foreach ($res as $value) { ?>

            <p><strong>Titre :</strong> <?= $value['titre'] ?></p>

            <p><strong>Nom : </strong><?= $value['login'] ?></p>

            <p><strong>description :</strong><?= $value['description'] ?></p>

            <p><strong>Date de début :</strong><?= $value['debut'] ?></p>

            <p><strong>Date de fin :</strong><?= $value['fin'] ?></p>

        <?php } ?>

    </main>

<?php

    $content = ob_get_contents();

    ob_end_clean();

    require('template.php');

}

?>