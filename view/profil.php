<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location:connexion.php');
} else {
    $title = "Profil de " . $_SESSION["login"];
    ob_start();
?>

    <main>
        <h1><?= $_SESSION["login"]; ?> , vous pouvez modifier votre profil de connexion ici: </h1>
        <h2>
            <!-- LOGIN MODIFY FORM -->
            <form action="../index.php?action=modify_login" method="post" id="login">
                <label for="login">
                    <h1>Modification d'identifiant</h1>
                    <h3>Nouvel identifiant</h3>
                </label>
                <input type="text" class="box-input" name="login" id="login" placeholder="Nom d'utilisateur" required />

                <label for="password">
                    <h3>Mot de passe</h3>
                </label>
                <input type="password" placeholder="Mot de passe" name="password" id="password" required>
                <hr>

                <button type="submit" form="login" name="update">Modifier identifiant</button>
            </form>

            <!-- PASSWORD MODIFY FORM -->
            <form action="../index.php?action=modify_password" method="post" id="pwd">
                <label for="old-pwd">
                    <h1>Modification du mot de passe</h1>
                    <h3>Ancien mot de passe</h3>
                </label>
                <input type="password" name="password" id="old-pwd" required>

                <label for="new-pwd">
                    <h3>Nouveau mot de passe</h3>
                </label>
                <input type="password" name="newPwd" id="new-pwd" required>

                <label for="new-pwd-repeat">
                    <h3>Confirmation</h3>
                </label>
                <input type="password" name="pwdRepeat" id="new-pwd-repeat" required>
                <hr>

                <button type="submit" form="pwd" name="update">Modifier mot de passe</button>
            </form>

            <!-- ACCOUNT DELETE FORM -->
            <form action="../index.php?action=delete" method="post" id="delete">
                <h1>Suppression du compte</h1>
                <p> Après avoir entré votre mot de passe, cliquer sur "Supprimer profil" entraîne une suppession irréversible.
                    <label for="password">
                        <h3>Mot de passe</h3>
                    </label>
                    <input type="password" placeholder="Mot de passe" name="password" id="password" required>
                    <button type="submit" name="delete">Supprimer profil</button>
            </form>
        </h2>
    </main>

<?php
    $content = ob_get_clean();
}
require('template.php');
?>
