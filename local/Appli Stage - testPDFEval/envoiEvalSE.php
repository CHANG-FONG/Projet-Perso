<?php 
session_start();
include ('connexionBDDstage.php');

$stagiaire = intval($_GET['idstagiaire']);

#Déjà eval commence
$SQLDeja_eval = 'SELECT evaluer.id FROM evaluer INNER JOIN stage ON evaluer.id = stage.id_renseign_stage WHERE idEtudiant = :stagiaire';
$SQLResult_eval = $BDDConn->prepare($SQLDeja_eval);
$SQLResult_eval->bindValue(':stagiaire', $stagiaire);
if (!$SQLResult_eval->execute()) {
	var_dump($SQLResult_eval->errorInfo());
};

if($SQLResult_eval->rowCount() == 0){

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
}

if (isset($_POST['A_1'])) {
	$A1 = $_POST['A_1'];
	print($A1);
}

if (isset($_POST['A_2'])) {
	$A2 = $_POST['A_2'];
	print($A2);
}

if (isset($_POST['A_3'])) {
	$A3 = $_POST['A_3'];
	print($A3);
}

if (isset($_POST['A_4'])) {
	$A4 = $_POST['A_4'];
	print($A4);
}

if (isset($_POST['A_5'])) {
	$A5 = $_POST['A_5'];
	print($A5);
}

if (isset($_POST['A_6'])) {
	$A6 = $_POST['A_6'];
	print($A6);
}

if (isset($_POST['R_1'])) {
	$R1 = $_POST['R_1'];
	print($R1);
}

if (isset($_POST['R_2'])) {
	$R2 = $_POST['R_2'];
	print($R2);
}

if (isset($_POST['R_3'])) {
	$R3 = $_POST['R_3'];
	print($R3);
}

if (isset($_POST['R_4'])) {
	$R4 = $_POST['R_4'];
	print($R4);
}

if (isset($_POST['R_5'])) {
	$R5 = $_POST['R_5'];
	print($R5);
}

if (isset($_POST['Re_1'])) {
	$Re1 = $_POST['Re_1'];
	print($Re1);
}

if (isset($_POST['Re_2'])) {
	$Re2 = $_POST['Re_2'];
	print($Re2);
}

if (isset($_POST['Re_3'])) {
	$Re3 = $_POST['Re_3'];
	print($Re3);
}

if (isset($_POST['Re_4'])) {
	$Re4 = $_POST['Re_4'];
	print($Re4);
}

if (isset($_POST['Re_5'])) {
	$Re5 = $_POST['Re_5'];
	print($Re5);
}

if (isset($_POST['Re_6'])) {
	$Re6 = $_POST['Re_6'];
	print($Re6);
}

if (isset($_POST['Ac_1'])) {
	$Ac1 = $_POST['Ac_1'];
	print($Ac1);
}

if (isset($_POST['Ac_2'])) {
	$Ac2 = $_POST['Ac_2'];
	print($Ac2);
}

if (isset($_POST['Ac_3'])) {
	$Ac3 = $_POST['Ac_3'];
	print($Ac3);
}

if (isset($_POST['Ac_4'])) {
	$Ac4 = $_POST['Ac_4'];
	print($Ac4);
}

if (isset($_POST['Ac_5'])) {
	$Ac5 = $_POST['Ac_5'];
	print($Ac5);
}

if (isset($_POST['Ac_6'])) {
	$Ac6 = $_POST['Ac_6'];
	print($Ac6);
}
/*
$arrayName = array('Ac1' => $A1, 
					'Ac2' => $A2, 
					'Ac3' => $A3, 
					'Ac4' => $A4, );
foreach ($arrayName as $key) {
	echo ($arrayName->VALUES);
}
*/

$SQLStage = 'SELECT COALESCE (max(id),0)+1 as idevale FROM evals_e ';
$SQLStmt = $BDDConn->prepare($SQLStage);
$SQLStmt->execute();
$SQLROW = $SQLStmt->fetch(PDO::FETCH_ASSOC);
$idstage = $SQLROW['idevale'];
$SQLStmt->closeCursor();

#Table evaluer

