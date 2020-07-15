<?php
session_start();
		$dbConn = new PDO('mysql:host=localhost;port=3309;charset=utf8;dbname=inscription', 'root', 'root');
		/*$_SESSION['nom'] = $modifnom;
		$_SESSION['prenom'] = $modifprenom;
		$_SESSION['email'] = $modifemail;*/
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<meta charset="utf-8">

	<link rel="stylesheet" href="css/bootstrap">
	<link rel="stylesheet" type="text/css" href="inscription.css">
	<style type="text/css">
		#conf {
			color: blue;
		}

	</style>
</head>
<body>
	<header class="entête">
		<label>Nom studio</label>
		<a href="connection.php">
			<label class="droite">Connection</label>
		</a>
		<a href="monjeu.php">
			<label>Acceuil</label>
		</a>
	</header>
	<div>
		<h1>Inscription</h1>
	</div>
	<div>
		<header>
			<ul>
				<a href="">
					<li>L'univers</li>
				</a>
				<a href="">
					<li>Actualité</li>
				</a>
				<a href="">
					<li>Encyclopédie</li>
				</a>
			</ul>
		</header>
	</div>

	<h3>Formulaire</h3>
	<?php
		if (!empty($_GET)) {
			if(!empty($_POST)) {
				$id = (isset($_GET['id'])? $_GET['id']:0);
				$nom = (isset($_POST['nom'])? $_POST['nom']:'');
				$prenom = (isset($_POST['prenom'])? $_POST['prenom']:'');
				$email = (isset($_POST['email'])? $_POST['email']:'');
				$mdp = (isset($_POST['mdp'])? $_POST['mdp']:'');
				$newsletter = (isset($_POST['news'])? $_POST['news']: 1);

				$SQLQuery = "UPDATE detail SET nom = '$nom', prenom = '$prenom', email = '$email', mdp = '$mdp', news = '$newsletter' ";
				$SQLQuery .= "WHERE id = $id";
				$dbConn->query($SQLQuery);
				
			}else{
				$id = (isset($_GET['id'])? $_GET['id']:0);
				$SQLQuery = "SELECT * FROM detail WHERE id=$id";
				$SQLResult = $dbConn->query($SQLQuery);
				$personne = $SQLResult->fetch(PDO::FETCH_ASSOC);
				$nom = $personne['nom'];
				$prenom = $personne['prenom'];
				$email = $personne['email'];
				$mdp = $personne['mdp'];

				$SQLResult->closeCursor();
			}
		}else{
			if(empty($_POST)) {
					$nom = '';
					$prenom = '';
					$email = '';
					$mdp = '';

				}else{
					//Insertion
					$queryid = 'SELECT COALESCE (max(id),0)+1 FROM detail as id ';
					$id = (isset($_GET['id'])? $_GET['id']:0);
					$nom = (isset($_POST['nom'])? $_POST['nom']:'');
					$prenom = (isset($_POST['prenom'])? $_POST['prenom']:'');
					$email = (isset($_POST['email'])? $_POST['email']:'');
					$mdp = (isset($_POST['mdp'])? $_POST['mdp']:'');
					$confmdp = (isset($_POST['confmdp'])? $_POST['confmdp']:'');
					$newsletter = (isset($_POST['news'])? $_POST['news']: 1);

					}
				}	
	?>

	<div class="form">
	<form method="POST" action="">
		<label for="nom">Nom</label>
		<input type="text" placeholder="Votre nom" name="nom" value= ""><br><br>

		<label for="prenom">Prénom</label>
		<input type="text" name="prenom" placeholder="Votre prénom" value= ""><br><br>

		<label for="email">Email</label>
		<input type="email" name="email" placeholder="Votre @email" value= ""><br><br>

		<label for="mdp">Mot de passe</label>
		<input type="password" name="mdp" placeholder="mot de passe"><br><br>
		<label for="confmdp">Mot de passe confirmer</label>
		<input type="password" name="confmdp" placeholder="mdp"><br><br>

		<input type="checkbox" name="news"><label>Cochez ici pour recevoir les newsletters du jeu</label>
<?php
	if (isset($_POST['inscriptions'])) {
		if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['mdp'])) {
				$verifnom = $dbConn->prepare('SELECT nom FROM detail WHERE nom = ?');
				$verifnom ->execute(array($nom));
				$nomexist = $verifnom->rowcount();

				$verifmail = $dbConn->prepare('SELECT email FROM detail WHERE email = ?');
				$verifmail->execute(array($email));
				$mailexist = $verifmail->rowcount();

				$verifmdp = $dbConn->prepare('SELECT mdp FROM detail WHERE mdp = ?');
				$verifmdp->execute(array($mdp));
				$mdpexist = $verifmdp->rowcount();
				$taille_mdp = strlen($mdp);

				if ($mailexist == 0) {				
					if ($mdpexist == 0) {
						if ($taille_mdp >= 30) {
?>

							<script>window.alert("Mot de passe trop long.Ne doit pas dépasser 30 characters")</script>
<?php						
						}elseif ($taille_mdp <= 5) {
?>	
							<script>window.alert("Mot de passe trop court. Doit faire au moins 5 characters")</script>
<?php
						}else{
							if ($mdp == $confmdp) {
								//$_SESSION['email'] = $_POST['email'];
								if (isset($_POST['news'])) {
								//	$_SESSION['id'] = $queryid;
								//	require ('confirmemail.php');
								//	if (isset($_SESSION['mailvalide'] = null)) {
										$SQLQuery = 'INSERT INTO detail (id, nom, prenom, email, mdp, recunews)';
										$SQLQuery.= "VALUES (($queryid),'$nom', '$prenom', '$email', '$mdp', 1)";
										$dbConn->query($SQLQuery);
								//		echo "Votre compte à bien été validé";
								//	}		
								}else{
								//	if (isset($_SESSION['mailvalide'] = null)) {
										$SQLQuery = 'INSERT INTO detail (id, nom, prenom, email, mdp, recunews)';
										$SQLQuery.= "VALUES (($queryid),'$nom', '$prenom', '$email', '$mdp', 0)";
										$dbConn->query($SQLQuery);
									//	echo "Votre compte à bien été validé";
									//	}	
									}
?>
								<script>window.alert("Votre compte a bien été créé")</script>
<?php
									}else{
?>									
										<script>window.alert("Mot de passe non confirmer car mot de passe différent")</script>
<?php
													}
									}
								}else{
?>
									<script>window.alert("Le mot de passe existe déjà choisissez en un autre")</script>
<?php
										}
					}else{
?>
						<script>window.alert("Ce mail existe déjà choisissez en un autre")</script>
<?php
					}
				}else{
?>
					<script>window.alert("Remplissez tous les champs s'il-vous-plaît")</script>
<?php
					}
				}
?>
		<br><br>

		<button id="butt" type="submit" name="inscriptions" value="Envoyer">Envoyer</button>
	</form>
</div>
	<a href="listedesinscri.php">liste des inscriptions</a><br>
	<a href="admin.php">inscription admin</a>
</body>
</html>