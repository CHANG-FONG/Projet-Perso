<?php
	$dbConn = new PDO('mysql:host=localhost;port=3309;charset=utf8;dbname=inscription', 'root', 'root');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profil</title>
	<meta charset="utf-8">

</head>
<body>
	
	</header>
	<div>
		<h1>Profil</h1>
	</div>

	<h3>Formulaire</h3>
<?php
if (!empty($_GET)) {
	if(!empty($_POST)) {
		$id = (isset($_GET['id'])? $_GET['id']:0);
		$pseudo = (isset($_POST['pseudo'])? $_POST['pseudo']:'');
		$secoursemail = (isset($_POST['secoursemail'])? $_POST['secoursemail']:'');
		$questsecours = (isset($_POST['questsecours'])? $_POST['questsecours']:'');
		$rep = (isset($_POST['rep'])? $_POST['rep']:'');
		$newsletter = (isset($_POST['news'])? $_POST['news']: 1);
		$SQLQuery = "UPDATE detail SET pseudo = '$pseudo', secoursemail = '$secoursemail', questsecours = '$questsecours', rep = '$rep' ";
		$SQLQuery .= "WHERE id = $id";
		$dbConn->query($SQLQuery);
				
	}else{
		$id = (isset($_GET['id'])? $_GET['id']:0);
		$SQLQuery = "SELECT * FROM detail WHERE id=$id";
		$SQLResult = $dbConn->query($SQLQuery);
		$personne = $SQLResult->fetch(PDO::FETCH_ASSOC);
		$pseudo = $personne['pseudo'];
		$secoursemail = $personne['secoursemail'];
		$questsecours = $personne['questsecours'];
		$rep = $personne['reponse'];
		$SQLResult->closeCursor();
	}
}else{
	if(empty($_POST)) {
		$pseudo = '';
		$secoursemail = '';
		$questsecours = '';
		$rep = '';
	}else{
		//Insertion
		$queryid = 'SELECT COALESCE (max(id),0)+1 FROM detail as id ';
		$id = (isset($_GET['id'])? $_GET['id']:0);
		$pseudo = (isset($_POST['pseudo'])? $_POST['pseudo']:'');
		$secoursemail = (isset($_POST['secoursemail'])? $_POST['secoursemail']:'');
		$questsecours = (isset($_POST['questsecours'])? $_POST['questsecours']:'');
		$rep = (isset($_POST['rep'])? $_POST['rep']:'');
		$newsletter = (isset($_POST['news'])? $_POST['news']: 1);
		}
	}	
?>
	<div class="form">
	<form method="post" action="">
		<label for="Pseudo">Pseudo</label>
		<input type="text" placeholder="Votre nom" name="pseudo"><br><br>

		<label for="email">Email de secours</label>
		<input type="email" name="secoursemail" placeholder="Votre @email de secours"><br><br>

		<label for="prenom">Question de secours</label>
		<input type="text" name="questsecours" placeholder="?"><br><br>
<?php
$comparemail = "SELECT email FROM detail WHERE id = $id";
$emailpris = $dbConn->query($comparemail);
$emaildontuse = $emailpris->fetch(PDO::FETCH_ASSOC);
?>

		<label>Réponse</label>
		<input type="rep" name="rep" placeholder="Réponse"><br><br>

		<input type="checkbox" name="news"><label>Cochez ici pour recevoir les newsletters du jeu</label>

		<br><br>
<?php
if (isset($_POST['editprofil'])) {
	if (!isset($_POST['pseudo']) AND !isset($_POST['secoursemail']) AND !isset($_POST['questsecours']) AND !isset($_POST['rep'])) {
		$pseudo = '';
		$secoursemail = '';
		$questsecours = '';
		$rep = '';
	}else{
		if ($secoursemail !== $emaildontuse) {
			if (isset($_POST['news'])) {
				$entreprofil = "UPDATE detail " ;
				$entreprofil.= "SET pseudo = '$pseudo', secoursemail = '$secoursemail', questsecours = '$questsecours', reponse = '$rep', recunews = 1 WHERE id = $id ";
				$dbConn->query($entreprofil);
			}else{
				$entreprofil = "UPDATE detail " ;
				$entreprofil.= "SET pseudo = '$pseudo', secoursemail = '$secoursemail', questsecours = '$questsecours', reponse = '$rep', recunews = 0 WHERE id = $id ";
				$dbConn->query($entreprofil);
			}
		}else{
			echo "Cette email est déjà pris";
		}
	}
}

?>
	<button id="butt" type="submit" name="editprofil" value="Envoyer">Envoyer</button>
	<button type="submit" name="retour">Retour</button>
<?php
if (isset($_POST['retour'])) {
	if(isset($_GET['id'])){ // isset($_GET['id'] : Pour voir si il y a un id
		$Profilid = $_GET['id'];
		header("Location: pagejoueur.php?id=".$Profilid);
	}
}	
?>	
	</form>
</div>
	
</body>
</html>