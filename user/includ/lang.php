<?php
	$lang = isset($_SESSION["lang"])? $_SESSION["lang"]: "ua";
	$array = parse_ini_file("../lang/".$lang.".ini");
?>