<?php
	header ("content-type: text/html; charset=utf-8");
	session_start ();
	$_SESSION["lang"] = "ua";
	header("Location:".$_SERVER['HTTP_REFERER']);
?>
