<?php
require("Dbh.class.php");

class User extends Dbh
{

    //returns bool if login checked is in DB 
    protected function userExists($login)
    {
        $stmt = $this->connect()->prepare('SELECT login FROM utilisateurs WHERE login = :login;');

        $userExists = $stmt->execute(array(":login" => $login));

        return $userExists;
    }

    //adds the user in the db
    public function addUser($login, $password)
    {
        $this->userExists($login);

        if ($this->getUser !== true) {

            $addUser = $this->connect()->prepare('INSERT INTO utilisateurs (login, password) VALUES  (:login, :password);');

            $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

            $userCreated = $addUser->execute(array(':login' => $login, ':password' => $hashedpassword));

            return $userCreated;
        } else {
            throw new Exception("Impossible de créer l'utilisateur", 1);
        }
    }

    //starts a session with the user's information
    public function loginUser($login, $password)
    {
        $getPwd = $this->connect()->prepare('SELECT password FROM utilisateurs WHERE login = :login ;');

        if (!$getPwd->execute(array(':login' => $login))) {
            throw new Exception("Login incorrect", 1);
        }

        if ($getPwd->rowCount() == 0) {
            throw new Exception("Login ou mot de passe incorrect", 1);
        }

        $passwordHashed = $getPwd->fetchAll(PDO::FETCH_ASSOC);
        $checkpassword = password_verify($password, $passwordHashed[0]["password"]);

        if ($checkpassword === false) {
            throw new Exception("Mot de passe incorrect", 1);
        } elseif ($checkpassword === true) {
            $stmt = $this->connect()->prepare('SELECT * FROM utilisateurs WHERE login = :login AND password = :password ;');

            if (!$stmt->execute(array(':login' => $login, ':password' => $passwordHashed[0]["password"]))) {
                throw new Exception("Mot de passe ou login incorrect", 1);
            }

            if ($stmt->rowCount() == 0) {
                throw new Exception("Utilisateur inconnu", 1);
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $_SESSION["login"] = $user[0]["login"];
            $_SESSION["id"] = $user[0]["id"];
        }
    }

    //Gets User infos
    public function modifyUser()
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
