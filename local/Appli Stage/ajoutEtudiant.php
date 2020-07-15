<?php 
include ('connexionBDDstage.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<style type="text/css">
		table{
			border-style: solid;
		}
	</style>
	<!-- css bootstrap -->
<?php 
include ('bootstrapCSS4/css.html');
?>
	<link rel="stylesheet" type="text/css" href="ajoutEtudiant.css">
	<title>Nouvelle étudiant</title>
</head>
<body>
	<div id="top">
		<div class="header">
			<img src="EpsiIcon.jpg" class="rounded float-left" alt="">
			<header class="h1">Ajouter un nouvelle étudiant</header>
		</div>
	</div>
	<div class="BarreDeLien">          </div>
		<div class="input-group mb-3 spacing">
			<div class="input-group-prepend">
   				<button name="ajouttudiant" type="submit" class="btn btn-primary">Ajouter</button>
 	 		</div>

 	 		<!-- Choisir un étudiant -->
			<input list="mario" placeholder="Choisisser un étudiant" type="text" name="champ_ajout_etudiant"><br>
			<datalist id="mario">
<?php 
		$SQLQuery = 'SELECT id, nom, prenom ';
		$SQLQuery.= "FROM personne";
		$SQLResult = $BDDConn->query($SQLQuery);

		$script = '';

		while ($SQLRow = $SQLResult->fetch(PDO::FETCH_ASSOC)) {
			$script.= '<option>'.$SQLRow['nom'].' '.$SQLRow['prenom'].'</option>';
		}
		$SQLResult->closeCursor();
		print($script);
			
?>
			</datalist>
			<!-- <p id="etud"></p> -->
		</div>

	<section>
		<table style="width: 60%">
			<tr>
				<th>Nom</th>
				<th>Prenom</th>
			</tr>
<?php 
			$SQLList = 'SELECT nom, prenom ';
			$SQLList.= 'FROM personne ';
			$SQLList.= 'INNER JOIN etudiant ON idetud = personne.id ';
			$SQLList.= 'INNER JOIN stage ON idetud = idEtudiant ';

			$SQLEcho = $BDDConn->query($SQLList);

			if ($SQLEcho->rowCount() == 0) {
				print('<tr><td colspan="2">Aucun étudiant ne fait de stage</td></tr>');
			}else{
				$script = '';

				while ($SQLROW = $SQLEcho->fetch(PDO::FETCH_ASSOC)) {
					$script.= '<tr>';
					$script.= '<td>'.$SQLROW['nom'].'</td>';
					$script.= '<td>'.$SQLROW['prenom'].'</td>';
					$script.= '</tr>';
				}
			}
?>
		</table>
	</section>	
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php  
include ('jqueryVersion/script341.js');
?>
</body>
</html>