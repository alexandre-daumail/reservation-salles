<?php $title = "Inscription"; ?>

<?php ob_start();?>
<main class="container">
    <form action="<?= htmlspecialchars('../index.php?action=inscription');?>" method="post">
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
$content = ob_get_clean();
require('template.php');
?>
