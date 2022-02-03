<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location:connexion.html.php');
} else {
    require_once ('../classes/Reservation.class.php');
    $title = "Profil de " . $_SESSION["login"];
    ob_start();
?>

    <main>

        <h1><?= $_SESSION["login"]; ?> , vous pouvez modifier votre profil de connexion ici:</h1>
            
            <!-- LOGIN MODIFY FORM -->
            <form action="../index.php?action=modify_login" method="post" id="login">

                    <fieldset>

                        <legend>Modification d'identifiant</legend>

                    <label for="login">Nouvel identifiant</label>                    
                        
                    <input type="text" class="box-input" name="login" id="login" placeholder="Nom d'utilisateur" required />

                    <label for="password">Mot de passe</label>

                    <input type="password" placeholder="Mot de passe" name="password" id="password" required>
                    <hr>

                    <button type="submit" form="login" name="update">Modifier identifiant</button>

                </fieldset>

            </form>


            <!-- PASSWORD MODIFY FORM -->
            <form action="../index.php?action=modify_password" method="post" id="pwd">

                <fieldset>

                    <legend>Modification du mot de passe</legend>

                    <label for="old-pwd">Ancien mot de passe</label>

                    <input type="password" name="password" id="old-pwd" required>

                    <label for="new-pwd">Nouveau mot de passe</label>
                    
                    <input type="password" name="newPwd" id="new-pwd" required>

                    <label for="new-pwd-repeat">Confirmation</label>

                    <input type="password" name="pwdRepeat" id="new-pwd-repeat" required><hr>
                

                    <button type="submit" form="pwd" name="update">Modifier mot de passe</button>
                
                </fieldset>

            </form>

            <!-- ACCOUNT DELETE FORM -->
            <form action="../index.php?action=delete" method="post" id="delete">

                <fieldset>

                    <legend>Suppression du compte</legend>
                
                    <p> Après avoir entré votre mot de passe, cliquer sur "Supprimer profil" entraîne une suppession irréversible.<p>

                    <label for="password">Mot de passe</label>

                    <input type="password" placeholder="Mot de passe" name="password" id="password" required>
                    
                    <button type="submit" name="delete">Supprimer profil</button>

                </fieldset>

            </form>

    </main>

    

<?php

$content = ob_get_clean();
}


require('template.php');
    
?>
