<?php
require_once("bd.php");

function getUsers()
{
    global $connect;
    $sql = "SELECT * FROM utilisateur,profil where idProfilF=idProfil";
    return $connect->query($sql)->fetchAll();
}

function addUser($prenom, $nom, $tel, $email, $adress, $idProfil, $login, $mdp)
{
    global $connect;
    $state = $connect->prepare("INSERT into utilisateur(prenom,nom,tel,email,mdp,login,adresse,idProfilF) VALUES(:prenom,:nom,:tel,:email,:mdp,:login,:adresse,:idProfilF)");
    $state->bindValue('prenom', $prenom, PDO::PARAM_STR);
    $state->bindValue('nom', $nom, PDO::PARAM_STR);
    $state->bindValue('tel', $tel, PDO::PARAM_STR);
    $state->bindValue('adresse', $adress, PDO::PARAM_STR);
    $state->bindValue('email', $email, PDO::PARAM_STR);
    $state->bindValue('mdp', $mdp, PDO::PARAM_STR);
    $state->bindValue('idProfilF', $idProfil, PDO::PARAM_INT);
    $state->bindValue('login', $login, PDO::PARAM_STR);
    $state->execute();
    return findUserByLogin($login, $mdp);
}

function findUserByLogin($login, $mdp)
{
    global $connect;
    $state = $connect->prepare("SELECT * from utilisateur,profil where login=:log AND mdp=:mdp AND idProfilF=idProfil");
    $state->bindValue('log', $login);
    $state->bindValue('mdp', $mdp);
    $state->execute();
    return $state->fetch();
}

function getCan()
{
    global $connect;
    $sql = "SELECT * FROM utilisateur,profil,candidature where idProfilF=idProfil AND nomProfil='candidat' AND idUserF=idUser";

    return $connect->query($sql)->fetchAll();
}


function updateCV($name, $iduser)
{
    global $connect;
    $req = "UPDATE utilisateur set fichierCV='$name' where idUser=$iduser";
    return $connect->exec($req);
}
function candidatAccepter(){
    global $connect;
    $sql="SELECT * FROM candidature ,utilisateur where etatCandidature=1   and idUserF=idUser ";
    return $connect->query($sql)->fetchAll();
}

function candidatEnAttente(){
    global $connect;
    $sql="SELECT * FROM candidature ,utilisateur where etatCandidature=-1   and idUserF=idUser";
    return $connect->query($sql)->fetchAll();
}

function candidatRefuser(){
    global $connect;
    $sql="SELECT * FROM candidature,utilisateur where etatCandidature=0 and idUserF=idUser";
    return $connect->query($sql)->fetchAll();
}



///////////////////////////////////////////////////////////////////////////
// function updateEtatOffre($id, $etat)
// {
//     global $connect;
//     $req = "UPDATE candidature SET etatCandidature=$etat WHERE idCandidature=$id";
//     return $connect->exec($req);
// }

// function getLastCandidat()
// {
//     global $connect;
//     return $connect->query("SELECT * FROM utilisateur ORDER BY idUser DESC LIMIT 1")->fetch();
// }