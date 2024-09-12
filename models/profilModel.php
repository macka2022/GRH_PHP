<?php
require_once('bd.php');
function getProfil()
{
    global $connect;
    $requette = "SELECT * FROM profil";
    $exe = $connect->query($requette);
    return $exe->fetchAll();
}
function ajoutProfil($nomProfil)
{
    global $connect;
    $statement = $connect->prepare("INSERT INTO profil (nomProfil) VALUES (:nom)");
    $statement->bindValue("nom", $nomProfil, PDO::PARAM_STR);
    return $statement->execute();
}
