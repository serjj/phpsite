<?php
session_start();
	require ('../func_db_pdo.php');
	require ('../../bd.php'); 
	error_reporting (E_ALL);
	
	
	$id = $_SESSION['id'];
	$lastdate = $_SESSION['lastdate'];
	
	$result = update_lastdate($lastdate, $id, $db);
	session_destroy();
header("Location: ../../index.php");
?>