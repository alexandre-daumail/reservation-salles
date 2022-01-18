<?php
require("Dbh.class.php");

class UserManager extends Dbh
{

    //gather form data
    public function __construct(public string $login, private string $password, private string $pwdrepeat){}

    //checks if user in database
    protected function checkUser($login)
    {
        $stmt = $this->connect()->prepare('SELECT login FROM utilisateurs WHERE login = :login;');

        if (!$stmt->execute(array(":login" => $login))) {
            $stmt = null;
            throw new Exception("Impossible d'executer la requête checkUser, contacter l'admin.", 1);
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
        $addUser = $this->dbh->prepare('INSERT INTO utilisateurs (login, password) VALUES  (:login, :password);');

        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

        $userCreated = $addUser->execute(array(':login' => $login, ':password' => $hashedpassword));        

        return $userCreated;
    }
}
