<?php
	$BDDConn = new PDO('mysql:host=localhost;port=3309;charset=utf8;dbname=BDDdeStage', 'root', 'root');
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- css bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="bilan&comm.css">
	<title>Avis de l'entreprise</title>
</head>
<body>
	<div id="top">
		<div class="header">
			<img src="EpsiIcon.jpg" class="rounded float-left" alt="">
			<header class="h1">Avis</header>
			<a href="PageBilan.php"><button id="ajoutComm" class="btn btn-primary float-right" name="retour">Retour au bilan</button></a>
			</a>
		</div>
	</div>
	<div class="bila float-left">
		<p>Bilan</p>
<?php
extract($_POST);
		if (isset($_POST['evalbilan'])) {
			$bilan = $_POST['evalbilan'];
			echo $bilan;
		}

?>
	</div>
	<div class="bila float-right">
		<p>Appréciation:</p>
<?php
		if (isset($_POST['evalTravail'])) {
			$travail = $_POST['evalTravail'];
		}
?>
		<div class="bil">
			<p>Avis</p>
<?php
		if (isset($_POST['evalCommentaire'])) {
			$commentaire = $_POST['evalCommentaire'];
		}
?>		
		</div>
	</div>
</body>
</html>