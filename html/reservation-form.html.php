<?php


session_start();
if (!isset($_SESSION['id'])) {
    header('location:connexion.html.php');
} else {
    $title = "Formulaire de réservation";
    ob_start();
?>

    <main>

        <form action="<?= htmlspecialchars('../includes/reservation.inc.php'); ?>" method="post">

            <fieldset>

                <legend>Bienvenue sur le site de réservation du Studio Son de la Plateforme!</legend>


                <label for="title">Titre de la réservation</label>
                <input type="text" name="title" id="title" placeholder="Entrez un titre" required>

                <label for="descrptn">Description</label>
                <input type="text" name="description" id="descrptn" placeholder="Entrez une description" required>

                <label for="start-date">Début</label>
                <p>Note: les crénaux sont d'une heure maximum par personne.</p>
                <input type="date" name="startDate" id="start-date" date min="<?= date("Y-m-d"); ?>" required>

                <label for="start-time">Heure de début:</label>
                <input type="number" name="startTime" id="start-time" min="8" max="18" value="8" required>
                <span class="validity"></span>

                <button type="submit" name="submit">Valider</button>

            </fieldset>
        </form>
    </main>



<?php
    $content = ob_get_clean();
}
require('template.php');
?>