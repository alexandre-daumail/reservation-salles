<?php
session_start();
$title = "Planning réservation Studio Son";
require_once('../includes/class-autoload.inc.php');

ob_start();

?>

    <main>


        <?php

        $planning = new Planning;

        $res = $planning->getReservation();


        ?>

        <table>

            <thead>

                <tr>
                    
                    <?php
                        
                        if (isset($_GET['week'])) {

                            $week = $_GET['week'];

                            echo "<th><a href='planning.html.php?week=" . ($week - 1) . "'><img src='../public/images/prev.png' alt='logo lien semaine précédente'></a></th>";

                            echo "<th colspan='4'><h1>Bienvenue";
                            
                            echo isset($_SESSION["login"]) ? " " . $_SESSION["login"] : "";
                            
                            echo ", voici le planning de la semaine :</h1></th>";
                            
                            echo "<th><a href='planning.html.php?week=" . ($week + 1) . "'><img src='../public/images/next.png' alt='logo lien semaine suivante'></a></th>";
                        } 
                        
                        else {

                            echo "<th id='prev'><a href='planning.html.php?week=-1'><img src='../public/images/prev.png' alt='logo lien semaine précédente'></a></th>";

                            echo "<th colspan='4'><h1>Bienvenue";
                            
                            echo isset($_SESSION["login"]) ? " " . $_SESSION["login"] : "";
                            
                            echo ", voici le planning de la semaine en cours :</h1></th>";

                            echo "<th><a href='planning.html.php?week=1'><img src='../public/images/next.png' alt='logo lien semaine suivante'></a></th>";
                        }               
            
                    ?>

                </tr>

                <tr>
                    <!-- JOURS DE LA SEMAINE -->
                    <th></th>

                    <?php
                    if (isset($_GET['week'])) {
                        $date = new DateTime("mon this week $week weeks");
                        echo "<th>Lundi<br>" . date("d/m/Y", $date->getTimeStamp()) . "</th>";
                        $date = new DateTime("tue this week $week weeks");
                        echo "<th>Mardi<br>" . date("d/m/Y", $date->getTimeStamp()) . "</th>";
                        $date = new DateTime("wed this week $week weeks");
                        echo "<th>Mercredi<br>" . date("d/m/Y", $date->getTimeStamp()) . "</th>";
                        $date = new DateTime("thu this week $week weeks");
                        echo "<th>Jeudi<br>" . date("d/m/Y", $date->getTimeStamp()) . "</th>";
                        $date = new DateTime("fri this week $week weeks");
                        echo "<th>Vendredi<br>" . date("d/m/Y", $date->getTimeStamp()) . "</th>";
                    } else {
                        $week = 0;
                        $date = new DateTime("mon this week $week weeks");
                        echo "<th>Lundi<br>" . date("d/m/Y", $date->getTimeStamp()) . "</th>";
                        $date = new DateTime("tue this week $week weeks");
                        echo "<th>Mardi<br>" . date("d/m/Y", $date->getTimeStamp()) . "</th>";
                        $date = new DateTime("wed this week $week weeks");
                        echo "<th>Mercredi<br>" . date("d/m/Y", $date->getTimeStamp()) . "</th>";
                        $date = new DateTime("thu this week $week weeks");
                        echo "<th>Jeudi<br>" . date("d/m/Y", $date->getTimeStamp()) . "</th>";
                        $date = new DateTime("fri this week $week weeks");
                        echo "<th>Vendredi<br>" . date("d/m/Y", $date->getTimeStamp()) . "</th>";
                    } ?>

                </tr>

            </thead>

            <tbody>
                <!-- CRENEAUX HORAIRES -->
                <?php

                // $h pr les horaires, $c pour les cases. 
                for ($h = 8; $h < 19; $h++) {

                    echo "<tr><td>" . $h . "H00  " . ($h + 1) . "H00</td>";

                    for ($c = 1; $c <= 5; $c++) {

                        echo "<td>";

                        foreach ($res as $value) {

                            // Convertir la date du début en timestamp.
                            $date_debut = strtotime($value['debut']);

                            // Récupère le jour et l'heure avc date().
                            $day_debut = date('N', $date_debut);
                            $heure_debut = date('H', $date_debut);

                            // Convertir la date de fin en timestamp.
                            $date_fin = strtotime($value['fin']);

                            // Récupère le jour et l'heure avc date().
                            $day_fin = date('N', $date_fin);
                            $heure_fin = date('H', $date_fin);

                            // Covertir l'heure au format int
                            $heure_debut = intval($heure_debut);
                            $heure_fin = intval($heure_fin);

                            // Var pour récupérer l'id de la réservation.
                            $id_res = $value['id'];

                            // Condition pour pouvoir placer un rdv
                            if ($day_debut == $c && $heure_debut == $h) {

                                echo "<a class='lien-reserv' href='reservation.html.php?id=$id_res'>" . $value['titre'] . " par " . $value['login'] . "</a>";
                            }
                            // Condition pour placer plusieus rdv 
                            elseif ($day_debut == $c && $heure_fin > $h && $heure_debut < $h) {

                                echo "<a class='lien-reserv' href='reservation.html.php?id=$id_res'>" . $value['titre'] . " par " . $value['login'] . "</a>";
                            }
                        }
                        echo "</td>";
                    }
                    echo "</tr>";
                }
                
                ?>

            </tbody>

        </table>
        
    </main>

<?php
$content = ob_get_clean();
require('template.php');
?>