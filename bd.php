<?
/*$db = mysql_connect ("localhost","serj","123");
mysql_select_db("phpsite",$db);*/

define ("DB_HOST","localhost");
define ("DB_LOGIN","serj");
define ("DB_PASS","123");
define ("DB_NAME","phpsite");

try{
	$db = new PDO ("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_LOGIN, DB_PASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
}catch(PDOException $e){
	echo $e->getMessage();
}
?>