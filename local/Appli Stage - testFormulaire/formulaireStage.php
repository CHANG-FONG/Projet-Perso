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
					<form name="formpdf" method="post" action="FPDF/pdf.php?idetud=<?php print($_GET['etudinom']); ?>">
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

						<button type="submit" id="creer" class="btn btn-primary" name="créer">Créer</button>
						<button class="btn btn-secondary">Annuler</button>
					</form>
				</div>
			</section>
		</section>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include ('jqueryVersion/script341.js'); ?>
	<script>
		$(document).ready(function(){
			$("#creer").click(function(){

				var D_d = $("input[name=Datedebut]");
				var D_f = $("input[name=Datefin]");
				var tuteur = $("input[name=tuteur]");
				var poste = $("input[name=poste]");
				var desc = $("textarea[name=description]");

				if (D_d == 0 || D_f == 0 || tuteur == 0 || poste == 0 || desc == 0) {
					alert("Vous n'avez pas remplis tous les champs");
				}
				//$("form[name=formpdf]").submit();
			});
		});
	</script>
</body>
</html>