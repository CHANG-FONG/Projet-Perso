<?php
session_start();
	include ('connexionBDDstage.php');

	$_SESSION['idstagiaire'] = intval($_GET['etudiantEval']);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- css bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>Evaluation</title>

	<link rel="stylesheet" type="text/css" href="Evaluation.css">

	<style type="text/css">
		
		p{
			color: grey;
		}

	</style>
</head>
<body>
	<div id="top">
		<div class="header">
			<img src="EpsiIcon.jpg" class="rounded float-left" alt="">
			<header class="h1">Evaluation</header>
			<p>(Clickez sur un des titres pour acceder aux pages)</p>
		</div>
	</div>
	<div>
		<form method="post" action="">
			<button name="vaEval" class="container-fluid row justify-content-center" id="taille_left">
				<h2>Compétences / Savoir-être professionnel
				</h2>
			</button>
			
			<button name="vaBilan" class="container-fluid row justify-content-center" id="taille_right">
			<h2>Bilan / Appréciation
</h2>
			</button>
		</form>
	</div>
<?php  
if (isset($_POST['vaEval'])) {
	header("Location:evalSEP.php?id=".$_SESSION['id']."&idstagiaire=".$_SESSION['idstagiaire']);
}

if (isset($_POST['vaBilan'])) {
	header("Location:PageBilan.php?id=".$_SESSION['id']."&idstagiaire=".$_SESSION['idstagiaire']);
}
?>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include ('jqueryVersion/script341.js'); ?>
</body>
</html>