<?php
$pack_date=$conn->query("SELECT adate FROM appdocs WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($pack_date);
?>
Jelentkezési anyag beérkezésének dátuma:
<select name="ayear">
<option>
<?php 
$adate  = $sor['adate']; //tömbbe pakolja a Jelentkezési anyag beérkezésének dátuma részeit
$pieces = explode("-", $adate);
echo $pieces[0]; // piece2
?></option>
<?php //$y=date('Y'); echo $y; -kikommentelve, mert több évet kértek RENDBE RAKNI!!?>
						<?php
							  $y=date('Y');
							  for($i=$y; $i>1990; $i--) 
									{?>
									<option value="<?php echo $i; ?>"><?php echo $i; ?></option>   
						<?php 		} ?>

</select>

<select name="amonth">
<option>
<?php 
$adate   = $sor['adate'];
$pieces = explode("-", $adate );
echo $pieces[1]; // piece1
?></option>
<?php include 'months.php';?>
</select>

<select name="aday">
<option>
<?php 
$adate = $sor['adate'];
$pieces = explode("-", $adate);
echo $pieces[2]; // piece0
?></option>
<?php include 'days.php';?>
</select>
<br />
