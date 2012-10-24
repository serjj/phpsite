<td width="181" valign="top" class="left">
        <?php include ("left_menu.php") ?>
    <?php if (empty($_SESSION['id'])): ?>
       <?php include ("includ/left/left_log.php");?>
       <?php echo $array["enter_site"];?>
	   <?php else: ?>
       <?php
echo  $array["you_log"].$_SESSION['login']."<br>";?>

    <?php endif;?>
	<?php if (!empty($_SESSION['id'])):?>
	<form action='includ/left/desstroy.php' method='POST'> 
	<input name='destroy' type='submit' VALUE="<?php echo $array["knopka_exit"]?>"></input>
	</form>
	<?php endif;?>
	</td>