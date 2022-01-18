<?php
require_once('controller/signupContr.class.php');

try {
    switch ($_GET['action']) {
        case "connexion":

            header("location:view/connexionView.php");
            break;

        case "inscription":

            $login = $_POST["login"];
            $password = $_POST["password"];
            $pwdrepeat = $_POST["pwdrepeat"];

            //Instancier la classe controlleur d'inscription (SignupContr)
            $signup = new SignupContr($login, $password, $pwdrepeat);

            //Détection d'erreurs pour l'inscrition des admin et des utilisateurs
            $signup->signupUser();

            //Retourner à la page d'accueil
            header("location: index.php");
            break;

        default:
            header("location:view/indexView.php");
            break;
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
