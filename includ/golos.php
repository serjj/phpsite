<?php
	session_start();
	header ("Content-type:text/html; charset=utf-8");
	include ('../bd.php');
	error_reporting (E_ALL);
	header("Location:".$_SERVER['HTTP_REFERER']);
	
	// id новини
	$news_id = $_SESSION['news_id'];
	//id korusyvacha
	$user_id = $_SESSION['id'];
	//oцінка яку поставив  користувач
	$rez_user = $_POST["vid"];
	
	echo $news_id.$user_id.$rez_user;
	$gol = mysql_query("INSERT INTO golos SET news_id=$news_id, user_id=$user_id, rez_user=$rez_user ",$db);
?>