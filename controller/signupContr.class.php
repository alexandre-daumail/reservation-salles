<?php
require_once('./model/user-manager.class.php');

class SignupContr extends UserManager{

    public function __construct(public string $login, private string $password, private string $pwdrepeat){}    

    public function signupUser()
    {
        if ($this->emptyImput() == false){
            echo "Empty Input";
            header("location: ../inscription.php?error=emptyinput");
        }
         if ($this->invalidlogin() == false){
            echo "Empty Input";
            header("location: ../inscription.php?error=invalidlogin");
        }
         if ($this->loginTakenCheck() == false){
            echo "Empty Input";
            header("location: ../inscription.php?error=usertaken");
        }

        $this->setUser($this->login, $this->password);
        
    }

    private function emptyImput()
    {
        $result = false;
        if(empty($this->login) || empty($this->password) || empty($this->pwdrepeat)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
        
    }

    private function invalidlogin()
    {
        $result = false;
       if (!preg_match("/^[a-zA-Z0-9]*$/", $this->login)){
           $result = false;
       }
       else{
           $result = true;
       }
       return $result;
    }

    private function pwdMatch()
    {
        $result = false;
       if ($this->password !== $this->pwdrepeat){
           $result = false;
       }
       else{
           $result = true;
       }
       return $result;
    }



    private function loginTakenCheck()
    {
        $result = false;
       if (!$this->setUser($this->login, $this->password)){
           $result = false;
       }
       else{
           $result = true;
       }
       return $result;
    }
}