<fieldset><legend>Jelentkezések:</legend>
<table>
<tr><td>Jelentkezett:</td><td>    </td><td>Utolsó döntés:</td></tr>
<tr>
<td>
<?php
$programs= $conn->query("SELECT * FROM jel_es_prog WHERE jel_id='$jel_id'");
while($sor=mysqli_fetch_array($programs))
	{
	include 'programs.php';
	}
?>
<br />
</td>
<td>    </td>
<td>
<?php
$van_dec=$conn->query("SELECT * FROM decisions WHERE jel_id='$jel_id'");
if($van_dec->num_rows>0)
{
//megvizsgálja, hogy van-e döntés, és ha van, akkor tömbbe rakja a döntések dátumait
$tomb=array();
$decision_dates= $conn->query("SELECT * FROM decisions WHERE jel_id='$jel_id'");
while($sor=mysqli_fetch_array($decision_dates))
	{
	$tomb[]=$sor['date'];
	}
//majd kiválasztja a legutolsót	
$latest_date=max($tomb);

//és arra a dátumra csinálja meg a lekérdezést. Ha több is van kiírja azokat is
$latest_decision=$conn->query("SELECT * FROM decisions WHERE jel_id='$jel_id' AND date='$latest_date'");
while($sor=mysqli_fetch_array($latest_decision))
	{
	?>
	Döntés dátuma:<?php print $sor['date'].': '; ?><br />
    Döntés: <?php include 'decisions.php';?>
	Program: <?php include 'programs_dec.php';?>
	Döntés alapja: <?php print $sor['basis'];?><br />
   	Visszajelzési határidő: <?php print $sor['dfdate'];?><br /><br />
	<?php
	}
}
else
	{	
	echo 'Nincs döntés rögzítve';	
	}
?>
</td>
</tr>
<tr>
<td>
<form action='new_application.php' method='post'>
<input name="jel_id" type="hidden" value="<?php print $jel_id ?>" />
<input name="fname" type="hidden" value="<?php print $fname ?>" />
<input name="gname" type="hidden" value="<?php print $gname ?>" />
<input name="app_year" type="hidden" value="<?php print $app_year?>" />
<input type='submit' name='submit' value='Jelentkezések karbantartása (teszt!!)'>
</form>
</td>
</tr>
</table>
</fieldset>