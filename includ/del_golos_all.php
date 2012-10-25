<?php
	session_start();
	header ("Content-type:text/html; charset=utf-8");
	require ('func_db_pdo.php');
	require ('../bd.php'); 
	error_reporting (E_ALL);
	header("Location:".$_SERVER['HTTP_REFERER']);
	
	//id novunu
	$news_id = $_GET['id'];
	
	$gol = delete_gol_all($news_id, $db);
	
?>