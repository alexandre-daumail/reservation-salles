<?php
namespace LaPlateforme\ReservationSalles\Model;

require_once("Dbh.class.php");

class Reservation extends Dbh
{
    //is an event already set on the same time slot?
    private function _checkEvent($debut) {

        $stmt = $this->connect()->prepare('SELECT debut FROM reservations WHERE debut = :debut ;');

        if (!$stmt->execute(array(":debut" => $debut))) {
            throw new \Exception("Erreur requête 'checkUser'", 1);
        }

        $resultCheck = false;
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck; 

    }

    public function addEvent($title, $description, $debut, $fin, $id_utilisateur){

        if (!$this->_checkEvent($debut)) {
            throw new \Exception("Créneau horaire déjà pris", 1);
        } else {
            $addEvent = $this->connect()->prepare('INSERT INTO reservations (titre, description, debut, fin, id_utilisateur) VALUES  (:titre, :description, :debut, :fin, :id_utilisateur);');

            $eventCreated = $addEvent->execute(array(
                ':titre' => $title, 
                ':description' => $description,
                ':debut' => $debut,
                ':fin' => $fin,
                ':id_utilisateur' => $id_utilisateur,
            ));

            return $eventCreated;
        }
    }
}

