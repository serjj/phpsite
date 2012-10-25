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
<title><?php echo $array["up_news"]; ?></title>
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
	<?php
		//id - уніуальний для кожної новини, до його прикріплюються коментарі та оцінка
		$id = $_GET['id'];
		$_SESSION['news_id'] = $id;
		$user_id = $_SESSION['id'];
		//витягуємо з бази новину з id=$_GET['id'];
		$result = select_news_id($id,$db);
		$myrow = $result->fetch(PDO::FETCH_ASSOC);
		//оновлюємо кількість переглядів новини
		
		$views = $myrow ['views']+1;
		$update=update_views($views, $id, $db);
		
		//витягуємо з бази коментарі до даної новини $news_id=$_GET['id'];
		
		$result_com = select_com ($id,$db);
		$myrow_com=$result_com->fetch(PDO::FETCH_ASSOC);
		
		//виводимо новину
	echo"<table  width='450px' border='1' align='center' >
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
			</table>";
	//голосовання
	
	//перевіряєм чи користувач голусував zа данну новину, якщо так то форма голосування не виводиться
	$result_gol = select_gol ($db);
		while ($golos1=$result_gol->fetch(PDO::FETCH_ASSOC)):
			if ($golos1['user_id']==$user_id and $golos1['news_id']==$id):
				$g = 1;
			else: 
				$g=2;
			endif;
		endwhile;
		
	if ($g==2){
	echo "
	<p align='center'>Оцініть новину: 1-не сподобалась, 5-сподобалась</p>
	<form method='POST' action='includ/golos.php'>
		<table border='1' align='center'>
			<tr>
				<td>
					<input type=radio name=vid value='1'>1
					<input type=radio name=vid value='2'>2
					<input type=radio name=vid value='3'>3
					<input type=radio name=vid value='4'>4
					<input type=radio name=vid value='5'>5
				<input type=Submit name=golos value='Оцінити'>
			</td></tr>
		</table>
	</form>	";
			 }elseif ($g==1){
		
		$result_gol3=select_gol3 ($id, $user_id, $db);
		$golos3=$result_gol3->fetch(PDO::FETCH_ASSOC);
				echo "Ваша оцінка: ".$golos3['rez_user']." ";
				echo "<a href='includ/del_golos.php?id=$id'>Видалити оцінку</a><br>";}
			//рахуємо загальну оцінку користувачів та кількість голосів
			//витягуэмо з бази оцінку новини
		if($_SESSION['Dostup']==1){
			echo "<a href='includ/del_golos_all.php?id=$id'>Видалити всі оцінки</a><br>";}

		$result_gol2=select_gol2 ($id, $db);
			$i = 0;
			$j = 0;
			while ($golos2=$result_gol2->fetch(PDO::FETCH_ASSOC)){
				$i = $i + $golos2['rez_user'];
				$j = $j + $golos2['number'];
			} ; 
			//перевіряємо чи голосували за данну новину та виводимо оцінку
			if ($j==0){echo "Ніхто ще не голосував за цю новину<br>";} else {
			$rez = $i/$j;
			echo "Загальна оцінка новини: ".substr($rez,0,4)."<br>";
			echo "Кількість користувачів які проголосували за данну новину: ".$j."<br>";}
			echo $array["views"].$views."<hr color='red'>";
		
		//виводимо лише ті коментраі які відносяться до даної новини
	if ( $myrow_com['news_id'] == $id){
		
		$result_com = select_com ($id,$db);
		while ($myrow_com=$result_com->fetch(PDO::FETCH_ASSOC)){
			echo "
					<hr color='red'>
					<p><b>".$array["post_com"]."</b> $myrow_com[author]<br>
					<b>".$array["date_com"]."</b> $myrow_com[date]</p>
					<p><b>$myrow_com[comm_title]</b></p><hr width='300'>
					<p>$myrow_com[text]</p>";
				if ($_SESSION['Dostup']==1){
					echo "<a href='includ/del_com.php?id=$myrow_com[id]'>Del com</a>";
				}?>
				<hr width='300'>
						
				<?php echo "<br><hr color='red'>
			";
		}
	}
	echo "<hr color='red'>";
	//виводимо форму коменту
	//коментувати новини можуть лише авторизовані  користувачі крім заблокованого
	if ((isset($_SESSION['Dostup'])) and ($_SESSION['Dostup']!=4)){?>
		<p align='center'><?php echo $array["add_comments"]?></p>
		<form action="update_add_commets.php" method="post" >
			<label><?php echo $array["comments_title"] ?></label><br>
				<input name="comments_title" type="text" size="30" maxlength="100" ><br>
			<label><?php echo $array["comments_text"] ?></label><br>
				<textarea name="comments_text" type="text"cols="45" rows="5"></textarea><br>
			<input type="submit" name="submit" value="<?php echo $array["add_comments"]?>">
		</form>			
	<?php
	}
	?>
	</td>
</tr>
<?php include ('includ/footer.php')?></table>

</body>
</html>