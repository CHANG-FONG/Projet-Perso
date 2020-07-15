<?php
session_start();

require('fpdf/fpdf.php');

class PDF extends FPDF
{
	function header()
	{
		global $titre;

		$this->Image('logoEPSI.png',10,6,30);
		$this->SetFont('Arial','B',15);
		$this->Cell(70);		
		$this->Cell(50,10,'Contrat de stage',1,0,'C');  			 // Saut de ligne
   		$this->Ln(20);
	}

	function footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial','B',8);
		$this->Cell(0,10,'Coordonnees ',0,0,'C');
	}

	function partieEtudiant($formulaireE)
	{

include ('../connexionBDDstage.php');

$etudiant=$_GET['idetud'];
$nometud = 'SELECT nom, prenom FROM etudiant INNER JOIN personne ON idetud = personne.id WHERE etudiant.id ='.$etudiant;

$SQLStmt = $BDDConn->prepare($nometud);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
$etudnom = $SQLRow['nom'];
$etuPrenom = $SQLRow['prenom'];
$SQLStmt->closeCursor();
	
		$this->SetFont('Arial','B',16);
		$this->Ln(4);
		$this->Cell(0,6,"Nom de l'etudiant",0,1,'L');
		$this->Ln();
		$this->SetFont('Arial','',12);
		$this->Cell(1);
		$this->Cell(0,6,$etudnom.' '.$etuPrenom,0,1,'L');
	}

	function partieTuteur($formulaireT)
	{
$tuteur = $_POST['tuteur'];

include ('../connexionBDDstage.php');

$tuteur = $_POST['tuteur'];

$nomtuteur = 'SELECT prenom FROM personne ';
$nomtuteur.= "WHERE nom = '$tuteur'";
$SQLStmt = $BDDConn->prepare($nomtuteur);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
$tuteurprenom = $SQLRow['prenom'];
$SQLStmt->closeCursor();

		$this->SetFont('Arial','B',16);
		$this->Ln(4);
		$this->Cell(0,6,"Nom du tuteur",0,1,'L');
		$this->Ln();
		$this->SetFont('Arial','',12);
		$this->Cell(1);
		$this->Cell(0,6,$tuteur.' '.$tuteurprenom,0,1,'L');
	}

	function periodeStage($date)
	{
$dated = $_POST['Datedebut'];
$datef = $_POST['Datefin'];
		$this->SetFont('Arial','B',16);
		$this->Ln(4);
		$this->Cell(0,6,"Date de début",0,1,'L');
		$this->Ln();
		$this->SetFont('Arial','',12);
		$this->Cell(1);
		$this->Cell(0,6,$dated,0,1,'L');

		$this->SetFont('Arial','B',16);
		$this->Ln(4);
		$this->Cell(0,6,"Date de fin",0,1,'L');
		$this->Ln();
		$this->SetFont('Arial','',12);
		$this->Cell(1);
		$this->Cell(0,6,$datef,0,1,'L');
	}

	function poste()
	{
$post = $_POST['poste'];
		$this->SetFont('Arial','B',16);
		$this->Ln();
		$this->Cell(0,6,"Poste",0,1,'L');
		$this->Ln();
		$this->SetFont('Arial','',12);
		$this->Cell(1);
		$this->Cell(0,6,$post,0,1,'L');

$intitul = $_POST['description'];
		$this->SetFont('Arial','B',16);
		$this->Ln();
		$this->Cell(0,6,"Déscription",0,1,'L');
		$this->Ln();
		$this->SetFont('Arial','',12);
		$this->Cell(1);
		$this->Cell(0,6,$intitul,0,1,'L');
	}

	function nouveauContrat($formulaireE,$formulaireT,$date)
	{
		$this->AddPage();
		$this->partieEtudiant($formulaireE);
		$this->Ln(15);
		$this->partieTuteur($formulaireT);
		$this->Ln(15);
		$this->periodeStage($date);
		$this->Ln(15);
		$this->poste();
	}
}

$pdf = new PDF();
$titre = "Contrat de stage";
$pdf->SetTitle($titre);
$pdf->nouveauContrat(1,'UN ÉCUEIL FUYANT','20k_c1.txt');
$pdf->Output();
?>