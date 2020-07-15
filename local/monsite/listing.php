	<?php
		$dbConn = null;
		try{
			/*
			 * Ouverture de la connexion à la base de données
			 */
			$dbConn = new PDO('mysql:host=localhost;port=3306;charset=utf8;dbname=lol3', 'root', 'root');
		}catch (PDOException $ex){
			/*
			 * En cas d'erreur, gestion d'une exception (à voir plus tard)
			 */
			print($ex->getMessage('error'));
		}
	?>

<!DOCTYPE html>
<html>
<head>
	<style>
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}
		
	</style>
	<title>Liste</title>
</head>
<body>
	<section>
		
	</section>
	<div><h1>Liste</h1></div>
	<nav>
		<ul>
			<li><a href="index.php">Accueil</a></li>
			<li><a href="listing.php">Liste</a></li>
			<li><a href="fichier.php">Ajout</a></li>
		</ul>
	</nav>
	<section>
		
		<table style="width:60%">
			<tr>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Email</th>
				<th colspan="2">Action</th>
			</tr>
			
			<?php
			if (!empty($_GET)) {
				if(isset($_GET['id'])){ // isset($_GET['id'] : Pour voir si il y a un id
					$id = $_GET['id'];
					$SQLQuery = "DELETE FROM personne3 WHERE id = '$id'";
					$dbConn->query($SQLQuery);
				}
			}
				
			$SQLQuery = 'SELECT id, nom, prenom, email ';
			$SQLQuery .= 'FROM personne3 ';
			$SQLQuery .= 'ORDER BY nom, prenom';

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
						$script .= '<td>'.$SQLRow['id'].'</td>';
						$script .= '<td>'.$SQLRow['nom'].'</td>';
						$script .= '<td>'.$SQLRow['prenom'].'</td>';
						$script .= '<td>'.$SQLRow['email'].'</td>';
						$script.='<td> <a href="fichier.php?id='.$SQLRow['id'].'"> <button>entre</button></a> </td>';
						$script.='<td> <a href="listing.php?id='.$SQLRow['id'].'"> <button>effacer</button></a> </td>';
						$script .= '</tr>';
				}

				//Fermeture de la requête pour libérer les ressources
				$SQLResult->closeCursor();
			}
			$script .= '<tr><td colspan="4" style="text-align: right">'.$SQLResult->rowCount().'</td></tr>';
			print($script);

			?>
		</table>
	</section>
</body>
</html>