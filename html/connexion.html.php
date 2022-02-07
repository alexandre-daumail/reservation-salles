<?php

session_start();

if (isset($_SESSION["id"])) {
    header('location:profil.html.php');
    exit();
} else {
    $title = "Connexion";
    ob_start();
?>

    <main>
        <form action="../includes/connexion.inc.php" method="post">

            <fieldset>

                <legend>Connexion</legend>

                <label for="login">Pseudo</label>
                <input type="text" name="login" id="login" placeholder="Nom d'utilisateur" required>

                <label for="pwd">Mot de passe</label>
                <input type="password" id="pwd" name="password" placeholder="Mot de passe" required>

                <button type="submit" name="submit">Connexion</button>

                <p>Vous êtes nouveau ici? <a href="inscription.html.php">S'inscrire</a></p>

            </fieldset>

        </form>

    </main>

<?php
    $content = ob_get_clean();
}
require('template.php');
?>