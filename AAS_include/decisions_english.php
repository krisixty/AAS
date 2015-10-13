<?php
//a decisions adattábla decisions oszlopának adataiból íratja ki a döntéseket angol nyelven
//Elavult, a decisions.php-ban is angolul vannak már a döntések.
	if($sor['decision']=='')	
		{
		print 'Not set yet';?> <br /> <?php 
		}
		
	if ($sor['decision']=='N') 
		{
		print 'No decision yet'; ?> <br /> <?php 
		}
		
	if ($sor['decision']=='F') 
		{
		print 'Accepted'; ?> <br /> <?php 
		}
		
	if ($sor['decision']=='X') 
		{
		print 'Entrance Examination Required'; ?> <br /> <?php 
		}
		
	if ($sor['decision']=='P') 
		{
		print 'Accepted to Foundation Year'; ?> <br /> <?php 
		}
	
	if ($sor['decision']=='R') 
		{
		print 'Retake entrance examination'; ?> <br /> <?php 
		}
	
	if ($sor['decision']=='I') 
		{
		print 'Accepted to Foundation Year/Retake Entrance Examination'; ?> <br /> <?php 
		}
	
	if ($sor['decision']=='E') 
		{
		print 'Rejected'; ?> <br /> <?php 
		}
		
	if ($sor['decision']=='V') 
		{
		print 'Waiting list'; ?> <br /> <?php 
		}
		
	if ($sor['decision']=='H') 
		{
		print 'Postponement'; ?> <br /> <?php 
		}	
/*	
	//német specifikus
	if ($sor['decision']=='W') 
		{
		print 'Várólista + garantált német előkészítő évfolyam'; ?> <br /> <?php 
		}	
		
	if ($sor['decision']=='L') 
		{
		print 'Elutasítva + jelentkezési lehetőség német ill. angol előkészítőre'; ?> <br /> <?php 
		}
*/		
?>