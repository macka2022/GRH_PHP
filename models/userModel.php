<?php
require_once('bd.php');
function getUsers()
{
    global $connect;
    return $connect->query("SELECT * FROM utilisateur,profil WHERE idProfilF=idProfil AND nomProfil!='candidat'")->fetchAll();
}
function ajoutUser($prenom, $nom, $tel, $email, $adresse, $login, $mdp, $idProfil)
{
    global $connect;
    $statement = $connect->prepare("INSERT INTO utilisateur (prenom,nom,tel,email,adresse,login,mdp,idProfilF) VALUES (:prenom, :nom ,:tel,:email,:adresse,:login,:mdp,:idProfil)");
    $statement->bindValue("prenom", $prenom, PDO::PARAM_STR);
    $statement->bindValue("nom", $nom, PDO::PARAM_STR);
    $statement->bindValue("tel", $tel, PDO::PARAM_STR);
    $statement->bindValue("email", $email, PDO::PARAM_STR);
    $statement->bindValue("adresse", $adresse, PDO::PARAM_STR);
    $statement->bindValue("login", $login, PDO::PARAM_STR);
    $statement->bindValue("mdp", $mdp, PDO::PARAM_STR);
    $statement->bindValue("idProfil", $idProfil, PDO::PARAM_INT);
    return $statement->execute();
}
function getCandidats()
{
    global $connect;
    return $connect->query("SELECT * FROM utilisateur,profil,candidature WHERE idProfilF=idProfil  AND lower(nomProfil)='candidat' AND idUserF=idUser")->fetchAll();
}
function verifConn($login,$mdp){
    global $connect;
    $statement=$connect->prepare("SELECT * FROM utilisateur,profil WHERE login=:login AND mdp=:mdp AND idProfilF=idProfil ");
    $statement->bindValue("login",$login,PDO::PARAM_STR);
    $statement->bindValue("mdp",$mdp,PDO::PARAM_STR);
    $statement->execute();
    return $statement->fetch();
}


///////////////////////////////////////////////////////////////////////

?>