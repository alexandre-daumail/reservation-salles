<?php

class LoginContr extends Login{

    private $login;
    private $password;

    //gather login form data
    public function __construct($login, $password, )
    {
        $this->login = $login;
        $this->password = $password;
    }

    public function loginUser()
    {
        if ($this->emptyImput() == false){
            echo "Empty Input";
            header("location: ../index.php?error=emptyinput");
        }
        $this->getUser($this->login, $this->password);        
    }

    private function emptyImput()
    {
        $result = false;
        if(empty($this->login) || empty($this->password)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;        
    }
}