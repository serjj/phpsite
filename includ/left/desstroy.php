<?php
session_start();
include ("../../bd.php");
//echo ("$_SESSION[id]$_SESSION[lastdate]$_SESSION[Dostup]$_SESSION[login]");
	$id = $_SESSION['id'];
	$lastdate = $_SESSION['lastdate'];
	$result=mysql_query ("UPDATE users SET lastdate='$lastdate'  WHERE id='$id'",$db);
	session_destroy();
header("Location: ../../index.php");
?>