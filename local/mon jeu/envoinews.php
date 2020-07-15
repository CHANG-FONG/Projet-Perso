<?php
$dbConn = new PDO('mysql:host=localhost;port=3309;charset=utf8;dbname=inscription', 'root', 'root');

session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>admin newsletter</title>
</head>
<body>
	<form method="post" action="">
		<h2>Sujet</h2>
		<input type="text" name="sujet">

		<h3>Contenu</h3>
		<textarea name="corp" rows="15" cols="100"></textarea>
<?php

if (isset($_POST['newsletter'])) {
	$_SESSION['sujet'] = (isset($_POST['sujet'])?$_POST['sujet']:'');
	$_SESSION['corp'] = (isset($_POST['corp'])?$_POST['corp']:'');
	$sujet = $_SESSION['sujet'];
	$corp = $_SESSION['corp'];

	include ('newsletter.php');
		
	session_destroy();
}
?>
		<button type="submit" name="newsletter">Envoyer</button>
	</form>
</body>
</html>