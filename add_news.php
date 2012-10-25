<?php
	session_start();	
	require ('includ/func_db_pdo.php');
	require ('bd.php'); 
	require ('includ/lang.php');
	error_reporting (E_ALL);
	header ("Content-type:text/html; charset=utf-8");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title><?php echo $array["a_news"];?></title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="690" border="1" cellspacing="1" cellpadding="1" align="center" bgcolor="#FFFFFF" class="mainborder">
<!-- header-->
<?php include ('includ/header.php') ?>
  <tr>
  <!-- left blocks-->
<?php include ('includ/left/left.php') ?>
    <td width="560">
<? 
	$title = $_POST['title']; if ($title == '') {unset($title);}
	$text = $_POST['text'];  if ($text == '') {unset($text);}
	$title_eng = $_POST['title_eng']; if ($title_eng == '') {unset($title_eng);}
	$text_eng = $_POST['text_eng'];  if ($text_eng == '') {unset($text_eng);}
	//прибираємо "лишнє" з переданих полів
	$title = stripslashes($title);
    $title = htmlspecialchars($title);
	$text = stripslashes($text);
    $text = htmlspecialchars($text);
	$title = trim($title);
	$title_eng = stripslashes($title_eng);
    $title_eng = htmlspecialchars($title_eng);
	$text_eng = stripslashes($text_eng);
    $text_eng = htmlspecialchars($text_eng);
	$title_eng = trim($title_eng);
	$text = trim($text);
	
	
	$lang = 1;
	$result_ukr = add_news_ukr($title, $text, $lang,$db);
	
	$lang = 2;
	$result_eng = add_news_eng($title_eng, $text_eng, $lang,$db);
	
	if (($result_ukr == true) and ($result_eng == true)) {echo $array["field"];}
	else echo $array["news_ad"];
?>
    </td>
  </tr>
<?php include ('includ/footer.php') ?></table>

</body>
</html>