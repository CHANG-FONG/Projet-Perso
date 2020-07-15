<?php
session_start();
	include ('connexionBDDstage.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- css bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="bilancomm.css">
	<title>Avis de l'entreprise</title>
</head>
<body>
	<div id="top">
		<div class="header">
			<img src="EpsiIcon.jpg" class="rounded float-left" alt="">
			<header class="h1">Avis</header>
			<a href="PageBilan.php?id=<?php print($_SESSION['id']); ?>&idstagiaire=<?php print($_SESSION['idstagiaire']); ?>"><button id="ajoutComm" class="btn btn-primary float-right" name="retour">Retour au bilan</button></a>
			</a>
		</div>
	</div>
	<form method="post" action="">
		<div class="bila float-left">
			<h3>Bilan : </h3><br>
			<p id="bilan">
<?php 
	if (isset($_POST['bilan'])) {
		$bilan = $_POST['bilan'];
		echo ($bilan); 
	}
?>
			</p>
			<div class="bil">
				<h3>Ressource : </h3><br>
				<p id="avis">
<?php 
		if (isset($_POST['ressource'])) {
			$ressource = $_POST['ressource'];
			echo ($ressource); 
		}
?>
				</p>
			</div>
		</div>
		<div class="bila float-right">
			<h3>Appréciation : </h3><br>
			<p id="appreciation">
<?php 
		if (isset($_POST['qualite'])) {
			$appreciation = $_POST['qualite'];
			echo ($appreciation); 
		}
?>
			</p>
			<div class="bil">
				<h3>Avis : </h3><br>
				<p id="avis">
<?php 
		if (isset($_POST['commen'])) {
			$commentaire = $_POST['commen'];
			echo ($commentaire); 
		}
?>
				</p>
			</div>
		</div>
<?php 
	if (empty($commentaire) || empty($bilan) || empty($appreciation || empty($ressource))) {
		echo "Remplissez tous les champs s'il vous plait";
	}else{
?>	
		<button name="confirmer">Envoyer</button>
	</form>

<?php
		if (isset($_POST['confirmer'])) {
			$SQLStage = 'SELECT id FROM stage WHERE idEtudiant ='.$_SESSION['idstagiaire'];
			$SQLStmt = $BDDConn->prepare($SQLStage);
			$SQLStmt->execute();
			$SQLStage_ID = $SQLStmt->fetch(PDO::FETCH_ASSOC);
			$SQLStmt->closeCursor();
#bilan
		$queryid = 'SELECT COALESCE (max(id),0)+1 as idbilan FROM bilan ';
		$SQLStmt = $BDDConn->prepare($queryid);
		$SQLStmt->execute();
		$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$idbilan = $SQLRow['idbilan'];
		$SQLStmt->closeCursor();

		$SQLQuery_bilan = 'INSERT INTO bilan (id, apreciation, bilan, commentaire) ';
		$SQLQuery_bilan.= "VALUES (:id, :appreciation, :bilan, :commentaire)";
		$SQLStmt = $BDDConn->prepare($SQLQuery_bilan);
		$SQLStmt->bindValue(':id', $idbilan);
		$SQLStmt->bindValue(':appreciation', $appreciation);
		$SQLStmt->bindValue(':bilan', $bilan);
		$SQLStmt->bindValue(':commentaire', $commentaire);
		if (!$SQLStmt->execute()) {
			var_dump($SQLStmt->errorInfo());
		}

#ressource
		$queryid = 'SELECT COALESCE (max(id),0)+1 as idressource FROM ressources ';
		$SQLStmt = $BDDConn->prepare($queryid);
		$SQLStmt->execute();
		$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$idressource = $SQLRow['idressource'];
		$SQLStmt->closeCursor();

		$SQLQuery_bilan = 'INSERT INTO ressources (id, libelle) ';
		$SQLQuery_bilan.= "VALUES (:id, :ressource)";
		$SQLStmt = $BDDConn->prepare($SQLQuery_bilan);
		$SQLStmt->bindValue(':id', $idressource);
		$SQLStmt->bindValue(':libelle', $ressource);
		if (!$SQLStmt->execute()) {
			var_dump($SQLStmt->errorInfo());
		}

		$SQLQuery = 'UPDATE stage SET id_bil_stage ='.$idbilan;
		$SQLQuery.= 'WHERE stage.id ='.$SQLStage_ID;
		$SQLStmt = $BDDConn->prepare($SQLQuery);
		if (!$SQLStmt->execute()) {
			var_dump($SQLStmt->errorInfo());
		}
		header("Location: Evaluation.php?id=".$_SESSION['id']."&idstagiaire=".$_SESSION['idstagiaire']);
		}
	}
	 
?>
</body>

<?php 
include ('jqueryVersion/script341.js');
 ?>
</html>