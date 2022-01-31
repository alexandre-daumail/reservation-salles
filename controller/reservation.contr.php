<?php

require_once('./model/reservation.class.php');

//enter reservation-form data in reservations table
function setReservation ($title, $description, $startDate, $startTime){

    if (empty($title) || empty($description) || empty($startDate) || empty($startTime)) {
        throw new Exception("Veuillez remplir tous les camps", 1);
    }

    if (!preg_match("/^[a-z0-9 .\-]+$/i", $title)) {
        throw new Exception("Titre incorrect", 1);
    }

    if (!preg_match("/^[a-z0-9 .\-]+$/i", $description)) {
        throw new Exception("Titre incorrect", 1);
    }

    //$debut is a string var defining the start time of the reservation from the user
    $debut = date('Y-m-d H:i:s', strtotime( $startDate . " " . $startTime . ":00:00.0000"));

    $fin = date('Y-m-d H:i:s', strtotime( $debut . "+1 hours" ));

    $id_utilisateur = $_SESSION ["id"];

    //check if $event is before current time
    if ($debut < date('Y-m-d H:i:s',time())){
        throw new Exception("Vous devez choisir un créneau horaire ultérieur", 1);        
    }else{

        //proccess the info given by the user to create a reservation of his event
        $reservation = new LaPlateforme\ReservationSalles\Model\Reservation ();

        $eventCreated = $reservation->addEvent($title, $description, $debut, $fin, $id_utilisateur);
    }

    if ($eventCreated === false) {
        throw new Exception("Impossible de créer la réservation", 1);
    }
}