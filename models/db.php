<?php

$nomBD="glese";
$user="root";
$server="localhost";
$motDePasse="";

try{
    // [PDO::ATTR_ERRMODE => ERRMODE_EXCEPTION] pour expliciter les futur erreurs lors de l'execution des requetes
    $connect= new PDO("mysql:host=$server;bdname=$nomBD",$user,$motDePasse,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    echo "success";
   
} catch(PDOException $ex){
    echo "erreur connexion".$ex->getMessage();
    die;
   

}


?>