<?php 
	session_start(); 
	include ('../bd.php');
	header ("Content-type:text/html; charset=utf-8");
	include ('includ/lang.php');
	error_reporting (e_all);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $array["u_page"];?></title>
<link href="../style.css" rel="stylesheet" type="text/css">
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
		$id = $_GET['id'];
		$user=mysql_query ("SELECT * FROM users WHERE id=$id",$db);
		$myrows=mysql_fetch_array ($user);
		?>

		<form action="user_edit_upload.php" method="post" enctype="multipart/form-data">
   	<p>
		<label><?php echo $array["ava_mb"];?><br></label>
		<input name="ava" type="file">
    </p>
	<p>
		<label><?php echo $array["ch_name"];?><br></label>
		<input value="<?php echo $myrows[name]?>" name="name" type="text" size="15" maxlength="15">
    </p>
	<p>
		<label><?php echo $array["ch_soname"];?><br></label>
		<input value="<?php echo $myrows[soname]?>" name="soname" type="text" size="15" maxlength="15">
    </p>
    <p>
		<label><?php echo $array["ch_email"];?><br></label>
		<input value="<?php echo $myrows[pochta]?>" name="pochta" type="text" size="55" maxlength="55">
    </p>
	<?php //зміна рівня доступу доступна тільки адміністратору
		if ($_SESSION['Dostup']==1) {
			echo ("
			<p>
				<label>".$array["ch_dostup"]."<br></label>
				
			</p> ");
			
			} else {
			echo "<input value='$myrows[Dostup]' name='Dostup' type='hidden' size='15' maxlength='15'>";
		echo $array["not_admin"];
		}
	?>
	<p>
		<input value="<?php echo $id?>" name="id" type="hidden" size="55" maxlength="55">
    </p>
	<p>
    <input type="submit" name="submit" value="Save Change ">
	</p>
</form>
			
	
	</td>
  </tr>
  

<?php include ('includ/footer.php') ?></table>

</body>
</html>