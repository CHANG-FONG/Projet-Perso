<?php
session_start();
	include ('connexionBDDstage.php');			
	$entreprise = isset($_GET['entreprise'])?$_GET['entreprise']:0;
	$etudient = isset($_GET['etudinom'])?$_GET['etudinom']:0;

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- css bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>Nouveau stage</title>

	<link rel="stylesheet" type="text/css" href="nouveauStage.css">
	<style type="text/css">
		p{
			font-style: italic;
		}
	</style>
</head>
<body>
	<div id="top">
		<div class="header">
			<img src="EpsiIcon.jpg" class="rounded float-left" alt="">
			<header class="h1">Formulaire</header>
		</div>
	</div>
		<section class="row justify-content-center">
			<section class="col-12 col-md-3">
				<div class="form-container">
					<p class="h6">* = Obligatoire</p>
					<form method="post" action="">
						<label class="h6">Début du stage*</label>
						<input type="date" name="Datedebut">
						<br>
						<label class="h6">Fin du stage*</label>
						<input type="date" name="Datefin">

						<label class="h6">Tuteur*</label>
						<input list="tute" type="text" name="tuteur">
							<datalist id="tute">
<?php 

			$SQLTuteur = 'SELECT personne.id, personne.nom, prenom FROM personne INNER JOIN entreprise ON idmembre = entreprise.id WHERE entreprise.id ='.$entreprise;
			$SQLResultTuteur = $BDDConn->query($SQLTuteur);

			$script = '';
			while($SQLRow = $SQLResultTuteur->fetch(PDO::FETCH_ASSOC)){
				$script.= '<option value="'.$SQLRow['nom'].'">'.$SQLRow['prenom'].'</option>';
			}
			$SQLResultTuteur->closeCursor();
			print($script);

 ?>
 							</datalist><br><br>
						<label class="h6">Intitulé du poste du stagiaire*</label>
						<input type="text" name="poste">
						<textarea name="description" rows="10" cols="40" placeholder="Decription du poste"></textarea>	

						<button type="submit" class="btn btn-primary" name="créer">Créer</button>
						<button class="btn btn-secondary">Annuler</button>
					</form>
				</div>
			</section>
		</section>
<?php  

if (isset($_POST['créer'])) {
	$date_debut = isset($_POST['Datedebut'])?$_POST['Datedebut']:'';
	$date_fin = isset($_POST['Datefin'])?$_POST['Datefin']:'';
	$tuteur = isset($_POST['tuteur'])?$_POST['tuteur']:'';
	$poste = isset($_POST['poste'])?$_POST['poste']:'';
	$description = isset($_POST['description'])?$_POST['description']:'';
	
	if (!empty($_POST['Datedebut']) AND !empty($_POST['Datefin']) AND !empty($_POST['tuteur']) AND !empty($_POST['poste']) AND !empty($_POST['description'])) {

		#Le poste
		$queryid = 'SELECT COALESCE(max(id),0)+1 as idPoste FROM poste ';
		$SQLStmt = $BDDConn->prepare($queryid);
		$SQLStmt->execute();
		$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$idPoste = $SQLRow['idPoste'];
		$SQLStmt->closeCursor();
		
		$SQLQuery_poste = 'INSERT INTO poste (id, libelle, description) ';
		$SQLQuery_poste.= "VALUES (:id, :poste, :description)";
		$SQLStmt = $BDDConn->prepare($SQLQuery_poste);
		$SQLStmt->bindValue(':id', $idPoste);
		$SQLStmt->bindValue(':poste', $poste);
		$SQLStmt->bindValue(':description', $description);
		if (!$SQLStmt->execute()){
			var_dump($SQLStmt->errorInfo());
		}

		#Le stage
		$queryid = 'SELECT COALESCE (max(id),0)+1 as idstage FROM stage ';
		$SQLStmt = $BDDConn->prepare($queryid);
		$SQLStmt->execute();
		$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$idStage = $SQLRow['idstage'];
		$SQLStmt->closeCursor();

		$SQLQuery_stage = 'INSERT INTO stage (id, idPoste, idEntreprise, idEtudiant, date_debut, date_fin) ';
		$SQLQuery_stage.= "VALUES (:id, :idPoste, :idEntreprise, :idEtudiant, :date_debut, :date_fin)";
		$SQLStmt = $BDDConn->prepare($SQLQuery_stage);
		$SQLStmt->bindValue(':id', $idStage);
		$SQLStmt->bindValue(':idPoste', $idPoste);
		$SQLStmt->bindValue(':idEntreprise', $entreprise);
		$SQLStmt->bindValue(':idEtudiant', $etudient);
		$SQLStmt->bindValue(':date_debut', $date_debut);
		$SQLStmt->bindValue(':date_fin', $date_fin);
		if (!$SQLStmt->execute()) {
			var_dump($SQLStmt->errorInfo());
		}

		#Le tuteur
		$SQLSelect_tuteur = 'SELECT personne.id FROM personne WHERE nom = :nom';
		$SQLStmt = $BDDConn->prepare($SQLSelect_tuteur);
		$SQLStmt->bindValue(':nom', $tuteur);
		$SQLStmt->execute();
		$SQLRow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$idtuteur = $SQLRow['id'];
		$SQLStmt->closeCursor();

		$SQLQuery_tuteur = 'INSERT INTO affecterTuteur (idstage, idperson) VALUES (:idstage, :idperson)';
		$SQLStmt = $BDDConn->prepare($SQLQuery_tuteur);
		$SQLStmt->bindValue(':idstage', $idStage);
		$SQLStmt->bindValue(':idperson', $idtuteur);
		if (!$SQLStmt->execute()) {
			var_dump($SQLStmt->errorInfo());
		}
		header("Location: login.php");
		
	}else{
		echo "Remplissez tous les champs svp";
	}
}
?>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include ('jqueryVersion/script341.js'); ?>
</body>
</html>