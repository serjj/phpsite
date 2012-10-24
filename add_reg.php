<?php
session_start ();
	header ("Content-type:text/html; charset=utf-8");
	include ('includ/lang.php');
	include ("bd.php");
$result="";

//перевірака чи введені логін і пароль у формі
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
// валидация емейл	
	if (isset($_POST['pochta'])) { $pochta=$_POST['pochta'];
	if (preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", $pochta)) {$w=1;} else {exit ($array["email"]);
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
// проверка на существование пользователя с таким же логином
    $result = mysql_query("SELECT id FROM users WHERE login='$login'",$db);
    $myrow = mysql_fetch_array($result);
    if (!empty($myrow['id'])) {
    exit ($array["dif_u_name"]);
    };
	//створюэмо дату реэстрації
	$datereg = date ('Y-m-d,H-i-s');
	//заносимо в базу даних інформацію користувача
	mysql_query ("INSERT INTO users SET login='$login', password='$password', pochta='$pochta',hash='$hash', date='$datereg' ");
	$result = mysql_query("SELECT id, Dostup FROM users WHERE login='$login'",$db);
    $myrow = mysql_fetch_array($result);
	$idd = $myrow['id'];
	//створюємо папку користувача 						(і його аватарку закидаєм в цю папку)
	mkdir('img/avatar/'.$idd,0777);
		/*if ((isset ($_FILES['ava']['error'])) && ($_FILES['ava']['error']==0)){
			$t = $_FILES['ava']['tmp_name'];
			move_uploaded_file ($t,'img/avatar/'.$idd.'/'.$idd'.jpg');
			}	*/
	$_SESSION['id']=$idd;
	$_SESSION['login']=$login;
	$_SESSION['Dostup']=$myrow['Dostup'];
	$_SESSION['lastdate'] = date ('Y-m-d,H-i-s');
	header("Location: index.php");
?> 