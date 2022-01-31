<?php
session_start();
require_once('controller/user.contr.php');
require_once('controller/reservation.contr.php');

try {
    switch ($_GET['action']) {
        case "inscription":

            $login = test_input($_POST["login"]);
            $password = test_input($_POST["password"]);
            $pwdrepeat = test_input($_POST["pwdrepeat"]);

            signupUser($login, $password, $pwdrepeat);
            header("location:view/connexion.php?inscriptionok");
            break;

        case "connexion":

            $login = $_POST["login"];
            $password = $_POST["password"];

            loginUser($login, $password);
            header("location:view/planning.php");
            break;

        case "modify_login":

            $login = test_input($_POST["login"]);
            $password = test_input($_POST["password"]);

            modifyUser($login, $password);
            header("location:view/profil.php");
            break;

        case "logout":

            session_unset();
            session_destroy();

            header("location: view/connexion.php");
            break;

        case 'reservation':
            
            $title = test_input($_POST['title']);
            $description = test_input($_POST['description']);
            $startDate = test_input($_POST['start-date']);            
            $startTime = test_input($_POST['start-time']);            
            setReservation ($title, $description, $startDate, $startTime);
            header("location:view/planning.php?reservationOK");
            
            break;

        default:
            header("location:view/indexView.php");
            break;
    }
} catch (Exception $e) {
    header("refresh:5;url=view/indexView.php");
    echo 'Erreur : ' . $e->getMessage() . "<br>";
    echo 'Vous allez être redirigés dans approx. 5sec. Sinon cliquez <a href="view/indexView.php">ici</a>.';
}
