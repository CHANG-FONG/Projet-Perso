<?php
$dbConn = new PDO('mysql:host=localhost;port=3309;charset=utf8;dbname=inscription', 'root', 'root');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Coin admin</title>
</head>
<body>

<form method="post" action="">	
	Email:
	<input type="Email" name="email">

	mot de passe:
	<input type="password" name="mdp">
<?php
if (isset($_POST['connadmin'])) {
	$identmail = (isset($_POST['email'])? $_POST['email']:'');
	$identmdp = (isset($_POST['mdp'])? $_POST['mdp']:'');

	if (!empty($identmail) AND !empty($identmdp)) {
		$identif = $dbConn->prepare('SELECT id, email, mdp, admin FROM detail WHERE email = ? AND mdp = ? AND admin = 1');
		$identif->execute(array($identmail, $identmdp));
		$enter = $identif->rowcount();

		if ($enter == 0) {
			echo "Vous n'éte pas un admin";
		}else{
			$info = $identif->fetch();
			$_SESSION['id'] = $info['id'];
			$_SESSION['nom'] = $info['nom'];
			$_SESSION['email'] = $info['email'];
			header("Location: envoinews.php?id=".$_SESSION['id']);
		}		
	}else{
		echo "Vous n'éte pas un admin";
	}

}
?>
	<button type="submit" name="connadmin">Connexion</button>
</form>
</body>
</html>