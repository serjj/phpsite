<?php
	session_start();	
    $db = mysql_connect ("localhost","serj","123");
    mysql_select_db("phpsite",$db);
	include ('includ/lang.php');
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
	/*$title = stripslashes($title);
    $title = htmlspecialchars($title);
	$text = stripslashes($text);
    $text = htmlspecialchars($text);*
	$title = trim($title);
	$title_eng = stripslashes($title_eng);
    $title_eng = htmlspecialchars($title_eng);
	$text_eng = stripslashes($text_eng);
    $text_eng = htmlspecialchars($text_eng);*
	$title_eng = trim($title_eng);*/
	$text = trim($text);
	$lang = 1;
	$result = mysql_query("INSERT INTO mynews (title, text, lang) VALUES ('$title','$text','$lang')");
	$lang = 2;
	$result = mysql_query("INSERT INTO mynews (title, text, lang) VALUES ('$title_eng','$text_eng','$lang')");
	if ($result == true) echo "<p>You news add</p>";
	else echo $array["field"];
?>
    </td>
  </tr>
<?php include ('includ/footer.php') ?></table>

</body>
</html>