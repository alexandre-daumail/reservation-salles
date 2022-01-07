<?php
$title = 'Page de profil';
include_once 'header.php';
// récupérer les infos utilisateur:



/* if (isset($_REQUEST['login'], $_REQUEST['password'])) {
    if ($_REQUEST['newpassword'] == $_REQUEST['conf_mdp']) {
        // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
        $login = stripslashes($_REQUEST['login']);
        $login = mysqli_real_escape_string($conn, $login);
        // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
        $password = stripslashes($_REQUEST['newpassword']);
        $password = mysqli_real_escape_string($conn, $password);

        $query = "UPDATE `utilisateurs` SET `login` = '$login', `password` = '$password' 
		 WHERE `utilisateurs`.`id` = $id";
        $res = mysqli_query($conn, $query);

        if (isset($res)) {
            echo "<div class='sucess'>
				  <h3>Vous avez modifié votre profil avec succès. Vous allez être redirigés sur votre profil.</h3>
				  </div>";
            header("refresh:5; url=profil.php");
        }
    } else {
        echo 'Confirmation de mot de passe échouée';
        header("refresh:2; url=profil.php");
    }
} else {
 */ ?>

<body>
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
        <?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "modif") {
            echo "<p>Vous avez bien modifié votre profil!</p>";
        }
    }
    
        ?>
    </main>