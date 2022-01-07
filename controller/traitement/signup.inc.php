<?php

include("class-autoload.inc.php");

if(isset($_POST["submit"]))
{

    //récupérer les données du formulaire d'inscription
    $login = $_POST["login"];
    $password = $_POST["password"];
    $pwdrepeat = $_POST["pwdrepeat"];

    //Instancier la classe controlleur d'inscription (SignupContr)
    $signup = new SignupContr($login, $password, $pwdrepeat);
    
    //Détection d'erreurs pour l'inscrition des admin et des utilisateurs
    $signup->signupUser();

    //Retourner à la page d'accueil
    header("location: ../index.php?error=none");

}