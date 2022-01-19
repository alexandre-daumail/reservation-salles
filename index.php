<?php
require_once('controller/signup-contr.php');
require_once('controller/function.php');

try {
    switch ($_GET['action']) {
        case "connexion":

            header("location:view/connexionView.php");
            break;

        case "inscription":

            $login = test_input($_POST["login"]);
            $password = test_input($_POST["password"]);
            $pwdrepeat = test_input($_POST["pwdrepeat"]);        
    
            signupUser($login, $password, $pwdrepeat);
            header("location:view/indexView.php");
            break;

        default:
            header("location:view/indexView.php");
            break;
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
