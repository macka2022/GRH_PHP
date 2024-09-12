<?php
    require_once('../../models/offreModel.php');
    $action = isset($_GET['action']) ? $_GET['action'] : "";
    if ($action != "") {
        if ($action == "list") {
            $offres = getOffre();
            echo json_encode($offres);
        }
        if($action=="findId"){
            $id=$_GET['id'];
            $offre=findOffreById($id);
            if($offre){
                echo json_encode($offre);
            }else{
                echo json_encode("0");
            }
        }
    }
?>