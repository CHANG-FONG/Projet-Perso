<?php
$dbConn = null;
    try{
    $dbConn = new PDO('mysql:
    host=localhost;
    port=3306;
    charset=utf8;
    dbname=projet_bde',
    //nom utilisateur Mysql
    'root',
    //mot de passe utilisateur Mysql
    'root');
   	}catch (PDOException $ex){
	   print($ex->getMessage());
	}
?>
