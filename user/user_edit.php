<?php 
	session_start(); 
	header ("Content-type:text/html; charset=utf-8");
	require ('../includ/func_db_pdo.php');
	require ('../bd.php'); 
	require ('includ/lang.php');
	error_reporting (E_ALL);
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
		
		$result = select_user($id, $db);
		$myrows = $result->fetch(PDO::FETCH_ASSOC);
		?>

		<form action="user_edit_upload.php" method="post" enctype="multipart/form-data">
   	<p>
		<label><?php echo $array["ava_mb"];?><br></label>
		<input name="ava" type="file">
    </p>
	<p>
		<label><?php echo $array["ch_name"];?><br></label>
		<input value="<?php echo $myrows['name']?>" name="name" type="text" size="15" maxlength="15">
    </p>
	<p>
		<label><?php echo $array["ch_soname"];?><br></label>
		<input value="<?php echo $myrows['soname']?>" name="soname" type="text" size="15" maxlength="15">
    </p>
    <p>
		<label><?php echo $array["ch_email"];?><br></label>
		<input value="<?php echo $myrows['pochta']?>" name="pochta" type="text" size="55" maxlength="55">
    </p>
	<?php //зміна рівня доступу доступна тільки адміністратору
		if ($_SESSION['Dostup']==1) {
			echo ("
			<p>
				<label>".$array["ch_dostup"]."<br></label>
				<input value='$myrows[Dostup]' name='Dostup' type='text' size='15' maxlength='15'>
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