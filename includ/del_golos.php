<?php
	session_start();
	header ("Content-type:text/html; charset=utf-8");
	include ('../bd.php');
		header("Location:".$_SERVER['HTTP_REFERER']);
	error_reporting (E_ALL);
	
	//id novunu
	$news_id = $_GET['id'];
	//id korustuvacha
	$user_id = $_SESSION['id'];
	$gol = mysql_query("DELETE FROM golos WHERE user_id=$user_id AND news_id=$news_id",$db);
	
?>