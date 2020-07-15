<?php
session_start();
include ('../connexionBDDstage.php');

$idtuteur = $_SESSION['id'];
$idstagiaire = $_SESSION['idstagiaire'];
header("Location: ../evalESP2.php?id=".$idtuteur."&idstagiaire".$idstagiaire);
die();

require('fpdf/fpdf.php');

class PDF extends FPDF
{
	function header()
	{
		global $titre;

		$this->Image('logoEPSI.png',10,6,30);
		$this->SetFont('Arial','B',15);
		$this->Cell(70);		
		$this->Cell(70,10,'Evaluation du savoir-etre',1,0,'C');  			 // Saut de ligne
   		$this->Ln(20);
	}

	function footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial','B',8);
		$this->Cell(0,10,'Coordonnees ',0,0,'C');
	}

	function SetCol($col)
	{
		$this->col = $col;
		$x = 10+$col*65;
		$this->SetLeftMargin($x);
		$this->SetX($x);
	}

	function AcceptPageBreak()
	{
    	// Méthode autorisant ou non le saut de page automatique
    	if($this->col<2){
        	// Passage à la colonne suivante
        	$this->SetCol($this->col+1);
        	// Ordonnée en haut
        	$this->SetY($this->y0);
        	// On reste sur la page
        	return false;
    	}else{
        	// Retour en première colonne
        	$this->SetCol(0);
        	// Saut de page
        	return true;
    	}
	}

	function TitreCathégorie($libelle)
	{
	    // Titre
	    $this->SetFont('Arial','',12);
	    $this->SetFillColor(200,220,255);
	    $this->Cell(0,6,$libelle,0,1,'L',true);
	    $this->Ln(4);
	    // Sauvegarde de l'ordonnée
	    $this->y0 = $this->GetY();
	}

	function Ajouteravis($sujet,$avis)
	{
		$this->SetFont('Arial','',12);
		$this->Cell(0,6,"$sujet : $avis",0,1,'L');
	}

	function AjouterChapitre($titre)
	{
	    // Ajout du chapitre
	    $this->TitreCathégorie($titre);
	}
}

$pdf = new PDF();
$titre = "Evaluation";
$pdf->SetTitle($titre);
$pdf->SetAuthor('Jules Verne');

$pdf->AddPage();
$pdf->AjouterChapitre('Aptitude');

#Aptitude
$niveau_se = 'SELECT libelle FROM niveaus_e WHERE id = '.$_POST['A_1'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis('Faire preuve de discernement',$SQLRow['libelle']);
$SQLStmt->closeCursor();

$niveau_se = 'SELECT libelle FROM niveaus_e WHERE id = '.$_POST['A_2'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis('Se remettre en cause(humilite)',$SQLRow['libelle']);
$SQLStmt->closeCursor();

$niveau_se = 'SELECT libelle FROM niveaus_e WHERE id = '.$_POST['A_3'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis('Rester maitre de soi',$SQLRow['libelle']);
$SQLStmt->closeCursor();

$niveau_se = 'SELECT libelle FROM niveaus_e WHERE id = '.$_POST['A_4'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis('Etre ouvert au changement',$SQLRow['libelle']);
$SQLStmt->closeCursor();

$niveau_se = 'SELECT libelle FROM niveaus_e WHERE id = '.$_POST['A_5'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis('Etre positif','Satisfaisant');
$SQLStmt->closeCursor();

$niveau_se = 'SELECT libelle FROM niveaus_e WHERE id = '.$_POST['A_6'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis('Avoir une tenue et une attitude professionnelle',$SQLRow['libelle']);
$SQLStmt->closeCursor();

#Résponsabilité
$pdf->AjouterChapitre('Responsabilités');

$niveau_se = 'SELECT libelle FROM niveaus_e WHERE id = '.$_POST['R_1'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis("S'organiser, gérer son temps et les priorites",$SQLRow['libelle']);
$SQLStmt->closeCursor();

$niveau_se = 'SELECT libelle FROM niveaus_e WHERE id = '.$_POST['R_2'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis('Atteindre ses objectifs',$SQLRow['libelle']);
$SQLStmt->closeCursor();

$niveau_se = 'SELECT libelle FROM niveaus_e WHERE id = '.$_POST['R_3'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis('Anticiper',$SQLRow['libelle']);
$SQLStmt->closeCursor();

$niveau_se = 'SELECT libelle FROM niveaus_e WHERE id = '.$_POST['R_4'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis("S'affirmer",$SQLRow['libelle']);
$SQLStmt->closeCursor();

$niveau_se = 'SELECT libelle FROM niveaus_e WHERE id = '.$_POST['R_5'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis('Prendre le leadership',$SQLRow['libelle']);
$SQLStmt->closeCursor();

#Relation
$pdf->AjouterChapitre('Relations');

$niveau_se = 'SELECT libelle FROM niveaus_e WHERE id = '.$_POST['Re_1'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis("Être à l'écoute",$SQLRow['libelle']);
$SQLStmt->closeCursor();

$niveau_se = 'SELECT libelle FROM niveaus_e WHERE id = '.$_POST['Re_2'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis("S'intégrer, travaller en équipe",$SQLRow['libelle']);
$SQLStmt->closeCursor();

$niveau_se = 'SELECT libelle FROM niveaus_e WHERE id = '.$_POST['Re_3'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis("Être disponible",$SQLRow['libelle']);
$SQLStmt->closeCursor();

$niveau_se = 'SELECT libelle FROM niveaus_e WHERE id = '.$_POST['Re_4'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis('Se faire comprendre',$SQLRow['libelle']);
$SQLStmt->closeCursor();

$niveau_se = 'SELECT libelle FROM niveaus_e WHERE id = '.$_POST['Re_5'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis('Communiquer (savoir trouver les mots)',$SQLRow['libelle']);
$SQLStmt->closeCursor();

$niveau_se = 'SELECT libelle FROM niveaus_e WHERE id = '.$_POST['Re_6'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis('Savoir répondre',$SQLRow['libelle']);
$SQLStmt->closeCursor();

#Actionn
$pdf->AjouterChapitre('Action');


$niveau_se = 'SELECT libelle FROM niveaus_e WHERE id = '.$_POST['Re_1'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis('Analyser, comprendre',$SQLRow['libelle']);
$SQLStmt->closeCursor();

$niveau_se = 'SELECT libelle FROM niveaus_e WHERE id = '.$_POST['Re_2'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis("Être force de proposition",$SQLRow['libelle']);
$SQLStmt->closeCursor();

$niveau_se = 'SELECT libelle FROM niveaus_e WHERE id = '.$_POST['Re_3'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis("Agir, être réactif, proactif",$SQLRow['libelle']);
$SQLStmt->closeCursor();

$niveau_se = 'SELECT libelle FROM niveaus_e WHERE id = '.$_POST['Re_4'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis("Être acteur de l'entreprise",$SQLRow['libelle']);
$SQLStmt->closeCursor();

$niveau_se = 'SELECT libelle FROM niveaus_e WHERE id = '.$_POST['Re_5'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis("S'adapter, crée, innover",$SQLRow['libelle']);
$SQLStmt->closeCursor();

$niveau_se = 'SELECT libelle FROM niveaus_e WHERE id = '.$_POST['Re_6'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis("Savoir s'organiser pour agir vite",$SQLRow['libelle']);
$SQLStmt->closeCursor();

$pdf->Output();


?>