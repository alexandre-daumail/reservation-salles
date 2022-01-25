<?php
require("Dbh.class.php");

class User extends Dbh
{
    //returns bool if login checked is in DB 
    private function _checkUser($login)
    {
        $stmt = $this->connect()->prepare('SELECT login FROM utilisateurs WHERE login = :login ;');

        if (!$stmt->execute(array(":login" => $login))) {
            throw new Exception("Erreur requête 'checkUser'", 1);
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
    public function addUser($login, $password)
    {
        if (!$this->_checkUser($login)) {
            throw new Exception("Pseudo pris", 1);
        } else {
            $addUser = $this->connect()->prepare('INSERT INTO utilisateurs (login, password) VALUES  (:login, :password);');

            $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

            $userCreated = $addUser->execute(array(':login' => $login, ':password' => $hashedpassword));

            return $userCreated;
        }
    }

    private function _checkPwd($login, $password)
    {
        $getPwd = $this->connect()->prepare('SELECT password FROM utilisateurs WHERE login = :login ;');

        if (!$getPwd->execute(array(':login' => $login))) {
            throw new Exception("Echec de connexion, contacter un admin", 1);
        }

        if ($getPwd->rowCount() == 0) {
            throw new Exception("Login ou mot de passe incorrect", 1);
        }

        $passwordHashed = $getPwd->fetchAll(PDO::FETCH_ASSOC);
        $checkpassword = password_verify($password, $passwordHashed[0]["password"]);

        return $checkpassword;
    }

    //starts a session with the user's information
    public function loginUser($login, $password)
    {
        $checkpassword = $this->_checkPwd($login, $password);

        if ($checkpassword == false) {
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        } elseif ($checkpassword == true) {
            $stmt = $this->connect()->prepare('SELECT id FROM utilisateurs WHERE login = ?;');

            if (!$stmt->execute(array($login))) {
                $stmt = null;
                header("location: ../index?error=stmtfailed");
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $_SESSION["login"] = $login;
            $_SESSION["id"] = $user[0]["id"];
        }

        $stmt = null;
    }

    //Gets User infos
    public function modifyLogin()
    {
    }

    //deletes and disconnects user
    public function delete()
    {
        $id = $_SESSION["id"];
        $stmt = $this->connect()->prepare('DELETE FROM `utilisateurs` WHERE `utilisateurs`.`id` = :id ');

        if (!$stmt->execute(array(':id' => $id))) {
            throw new Exception("Impossible de supprimer l'utilisateur", 1);
        }

        session_unset();
        session_destroy();

        header("location: ../index.php");
    }
}
