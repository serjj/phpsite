<?php
	session_start();
	header ("Content-type:text/html; charset=utf-8");
	include ('bd.php');
	include ('includ/lang.php');
	//оновлення сторінки
	header("Location:".$_SERVER['HTTP_REFERER']);
	error_reporting (E_ALL);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $array["add_comments"] ?></title>
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
<?php
	//перевыряэмо чи не пусті поля
	if (isset($_POST['comments_title'])) { $comments_title = $_POST['comments_title']; if ($comments_title == '') { unset($comments_title);} }
    if (isset($_POST['comments_text'])) { $comments_text=$_POST['comments_text']; if ($comments_text =='') { unset($comments_text);} }
    if (empty($comments_title) || empty($comments_text)){
		exit ($array["input_com"]);
	}
	//фільтруємо дані
		$comments_title = stripslashes($comments_title);
		$comments_title = htmlspecialchars($comments_title);
		$comments_text = stripslashes($comments_text);
		$comments_text = htmlspecialchars($comments_text);
		/*$comments_title = trim($comments_title);
		$comments_text = trim($comments_text);*/
	
	//заносимо в таблиці коментарів дані
	$news_id = $_SESSION['news_id'];
	$author_id = $_SESSION['id'];
	$date = date ('Y-m-d,H-i-s');
	$author = $_SESSION['name']." ".$_SESSION['soname'];
	$result = mysql_query("INSERT INTO comments SET news_id='$news_id', author_id='$author_id', author='$author', comm_title='$comments_title', text='$comments_text', date='$date' ",$db); 
?>
	</td>
</tr>
<?php include ('includ/footer.php') ?></table>

</body>
</html>