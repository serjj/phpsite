<?php 
	session_start();
	header ("Content-type:text/html; charset=utf-8");
	include ('includ/lang.php');
    $db = mysql_connect ("localhost","serj","123");
    mysql_select_db("phpsite",$db);
	error_reporting (e_all);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $array["n_news"]; ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="690" border="1" cellspacing="1" cellpadding="1" align="center" bgcolor="#FFFFFF" class="mainborder">
<!-- header-->
<?php include ('includ/header.php') ?>
<tr>
	<!-- left blocks-->
    <?php include ('includ/left/left.php') ?>
    <td width="493" height="400px" align="left" valign="top">
		<form  action="add_news.php" method="post" >
			<!-- вводимо новину на укр мові -->
			<?php echo "<b>Введіть новину на укр. мові</b>";?><br>
			<label>Введіть назву новини<br>
				  <input  name="title" type="text" >
			</label><br>
			<label>Введіть зміст новини<br>
				<textarea name="text" type="text" cols="45" rows="5"></textarea>
			</label><br><hr>
			<!-- вводимо новину на англ мові-->
			<?php echo "<b>Enter news in english</b>"; ?><br>
			<label>Input name news<br>
				<input  name="title_eng" type="text" >
			</label><br>
			<label>Input news<br>
				<textarea name="text_eng" type="text" cols="45" rows="5"></textarea>
			</label><br>
			<label>
				<input type="submit" name="submit" value="<?php echo $array["i_news"]; ?>">
			</label><br>
        </form>        
	</td>
</tr>
<?php include ('includ/footer.php')?></table>

</body>
</html>
