<?php
require("Dbh.class.php");

class UserManager extends Dbh
{

    //checks if user in database
    protected function checkUser($login)
    {
        $stmt = $this->connect()->prepare('SELECT login FROM utilisateurs WHERE login = :login;');

        if (!$stmt->execute(array(":login" => $login))) {
            $stmt = null;
            throw new Exception("Impossible d'executer la requête!", 1);
        }

        $resultCheck = false;
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }

    //adds the user in the db
    protected function setUser($login, $password)
    {
        $stmt = $this->connect()->prepare('INSERT INTO utilisateurs (login, password) VALUES  (:login, :password);');

        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array(':login' => $login, ':password' => $hashedpassword))) {
            $stmt = null;
            header("location: ../index?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }
}
