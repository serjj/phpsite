<?php 
	session_start();
	header ("Content-type:text/html; charset=utf-8");
	require ('includ/func_db_pdo.php');
	require ('bd.php'); 
	require ('includ/lang.php');
	error_reporting (E_ALL);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php $array["reg"];?></title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="690" border="1" cellspacing="1" cellpadding="1" align="center" bgcolor="#FFFFFF" class="mainborder">
<!-- header-->
<?php include ('includ/header.php') ?>
  <tr>
  <!-- left blocks-->
    <?php include ('includ/left/left.php') ?>
    
    <td width="560" height="400px" align="center" valign="top">

<form action="add_reg.php" method="post" enctype="multipart/form-data">
   	<!-- загрузка аватарки
	<p>
		<label> Add Avatar</label>
		<input name="ava" type="file">
    </p>-->
	<p>
		<label><?php echo $array["i_log"];?><br></label>
		<input name="login" type="text" size="15" maxlength="15">
    </p>
	<p>
		<label><?php echo $array["i_pas"];?><br></label>
		<input name="password" type="password" size="15" maxlength="15">
    </p>
    <p>
		<label><?php echo $array["r_pas"];?><br></label>
		<input name="password2" type="password" size="15" maxlength="15">
    </p>
    <p>
		<label><?php echo $array["i_email"];?><br></label>
		<input name="pochta" type="pochta" size="55" maxlength="55">
    </p>
		<div>
			<img src="noise-picture.php">
			<label><?php echo $array["i_text"];?></label>
			<input type="text" name="str" size="5">
		</div>
    <br>
	<p>
    <input type="submit" name="submit" value="Sign up">
	</p>
</form>

      </tr>
    </td>
  </tr>
  

<?php include ('includ/footer.php') ?></table>

</body>
</html>
