   <form action="add_login.php" method="post">
<p>
   <label><?php echo $array["y_log"];?><br></label>
   <input name="login" type="text" size="15" maxlength="15">
   </p>
   <p>
   <label><?php echo $array["y_pas"];?><br></label>
   <input name="password" type="password" size="15" maxlength="15">
   </p>
   <p>
   <input type="submit" name="submit" value="Войти">
<br>
<a href="index_reg.php"><?php echo $array["sign"];?></a> 
   </p></form>
   <br>
   
   