<?php
$messages=$conn->query("SELECT * FROM messages WHERE jel_id='$jel_id'");
//$sor=mysqli_fetch_array($messages);
?>
<fieldset><legend>Üzenetek:</legend>
<?
isEngOrGer();

if ($engOrGer == 'german') {
	$notification_type = 'message_d';
	}
else {
	$notification_type = 'message';
}

while($sor=mysqli_fetch_array($messages))
	{
		$mes_dt = $sor['mes_dt'];
	?>
	<fieldset><legend><?php print $mes_dt;?></legend>
		
		<p><?php print $sor['message'];?></p><br>

		<?
		$email_dt = $sor['email_dt'];
		$m_id = $sor['m_id'];
		
		if($email_dt == 0) {
			delMessage();
			sendMailForm($notification_type);
		}
		else {
		?>
			E-mail küldés dátuma: <?php print $sor['email_dt']; ?>
		<?
		}
		?>
	</fieldset><br>
	<?
	}
?>
Új üzenet:<br>
<form action='new_message.php' method='post'>
	<input name="jel_id" type="hidden" value="<?php echo $jel_id ?>" />
	<input name="app_year" type="hidden" value="<?php print $app_year; ?>" />
	<textarea name="message" cols="100" rows="10" ><?php print $sor['message'] ?></textarea><br><br>
	<input type='submit' name='submit' value='Üzenet rögzítése'>
</form>
<br><br> 

</fieldset>