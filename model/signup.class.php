<?php 

class Signup extends Dbh {

    protected function setUser ($login, $password)
    {
        $stmt = $this->connexion()->prepare('INSERT INTO utilisateurs (login, password) VALUES  (:login, :password);');

        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
        
        if (!$stmt->execute(array(':login'=>$login, ':password'=>$hashedpassword))){
            $stmt = null;
            header("location: ../index?error=stmtfailed");
            exit();
        }

        $stmt = null;
        
    }

    //vérifie si l'utilisateur existe dans la BDD quand on s'inscrit en retrounant true ou false.
    protected function checkUser ($login)
    {
        $stmt = $this->connexion()->prepare('SELECT login FROM utilisateurs WHERE login = :login;');
        
        if (!$stmt->execute(array(":login"=>$login))){
            $stmt = null;
            header("location: ../index?error=stmtfailed");
            exit();
        }

        $resultCheck = false;
        if ($stmt->rowCount() > 0){
            $resultCheck = false;
        }
        else {
            $resultCheck = true;
        }
        return $resultCheck;
        
    }
}