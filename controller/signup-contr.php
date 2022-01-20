<?php
require_once('./model/user.class.php');

    function signupUser($login, $password, $pwdrepeat)
    {

        if (empty($login) || empty($password) || empty($pwdrepeat)) {
            throw new Exception("Veuillez remplir tous les camps", 1);
        }

        if (!preg_match("/^[a-zA-Z0-9]*$/", $login)) {
            throw new Exception("Pseudo incorrect", 1);

        }

        if ($password !== $pwdrepeat) {
            throw new Exception("Les mots de passe ne correspondent pas", 1);
        }

        $userManager = new User();

        $userCreated = $userManager->addUser($login, $password, $pwdrepeat);

        if ($userCreated === false) {
            throw new Exception("Impossible de créer l'utilisateur", 1);            
        }
    }

