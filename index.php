<?php
$title = "Page d'Accueil";

include 'header.php';
?>
<main>

<?php
  if (isset($_SESSION["login"])) {
    echo "<p>Bonjour à  toi " . $_SESSION["login"] . " !</p>";
  }
?>

</main>

<?php
require_once 'footer.php';

?>