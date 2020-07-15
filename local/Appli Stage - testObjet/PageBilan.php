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

	<title>Bilan entreprise</title>

	<link rel="stylesheet" type="text/css" href="PageBilan.css">
</head>
<body>
	<div id="top">
		<div class="header">
			<img src="EpsiIcon.jpg" class="rounded float-left" alt="">
			<header class="h1">Bilan</header>
			<!-- <a href="bilancomm.php"> -->
				<button id="ajoutComm" type="submit" class="btn btn-primary float-right" name="ajoutComm">Confirmer</button>
			<!-- </a> -->
		</div>

	</div>
	<section class="container-fluid sectio">
		<form name="formComm" method="post" action="bilancomm.php?id=<?php print($_SESSION['id']);?>&idstagiaire=<?php print($_SESSION['idstagiaire']);?>">
			<div class="apreciation">
				<section class="container-fluid sectionnn">
					<p>Prestation de l'apprenant au cours de la période - Appréciation générale du tuteur de stage *:</p>
					<label>Très satisfaisant </label>  <input type="radio" name="qualite" value="Très satisfaisant">
					<label>Satisfaisant </label>  <input type="radio" name="qualite" value="Satisfaisant">
					<label>Moyen </label>  <input type="radio" name="qualite" value="Moyen">
					<label>Non Satisfaisant  </label>  <input type="radio" name="qualite" value="Non satisfaisant">
				</section>
			</div>
			<h3>Bilan*</h3>
			<textarea name="bilan" rows="10" cols="185" id="IDbilan" placeholder="Bilan personnel de l'apprenant au cours de la période (Suite à l'entretien et aux échanges, compétences, points acquis, points de progression, évolution du projet professionnel, etc.)"></textarea><br>

			<h3>Ressources utilisées*</h3>
			<textarea name="ressource" rows="10" cols="185" placeholder="Matériel(s), logiciel(s), langage(s) de développement, norme(s)/référentiel(s), etc."></textarea><br>

			<h3>Ajouter un commentaire*</h3>
			<textarea name="commen" rows="10" cols="185" placeholder="Analyse et commentaire"></textarea>
		</form>
	</section>
<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
<?php 
include ('jqueryVersion/script341.js');
 ?>
    <script>
    	$(document).ready(function(){
	    	$("#ajoutComm").click(function(){
				/*var bilan = $("textarea[name=bilan]").val();
	    		console.log(bilan);
	    		
	    		var commentaire = $("textarea[name=commen]").val();
	    		console.log(commentaire);

	    		var appreciation = $("input[name=qualite]:checked").attr('value');
	    		console.log(appreciation);*/

	    		$("form[name=formComm]").submit();
				/*$.post(
					"bilancomm.php",
					{
						evalbilan: bilan
					}, function(data, status){
						alert(data, status);
					});*/
				
			});
		});
    </script>
</body>
</html>
