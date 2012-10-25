<?php
	session_start();
	header ("Content-type:text/html; charset=utf-8");
	require ('../includ/func_db_pdo.php');
	require ('../bd.php'); 
	error_reporting (E_ALL);
	header("Location:".$_SERVER['HTTP_REFERER']);
	
	// id новини
	$news_id = $_SESSION['news_id'];
	//id korusyvacha
	$user_id = $_SESSION['id'];
	//oцінка яку поставив  користувач
	$rez_user = $_POST["vid"];

	$gol = golos_add($news_id, $user_id, $rez_user, $db);
?>