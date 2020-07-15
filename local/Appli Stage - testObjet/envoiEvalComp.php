<?php 
session_start();
include ('connexionBDDstage.php');

$stagiaire = intval($_GET['idstagiaire']);

#L'éval a déjà commencée
$SQLDeja_eval = 'SELECT id_renseign_stage FROM stage WHERE idEtudiant = :stagiaire';
$SQLStmt = $BDDConn->prepare($SQLDeja_eval);
$SQLStmt->bindValue(':stagiaire', $stagiaire);
if (!$SQLStmt->execute()) {
	var_dump($SQLStmt->errorInfo());
}
$SQLrow = $SQLStmt->fetch(PDO::FETCH_ASSOC);
$idstag = $SQLrow['id_renseign_stage'];
$SQLStmt->closeCursor();

if($idstag == 0){

	# Renseigner évale
	$Insert_eval = 'SELECT COALESCE (max(id),0)+1 as idEvale FROM evaluer ';
	$SQLStmt = $BDDConn->prepare($Insert_eval);
	$SQLStmt->execute();
	$SQLRoW = $SQLStmt->fetch(PDO::FETCH_ASSOC);
	$idEvale = $SQLRoW['idEvale'];
	$SQLStmt->closeCursor();

	$SQLInsert_eval = 'INSERT INTO evaluer(id) VALUES (:id)';
	$SQLResult_insert = $BDDConn->prepare($SQLInsert_eval);
	$SQLStmt->bindValue(':id', $idEvale);
	if (!$SQLStmt->execute()) {
		var_dump($SQLStmt->errorInfo());
	}

	$SQLInsert_stage = 'UPDATE stage SET id_renseign_stage = :ideval ON idEtudiant = :stagiaire)';
	$SQLStmt = $BDDConn->prepare($SQLInsert_stage);
	$SQLStmt->bindValue(':ideval', $idEvale);
	$SQLStmt->bindValue(':stagiaire', $stagiaire);
	if ($SQLStmt->execute()) {
		var_dump($SQLStmt->errorInfo());
	}
}else{
	$Row = $SQLResult_eval->fetch(PDO::FETCH_ASSOC);
	$idEvale = $Row['id'];
	print($idEval);
}

if (isset($_POST['Bl1_1'])) {
	$Bl11 = $_POST['Bl1_1'];
}

if (isset($_POST['Bl1_2'])) {
	$Bl12 = $_POST['Bl1_2'];
}

if (isset($_POST['Bl1_3'])) {
	$Bl13 = $_POST['Bl1_3'];
}

if (isset($_POST['Bl2_1'])) {
	$Bl21 = $_POST['Bl2_1'];
}

if (isset($_POST['Bl2_2'])) {
	$Bl22 = $_POST['Bl2_2'];
}

if (isset($_POST['Bl2_3'])) {
	$Bl23 = $_POST['Bl2_3'];
}

if (isset($_POST['Bl3_1'])) {
	$Bl31 = $_POST['Bl3_1'];
}

if (isset($_POST['Bl3_2'])) {
	$Bl32 = $_POST['Bl3_2'];
}

if (isset($_POST['Bl3_3'])) {
	$Bl33 = $_POST['Bl3_3'];
}

if (isset($_POST['Bl4_1'])) {
	$Bl41 = $_POST['Bl4_1'];
}

if (isset($_POST['Bl4_2'])) {
	$Bl42 = $_POST['Bl4_2'];
}

if (isset($_POST['Bl4_3'])) {
	$Bl43 = $_POST['Bl4_3'];
}

if (isset($_POST['Bl5_1'])) {
	$Bl51 = $_POST['Bl5_1'];
}

if (isset($_POST['Bl5_2'])) {
	$Bl52 = $_POST['Bl5_2'];
}

if (isset($_POST['Bl5_3'])) {
	$Bl53 = $_POST['Bl5_3'];
}

$SQLStage = 'SELECT COALESCE (max(id),0)+1 as idevale FROM evalcompe ';
$SQLStmt = $BDDConn->prepare($SQLStage);
$SQLStmt->execute();
$SQLROW = $SQLStmt->fetch(PDO::FETCH_ASSOC);
$idstage = $SQLROW['idevale'];
$SQLStmt->closeCursor();

#Table evaluer

