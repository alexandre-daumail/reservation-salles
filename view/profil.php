<?php
session_start();
$title = "Profil de " . $_SESSION["login"];
ob_start();
require_once('../model/user.class.php')
?>

<main>
    <h1><?= $_SESSION["login"]; ?> , vous pouvez modifier votre profil de connexion ici: </h1>
    <h2>
        <form action="../index.php?action=modify_login" method="post" id="login">
            <label for="login">
                <h3>Login</h3>
            </label>
            <input type="text" class="box-input" name="login" id="login" placeholder="Nom d'utilisateur" required />

            <label for="password">
                <h3>Mot de passe</h3>
            </label>
            <input type="password" placeholder="Mot de passe" name="password" id="password" required>
            <hr>

            <button type="submit" form="login" name="update">Modifier identifiant</button>
        </form>

        <form action="../index.php?action=modify_password" method="post">
            <label for="old-pwd">
                <h3>Ancien mot de passe</h3>
            </label>
            <input type="password" name="pwd" id="old-pwd" required>

            <label for="new-pwd">
                <h3>Nouveau mot de passe</h3>
            </label>
            <input type="password" name="new-pwd" id="new-pwd" required>

            <label for="new-pwd">
                <h3>Confirmation</h3>
            </label>
            <input type="password" name="new-pwd" id="new-pwd" required>
            <hr>

            <button type="submit" name="update">Modifier mot de passe</button>
        </form>
        <form action="">
            <button name="delete">Supprimer profil</button>
        </form>
    </h2>
</main>

<?php
$content = ob_get_clean();
require('template.php');
?>
<!-- strtotime
faire des boucles for pour le tableau

on peut utiliser endofor pour fermer une boucle for
-->