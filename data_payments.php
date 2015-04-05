<?php
$payments=$conn->query("SELECT * FROM payments WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($payments);
?>
<fieldset><legend>Jelentkezési díj befizetések:</legend>
Jelentkezési díj jóváírásának dátuma:
<select name="pyear">
<option>
<?php 
$pdate  = $sor['pdate']; //tömbbe pakolja a születési dátum én, nap, hónap részeit
$pieces = explode("-", $pdate);
echo $pieces[0]; // piece2
?></option>
	<?php
		$y=date('Y');
		for($i=$y; $i>1990; $i--) {
		?>
			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>   
		<?php
 		}
		?>   
</select>

<select name="pmonth">
<option>
<?php 
$pdate   = $sor['pdate'];
$pieces = explode("-", $pdate );
echo $pieces[1]; // piece1
?></option>
<?php include 'months.php';?>
</select>

<select name="pday">
<option>
<?php 
$pdate = $sor['pdate'];
$pieces = explode("-", $pdate);
echo $pieces[2]; // piece0
?></option>
<?php include 'days.php';?>
</select>
<br />
<?php include 'data_remarks_pay.php';?>

</fieldset>