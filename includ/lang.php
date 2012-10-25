<?php
	$lang = isset($_SESSION["lang"])? $_SESSION["lang"]: "ua";
	$array = parse_ini_file("lang/".$lang.".ini");
	if ($lang == "ua")
		$_SESSION['lang_id'] = 1;	
	if ($lang == "en")
		$_SESSION['lang_id'] = 2;

?>