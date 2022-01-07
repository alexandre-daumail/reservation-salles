<?php 

class Login extends Dbh {

    protected function getUser ($login, $password)
    {
        $stmt = $this->connexion()->prepare('SELECT password FROM utilisateurs WHERE login = ?;');

          if (!$stmt->execute(array($login))){
            $stmt = null;
            header("location: ../index?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0){
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $passwordHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkpassword = password_verify($password, $passwordHashed[0]["password"]);

        if ($checkpassword == false){
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        }
        elseif($checkpassword == true) {
            $stmt = $this->connexion()->prepare('SELECT * FROM utilisateurs WHERE login = :login AND password = :password;');

            if (!$stmt->execute(array(':login'=>$login, ':password'=>$passwordHashed[0]["password"]))){
                $stmt = null;
                header("location: ../index?error=stmtfailed");
                exit();
            }

            if ($stmt->rowCount() == 0){
                $stmt = null;
                header("location: ../index.php?error=qmlskdmqlskdmlqksdmlk");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["id"] = $user[0]["id"];
            $_SESSION["login"] = $user[0]["login"];
    
        }

        $stmt = null;
        
    }
}