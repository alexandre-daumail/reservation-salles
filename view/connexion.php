<?php $title = "Connexion"; ?>

<?php ob_start();?>
    <main class="container">
        <form action="controller/login.inc.php" method="post">
            <div class="container">
                <h1 class="box-title">Connexion</h1>

                <input type="text" class="box-input" name="login" placeholder="Nom d'utilisateur">

                <input type="password" class="box-input" name="password" placeholder="Mot de passe">

                <button type="submit" class="registerbtn" name="submit">Connexion</button>
                <div class="container2 bottom">
                    <p>Vous êtes nouveau ici? <a href="../index.php?action=inscription">S'inscrire</a></p>
                </div>
            </div>
        </form>
    </main>
<?php
$content = ob_get_clean();
require('template.php');
?>
