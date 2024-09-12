<?php
require_once('bd.php');
function getOffre()
{
    global $connect;
    return $connect->query("SELECT * FROM offre")->fetchAll();
}
function ajoutOffre($poste, $description, $competence, $type, $etat)
{
    global $connect;
    $date = date("d-m-Y H:i");
    $numero = "of_" . date("dmYHis");
    $datePub = $etat != 0 ? $date : "";
    /*
    $insert = "INSERT INTO offre (poste,description,dateOffre,competence,numero,etatOffre,type,datePublication) VALUES ('$poste','$description','$date','$competence','$numero',$etat,'$type','$datePub')";
    return $connect->exec($insert);*/
    $statement = $connect->prepare("INSERT INTO offre (poste,description,dateOffre,competence,numero,etatOffre,type,datePublication) VALUES (:poste, :description ,'$date',:competence,'$numero',$etat,'$type','$datePub')");
    $statement->bindValue("poste", $poste, PDO::PARAM_STR);
    $statement->bindValue("description", $description, PDO::PARAM_STR);
    $statement->bindValue("competence", $competence, PDO::PARAM_STR);
    return $statement->execute();
}
function updateEtat($id, $etat)
{
    global $connect;
    $datePub = $etat == 1 ? date("d-m-Y H:i") : "";
    $req = "UPDATE offre SET etatOffre=$etat, datePublication='$datePub' WHERE idOffre=$id";
    return $connect->exec($req);
}
function getOffrePublie()
{
    global $connect;
    $requette = "SELECT * FROM offre WHERE etatOffre=1";
    $exe = $connect->query($requette);
    return $exe->fetchAll();
}
function findOffreById($id)
{
    global $connect;
    $requette = "SELECT * FROM offre WHERE idOffre=$id";
    $exe = $connect->query($requette);
    return $exe->fetch();
}
function deleteOffre($id)
{
    global $connect;
    $requette = "DELETE FROM offre WHERE idOffre=$id";
    $exe = $connect->query($requette);
    return $exe;
}

function addCandidature($idOffre,$idUser){
    global $connect;
    $date=date("d-m-Y H:i");
    $requette="INSERT INTO candidature(idUserF,idOffreF,dateCandidature) VALUES($idUser,$idOffre,'$date') ";
    return $connect->exec($requette);
}
function verifCandidature($idUser,$idOffre){ //Verifier si un candidat a deja postuler à une offre donnée
    global $connect;
    $req="SELECT *  from candidature WHERE idUserF=$idUser AND idOffreF=$idOffre";
    return $connect->query($req)->fetch();
}
function getCandidatureByIdUser($idUser){
    global $connect;
    $req="SELECT *from offre,candidature,utilisateur WHERE idUserF=idUser AND idOffreF=idOffre AND idUser=$idUser";
    return $connect->query($req)->fetchall();
}