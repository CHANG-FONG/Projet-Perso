<!DOCTYPE html>
<html>
<head>
	<title>Formulaire</title>
</head>
<body>
	<div>
		<h1>Ajout</h1>
	</div>
	<nav>
		<ul>
			<li><a href="index.php">Accueil</a></li>
			<li><a href="listing.php">Liste</a></li>
			<li><a href="fichier.php">Ajout</a></li>
		</ul>
	</nav>

	<?php
		$dbConn = new PDO('mysql:host=localhost;port=3306;charset=utf8;dbname=lol3', 'root', 'root');

		if (!empty($_GET)) {
			if(!empty($_POST)) {
				$id = (isset($_GET['id'])? $_GET['id']:0);
				$nom = (isset($_POST['name'])? $_POST['name']:'');
				$prenom = (isset($_POST['first_name'])? $_POST['first_name']:'');
				$email = (isset($_POST['email'])? $_POST['email']:'');
				
				$SQLQuery = "UPDATE personne3 SET nom = '$nom', prenom = '$prenom', email = '$email' ";
				$SQLQuery = "WHERE id = $id";
				$dbConn->query($SQLQuery);

			}else{
				$id = (isset($_GET['id'])? $_GET['id']:0);
				$SQLQuery = "SELECT * FROM personne3 WHERE id=$id";
				$SQLResult = $dbConn->query($SQLQuery);
				$personne = $SQLResult->fetch(PDO::FETCH_ASSOC);
				$nom = $personne['nom'];
				$prenom = $personne['prenom'];
				$email = $personne['email'];

				$SQLResult->closeCursor();
			}
		}else{
			if(empty($_POST)) {
					$nom = '';
					$prenom = '';
					$email = '';
				}else{
					//Insertion
					$queryid = 'SELECT COALESCE (max(id),0)+1 FROM personne3 as id ';
					$nom = (isset($_POST['name'])? $_POST['name']:'');
					$prenom = (isset($_POST['first_name'])? $_POST['first_name']:'');
					$email = (isset($_POST['email'])? $_POST['email']:'');
					
					$SQLQuery = 'INSERT INTO personne3 (id, nom, prenom, email)';
					$SQLQuery.= "VALUES (($queryid),'$nom', '$prenom', '$email')";
					$dbConn->query($SQLQuery);
				}
			}				
	?>

	<h3>Formulaire</h3>
	<form method="post" action="">
		<label for="civilitéM">Monsieur</label>
		<input type="radio" name="rdCiv" id="civilitéM">

		<label for="civilitéMm">Madame</label>
		<input type="radio" name="rdCiv" id="civilitéMm"><br>

		<label for="name">Nom</label>
		<input type="text" value="<?php print($nom);?>" placeholder="Votre nom" name="name"><br>

		<label for="first_name">Prénom</label>
		<input type="text" value="<?php print($prenom);?>" name="first_name" placeholder="Votre prénom"><br>

		<label for="email">Email</label>
		<input type="text" value="<?php print($email);?>" name="email" placeholder="Votre @email"><br>

		<label for="act1">cinoche</label>
		<input type="checkbox" name="actCinéma" id="act1">

		<label for="act2">Sport</label>
		<input type="checkbox" name="actSport" id="act2">

		<label for="act3">Jeux</label>
		<input type="checkbox" name="actJeux" id="act3"><br><br>

		<label for="act4">Lecture</label>
		<input type="checkbox" name="actLecture" id="act4">

		<label for="act5">Autre</label>
		<input type="checkbox" name="actAutre" id="act5"><br>

		<textarea></textarea>

		<button type="submit" name="send_form" value="Envoyer">Envoyer</button>
	</form>
	
</body>
</html>