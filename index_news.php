<?php 
	session_start();
	include("bd.php"); 
	header ("Content-type:text/html; charset=utf-8");
	include ('includ/lang.php');
	error_reporting (e_all);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title><?php echo $array["news"]; ?></title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="690" border="1" align="center" bgcolor="#FFFFFF" class="mainborder">    
	<?php include('includ/header.php')?>
    <tr>
    <? include ("includ/left/left.php")?>
        <td width="493" align="left" valign="top" class="neww">
    <?
		//виводимо окремо англ і укр новини
		if ($_SESSION[lang_id]=="1" ){
				$lang_id = 1;}
		if ($_SESSION[lang_id]=="2" ){
				$lang_id = 2;}

			$result=mysql_query ("SELECT * FROM mynews WHERE lang='$lang_id'",$db);
			$myrow=mysql_fetch_array ($result);
					  		
		do{ $id = $myrow['id']; 
			echo "<br> <table  width='450px' border='1' align='center' >
			<caption class='cap'><a href='update_news.php?id=$id'>".$array["more_about_news"]."</a></caption>
			<tr>
				<td align='center'>
					<p>".$array["n_news"]."$myrow[title]</p>
				</td>
			</tr>
			<tr>
				<td>
					<p>$myrow[text]</p>
				</td>
			</tr>
			</table>
			<br>";
		}while ($myrow = mysql_fetch_array ($result))
	  
	   ?>   
       </td>
  </tr>
  <?php include('includ/footer.php')?>
</table>
</body>
</html>