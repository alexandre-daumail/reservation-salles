<?php
include 'class-autoload.inc.php';

if (isset($_POST["update"])) {
  $user1 = new User();
  $user1->update($_POST["login"], $_POST["password"], $_POST["email"], $_POST["firstname"], $_POST["lastname"]);
}
