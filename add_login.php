<?php
	session_start();
	header ("Content-type:text/html; charset=utf-8");
	require('includ/lang.php');
	require ('includ/func_db_pdo.php');
	require ('bd.php');
	error_reporting (E_ALL);
	header("Location:".$_SERVER['HTTP_REFERER']);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $array["title"] ?></title>
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
	if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    if (empty($login) || empty($password))
   {
   exit ($array["sory"]);
   }
		$login = stripslashes($login);
		$login = htmlspecialchars($login);
		$password = stripslashes($password);
		$password = htmlspecialchars($password);
		$login = trim($login);
		$password = trim($password);
	
	$result = user_all($login, $db);
	$myrow = $result->fetch(PDO::FETCH_ASSOC);
	
	$_SESSION['Dostup']=$myrow['Dostup'];
	if (empty($myrow['password'])){
		exit ($array["sory"]);
	} else {
		if ($myrow['password']==$password) {
	
			$_SESSION['id']=$myrow['id']; 
			$_SESSION['login']=$myrow['login'];
			$_SESSION['Dostup']=$myrow['Dostup'];
			$_SESSION['name']=$myrow['name'];
			$_SESSION['soname']=$myrow['soname'];
			$_SESSION['lastdate']=date('Y-m-d,H-i-s');
			echo "<h1>".$array["vel"]."<br>".$_SESSION['login']."</h1>";
		} else {
			exit ($array["kor"]);
			}
	}
?>
	</td>
</tr>
<?php include ('includ/footer.php') ?></table>
</body>
</html>