<?php
	session_start();
	require ('../includ/func_db_pdo.php');
	require ('../bd.php'); 
	error_reporting (E_ALL);
	header("Location:".$_SERVER['HTTP_REFERER']);
	
	//id novunu
	$news_id = $_GET['id'];
	//id korustuvacha
	$user_id = $_SESSION['id'];
	
	$gol = delete_gol($news_id, $user_id, $db);
	
?>