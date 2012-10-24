<?php 
	session_start(); 
	include ('../bd.php');
	header ("Content-type:text/html; charset=utf-8");
	include ('includ/lang.php');
?>
<!DOCTYPE HTML >
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
    
	<!-- Виводимо користувачів -->
    <td width="560">
	<?php 
	$d = $_SESSION['Dostup'];
		switch ($d) {
			case 1: 
				$user=mysql_query ("SELECT * FROM users",$db);
				while ($myrows = mysql_fetch_array ($user)){
				$id = $myrows['id'];
		?>
				<div><table  align='center' border='3'; >
				<tr>
					<td height='150' width='150' align='center'>
						<img src="../img/avatar/ava.php?id=<?php echo $id?>" border="0">
					</td>
					<td  width='300'>
						<?php echo ($array["log"]."<b>$myrows[login]</b>".$array["name"]." <b>$myrows[name]</b>".$array["soname"]." <b>$myrows[soname]</b>")?><br>
						<?php echo ($array["d_reg"]."<b>$myrows[date]</b>")?><br>
						<?php echo ($array["l_date"]."<b>$myrows[lastdate]</b>")?><br>
						<?php echo ($array["l_dostup"]."<b>$myrows[Dostup]</b>")?><br>
						<?php echo ("<a href='user_edit.php?id=$id'>".$array["edit"]."</a>; <a href='includ/delete.php?id=$id'>".$array["del"]."</a>")?>
					</td>
				</tr>
				</table></div><hr>
		<?php } break;
			case 2:
			case 3:
				$id = $_SESSION['id'];
				$user=mysql_query ("SELECT * FROM users WHERE id='$id'",$db);
				$myrows = mysql_fetch_array ($user);
				
		?>
				<div><table  align='top' border='3' >
				<tr>
					<td height='150' width='150' align='center'>
						<img src="../img/avatar/ava.php?id=<?php echo $id?>" border="0">
					</td>
				</tr>
				<tr>
					<td align='center'><?php echo ($array["log"]."<b>$myrows[login]</b>")?></td>
				</tr>
				<tr>
					<td align='center'><?php echo ("<a href='user_edit.php?id=$id'>".$array["edit"]."</a>; <a href='includ/delete.php?id=$id'>".$array["del"]."</a>")?></td>
				</tr>			
				<tr>
					<td align='center'><?php echo ($array["d_reg"]."<b>$myrows[date]</b>")?></td>
				</tr>
				<tr>
					<td align='center'><?php echo ($array["l_date"]."<b>$myrows[lastdate]</b>")?></td>
				</tr>
				</table></div><br>
		<?php
			break;
			case 4: 
				echo $array["block"];
			break;
		default: 
			echo $array["anonim"];
		}
	?>
	
	</td>
  </tr>
  

<?php include ('includ/footer.php');?></table>

</body>
</html>