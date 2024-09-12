<?php
session_start();
ob_start();
include_once("shared/header.php");
include_once("shared/topbar.php");
include_once("shared/sidebar.php");

require_once("models/offreModels.php");
require_once("models/profilModels.php");
////////////////////////////
require_once('fpdf185/fpdf.php');
//////////////////////////////////////
require_once("models/userModels.php");
////////////////////////////////////
use PDF as GlobalPDF;
ob_start();

ini_set("SMTP","localhost");
ini_set("smtp_port","25");

define('FPDF_FONTPATH', 'fpdf185/font');
////////////////////////////////////////////////////

$listeUsers = getUsers();
if (isset($_POST['addUsers'])) {
    extract($_POST);
    $resultat = addUser($prenom, $nom, $tel, $email, $adress, $idProfil, $login, $mdp);
    if ($resultat != false) {
        header("location:http://localhost/glese/?page=gestionEmploye");
    }
}

//////////////////////////////////////////////////////////////////////////////////////////////////
//if (isset($_GET['idOffrePdf'], $_GET['etat'])) {
    if (isset($_GET['idOffrePdf'], $_GET['etat'])) {
    extract($_GET);
    //$donne = getListeCandidatByOffreAndEtat($idOffrePdf, $etat);
    $donne= candidatEnAttente();

    class PDF extends FPDF {
        function titre(){
            $this->SetFont('Arial', 'B', 16);
            $this->Cell(80);
            // titre
            $this->Cell(50, 10,'GLESE', 1, 0, 'C');
            // Line break
            $this->Ln(20);
        }
        
        function genere($entete, $donne){
            $this->SetFont('Arial', '', 11);
            $this->Cell(80);
            
            $this->Cell(50, 10,'Liste des candidats', 0, 0, 'C');
            $this->Ln();
            $this->Ln();
            
            foreach ($entete as $key) {
                $this->Cell(36, 8, $key, 1, 0, 'C');
            }
            $this->Ln();
            
            $i = 1;
            foreach ($donne as $key) {
                $this->Cell(36, 8, $i, 1, 0, 'C');
                $this->Cell(36, 8, $key['prenom'], 1, 0, 'C');
                $this->Cell(36, 8, $key['nom'], 1, 0, 'C');
                $this->Cell(36, 8, $key['tel'], 1, 0, 'C');
                $this->Cell(36, 8, $key['email'], 1, 0, 'C');
                
                $this->Ln();

                $i++;
            }
            $this->Ln();
        }
    }

    $pdf = NEW PDF();
    $entete = array("#", "Prenom", "Nom", "Email", "Telephone");
    $pdf -> SetFont('Arial', 'B', 10);
    $pdf -> AddPage();
    $pdf -> titre();
    $pdf -> genere($entete, $donne);
    $date = date("d-m-y");
    $name = 'C:\xampp/htdocs\glese\public\documents\LISTE DES CANDIDATS ' . $date . '.pdf';
    $pdf -> Output('F', $name);

    header("location:http://localhost/glese/public/documents/LISTE DES CANDIDATS $date.pdf");

}
/////////////////////////////////////////////////////////////////////////////////////////



$listeCandidat = getCan();
$listeOffre = getoffre();
$listeOffrePub = getoffrePub();
$offreDetail = isset($_GET['idOffre']) ? findOffreById($_GET['idOffre']) : null;
$listeOffrePostuler = getoffrePostuler();
$offreDetail = isset($_GET['idOffre']) ? findOffreById($_GET['idOffre']) : null;

//A Rectifier apres n'oublie if (!(empty($_SESSION))) {
//     $listeCandidature = getCandidatureByUserId($_SESSION['user']['idUser']);
//     $candidature = $offreDetail != null ? verifyCandidature($_SESSION['user']['idUser'], $_GET['idOffre']) : 0;
// }

// mettre a jour le cv
if (isset($_POST['majCV'])) {
    extract($_POST);
    $fileName = "CV_" . $_SESSION['user']['idUser'] . ".pdf";
    if (move_uploaded_file($_FILES['cv']['tmp_name'], "public/documents/$fileName")) {
        updateCV($fileName, $_SESSION['user']['idUser']);
        header("location:http://localhost/glese/?page=listeOffre");
    }
}



if ($offreDetail != null) {
    $listeCandidatPost = getCandidatByOffre($offreDetail['idOffre']);
}

$listeProfiles = getprofil();
if (isset($_POST['addProfil'])) {
    extract($_POST);
    $resultat = addProfil($nom);
    if ($resultat == 1) {
        header("location:http://localhost/glese/?page=gestionProfiles");
    }
}

if (isset($_POST['addOff'])) {
    extract($_POST);
    $publier = isset($etat) ? 1 : 0;
    $resultat = addOffre($poste, $description, $competence, $type, $publier);
    if ($resultat == 1) {
        header("location:http://localhost/glese/?page=gestionOffre");
    }
}

