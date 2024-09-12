<?php
require_once('../../models/userModel.php');
$action = isset($_GET['action']) ? $_GET['action'] : "";
if ($action != "") {

    if ($action == "findLogin") {
        $login = $_GET['login'];
        $motp=$_GET['mdp'];
        $user = findUserByLogin($login,$motp);
        if ($user) {
            echo json_encode($user);
        } else {
            echo json_encode("0");
        }
    }
}
