<?php
require_once('./model/user.class.php');

function loginUser($login, $password)
    {
        if (empty($login) || empty($password)) {
            throw new Exception("Veuillez remplir tous les camps", 1);
        }

        if (!preg_match("/^[a-zA-Z0-9]*$/", $login)) {
            throw new Exception("Pseudo incorrect", 1);
        }

        $user = new User;

        $user->loginUser($login, $password);
        
    }