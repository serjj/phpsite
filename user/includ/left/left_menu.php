	<p align="center" class="title"><?php echo $array["navig"]?></p>
<div id="coolmenu">
	<?php 
	if (isset ($_SESSION['Dostup'])){
		$d = $_SESSION['Dostup'];
		switch ($d) {
			case 1:
				echo ("<a href='../index.php'>".$array["main"]."</a>");
				echo ("<a href='../index_news.php'>".$array["news"]."</a>");	
				echo ("<a href='../new_news.php'>".$array["a_news"]."</a>");
				echo ("<a href='user.php'>".$array["edit"]."</a>");
			break;
			
			case 2:
				echo ("<a href='../index.php'>".$array["main"]."</a>");
				echo ("<a href='../index_news.php'>".$array["news"]."</a>");	
				echo ("<a href='../new_news.php'>".$array["a_news"]."</a>");
			break;	
			
			case 3:
				echo ("<a href='../index.php'>".$array["main"]."</a>");
				echo ("<a href='../index_news.php'>".$array["news"]."</a>");	
			break;		

			case 4:
				echo ("<a href='../index.php'>".$array["main"]."</a>");	
			break;
			
		default :
			echo ("<a href='../index.php'>".$array["main"]."</a>");
		}
	} else 
		echo ("<a href='../index.php'>".$array["main"]."</a>");
	?>

</div>