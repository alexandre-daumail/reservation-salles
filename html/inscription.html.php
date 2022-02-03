<?php
session_start();
if (isset($_SESSION["id"])){
    header('location:profil.html.php');
    exit();
}else{
$title = "Inscription";
ob_start();
?>

<main>
    <form action="<?= htmlspecialchars('../index.php?action=inscription'); ?>" method="post">

        <h1>Création d'un compte utilisateur</h1>
        <hr>

        <label for="login"> Login </label>
        <input type="text" class="box-input" name="login" id="login" placeholder="Nom d'utilisateur">

        <label for="password"> Mot de passe </label> <input type="password" placeholder="Mot de passe" name="password" id="password">

        <label for="pwdrepeat"> Confirmation Mdp </label>
        <input type="password" placeholder="Confirmation Mdp" name="pwdrepeat" id="pwdrepeat">
        <button>inscription</button>
        <hr>

        <p class="box-register">Déjà inscrit? <a href="connexion.php">Connectez-vous ici</a></p>
    </form>
</main>

<?php
$content = ob_get_clean();
}
require('template.php');
?>