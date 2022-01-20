<?php
session_start();
$title = "Connexion";
ob_start();
?>

<main>
    <form action="../index.php?action=connexion" method="post">

        <h1>Connexion</h1>

        <input type="text" name="login" placeholder="Nom d'utilisateur">

        <input type="password" name="password" placeholder="Mot de passe">

        <button type="submit" name="submit">Connexion</button>

        <p>Vous êtes nouveau ici? <a href="inscription.php">S'inscrire</a></p>
    </form>
</main>

<?php
$content = ob_get_clean();
require('template.php');
?>