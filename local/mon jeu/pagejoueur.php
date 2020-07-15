<?php
session_start();

$dbConn = new PDO('mysql:host=localhost;port=3309;charset=utf8;dbname=inscription', 'root', 'root');

if (isset($_GET['id']) AND $_GET['id'] > 0) {
	$getid = intval($_GET['id']);
	$connid = $dbConn->prepare('SELECT * FROM detail WHERE id = ?');
	$connid->execute(array($getid));
	$tid = $connid->fetch();
?>
<?php
	if ($_SESSION['id'] AND $tid['id'] == $_SESSION['id']) {

	?>
<!DOCTYPE html>
<html>
<head>
	<title>Identification</title>
	<style type="text/css">
		div {
			width: 50%;
			text-align: center;
			margin: 13px;
			box-sizing: border-box;
		}
		p {
			color: red;
		}
		h2 {
			color: blue;
		}
	</style>
</head>

<body>
	<div>
<?php echo "<h1>Bienvenue "."<p>".$tid['nom']; echo " "; echo $tid['prenom']."</p>"."</h1>"; ?>
</div>

	<a href="deconnexion.php">Déconnexion</a>
<form method="post" action="">
	<button type="submit" name="profil">Editer mon profil</button><br>
	<button type="submit" name="recunews">Recevoir les newsletters</button>
	<button type="submit" name="plusdenews">Ne plus recevoir de newsletter</button>
</form>
<?php
if (isset($_POST['recunews']) == 1) {
	echo "<h2>Vous ètes inscris aux newsletters</h2>";
}

if (isset($_POST['profil'])) {
	if (isset($_GET['id'])) {
		$profilid = $_GET['id'];
		header("Location: profil.php?id=".$profilid);
	}

}
?>

<?php
if (isset($_POST['recunews'])) {
	if(isset($_GET['id'])){ // isset($_GET['id'] : Pour voir si il y a un id
		$id = $_GET['id'];
		$SQLQuery = "UPDATE detail SET recunews = 1 WHERE id = $id";

		$dbConn->query($SQLQuery);
	}
}else{
	if (isset($_POST['plusdenews'])) {
		if(isset($_GET['id'])){ // isset($_GET['id'] : Pour voir si il y a un id
		$id = $_GET['id'];
		$SQLQuery = "UPDATE detail SET recunews = 0 WHERE id = $id";
		$dbConn->query($SQLQuery);
		}
	}
}
?>

<?php
	}else{
		header("Location: connection.php");
	}
?>


</body>
</html>
<?php

	}

?>
