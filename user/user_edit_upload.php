<?php
	session_start();
	error_reporting (E_ALL);
	include("../bd.php");
	include ('includ/lang.php');
	header ("Content-type:text/html; charset=utf-8");
	
		$id=$_POST['id'];
		$_SESSION['iddd'] = $id;
		if ($_FILES['ava']['error']==0){
		$t = $_FILES['ava']['tmp_name'];
		$n = $_FILES['ava']['name'];
		move_uploaded_file ($t,'../img/avatar/'.$id.'/'.$id.'.jpg');
		}
		$name=$_POST["name"];
		$soname=$_POST["soname"];
		$pochta=$_POST["pochta"];
		$Dostup=$_POST["Dostup"];
		$result=mysql_query ("UPDATE users SET name='$name' , soname='$soname', pochta='$pochta', Dostup='$Dostup' WHERE id='$id'",$db);

		if ($result=true) {
			echo $array['inf_ad'];
		} else {
			echo $array["inf_not_ad"];
		}

?>
