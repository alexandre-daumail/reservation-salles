<?php


session_start();
if (!isset($_SESSION['id'])) {
    header('location:connexion.html.php');
} else {
    $title = "Formulaire de réservation";
    ob_start();
?>

    <main>

        <form action="<?= htmlspecialchars('../index.php?action=reservation'); ?>" method="post">
            <h1>Bienvenue sur le site de réservation du Studio Son de la Plateforme!</h1>


            <label for="title">Titre de la réservation</label>
            <input type="text" name="title" id="title" placeholder="Entrez un titre">

            <label for="descrptn">Description</label>
            <input type="text" name="description" id="descrptn" placeholder="Entrez une description">

            <label for="start-date">Début</label>
            <p>Note: les crénaux sont d'une heure maximum par personne.</p>
            <input type="date" name="start-date" id="start-date" date min="<?= date("Y-m-d"); ?>">

            <label for="start-time">Heure de début:</label>
            <input type="number" name="start-time" id="start-time" min="8" max="18" value="8">
            <span class="validity"></span>

            <button type="submit">Valider</button>
        </form>
    </main>



<?php
    $content = ob_get_clean();
}
require('template.php');
?>