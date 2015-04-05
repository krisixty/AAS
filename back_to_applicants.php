<?php
//végül visszaadja a jel_id-t az applicant.php vagy applicant_d.php-nak, hogy az újra le tudja kérni a jelentkező adatait, de előtte vizsgálja, hogy van-e német programra jelentkezése
$bewerbung= $conn->query("SELECT program FROM jel_es_prog WHERE jel_id='$jel_id' AND (program='G1' OR program='V')");
	
	if ($bewerbung->num_rows>0)
		{
		$apps='applicant_d.php';
		}
	else
		{
		$apps='applicant.php';
		}
?>
<br />
Jel ID:<?php print $jel_id ?>
<form action="<?php print $apps ?>" method="post" id="form1">
<input name="username" type="hidden" value="<?php print $sor['username']?>" />
<input name="jel_id" type="hidden" value="<?php print $jel_id ?>" />
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<input type="submit" name="Submit" id="Submit" value="OK" />
</form>
