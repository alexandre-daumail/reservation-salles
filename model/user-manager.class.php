<?php
require("Dbh.class.php");

class UserManager extends Dbh
{

    //checks if user in database
    protected function getUser($login)
    {
        $stmt = $this->connect()->prepare('SELECT login FROM utilisateurs WHERE login = :login;');

        $getUser = $stmt->execute(array(":login" => $login));
            
        if ($getUser === false){
            throw new Exception("Cet utilisateur n'existe pas", 1);
        }
        return $getUser;         
    }

    //adds the user in the db
    public function addUser($login, $password)
    {
        $addUser = $this->connect()->prepare('INSERT INTO utilisateurs (login, password) VALUES  (:login, :password);');

        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

        $userCreated = $addUser->execute(array(':login' => $login, ':password' => $hashedpassword));        

        return $userCreated;
    }
}
