<?php
$title = 'Création de profil';
include_once 'header.php';
?>

<main class="container">
    <form action="includes/signup.inc.php" method="post">
        <div class="container2">
            <h1>Création d'un compte utilisateur</h1>
            <hr>

            <label for="login">
                <h3>Login</h3>
            </label>
            <input type="text" class="box-input" name="login" id="login" placeholder="Nom d'utilisateur">

            <label for="password">
                <h3>Mot de passe</h3>
            </label>
            <input type="password" placeholder="Mot de passe" name="password" id="password">

            <label for="pwdrepeat">
                <h3>Confirmation Mdp</h3>
            </label>
            <input type="password" placeholder="Confirmation Mdp" name="pwdrepeat" id="pwdrepeat">

            <hr>

            <button class="registerbtn" type="submit" name="submit">Inscription</button>
        </div>
        <div class="container2 bottom">
            <p class="box-register">Déjà inscrit? <a href="connexion.php">Connectez-vous ici</a></p>
        </div>
    </form>
</main>
<?php

if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p>Remplissez tous les champs!</p>";
    } else if ($_GET["error"] == "invalidlogin") {
        echo "<p>Choisissez un pseudo correct!</p>";
    } else if ($_GET["error"] == "mdpincorrect") {
        echo "<p>Les mots de passe ne sont pas identiques!</p>";
    } else if ($_GET["error"] == "usertaken") {
        echo "<p>Ce pseudo est déjà pris!</p>";
    } else if ($_GET["error"] == "echecstmt") {
        echo "<p>Problème de connexion avec la base de donnée, veuillez contacter un admin.</p>";
    } else if ($_GET["error"] == "aucune") {
        echo "<p>Vous vous êtes inscrit avec succès! Bienvenue parmis nous :)</p>";
    }
}
include_once 'footer.php';
?>