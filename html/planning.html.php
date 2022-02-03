<?php
session_start();
$title = "Planning réservation Studio Son";
ob_start();

?>

<main>
    <h1>Bienvenue<?php if (isset($_SESSION["login"])){echo " " . $_SESSION["login"];}?>, voici le planning de la semaine :</h1>
    
</main>

<?php
$content = ob_get_clean();
require('template.php');
?>