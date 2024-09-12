<?php


/*
use Dompdf\Dompdf;
use Dompdf\Options;

require_once("dompdf/autoload.inc.php");//inclure le fichier
require_once('models/userModels.php');
$listeCandidatAttente= candidatEnAttente();

require_once('info.php');
ob_start();
$html=ob_get_contents("info.php");
ob_end_clean();


$options=new Options();
$options->set('defaultFont','Courier');
$dompdf= new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4','portrait');
$dompdf->render();
$date=date("Y-m-d H:i:s"); 
$fichier="Mon-def-$date.pdf";

$dompdf->stream($fichier);
*/
use PDF as GlobalPDF;

session_start();
ob_start();

ini_set("SMTP","localhost");
ini_set("smtp_port","25");

define('FPDF_FONTPATH', 'fpdf185/font');
require_once('fpdf185/fpdf.php');
include_once('shared/header.php');
include_once('shared/topbar.php');
include_once('shared/sidebar.php');

require_once('models/offreModel.php');
require_once('models/profilModel.php');
require_once('models/userModels.php');

//if (isset($_GET['idOffrePdf'], $_GET['etat'])) {
    //if(isset($_GET['passer'])) {
       extract($_GET);
    $donne = candidatAccepter();
  
    class PDF extends FPDF {
        function titre(){
            $this->SetFont('Arial', 'B', 30);
            $this->Cell(80);
            // titre
            $this->Cell(50, 10,'GLESE', 1, 0, 'C');
            // Line break
            $this->Ln(20);
        }
        
        function genere($entete, $donne){
            $this->SetFont('Arial', '', 11);
            $this->Cell(80);
            
            $this->Cell(50, 10,'Liste des candidats accepter', 0, 0, 'C');
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
                $this->Cell(36, 8, $key['email'], 1, 0, 'C');
                $this->Cell(36, 8, $key['tel'], 1, 0, 'C');
                
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
    $name = 'C:\xampp/htdocs\glese\public\document\LISTE DES CANDIDATS ' . $date . '.pdf';
    $pdf -> Output('F', $name);

    header("location:http://localhost/glese/public/document/LISTE DES CANDIDATS $date.pdf");

//}
?>