$SQLeval = 'UPDATE evaluer SET idblocS_E = :idbloc ON id = :recID';
$SQLStmt = $BDDConn->prepare($SQLeval);
$SQLStmt->bindValue(':idbloc', $idstage);
$SQLStmt->bindValue(':recID', $idEvale);
if (!$SQLStmt->execute()) {
	var_dump($SQLStmt->errorInfo());
}

$SQLcontien_se = 'INSERT INTO evals_e(id) VALUES (:id)';
$SQLStmt = $BDDConn->prepare($SQLcontien_se);
$SQLStmt->bindValue(':id', $idstage);
if (!$SQLStmt->execute()) {
	var_dump($SQLStmt->errorInfo());
}

$SQLQuery_se = 'SELECT id FROM se';
$SQLResult = $BDDConn->query($SQLQuery_se);

if ($SQLResult->rowCount() == 0) {
	var_dump(0);
}else{

$SQLRow = $SQLResult->fetch(PDO::FETCH_ASSOC);
	function envoiresultat($SQLRow, $idstage, $BDDConn, $aEnvoyer)	{
		$queryid = 'SELECT COALESCE (max(id),0)+1 as ids_e FROM contiens_e ';
		$SQLStmt = $BDDConn->prepare($queryid);
		$SQLStmt->execute();
		$SQLROw = $SQLStmt->fetch(PDO::FETCH_ASSOC);
		$ids_e = $SQLROw['ids_e'];
		$SQLStmt->closeCursor();

		$SQLs_e = 'INSERT INTO contiens_e(id, idS_E, idcompSE, idniveauSE) VALUES (:id, :idS_E, :idcompSE, :idniveauSE)';
		$SQLStmt = $BDDConn->prepare($SQLs_e);
		$SQLStmt->bindValue(':id', $ids_e);
		$SQLStmt->bindValue(':idS_E', $idstage);
		$SQLStmt->bindValue(':idcompSE', $SQLRow['id']);
		$SQLStmt->bindValue('idniveauSE', $aEnvoyer);
		if (!$SQLStmt->execute()) {
			var_dump($SQLStmt->errorInfo());
		}
	}

envoiresultat($SQLRow, $idstage, $BDDConn, $A1);
envoiresultat($SQLRow, $idstage, $BDDConn, $A2);
envoiresultat($SQLRow, $idstage, $BDDConn, $A3);
envoiresultat($SQLRow, $idstage, $BDDConn, $A4);
envoiresultat($SQLRow, $idstage, $BDDConn, $A5);
envoiresultat($SQLRow, $idstage, $BDDConn, $A6);

envoiresultat($SQLRow, $idstage, $BDDConn, $R1);
envoiresultat($SQLRow, $idstage, $BDDConn, $R2);
envoiresultat($SQLRow, $idstage, $BDDConn, $R3);
envoiresultat($SQLRow, $idstage, $BDDConn, $R4);
envoiresultat($SQLRow, $idstage, $BDDConn, $R5);

envoiresultat($SQLRow, $idstage, $BDDConn, $Re1);
envoiresultat($SQLRow, $idstage, $BDDConn, $Re2);
envoiresultat($SQLRow, $idstage, $BDDConn, $Re3);
envoiresultat($SQLRow, $idstage, $BDDConn, $Re4);
envoiresultat($SQLRow, $idstage, $BDDConn, $Re5);
envoiresultat($SQLRow, $idstage, $BDDConn, $Re6);

envoiresultat($SQLRow, $idstage, $BDDConn, $Ac1);
envoiresultat($SQLRow, $idstage, $BDDConn, $Ac2);
envoiresultat($SQLRow, $idstage, $BDDConn, $Ac3);
envoiresultat($SQLRow, $idstage, $BDDConn, $Ac4);
envoiresultat($SQLRow, $idstage, $BDDConn, $Ac5);
envoiresultat($SQLRow, $idstage, $BDDConn, $Ac6);

	
	$SQLResult->closeCursor();

	header("Location:evalESP2.php?id=".$_SESSION['id']."&idstagiaire=".$_SESSION['idstagiaire']);
}
?>