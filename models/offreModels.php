<?php
require_once("bd.php");

function getoffre()
{
    global $connect;
    $sql = "SELECT * FROM offre";
    $EXC = $connect->query($sql);
    return $EXC->fetchAll();
}
function addOffre($nomPoste, $description, $competence, $type, $etat)
{
    global $connect;
    $numero = "off_" . date("dmYHis");
    $dateOffre = date("d-m-Y H:i");
    $datePublication = $etat != 0 ? $dateOffre : "";
    /*  $sql = "INSERT into offre(poste,description,dateOffre,competence,typeOffre,datePublication,numero,etatOffre) values('$nomPoste','$description','$dateOffre','$competence','$type','$datePublication','$numero','$etat')";
    return $connect->exec($sql);*/
    $state = $connect->prepare("INSERT into offre(poste,description,date,competence,type,datePublication,numero,etatOffre) values(:Poste,:description,'$dateOffre',:competence,'$type','$datePublication','$numero','$etat')");
    $state->bindValue("Poste", $nomPoste, PDO::PARAM_STR);
    $state->bindValue("description", $description, PDO::PARAM_STR);
    $state->bindValue("competence", $competence, PDO::PARAM_STR);
    return $state->execute();
}
function updateEtat($idOffre, $etat)
{
    global $connect;
    $date = date("d-m-Y H:i");
    $datePublication = $etat != 0 ? $date : "";
    $rqt = "UPDATE offre set etatOffre = $etat, datePublication = '$datePublication' where idOffre = $idOffre";
    return $connect->exec($rqt);
}
function getoffrePub()
{
    global $connect;
    $sql = "SELECT * FROM offre where etatOffre=1";
    $EXC = $connect->query($sql);
    return $EXC->fetchAll();
}
function findOffreById($id)
{
    global $connect;
    $sql = "SELECT * FROM offre where idOffre=$id";
    $EXC = $connect->query($sql);
    return $EXC->fetch();
}
function getoffrePostuler()
{
    global $connect;
    $sql = "SELECT * ,count(idCandidature) as nb FROM offre,candidature where idOffreF=idOffre group by idOffre";
    return $connect->query($sql)->fetchAll();
}
function addCandidature($idOffre, $idUser)
{
    global $connect;
    $dte = date("d-m-Y H:i");
    $sql = "INSERT into candidature(idOffreF,idUserF,dateCandidature) VALUES($idOffre,$idUser,'$dte')";
    return $connect->exec($sql);
}

function getCandidatByOffre($idOffre)
{
    global $connect;
    $sql = "SELECT * FROM offre,candidature , utilisateur where idOffreF=idOffre and idUser=idUserF AND idOffreF=$idOffre";
    return $connect->query($sql)->fetchAll();
}

function verifyCandidature($idUser, $idOffre)
{
    global $connect;
    $sql = "SELECT * FROM candidature where idUserF=$idUser AND idOffreF=$idOffre";
    return $connect->query($sql)->fetch();
}

function getCandidatureByUserId($idUser)
{
    global $connect;
    $sql = "SELECT * FROM offre,utilisateur,candidature where idOffreF=idOffre AND idUserF=idUser AND idUser=$idUser";
    return $connect->query($sql)->fetchAll();
}

function updateOff($idOffre,$nomPoste, $description, $competence, $type){
    global $connect;
    $state=$connect->prepare("UPDATE offre SET poste = :nomPoste,description= :description,competence= :competence,typeOffre= :type WHERE idOffre=$idOffre");
    // return $connect->query($sql)->fetch();
    $state->bindParam(':poste', $$nomPoste, PDO::PARAM_STR);
    $state->bindValue(":description", $description, PDO::PARAM_STR);
    $state->bindValue(":competence", $competence, PDO::PARAM_STR);
    $state->bindValue(":typeOffre", $type, PDO::PARAM_STR);
    return $state->execute();

}
function updateEtat1($etatC,$idOffre,$idCan){
    global $connect;
    $sql="UPDATE candidature SET etatCandidature=$etatC where idCandidature=$idCan and idOffreF=$idOffre";
    return $connect->exec($sql);
}

////////////////////////////////////////////////////////////////////
function getListeCandidatByOffreAndEtat($idOffre, $etat)
{
    global $connect;
    $req = "SELECT * from utilisateur,candidature WHERE idUserF=idUser AND idOffreF=$idOffre AND etatCandidature=$etat";
    return $connect->query($req)->fetchAll();
}///////////////////////////////////////////////////////////////////////////

function findCandidatureById($id){
    global $connect;
    $req="SELECT * FROM utilisateur  , offre , candidature where  idOffeF=idOffre and idUserF=idUser and idCandidature=$id";
    return $connect->query($sql)->fetch();
}