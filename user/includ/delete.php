<?php 
	session_start ();
	include ('../../bd.php');
	$id = $_GET['id'];
	mysql_query ("DELETE FROM users WHERE id=$id",$db);
	unlink ('../../img/avatar/'.$id.'/'.$id.'.jpg');
	rmdir ('../../img/avatar/'.$id);
	header("Location:".$_SERVER['HTTP_REFERER']);
	?>