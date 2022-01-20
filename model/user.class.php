<?php
require("Dbh.class.php");

class User extends Dbh
{

    //checks if user in database
    protected function getUser($login)
    {
        $stmt = $this->connect()->prepare('SELECT login FROM utilisateurs WHERE login = :login;');

        $getUser = $stmt->execute(array(":login" => $login));

        return $getUser;
    }

    //adds the user in the db
    public function addUser($login, $password)
    {
        $this->getUser($login);

        if (!isset($getUser)) {

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
            throw new Exception("Aucun mdp enregistré", 1);
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
        }
        
    }

    public function getAllInfos()
  {
    $id = $_SESSION["id"];
    $query = "SELECT login, email, firstname, lastname FROM `utilisateurs` WHERE id='$id'";
    $result = mysqli_query($this->conn, $query);
    $user = mysqli_fetch_assoc($result);

    //Tableau avec les infos user:
    echo '<table border = 1><thead>';
    foreach ($user as $key => $value) {
      echo '<th>' . $key . '</th>';
    }
    echo '</thead><tbody><tr>';
    foreach ($user as $key => $value) {
      echo "<td>" . $value . "</td>";
    }
    echo '</tbody></table>';
  }

}
