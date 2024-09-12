<?php
require_once('bd.php');

function getprofil()
{
    global $connect;
    $sql = "SELECT * FROM profil";
    $EXC = $connect->query($sql);
    return $EXC->fetchAll();
}

function addProfil($nomProfil)
{
    global $connect;
    $sql = "INSERT into profil(nomProfil) values(:nomProfil)";
    $state = $connect->prepare($sql);
    $state->bindValue("nomProfil", $nomProfil, PDO::PARAM_STR);
    return $state->execute();
}
