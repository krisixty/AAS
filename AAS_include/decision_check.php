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
	$dfdate=$sor['dfdate']; 	
    $decision=$sor['decision'];
//	$prog=$sor['prog'];
	include 'decisions_excel.php';
	include 'programs_excel_for_decisions.php';
    $basis=$sor['basis'];
//	$sor['dfdate'];	
	}
}
else
	{
	$dfdate='no';
	$decision='Nincs megadva';
	}
	
/*
}
else
	{	
	echo 'Nincs döntés rögzítve';	
	}
*/
?>