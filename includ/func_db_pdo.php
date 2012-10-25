<?php
	//Вивід всіх новин lang_id - змінна якою мовою виводити
	function select_news($db,$lang_id){
		$sql = "SELECT id, title, text FROM mynews WHERE lang='$lang_id'";
		$result = $db->query($sql);
		return $result;
	}
	
	//функція додавання укр новин  в БД 
	function add_news_ukr($title, $text, $lang, $db){
		$sql = "INSERT INTO mynews (title, text, lang) VALUES ('$title','$text','$lang')";
		$db->prepare($sql)->execute();
	}
	
	//функція додавання eng новин в БД 
	function add_news_eng($title_eng, $text_eng, $lang, $db){
		$sql = "INSERT INTO mynews (title, text, lang) VALUES ('$title_eng','$text_eng','$lang')";
		$db->prepare($sql)->execute();
	}
	
	
	//Перевірка чи існує корустувач в БД 
	function chek_login_user($login, $db){
		$sql = "SELECT id FROM users WHERE login='$login'";
		$result = $db->prepare($sql);
		$result->bindParam(':login',$login, PDO::PARAM_STR);
		$result->execute();	
		return $result;
	}	
	
	//функція додавання в базу даних інформації користувача
	function save_user($login, $password, $pochta, $hash, $datereg, $db){
		$sql = "INSERT INTO users SET login='$login', password='$password', pochta='$pochta',hash='$hash', date='$datereg' ";
		$db->prepare($sql)->execute();
	}
	
	//функція витягує змінні id i Dostup нового коистувача
	function user_new($login, $db){
		$sql = "SELECT id, Dostup FROM users WHERE login='$login'";
		$result = $db->prepare($sql);
		$result->bindParam(':login',$login, PDO::PARAM_STR);
		$result->execute();	
		return $result;
	}	
	
	//функція витягує всі дані залогіненного користувача за логіном 
	function user_all($login, $db){
		$sql = "SELECT * FROM users WHERE login='$login'";
		$result = $db->prepare($sql);
		$result->bindParam(':login',$login, PDO::PARAM_STR);
		$result->execute();	
		return $result;
	}	
	
	//функція додавання в базу даних голосування користувача
	function golos_add($news_id, $user_id, $rez_user, $db){
		$sql = "INSERT INTO golos SET news_id=$news_id, user_id=$user_id, rez_user=$rez_user ";
		$db->prepare($sql)->execute();
	}
	
	//видалення всіх голосів даної новини з БД
	function delete_gol_all($news_id, $db){
		$sql = "DELETE FROM golos WHERE news_id=$news_id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':news_id',$news_id, PDO::PARAM_INT);
		$stmt->execute();
	}
		
	//видалення голосу користувача в даній новині з БД
	function delete_gol($news_id, $user_id, $db){
		$sql = "DELETE FROM golos WHERE user_id=$user_id AND news_id=$news_id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':news_id',$news_id, PDO::PARAM_INT);
		$stmt->bindParam(':user_id',$user_id, PDO::PARAM_INT);
		$stmt->execute();
	}
	
	//видалення коменту з БД за індексом id
	function delete_com($id, $db){
		$sql = "DELETE FROM comments WHERE id=$id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':news_id',$news_id, PDO::PARAM_INT);
		$stmt->bindParam(':user_id',$user_id, PDO::PARAM_INT);
		$stmt->execute();
	}
	
	//Оновлення дати останнього візиту користувача в БД
	function update_lastdate($lastdate, $id, $db){
		$sql = "UPDATE users SET lastdate='$lastdate'  WHERE id='$id'";
		$db->exec($sql);
	}
	
	//видалення користувача з БД
	function delete_user($id, $db){
		$sql = "DELETE FROM users WHERE id=$id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id',$id, PDO::PARAM_INT);
		$stmt->execute();
	}
	
	//Функція вибірки всіх користувачів з БД
	function select_all_users($db){
		$sql = "SELECT * FROM users";
		$result = $db->query($sql);
		return $result;
	}
	
	//Функція вибірки всі дані користувача за id з БД
	function select_user($id, $db){
		$sql = "SELECT * FROM users WHERE id='$id'";
		$result = $db->query($sql);
		return $result;
	}
	
	//оновлення даних користувача за id
	function update_user($name, $soname, $pochta, $Dostup, $id, $db){
		$sql = "UPDATE users SET name='$name' , soname='$soname', pochta='$pochta', Dostup='$Dostup' WHERE id='$id'";
		$result = $db->exec($sql);
		return $result;
	}
	
	//Вивід новини з індетифікатором id
	function select_news_id($id,$db){
		$sql = "SELECT * FROM mynews WHERE id='$id'";
		$result = $db->query($sql);
		return $result;
	}
	
	//оновлення кількoсть переглядів новини
	function update_views($views, $id, $db){
		$sql = "UPDATE mynews SET views='$views' WHERE id=$id";
		$db->exec($sql);
	}
	
	//витягуємо з бази коментарі до даної новини 
	function select_com ($id,$db){
		$sql = "SELECT * FROM comments WHERE news_id='$id'";
		$result_com = $db->query($sql);
		return $result_com;
	}
	
	//функція витягує news_id, user_id голосування
	function select_gol ($db){
		$sql = "SELECT news_id, user_id FROM golos";
		$result_gol = $db->query($sql);
		return $result_gol;
	}
	
	//функція витягує дані по голосуванню даної новини даним користувачем
	function select_gol3 ($id, $user_id, $db){
		$sql = "SELECT * FROM golos WHERE news_id=$id AND user_id=$user_id";
		$result_gol3 = $db->query($sql);
		return $result_gol3;
	}
	
	//функція витягує дані по голосуванню даної новини всіма користувачами
	function select_gol2 ($id, $db){
		$sql = "SELECT * FROM golos WHERE news_id=$id";
		$result_gol2 = $db->query($sql);
		return $result_gol2;
	}
	
	//функція додавання в базу коментарів користувача
	function com_add($news_id, $author_id, $author, $comments_title, $comments_text, $date, $db){
		$sql = "INSERT INTO comments SET news_id='$news_id', author_id='$author_id', author='$author', comm_title='$comments_title', text='$comments_text', date='$date' ";
		$db->prepare($sql)->execute();
	}
	
	
?>