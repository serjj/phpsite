<?php
	session_start(); 
	header ("Content-type:text/html; charset=utf-8");
	include ('includ/lang.php');
	include ('bd.php');
	error_reporting (E_ALL);
?>
<!DOCTYPE HTML >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $array["title"] ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="690" border="1" cellspacing="1" cellpadding="1" align="center" bgcolor="#FFFFFF" class="mainborder" >
<!-- header-->
<?php include ('includ/header.php') ?>
  <tr>
  <!-- left blocks-->
    <?php include ('includ/left/left.php') ?>
    
    <td width="560" valign="top"><h1 align="center">
	<?php echo $array["first"] ?>
	</h1>
	</td>
  </tr>
  

<?php include ('includ/footer.php') ?></table>

</body>
</html>