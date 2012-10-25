<?php
	session_start();
	require ('../includ/func_db_pdo.php');
	require ('../bd.php'); 
	error_reporting (E_ALL);
	header("Location:".$_SERVER['HTTP_REFERER']);
	
	$id = $_GET['id'];
	$result= delete_com($id, $db);
?>