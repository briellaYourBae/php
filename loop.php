<?php
    for ($i=0; $i <=10 ; $i++) { 
        echo $i;
    }

    echo"<br>";

    $hobi = ["NgeGame","bersepeda","berenag"];

    foreach ($hobi as $key) {
        echo $key.", ";
    }
    echo"<br>";

    for ($i=0; $i < count($hobi) ; $i++) { 
        echo $hobi[$i] ."<br>";
    }
?>