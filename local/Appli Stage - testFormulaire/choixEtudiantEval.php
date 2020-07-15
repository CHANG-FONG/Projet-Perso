<?php
session_start();
	include ('connexionBDDstage.php');
	$personneTuteur = intval($_GET['idtuteur']);
	$_SESSION['id'] = $personneTuteur;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- css bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>Evaluation</title>

	<link rel="stylesheet" type="text/css" href="loginEntreprise.css">
</head>
<body>
	<div id="top">
		<div class="header">
			<img src="EpsiIcon.jpg" class="rounded float-left" alt="">
			<header class="h1">Evaluation</header>
		</div>
	</div>
		<section class="container-fluid mx-auto" style="width: 800px;">
			<section class="row justify-content-center">
				<section class="col-12 col-sm-6 col-md-3">
					<form method="get" action="Evaluation.php" class="form-container">
					  <div class="form-group">
					    <label for="exampleInputPassword1">Etudiant</label>
					   		<select name="etudiantEval">
<?php 
					$SQLQuery = 'SELECT etudiant.id, nom, prenom FROM etudiant INNER JOIN personne ON personne.id = idetud INNER JOIN stage ON etudiant.id = idEtudiant INNER JOIN affecterTuteur ON idstage = stage.id WHERE idperson ='.$personneTuteur;
					$SQLResult = $BDDConn->query($SQLQuery);

					$script = '';
					while ($SQLRow = $SQLResult->fetch(PDO::FETCH_ASSOC)) {
						$script.= '<option value="'.$SQLRow['id'].'">'.$SQLRow['nom'].' '.$SQLRow['prenom'].'</option>';
					}
					$SQLResult->closeCursor();
					print($script);
 ?>						
					   		</select>
					  </div>
					  <button type="submit" class="btn btn-primary">Evaluer</button>
					</form>
				</section>
			</section>
		</section>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include ('jqueryVersion/script341.js'); ?>
</body>
</html>