$SQLeval = 'UPDATE evaluer SET idblocCompe = :idbloc ON id = :recID';
$SQLStmt = $BDDConn->prepare($SQLeval);
$SQLStmt->bindValue(':idbloc', $idstage);
$SQLStmt->bindValue(':recID', $idEvale);
if (!$SQLStmt->execute()) {
	var_dump($SQLStmt->errorInfo());
}

$SQLcontien_se = 'INSERT INTO evalcompe(id) VALUES (:id)';
$SQLStmt = $BDDConn->prepare($SQLcontien_se);
$SQLStmt->bindValue(':id', $idstage);
if (!$SQLStmt->execute()) {
	var_dump($SQLStmt->errorInfo());
}

$SQLQuery_se = 'SELECT id FROM competence';
$SQLResult = $BDDConn->query($SQLQuery_se);

if ($SQLResult->rowCount() == 0) {
	var_dump(0);
}else{

	$SQLRow = $SQLResult->fetch(PDO::FETCH_ASSOC);
		$queryid = 'SELECT COALESCE (max(id),0)+1 as ids_e FROM contenirComp ';
		$SQLStmt = $BDDConn->prepare($queryid);
		$SQLStmt->execute();
		$SQLROw = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$ids_e = $SQLROw['ids_e'];
		$SQLStmt->closeCursor();

		$SQLs_e = 'INSERT INTO contenirComp(id, idblocCompe, idcompe, idniveauCompe) VALUES (:id, :idblocCompe, :idcompe, :idniveauCompe)';
		$SQLStmt = $BDDConn->prepare($SQLs_e);
		$SQLStmt->bindValue(':id', $ids_e);
		$SQLStmt->bindValue(':idblocCompe', $idstage);
		$SQLStmt->bindValue(':idcompe', $SQLRow['id']);
		$SQLStmt->bindValue(':idniveauCompe', $Bl11);
		if (!$SQLStmt->execute()) {
			var_dump($SQLStmt->errorInfo());
		}

	$SQLRow = $SQLResult->fetch(PDO::FETCH_ASSOC);
		$queryid = 'SELECT COALESCE (max(id),0)+1 as ids_e FROM contenirComp ';
		$SQLStmt = $BDDConn->prepare($queryid);
		$SQLStmt->execute();
		$SQLROw = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$ids_e = $SQLROw['ids_e'];
		$SQLStmt->closeCursor();

		$SQLs_e = 'INSERT INTO contenirComp(id, idblocCompe, idcompe, idniveauCompe) VALUES (:id, :idblocCompe, :idcompe, :idniveauCompe)';
		$SQLStmt = $BDDConn->prepare($SQLs_e);
		$SQLStmt->bindValue(':id', $ids_e);
		$SQLStmt->bindValue(':idblocCompe', $idstage);
		$SQLStmt->bindValue(':idcompe', $SQLRow['id']);
		$SQLStmt->bindValue(':idniveauCompe', $Bl12);
		if (!$SQLStmt->execute()) {
			var_dump($SQLStmt->errorInfo());
		}
	$SQLRow = $SQLResult->fetch(PDO::FETCH_ASSOC);
		$queryid = 'SELECT COALESCE (max(id),0)+1 as ids_e FROM contenirComp ';
		$SQLStmt = $BDDConn->prepare($queryid);
		$SQLStmt->execute();
		$SQLROw = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$ids_e = $SQLROw['ids_e'];
		$SQLStmt->closeCursor();

		$SQLs_e = 'INSERT INTO contenirComp(id, idblocCompe, idcompe, idniveauCompe) VALUES (:id, :idblocCompe, :idcompe, :idniveauCompe)';
		$SQLStmt = $BDDConn->prepare($SQLs_e);
		$SQLStmt->bindValue(':id', $ids_e);
		$SQLStmt->bindValue(':idblocCompe', $idstage);
		$SQLStmt->bindValue(':idcompe', $SQLRow['id']);
		$SQLStmt->bindValue(':idniveauCompe', $Bl13);
		if (!$SQLStmt->execute()) {
			var_dump($SQLStmt->errorInfo());
		}

	$SQLRow = $SQLResult->fetch(PDO::FETCH_ASSOC);
		$queryid = 'SELECT COALESCE (max(id),0)+1 as ids_e FROM contenirComp ';
		$SQLStmt = $BDDConn->prepare($queryid);
		$SQLStmt->execute();
		$SQLROw = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$ids_e = $SQLROw['ids_e'];
		$SQLStmt->closeCursor();

		$SQLs_e = 'INSERT INTO contenirComp(id, idblocCompe, idcompe, idniveauCompe) VALUES (:id, :idblocCompe, :idcompe, :idniveauCompe)';
		$SQLStmt = $BDDConn->prepare($SQLs_e);
		$SQLStmt->bindValue(':id', $ids_e);
		$SQLStmt->bindValue(':idblocCompe', $idstage);
		$SQLStmt->bindValue(':idcompe', $SQLRow['id']);
		$SQLStmt->bindValue(':idniveauCompe', $Bl21);
		if (!$SQLStmt->execute()) {
			var_dump($SQLStmt->errorInfo());
		}

	$SQLRow = $SQLResult->fetch(PDO::FETCH_ASSOC);
		$queryid = 'SELECT COALESCE (max(id),0)+1 as ids_e FROM contenirComp ';
		$SQLStmt = $BDDConn->prepare($queryid);
		$SQLStmt->execute();
		$SQLROw = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$ids_e = $SQLROw['ids_e'];
		$SQLStmt->closeCursor();

		$SQLs_e = 'INSERT INTO contenirComp(id, idblocCompe, idcompe, idniveauCompe) VALUES (:id, :idblocCompe, :idcompe, :idniveauCompe)';
		$SQLStmt = $BDDConn->prepare($SQLs_e);
		$SQLStmt->bindValue(':id', $ids_e);
		$SQLStmt->bindValue(':idblocCompe', $idstage);
		$SQLStmt->bindValue(':idcompe', $SQLRow['id']);
		$SQLStmt->bindValue(':idniveauCompe', $Bl22);
		if (!$SQLStmt->execute()) {
			var_dump($SQLStmt->errorInfo());
		}
	$SQLRow = $SQLResult->fetch(PDO::FETCH_ASSOC);
		$queryid = 'SELECT COALESCE (max(id),0)+1 as ids_e FROM contenirComp ';
		$SQLStmt = $BDDConn->prepare($queryid);
		$SQLStmt->execute();
		$SQLROw = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$ids_e = $SQLROw['ids_e'];
		$SQLStmt->closeCursor();

		$SQLs_e = 'INSERT INTO contenirComp(id, idblocCompe, idcompe, idniveauCompe) VALUES (:id, :idblocCompe, :idcompe, :idniveauCompe)';
		$SQLStmt = $BDDConn->prepare($SQLs_e);
		$SQLStmt->bindValue(':id', $ids_e);
		$SQLStmt->bindValue(':idblocCompe', $idstage);
		$SQLStmt->bindValue(':idcompe', $SQLRow['id']);
		$SQLStmt->bindValue(':idniveauCompe', $Bl23);
		if (!$SQLStmt->execute()) {
			var_dump($SQLStmt->errorInfo());
		}
	$SQLRow = $SQLResult->fetch(PDO::FETCH_ASSOC);
		$queryid = 'SELECT COALESCE (max(id),0)+1 as ids_e FROM contenirComp ';
		$SQLStmt = $BDDConn->prepare($queryid);
		$SQLStmt->execute();
		$SQLROw = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$ids_e = $SQLROw['ids_e'];
		$SQLStmt->closeCursor();

		$SQLs_e = 'INSERT INTO contenirComp(id, idblocCompe, idcompe, idniveauCompe) VALUES (:id, :idblocCompe, :idcompe, :idniveauCompe)';
		$SQLStmt = $BDDConn->prepare($SQLs_e);
		$SQLStmt->bindValue(':id', $ids_e);
		$SQLStmt->bindValue(':idblocCompe', $idstage);
		$SQLStmt->bindValue(':idcompe', $SQLRow['id']);
		$SQLStmt->bindValue(':idniveauCompe', $Bl31);
		if (!$SQLStmt->execute()) {
			var_dump($SQLStmt->errorInfo());
		}

	$SQLRow = $SQLResult->fetch(PDO::FETCH_ASSOC);
		$queryid = 'SELECT COALESCE (max(id),0)+1 as ids_e FROM contenirComp ';
		$SQLStmt = $BDDConn->prepare($queryid);
		$SQLStmt->execute();
		$SQLROw = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$ids_e = $SQLROw['ids_e'];
		$SQLStmt->closeCursor();

		$SQLs_e = 'INSERT INTO contenirComp(id, idblocCompe, idcompe, idniveauCompe) VALUES (:id, :idblocCompe, :idcompe, :idniveauCompe)';
		$SQLStmt = $BDDConn->prepare($SQLs_e);
		$SQLStmt->bindValue(':id', $ids_e);
		$SQLStmt->bindValue(':idblocCompe', $idstage);
		$SQLStmt->bindValue(':idcompe', $SQLRow['id']);
		$SQLStmt->bindValue(':idniveauCompe', $Bl32);
		if (!$SQLStmt->execute()) {
			var_dump($SQLStmt->errorInfo());
		}
	$SQLRow = $SQLResult->fetch(PDO::FETCH_ASSOC);
		$queryid = 'SELECT COALESCE (max(id),0)+1 as ids_e FROM contenirComp ';
		$SQLStmt = $BDDConn->prepare($queryid);
		$SQLStmt->execute();
		$SQLROw = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$ids_e = $SQLROw['ids_e'];
		$SQLStmt->closeCursor();

		$SQLs_e = 'INSERT INTO contenirComp(id, idblocCompe, idcompe, idniveauCompe) VALUES (:id, :idblocCompe, :idcompe, :idniveauCompe)';
		$SQLStmt = $BDDConn->prepare($SQLs_e);
		$SQLStmt->bindValue(':id', $ids_e);
		$SQLStmt->bindValue(':idblocCompe', $idstage);
		$SQLStmt->bindValue(':idcompe', $SQLRow['id']);
		$SQLStmt->bindValue(':idniveauCompe', $Bl33);
		if (!$SQLStmt->execute()) {
			var_dump($SQLStmt->errorInfo());
		}
	$SQLRow = $SQLResult->fetch(PDO::FETCH_ASSOC);
		$queryid = 'SELECT COALESCE (max(id),0)+1 as ids_e FROM contenirComp ';
		$SQLStmt = $BDDConn->prepare($queryid);
		$SQLStmt->execute();
		$SQLROw = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$ids_e = $SQLROw['ids_e'];
		$SQLStmt->closeCursor();

		$SQLs_e = 'INSERT INTO contenirComp(id, idblocCompe, idcompe, idniveauCompe) VALUES (:id, :idblocCompe, :idcompe, :idniveauCompe)';
		$SQLStmt = $BDDConn->prepare($SQLs_e);
		$SQLStmt->bindValue(':id', $ids_e);
		$SQLStmt->bindValue(':idblocCompe', $idstage);
		$SQLStmt->bindValue(':idcompe', $SQLRow['id']);
		$SQLStmt->bindValue(':idniveauCompe', $Bl41);
		if (!$SQLStmt->execute()) {
			var_dump($SQLStmt->errorInfo());
		}

	$SQLRow = $SQLResult->fetch(PDO::FETCH_ASSOC);
		$queryid = 'SELECT COALESCE (max(id),0)+1 as ids_e FROM contenirComp ';
		$SQLStmt = $BDDConn->prepare($queryid);
		$SQLStmt->execute();
		$SQLROw = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$ids_e = $SQLROw['ids_e'];
		$SQLStmt->closeCursor();

		$SQLs_e = 'INSERT INTO contenirComp(id, idblocCompe, idcompe, idniveauCompe) VALUES (:id, :idblocCompe, :idcompe, :idniveauCompe)';
		$SQLStmt = $BDDConn->prepare($SQLs_e);
		$SQLStmt->bindValue(':id', $ids_e);
		$SQLStmt->bindValue(':idblocCompe', $idstage);
		$SQLStmt->bindValue(':idcompe', $SQLRow['id']);
		$SQLStmt->bindValue(':idniveauCompe', $Bl42);
		if (!$SQLStmt->execute()) {
			var_dump($SQLStmt->errorInfo());
		}
	$SQLRow = $SQLResult->fetch(PDO::FETCH_ASSOC);
		$queryid = 'SELECT COALESCE (max(id),0)+1 as ids_e FROM contenirComp ';
		$SQLStmt = $BDDConn->prepare($queryid);
		$SQLStmt->execute();
		$SQLROw = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$ids_e = $SQLROw['ids_e'];
		$SQLStmt->closeCursor();

		$SQLs_e = 'INSERT INTO contenirComp(id, idblocCompe, idcompe, idniveauCompe) VALUES (:id, :idblocCompe, :idcompe, :idniveauCompe)';
		$SQLStmt = $BDDConn->prepare($SQLs_e);
		$SQLStmt->bindValue(':id', $ids_e);
		$SQLStmt->bindValue(':idblocCompe', $idstage);
		$SQLStmt->bindValue(':idcompe', $SQLRow['id']);
		$SQLStmt->bindValue(':idniveauCompe', $Bl43);
		if (!$SQLStmt->execute()) {
			var_dump($SQLStmt->errorInfo());
		}
	$SQLRow = $SQLResult->fetch(PDO::FETCH_ASSOC);
		$queryid = 'SELECT COALESCE (max(id),0)+1 as ids_e FROM contenirComp ';
		$SQLStmt = $BDDConn->prepare($queryid);
		$SQLStmt->execute();
		$SQLROw = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$ids_e = $SQLROw['ids_e'];
		$SQLStmt->closeCursor();

		$SQLs_e = 'INSERT INTO contenirComp(id, idblocCompe, idcompe, idniveauCompe) VALUES (:id, :idblocCompe, :idcompe, :idniveauCompe)';
		$SQLStmt = $BDDConn->prepare($SQLs_e);
		$SQLStmt->bindValue(':id', $ids_e);
		$SQLStmt->bindValue(':idblocCompe', $idstage);
		$SQLStmt->bindValue(':idcompe', $SQLRow['id']);
		$SQLStmt->bindValue(':idniveauCompe', $Bl51);
		if (!$SQLStmt->execute()) {
			var_dump($SQLStmt->errorInfo());
		}

	$SQLRow = $SQLResult->fetch(PDO::FETCH_ASSOC);
		$queryid = 'SELECT COALESCE (max(id),0)+1 as ids_e FROM contenirComp ';
		$SQLStmt = $BDDConn->prepare($queryid);
		$SQLStmt->execute();
		$SQLROw = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$ids_e = $SQLROw['ids_e'];
		$SQLStmt->closeCursor();

		$SQLs_e = 'INSERT INTO contenirComp(id, idblocCompe, idcompe, idniveauCompe) VALUES (:id, :idblocCompe, :idcompe, :idniveauCompe)';
		$SQLStmt = $BDDConn->prepare($SQLs_e);
		$SQLStmt->bindValue(':id', $ids_e);
		$SQLStmt->bindValue(':idblocCompe', $idstage);
		$SQLStmt->bindValue(':idcompe', $SQLRow['id']);
		$SQLStmt->bindValue(':idniveauCompe', $Bl52);
		if (!$SQLStmt->execute()) {
			var_dump($SQLStmt->errorInfo());
		}
	$SQLRow = $SQLResult->fetch(PDO::FETCH_ASSOC);
		$queryid = 'SELECT COALESCE (max(id),0)+1 as ids_e FROM contenirComp ';
		$SQLStmt = $BDDConn->prepare($queryid);
		$SQLStmt->execute();
		$SQLROw = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$ids_e = $SQLROw['ids_e'];
		$SQLStmt->closeCursor();

		$SQLs_e = 'INSERT INTO contenirComp(id, idblocCompe, idcompe, idniveauCompe) VALUES (:id, :idblocCompe, :idcompe, :idniveauCompe)';
		$SQLStmt = $BDDConn->prepare($SQLs_e);
		$SQLStmt->bindValue(':id', $ids_e);
		$SQLStmt->bindValue(':idblocCompe', $idstage);
		$SQLStmt->bindValue(':idcompe', $SQLRow['id']);
		$SQLStmt->bindValue(':idniveauCompe', $Bl53);
		if (!$SQLStmt->execute()) {
			var_dump($SQLStmt->errorInfo());
		}
		$SQLResult->closeCursor();

	header("Location:Evaluation.php?id=".$_SESSION['id']."&idstagiaire=".$_SESSION['idstagiaire']);
}
?>