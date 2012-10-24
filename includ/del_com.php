<?php
	session_start();
	header ("Content-type:text/html; charset=utf-8");
	include ('../bd.php');
	header("Location:".$_SERVER['HTTP_REFERER']);
	$id = $_GET['id'];
	$result=mysql_query ("DELETE FROM comments WHERE id=$id",$db);
?>