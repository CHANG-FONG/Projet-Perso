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

	<title>Nouveau stage</title>

	<link rel="stylesheet" type="text/css" href="nouveauStage.css">
</head>
<body>
	<div id="top">
		<div class="header">
			<img src="EpsiIcon.jpg" class="rounded float-left" alt="">
			<header class="h1">Nouveau stage</header>
		</div>
	</div>
		<section class="row justify-content-center">
			<section class="col-12 col-sm-6 col-md-3">
				<div class="form-container">
					<form method="get" action="formulaireStage.php">
						<label class="h6">Etudiant</label><br>
						  	<!-- <input list="bowser" type="text" name="etunom" id="exampleInputEmail1" placeholder="Nom">
						  	<datalist id="bowser"> -->
							<?php
								/*$SQLResult = $BDDConn->query($SQLQuery);
								$script = '';
								while ($SQLRow = $SQLResult->fetch(PDO::FETCH_ASSOC)) {
									$script .= '<option value="'.$SQLRow['id'].'">'.$SQLRow['nom'].' '.$SQLRow['prenom'].'"</option>';
								}
								$SQLResult->closeCursor();
								print($script);*/
							?>					   
			 				<!-- </datalist>	<br><br> -->
			 				<select name="etudinom">
							<?php
								$SQLQuery = 'SELECT etudiant.id, nom, prenom ';
								$SQLQuery .= "FROM personne ";
								$SQLQuery .= "INNER JOIN etudiant ON etudiant.idetud = personne.id ";

								$SQLResult = $BDDConn->query($SQLQuery);
								$script = '';
								while ($SQLRow = $SQLResult->fetch(PDO::FETCH_ASSOC)) {
									$script .= '<option value="'.$SQLRow['id'].'">'.$SQLRow['nom'].' '.$SQLRow['prenom'].'"</option>';
								}
								$SQLResult->closeCursor();
								print($script);
							?>					   
			 				</select>	<br><br>
						<label class="h6">Entreprise</label>
						  	<!-- <input list="bowser2" type="text" id="exampleInputEmail1" placeholder="Identité" name="identité">
						  	<datalist id="bowser2"> -->
							<?php
								/*$SQLResult2 = $BDDConn->query($SQLQuery2);
								$script2 = '';
								while ($SQLRow2 = $SQLResult2->fetch(PDO::FETCH_ASSOC)) {
									$script2.= '<option value='.$SQLRow2['nom'].' '.$SQLRow2['prenom'].'>';
								}
								$SQLResult2->closeCursor();
								print($script2);*/
	?><!-- 
							</datalist>
							<br><br><br> -->
							<select name="entreprise">
							<?php
								$SQLQuery2 = 'SELECT id, nom ';
								$SQLQuery2 .= 'FROM entreprise ';
								$SQLResult2 = $BDDConn->query($SQLQuery2);
								$script2 = '';
								while ($SQLRow2 = $SQLResult2->fetch(PDO::FETCH_ASSOC)) {
									$script2 .= '<option value="'.$SQLRow2['id'].'">'.$SQLRow2['nom'].'"</option>';
								}
								$SQLResult2->closeCursor();
								print($script2);
							?>					   
			 				</select>	<br><br>
						<button class="btn btn-primary">Créer</button>
						<button class="btn btn-secondary">Annuler</button>
					</form>
				</div>
			</section>
		</section>
<?php 
$nom_étudiant = isset($_POST['nom'])?$_POST['nom']:'';
$identité = isset($_POST['identité'])?$_POST['identité']:'';

/*if (isset($_POST['créer'])) {
	

	$entFetch = 'SELECT id, FROM entreprise ';
	$entFetch.= "WHERE nom = '$identité'";
	$entResult = $BDDConn->query($entFetch);

	$infoetud = $etudFetch->fetch();
	$_SESSION['idetu'] = $infoetud['id'];

	$_SESSION['ident'] = $entResult;

	if (!empty($_POST['nom']) AND !empty($_POST['identité'])) {
		header("Location:formulaireStage.php?idetudiant=".$_SESSION['idetu']."&identreprise=".$_SESSION['ident']);
	}
}*/
 ?>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include ('jqueryVersion/script341.js'); ?>
</body>
</html>