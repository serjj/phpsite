<?php 
	session_start ();
	require ('../../includ/func_db_pdo.php');
	require ('../../bd.php'); 
	
	$id = $_GET['id'];
	$del = delete_user($id, $db);
	unlink ('../../img/avatar/'.$id.'/'.$id.'.jpg');
	rmdir ('../../img/avatar/'.$id);
	header("Location:".$_SERVER['HTTP_REFERER']);
?>