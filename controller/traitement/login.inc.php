<?php
include("class-autoload.inc.php");

if(isset($_POST["submit"])){
    //récupérer les données du formulaire d'inscription
    $login = $_POST["login"];
    $password = $_POST["password"];

    //Instancier la classe controlleur d'inscription (SignupContr)
    $login = new LoginContr($login, $password);
    
    //Détection d'erreurs pour l'inscrition des admin et des utilisateurs
    $login->loginUser();

    //Retourner à la page d'accueil
    header("location: ../index.php?error=none");
}