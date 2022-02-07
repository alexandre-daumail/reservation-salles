<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location:connexion.html.php');
} else {
    require_once('../includes/class-autoload.inc.php');
    $title = "Profil de " . $_SESSION["login"];
    ob_start();
?>

    <main>

        <aside>

<!--             <h1>Vos réservations</h1>
 -->

                <?php

/*                 $events = new Reservation();

                $list = $events->listEvents($_SESSION["id"]);

                echo "<pre>";
                print_r($list);
                echo "</pre>";
                
                $keys = array_keys($list);

                 for($i = 0; $i < count($list); $i++) {
                    echo $keys[$i] . "{<br>";
                    foreach($list[$keys[$i]] as $key => $value) {
                        echo $key . " : " . $value . "<br>";
                    }
                    echo "}<br>";
                } 

                 foreach ($list[$cols[0]] as $i => $null) {
                    echo '<tr>';
                    foreach ($list as $col) echo '<td>' . $day[$col][$i] . '</td>';
                    echo '</tr>';
                } 
 */ 
                ?>



        </aside>

        <h1><?= $_SESSION["login"]; ?> , vous pouvez modifier votre profil de connexion ici:</h1>

        <!-- LOGIN MODIFY FORM -->
        <form action="<?= htmlspecialchars('../includes/profil.inc.php'); ?>" method="post" id="login">

            <fieldset>

                <legend>Modification d'identifiant</legend>

                <label for="login">Nouvel identifiant</label>

                <input type="text" class="box-input" name="newLogin" id="login" placeholder="Nom d'utilisateur" required />

                <label for="password">Mot de passe</label>

                <input type="password" placeholder="Mot de passe" name="password" id="password" required>
                <hr>

                <button type="submit" form="login" name="update-login">Modifier identifiant</button>

            </fieldset>

        </form>


        <!-- PASSWORD MODIFY FORM -->
        <form action="<?= htmlspecialchars('../includes/profil.inc.php'); ?>" method="post" id="pwd">

            <fieldset>

                <legend>Modification du mot de passe</legend>

                <label for="old-pwd">Ancien mot de passe</label>

                <input type="password" name="password" id="old-pwd" required>

                <label for="new-pwd">Nouveau mot de passe</label>

                <input type="password" name="newPwd" id="new-pwd" required>

                <label for="new-pwd-repeat">Confirmation</label>

                <input type="password" name="pwdRepeat" id="new-pwd-repeat" required>
                <hr>


                <button type="submit" form="pwd" name="update-pwd">Modifier mot de passe</button>

            </fieldset>

        </form>

        <!-- ACCOUNT DELETE FORM -->
        <form action="<?= htmlspecialchars('../includes/profil.inc.php'); ?>" method="post" id="delete">

            <fieldset>

                <legend>Suppression du compte</legend>

                <p> Après avoir entré votre mot de passe, cliquer sur "Supprimer profil" entraîne une suppession irréversible.
                <p>

                    <label for="password">Mot de passe</label>

                    <input type="password" placeholder="Mot de passe" name="password" id="password" required>

                    <button type="submit" form="delete" name="delete">Supprimer profil</button>

            </fieldset>

        </form>

    </main>

<?php

    $content = ob_get_contents();
    ob_end_clean();
    require('template.php');
}



?>