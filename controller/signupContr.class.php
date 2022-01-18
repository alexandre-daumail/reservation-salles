<?php
require_once('./model/user-manager.class.php');

class SignupContr extends UserManager
{

    public function __construct(public string $login, private string $password, private string $pwdrepeat)
    {}

    public function signupUser()
    {

        if ($this->emptyImput() == false) {
            throw new Exception("Veuillez remplir les camps requis", 1);
        }

        if ($this->invalidlogin() == false) {
            throw new Exception("Pseudo incorrect", 1);
            
        }
        if ($this->loginTakenCheck() == false) {
            throw new Exception("Pseudo pris", 1);            
        }

        $this->setUser($this->login, $this->password);
    }

    private function emptyImput()
    {
        $result = false;
        if (empty($this->login) || empty($this->password) || empty($this->pwdrepeat)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidlogin()
    {
        $result = false;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->login)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch()
    {
        $result = false;
        if ($this->password !== $this->pwdrepeat) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }



    private function loginTakenCheck()
    {
        $result = false;
        if (!$this->setUser($this->login, $this->password)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
