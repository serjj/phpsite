<?php
session_start ();
	header ("Content-type:text/html; charset=utf-8");
	require('includ/lang.php');
	require ('includ/func_db_pdo.php');
	require ('bd.php');
	error_reporting (E_ALL);
	
	$result="";
//перевірака чи введені логін і пароль у формі
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
// валшдацшя емейл	
	if (isset($_POST['pochta'])) { $pochta=$_POST['pochta'];
	if (preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", $pochta)) {$w=1;} else {exit ($array['email']);
	if ($pochta =='') { unset($pochta);} }}
	if (isset($_POST['password2'])) { $password2=$_POST['password2']; if ($password != $password2) exit ($array["ec_pass"]);}
//капча
	$str = $_POST['str'];
	//echo ("$str <br> $_SESSION[randStr]");
	if ($str == $_SESSION["randStr"]){
		
		} else {
		exit ($array["kapcha"]);}
	if (empty($login) or empty($password) or empty($pochta)) {
	exit ($array["not_all_inf"]);}
  
//если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
	$password = stripslashes($password);
    $password = htmlspecialchars($password);
	$login = trim($login);
    $password = trim($password);
	$hash = md5($password);
	
	// перевірка на існування корситувача з таким самимм логіном
	$result = chek_login_user($login, $db);
	$myrow =$result->fetch(PDO::FETCH_ASSOC);
    if (!empty($myrow['id'])) {
    exit ($array["dif_u_name"]);
    };
	
	//створюэмо дату реэстрації
	$datereg = date ('Y-m-d,H-i-s');
	
	//заносимо в базу даних інформацію користувача
	
	$reg_user = save_user($login, $password, $pochta, $hash, $datereg, $db);
	
	$result = user_new($login, $db);
	$myrow1 = $result->fetch(PDO::FETCH_ASSOC);
	
	$idd = $myrow1['id'];
	//створюємо папку користувача 						(і його аватарку закидаєм в цю папку)
	mkdir('img/avatar/'.$idd,0777);
		/*if ((isset ($_FILES['ava']['error'])) && ($_FILES['ava']['error']==0)){
			$t = $_FILES['ava']['tmp_name'];
			move_uploaded_file ($t,'img/avatar/'.$idd.'/'.$idd'.jpg');
			}	*/
	$_SESSION['id']=$idd;
	$_SESSION['login']=$login;
	$_SESSION['Dostup']=$myrow1['Dostup'];
	$_SESSION['lastdate'] = date ('Y-m-d,H-i-s');
	header("Location: index.php");
?> 