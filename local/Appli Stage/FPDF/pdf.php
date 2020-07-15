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
		$this->SetFont('Arial','B',16);
		$this->Ln(4);
		$this->Cell(0,6,"Nom de l'etudiant",0,1,'L');
		$this->Ln();
		$this->SetFont('Arial','',12);
		$this->Cell(1);
		$this->Cell(0,6,"Thierry CHANG-FONG",0,1,'L');
	}

	function partieTuteur($formulaireT)
	{
		$this->SetFont('Arial','B',16);
		$this->Ln(4);
		$this->Cell(0,6,"Nom du tuteur",0,1,'L');
		$this->Ln();
		$this->SetFont('Arial','',12);
		$this->Cell(1);
		$this->Cell(0,6,"Michel Gillet",0,1,'L');
	}

	function periodeStage($date)
	{
		$this->SetFont('Arial','B',16);
		$this->Ln(4);
		$this->Cell(0,6,"Date de début",0,1,'L');
		$this->Ln();
		$this->SetFont('Arial','',12);
		$this->Cell(1);
		$this->Cell(0,6,"16-12-2019",0,1,'L');

		$this->SetFont('Arial','B',16);
		$this->Ln(4);
		$this->Cell(0,6,"Date de fin",0,1,'L');
		$this->Ln();
		$this->SetFont('Arial','',12);
		$this->Cell(1);
		$this->Cell(0,6,"16-02-2019",0,1,'L');
	}

	function poste()
	{
		$this->SetFont('Arial','B',16);
		$this->Ln();
		$this->Cell(0,6,"Poste",0,1,'L');
		$this->Ln();
		$this->SetFont('Arial','',12);
		$this->Cell(1);
		$this->Cell(0,6,"Développeur web",0,1,'L');

		$this->SetFont('Arial','B',16);
		$this->Ln();
		$this->Cell(0,6,"Déscription",0,1,'L');
		$this->Ln();
		$this->SetFont('Arial','',12);
		$this->Cell(1);
		$this->Cell(0,6,"vdqeffqdfzfsef",0,1,'L');
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