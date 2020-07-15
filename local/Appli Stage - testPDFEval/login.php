<?php
	include ('connexionBDDstage.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- css bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>Identification</title>

	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<div id="top">
		<div class="header">
			<img src="EpsiIcon.jpg" class="rounded float-left" onmouseenter="grossissement(this)" onmouseleave="normalImg(this)" alt="">
			<header class="h1">Identification</header>
		</div>
	</div>
		<section class="container-fluid">
			<section class="row justify-content-center">
				<section class="col-12 col-sm-6 col-md-3">
					<form method="post" action="" class="form-container">
					    <label for="exampleInputEmail1">Login</label>
					    	<input name="email" type="email" onkeyup="enable(this);" id="exampleInputEmail1" placeholder="Entrez votre email"><br><br>
					    <label for="exampleInputPassword1">Mot de passe</label>
					   		 <input name="passwd" type="password" id="exampleInputPassword1" onkeyup="enable(this);"  placeholder="Entrez votre nom"><br><br><br>

					  	<button name="login" id="confirm" type="submit" class="btn btn-primary">Connexion</button>
					</form>
				</section>
			</section>
		</section>
<?php 

if (isset($_POST['login'])) {
	$enter = (isset($_POST['email'])?$_POST['email']:'');
	$pass = (isset($_POST['passwd'])?$_POST['passwd']:'');

	if (!empty($enter) AND !empty($pass)) {
		$ident_id = $BDDConn->prepare('SELECT id, email, nom FROM personne
	INNER JOIN affecterTuteur ON id = idperson WHERE email = :email AND nom = :nom');
		$ident_id->bindValue(':email', $enter);
		$ident_id->bindValue(':nom', $pass);
		$ident_id->execute();
		$id_exist = $ident_id->rowCount();

		if ($id_exist == 0) {
?>		

<script type="text/javascript">
	alert("Email ou mot de passe incorrecte");
</script>

<?php 		
		}else{
			$info = $ident_id->fetch();
			$_SESSION['id'] = $info['id'];

			/*$ident_fonction = $BDDConn->prepare('SELECT * FROM fonction INNER JOIN personne ON fonction.id = personne.idfonc WHERE personne.id ='.$info['id']);
			$ident_fonction->execute();
			$info_fonction = $ident_fonction->fetch();*/

			/*if ($info_fonction['id'] == 6) {*/
				header("Location: choixEtudiantEval.php?idtuteur=".$_SESSION['id']);
			/*}*/
		}
	}else{
?>
<script type="text/javascript">
	alert("Veuillez remplir tous les champs s'il vous plait.");
</script>
<?php  		
	}
}
?> 

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php include ('jqueryVersion/script341.js'); ?>
<script src="assets/EventuelJavaScript.js"></script>
</body>
</html>