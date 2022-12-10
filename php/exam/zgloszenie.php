<?php
    $link = new mysqli('localhost', 'root', '', '4eG_1');
    if(isset($_POST['submit'])){
        if(!empty($_POST['fish']) && !empty($_POST['date']) && !empty($_POST['judge'])){
            $fish=$_POST['fish'];
            $date=$_POST['date'];
            $judge=$_POST['judge'];
            $sql = "insert into zawody_wedkarskie(lowisko_id, data_zawodow, sedzia, karty_wedkarskie_id) values ($fish, '$date', '$judge',0);";
            if($link->query($sql)){
                echo "dodano cos tam";
            }
            else {
                echo "błąd";
            }
        }
        else{
            echo "Uzupełnij pola!";
        }
    }
    $link -> close();
?>