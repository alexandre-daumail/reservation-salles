<?php
session_start();
$title = "Accueil Studio Son - La Plateforme";
ob_start();
?>

<main>
<h1>Voici les information de votre profil : </h1>
        <h2>
            <?php 
            $user = new User;
            $user->getAllInfos();
            if (isset($_REQUEST["delete"])) {
                $user->delete();
                exit();
            }
            ?>
            <form action="" method="post">
                <label for="login">
                    <h3>Login</h3>
                </label>
                <input type="text" class="box-input" name="login" id="login" placeholder="Nom d'utilisateur" required />

                <label for="1st">
                    <h3>Prénom</h3>
                </label>
                <input type="text" class="box-input" name="firstname" id="1st" placeholder="Prénom" required />

                <label for="last">
                    <h3>Nom</h3>
                </label>
                <input type="text" class="box-input" name="lastname" id="last" placeholder="Nom d'utilisateur" required />

                <label for="password">
                    <h3>Mot de passe</h3>
                </label>
                <input type="password" placeholder="Mot de passe" name="password" id="password" required>

                <label for="email">
                    <h3>Email</h3>
                </label>
                <input type="email" placeholder="email" name="email" id="email" required>

                <hr>

                <button type="submit" name="update">Modifier profil</button>

                
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