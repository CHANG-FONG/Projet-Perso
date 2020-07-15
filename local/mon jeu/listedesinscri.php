<?php
	session_start();
?>
<?php
		$dbConn = null;
		try{
			/*
			 * Ouverture de la connexion à la base de données
			 */
			$dbConn = new PDO('mysql:host=localhost;port=3309;charset=utf8;dbname=inscription', 'root', 'root');
		}catch (PDOException $ex){
			
			 //* En cas d'erreur, gestion d'une exception (à voir plus tard)
			 
			print($ex->getMessage('error'));
		}
	?>
	
<!DOCTYPE html>
<html>
<head>
	<title>Ajouter</title>
	<meta charset="utf-8">
</head>
<body>
	<section>
		<table style="width:60%">
			<tr>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Email</th>
				<th>Mot de Passe</th>
				<th colspan="2">Action</th>
			</tr>

			<?php

			if (!empty($_GET)) {
				if(isset($_GET['id'])){ // isset($_GET['id'] : Pour voir si il y a un id
					$id = $_GET['id'];
					$SQLQuery = "DELETE FROM detail WHERE id = '$id'";
					$dbConn->query($SQLQuery);
				}
			}

			/*if (!empty($_GET)) {
				if (isset($_POST['modif'])) {
					if (isset($_GET['id'])) {
						$id = $_GET['id'];
						$SQLQuery = "SELECT * FROM detail WHERE id = '$id'";
						$SQLResult = $dbConn->query($SQLQuery);
						while ($SQLRow = $SQLResult->fetch(PDO::FETCH_ASSOC)) {
							$_SESSION['nom'] = $SQLRow['nom'];
							$_SESSION['prenom'] = $SQLRow['prenom'];
							$_SESSION['email'] = $SQLRow['email'];
						}
					}
				}
			}*/
				
			$SQLQuery = 'SELECT id, nom, prenom, email, mdp ';
			$SQLQuery .= 'FROM detail ';
			$SQLQuery .= 'ORDER BY nom, prenom ';

			//Exécution de la requête
			$SQLResult = $dbConn->query($SQLQuery);

			//Lecture du résultat renvoyé par l'exécution précédente
			if ($SQLResult->rowCount() == 0){
				print('<tr><td colspan="4">Aucun enregistrement ne correspond à la demande</td></tr>');
			}else{
				$script = '';
				//Plusieurs lignes dans mon résultat donc boucle pour parcourir tous les enregistrements
				
				//L'istruction fetch renvoie l'enregistrement en cours de lecture sous la forme d'un tableau
				while($SQLRow = $SQLResult->fetch(PDO::FETCH_ASSOC)){
					
						$script .= '<tr>';
					/*	$script .= '<td>'.$SQLRow['id'].'</td>';*/
						$script .= '<td>'.$SQLRow['nom'].'</td>';
						$script .= '<td>'.$SQLRow['prenom'].'</td>';
						$script .= '<td>'.$SQLRow['email'].'</td>';
						$script.='<td>'.$SQLRow['mdp'].'</td>';

						$script.='<td> <a href="inscription.php?id='.$SQLRow['id'].'"> <button name = "modif" type = "submit">Modifier</button></a> </td>';
						$script.='<td> <a href="listedesinscri.php?id='.$SQLRow['id'].'"> <button>effacer</button></a> </td>';
						$script .= '</tr>';

				}
				//Fermeture de la requête pour libérer les ressources
				$SQLResult->closeCursor();
				print($script);
			}
			/*$script .='<tr><td colspan="4" style="text-align: right">'.$SQLResult->rowCount().'</td></tr>';*/

			?>
		</table>
	</section>
	<button><a href = "inscription.php">Ajouter</a></button>

</body>
</html>