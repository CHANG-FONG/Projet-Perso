<?php

include ('../connexionBDDstage.php');
require('fpdf/fpdf.php');

class PDF extends FPDF
{
	function header()
	{
		global $titre;

		$this->Image('logoEPSI.png',10,6,30);
		$this->SetFont('Arial','B',15);
		$this->Cell(70);		
		$this->Cell(70,10,'Evaluation du competence',1,0,'C');  			 // Saut de ligne
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
$pdf->AjouterChapitre("Bloc de compétence 1 - Développement d'applications informatiques");

#Aptitude
$niveau_se = 'SELECT niveau FROM niveaucompe WHERE id = '.$_POST['Bl1_1'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis('C11-Concevoir une solution algorithmique	',$SQLRow['niveau']);
$SQLStmt->closeCursor();

$niveau_se = 'SELECT niveau FROM niveaucompe WHERE id = '.$_POST['Bl1_2'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis('C12-Concevoir et développer une solution applicative objet',$SQLRow['niveau']);
$SQLStmt->closeCursor();

$niveau_se = 'SELECT niveau FROM niveaucompe WHERE id = '.$_POST['Bl1_3'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis("C13-Créer du code avec l'intégration et la livraison continues",$SQLRow['niveau']);
$SQLStmt->closeCursor();

#Résponsabilité
$pdf->AjouterChapitre('Bloc de compétence 2 - Administration Système & Réseau');

$niveau_se = 'SELECT niveau FROM niveaucompe WHERE id = '.$_POST['Bl2_1'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis("C21-Administrer une infrastructure",$SQLRow['niveau']);
$SQLStmt->closeCursor();

$niveau_se = 'SELECT niveau FROM niveaucompe WHERE id = '.$_POST['Bl2_2'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis("C22-Tester et mettre en production des ressources afin d'améliorer une solution d'infrastructure	",$SQLRow['niveau']);
$SQLStmt->closeCursor();

$niveau_se = 'SELECT niveau FROM niveaucompe WHERE id = '.$_POST['Bl2_3'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

#Relation
$pdf->AjouterChapitre('Bloc de compétence 3 - Gestion de données');

$niveau_se = 'SELECT niveau FROM niveaucompe WHERE id = '.$_POST['Bl3_1'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis("C31-Concevoir une base de données et améliorer une base de données existante (via la rétro-conception)",$SQLRow['niveau']);
$SQLStmt->closeCursor();

$niveau_se = 'SELECT niveau FROM niveaucompe WHERE id = '.$_POST['Bl3_2'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis("C32-Exploiter une base de données dans un environnement client serveur",$SQLRow['niveau']);
$SQLStmt->closeCursor();

$niveau_se = 'SELECT niveau FROM niveaucompe WHERE id = '.$_POST['Bl3_3'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis("C33-Déployer, administer et sécuriser une base de données",$SQLRow['niveau']);
$SQLStmt->closeCursor();

#Actionn
$pdf->AjouterChapitre('Bloc de compétence 4 - Méthodes & projet');

$niveau_se = 'SELECT niveau FROM niveaucompe WHERE id = '.$_POST['Bl4_1'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis('C41-Analyser les besoins clients et/ou utilisateurs',$SQLRow['niveau']);
$SQLStmt->closeCursor();

$niveau_se = 'SELECT niveau FROM niveaucompe WHERE id = '.$_POST['Bl4_2'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis("C42-Planifier et suivre un projet informatique	",$SQLRow['niveau']);
$SQLStmt->closeCursor();

$niveau_se = 'SELECT niveau FROM niveaucompe WHERE id = '.$_POST['Bl4_3'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->AjouterChapitre('Bloc de compétence 5 - Communication & veille technologipue');

$niveau_se = 'SELECT niveau FROM niveaucompe WHERE id = '.$_POST['Bl5_1'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis("C51-Assurer une veille technologique pour garantir l'évolution de l'infrastructure et des applications",$SQLRow['niveau']);
$SQLStmt->closeCursor();

$niveau_se = 'SELECT niveau FROM niveaucompe WHERE id = '.$_POST['Bl5_2'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis("C52-Communiquer à l'oral et par écrit en français et en anglais",$SQLRow['niveau']);
$SQLStmt->closeCursor();

$niveau_se = 'SELECT niveau FROM niveaucompe WHERE id = '.$_POST['Bl5_3'];
$SQLStmt = $BDDConn->prepare($niveau_se);
$SQLStmt->execute();
$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);

$pdf->Ajouteravis("C53-Analyser et produire de la documentation technique en français",$SQLRow['niveau']);
$SQLStmt->closeCursor();

$pdf->Output();
?>