if (isset($_GET['id'], $_GET['idO'],$_GET['etatC'])) {
        extract($_GET);
    updateEtat1($etatC,$idO, $id);
   $info=findCandidatureByid($id);

    
   // $liste=getCandidatureByUserId($id);
    
   // $liste = getCandidatureByUserId($idUser);
      // $liste=getCandidatByOffre($idO);
    //
    // *** à Email ***

    
// Recipient email address
// $to = 'amadoumackadiallo375@gmail.com';

// // Subject of the email
// $subject = 'Test Email';

// // Message
// $message = 'This is a test email sent from a PHP script.';

// // Additional headers
// $headers = 'From: amadoumackadiallo@gmail.com' . "\r\n" .
//        'Reply-To: amadoumackadiallo@gmail.com' . "\r\n" .
//     'X-Mailer: PHP/' . phpversion();

// // Send the email
// if (mail($to, $subject, $message, $headers)) {
//     $succ= 'Email sent successfully!';
// } else {
//     $error='Error: Email was not sent.';
// }


    //////////////////////////////////////////////////////////////////////////////////////////////////////
    $to = $liste['email'];
    
    //
    // *** objet du Email ***
    
    $subject = 'DEMANDE EMPLOI';
    //
    // *** le message de l'Email ***
    $content = $etatC == 1 ? "Votre demande à été accepter!" : "Votre demande à été refuser!";
    //
    //*** de Email ***
    $headers = "From:amadoumackadiallo375@gmail.com\r\n";
    //
    //*** On affiche le résultat... ***
    mail($to, $subject, $content, $headers);
    
    header("location:http://localhost/glese/?page=infoOffre&idOffre=$idO");
}


if (isset($_POST['addCandidat'])) {
    extract($_POST);
    $resultat = addUser($prenom, $nom, $tel, $email, $adresse, $idProfil, $login, $mdp);
    if ($resultat != false) {

        $fileName = "CV_" . $resultat['idUser'] . ".pdf";
        if (move_uploaded_file($_FILES['cv']['tmp_name'], "public/documents/$fileName")) {
            updateCV($fileName, $resultat['idUser']);
            header("location:http://localhost/glese/?page=connexion");
        }
    }
}

 $listeCandidatAccepter= candidatAccepter();
 $listeCandidatRefuser= candidatRefuser();
$listeCandidatAttente= candidatEnAttente();


///////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_GET['id'])) {
    extract($_GET);
    if (isset($_GET['filterEtatCandidature'])) {
        $etat = intval($_GET['filterEtatCandidature']);
        $listeCandidatOffre = getListeCandidatByOffreAndEtat($id,$etat);
    } else {
        $listeCandidatOffre = getListeCandidatByOffreAndEtat($id,-1);
    }
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['postuler'])) {

    if (empty($_SESSION)) {
        header("location:http://localhost/glese/?page=connexion");
    } else {

        extract($_POST);
        $resultat = addCandidature($idOffre, $_SESSION['user']['idUser']);
        if ($resultat == 1) {
            header("location:http://localhost/glese/?page=detailOffre&idOffre=$idOffre");
        }
    }
}

// enregistrer les modifications des offres
if (isset($_POST['save'])) {
    extract($_POST);
    // $publier = isset($_POST['etat']) ? 1 : 0;
    $resultat = updateOff($idOffre, $poste, $description, $competence, $type);
    if ($resultat == 1) {
        header("location:http://localhost/glese/?page=detailOffre&idOffre=$idOffre");
    }
}

if (isset($_GET['idOffre'], $_GET['etat'])) {
    extract($_GET);
    if (updateEtat($idOffre, $etat) == 1) {
        header("location:http://localhost/glese/?page=gestionOffre");
    }
}


if (isset($_GET['id'], $_GET['etatC'],$_GET['idO'])) {
    extract($_GET);
    var_dump(updateEtat1($id,$etatC,$idO));
    if (updateEtat1($id, $etatC,$idO) == 1) {
       header("location:http://localhost/glese/?page=infoOffre&idOffre=$id");
    }
}


if (isset($_POST['connexion'])) {
    extract($_POST);
    $user = findUserByLogin($login, $mdp);
    if ($user) {
        $_SESSION['user'] = $user;
        header("location:http://localhost/glese");
    } else {
        $errorText = "LOGIN OU MOT DE PASSE INCORRECT";
    }
}

if (isset($_GET['deconnexion'])) {
    session_destroy();
    $_SESSION = [];
    header("location:http://localhost/glese/?page=connexion");
}


// if (isset($_POST['ac']) || isset($_POST['ref'])) {
//     extract($_POST);
//     extract($_GET);
//     $i = $_GET['id'];
//     if (isset($_POST['ac'])) {
//         updateEtatOffre($idC, 1);
//         header(("location:http://localhost/glese/?id=$i&page=infoOffre"));
//     }
//     if (isset($_POST['ref'])) {
//         updateEtatOffre($idC, 0);
//         header(("location:http://localhost/glese/?id=$i&page=infoOffre"));
//     }
//}

$vue = isset($_GET['page']) ? $_GET['page'] : "accueil";
if ($vue != "") {
    if (file_exists("pages/$vue.php")) {
        include("pages/$vue.php");
    } else {
        include("pages/erreur.php");
    }
} else {
    include("pages/accueil.php");
}

include_once("shared/footer.php");

