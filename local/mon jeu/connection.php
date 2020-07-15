<?php
session_start();

$dbConn = new PDO('mysql:host=localhost;port=3309;charset=utf8;dbname=inscription', 'root', 'root');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Identification</title>
</head>

<body>
	<header class="entête">
		<div id="corp">
			<label>Nom studio</label>
			<a href="monjeu.php">
				<label class="droite">Accueil</label></a>
			<a href="Inscription.php">
				<label id="inscr">Inscription</label></a>
		</div>
	</header>

	<h1>Entrez vos identifiant</h1>
	<div id="form">
	<form method="post" action="">

		<label for="email">Email</label>
		<input type="email" name="email" placeholder="Votre @email">

		<label for="mdp">MDP</label>
		<input type="password" name="mdp" placeholder="MDP">

		<button type="submit" name="Connexion" value="Envoyer">Connexion</button>

<?php
if (isset($_POST['Connexion'])) {
	$identmail = (isset($_POST['email'])? $_POST['email']:'');
	$identmdp = (isset($_POST['mdp'])? $_POST['mdp']:'');

	if (!empty($identmail) AND !empty($identmdp)) {
		$identif = $dbConn->prepare('SELECT id, email, mdp FROM detail WHERE email = ? AND mdp = ?');
		$identif->execute(array($identmail, $identmdp));
		$enter = $identif->rowcount();

		if ($enter == 0) {
?>
			<script>
			window.alert("Email ou mot de passe incorrecte");
		</script>
<?php
		}else{
			$info = $identif->fetch();
			$_SESSION['id'] = $info['id'];
			$_SESSION['nom'] = $info['nom'];
			$_SESSION['email'] = $info['email'];
			header("Location: pagejoueur.php?id=".$_SESSION['id']);
		}
	}else{
?>		
		<script>
			window.alert("Veuillez remplir tous les champs");
		</script>
<?php
	}
}
?>

	</form>
</div>
</body>
</html>