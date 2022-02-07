<?php
session_start();
$title = "Connexion";
ob_start();
?>

<main>
    <form action="../index.php?action=connexion" method="post">

        <h1>Connexion</h1>

        <label for="login">Pseudo</label>
        <input type="text" name="login" id="login" placeholder="Nom d'utilisateur">

        <label for="pwd">Mot de passe</label>
        <input type="password" id="pwd" name="password" placeholder="Mot de passe">

        <button type="submit" name="submit">Connexion</button>

        <p>Vous êtes nouveau ici? <a href="inscription.php">S'inscrire</a></p>
    </form>
</main>

<?php
$content = ob_get_clean();
require('template.php');
?>