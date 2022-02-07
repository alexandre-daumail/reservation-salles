<?php
require_once('./model/user.class.php');

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

try {
    switch (isset($_GET['action'])) {
        case "inscription":

            $login = test_input($_POST["login"]);
            $password = test_input($_POST["password"]);
            $pwdrepeat = test_input($_POST["pwdrepeat"]);

            if (empty($login) || empty($password) || empty($pwdrepeat)) {
                throw new Exception("Veuillez remplir tous les champs", 1);
            }

            if (!preg_match("/^[a-zA-Z0-9]*$/", $login)) {
                throw new Exception("Pseudo incorrect", 1);
            }

            if ($password !== $pwdrepeat) {
                throw new Exception("Les mots de passe ne correspondent pas", 1);
            }

            $userManager = new LaPlateforme\ReservationSalles\Model\User();

            $userCreated = $userManager->addUser($login, $password, $pwdrepeat);

            if ($userCreated === false) {
                throw new Exception("Impossible de créer l'utilisateur", 1);
            }

            header("location: index.html.php")
            break;

        case "connexion":

            loginUser($_POST["login"], $_POST["password"]);
            ob_start();
            require("view/planning.php");
            $content = ob_get_clean();

            require('template.php');
            break;

        case "modify_login":

            modifyUser($_SESSION["login"], $_POST["login"], $_POST["password"]);
            require("view/profil.php?login_modifié");
            break;
            
        case "modify_password":

            $password = test_input($_POST["password"]);
            $newPwd = test_input($_POST["newPwd"]);
            $pwdRepeat = test_input($_POST["pwdRepeat"]);

            modifyPwd($_SESSION["login"], $newPwd, $pwdRepeat, $password);
            header("location:view/profil.php?mdp_modifié");
            break;

        case 'delete':

            $password = test_input($_POST["password"]);
            deleteUser($_SESSION["login"], $password);

            header("location:index.php?deleted");
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
            setReservation($title, $description, $startDate, $startTime);
            header("location:view/planning.php?reservationOK");

            break;


        default:
            require("view/indexView.php");
            break;
    }
} catch (Exception $e) {
    header("refresh:5;url=view/indexView.php");
    echo 'Erreur : ' . $e->getMessage() . "<br>";
    echo 'Vous allez être redirigés dans approx. 5sec. Sinon cliquez <a href="view/indexView.php">ici</a>.';
}


function signupUser($login, $password, $pwdrepeat)
{
    $login = test_input($_POST["login"]);
    $password = test_input($_POST["password"]);
    $pwdrepeat = test_input($_POST["pwdrepeat"]);

    if (empty($login) || empty($password) || empty($pwdrepeat)) {
        throw new Exception("Veuillez remplir tous les champs", 1);
    }

    if (!preg_match("/^[a-zA-Z0-9]*$/", $login)) {
        throw new Exception("Pseudo incorrect", 1);
    }

    if ($password !== $pwdrepeat) {
        throw new Exception("Les mots de passe ne correspondent pas", 1);
    }

    $userManager = new LaPlateforme\ReservationSalles\Model\User();

    $userCreated = $userManager->addUser($login, $password, $pwdrepeat);

    if ($userCreated === false) {
        throw new Exception("Impossible de créer l'utilisateur", 1);
    }
}


function loginUser($login, $password)
{

    $login = $_POST["login"];
    $password = $_POST["password"];

    if (empty($login) || empty($password)) {
        throw new Exception("Veuillez remplir tous les champs", 1);
    }

    if (!preg_match("/^[a-zA-Z0-9]*$/", $login)) {
        throw new Exception("Pseudo incorrect", 1);
    }

    $user = new LaPlateforme\ReservationSalles\Model\User;

    $user->loginUser($login, $password);
}

function modifyUser($login, $newLogin, $password)
{

    $login = $_SESSION["login"];
    $newLogin = test_input($_POST["login"]);
    $password = test_input($_POST["password"]);

    if (empty($login) || empty($password)) {
        throw new Exception("Veuillez remplir tous les champs", 1);
    }

    if (!preg_match("/^[a-zA-Z0-9]*$/", $login)) {
        throw new Exception("Pseudo incorrect", 1);
    }

    $user = new LaPlateforme\ReservationSalles\Model\User;

    $user->modifyUser($login, $newLogin, $password);
}

function modifyPwd($login, $newPwd, $pwdRepeat, $password)
{
    if (empty($newPwd) || empty($pwdRepeat) || empty($password)) {
        throw new Exception("Veuillez remplir tous les champs", 1);
    }

    if ($newPwd !== $pwdRepeat) {
        throw new Exception("Les mots de passe ne correspondent pas", 1);
    }

    $userManager = new LaPlateforme\ReservationSalles\Model\User();

    $userCreated = $userManager->modifyPwd($login, $password, $newPwd);

    if ($userCreated === false) {
        throw new Exception("Impossible de créer l'utilisateur", 1);
    }
}


function deleteUser($login, $password)
{
    if (empty($password)) {
        throw new Exception("Veuillez remplir tous les champs", 1);
    }

    $user = new LaPlateforme\ReservationSalles\Model\User;

    $user->deleteUser($login, $password);
}
