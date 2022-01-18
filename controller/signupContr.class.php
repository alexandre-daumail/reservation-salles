<?php
require_once('./model/user-manager.class.php');


    function emptyImput()
    {
        $result = false;
        if (empty($this->login) || empty($this->password) || empty($this->pwdrepeat)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    function invalidlogin()
    {
        $result = false;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->login)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    function pwdMatch()
    {
        $result = false;
        if ($this->password !== $this->pwdrepeat) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }



    function loginTakenCheck()
    {
        $result = false;
        if (!$this->setUser($this->login, $this->password)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    function signupUser($login, $password, $pwdrepeat)
    {
        if (emptyImput() == false) {
            throw new Exception("Veuillez remplir tous les camps", 1);
            exit();
        }

        if (invalidlogin() == false) {
            throw new Exception("Pseudo incorrect", 1);
            exit();

        }
        if (loginTakenCheck() == false) {
            throw new Exception("Pseudo pris", 1);
            exit();            
        }

        if (pwdMatch() == false) {
            throw new Exception("Les mots de passe ne correspondent pas", 1);
            exit();            
        }

        $userManager = new UserManager($login, $password, $pwdrepeat);

        $userCreated = $userManager->addUser();

    }

