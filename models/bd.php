<?php
   $serveur ="localhost";
    $user="root";
    $nombd="glese";
    $mdp="";

    try {
        $connect=new PDO("mysql:host=$serveur;dbname=$nombd",$user,$mdp,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        
    } catch (PDOException $EXC) {
        echo "Erreur de connexion ".$EXC->getMessage();
        die;
    }

?>


