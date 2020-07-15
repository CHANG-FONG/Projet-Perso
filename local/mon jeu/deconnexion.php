<?php
session_start();
$_SESSION = array();
header("Location: connection.php");
session_destroy();
?>