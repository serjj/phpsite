<?php
	session_start();
	header ("Content-type:text/html; charset=utf-8");
	require ('../includ/func_db_pdo.php');
	require ('../bd.php'); 
	require ('includ/lang.php');
	error_reporting (E_ALL);
	
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
		
		$result= update_user($name, $soname, $pochta, $Dostup, $id, $db);

		if ($result=true) {
			echo $array['inf_ad'];
		} else {
			echo $array["inf_not_ad"];
		}

?>
