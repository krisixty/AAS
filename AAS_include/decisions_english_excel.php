<?php
//a decisions adattábla decisions oszlopának adataiból íratja ki a döntéseket angol nyelven
	if($sor['decision']=='')	
		{
		$decision='Not set yet.'; 
		}
		
	if ($sor['decision']=='N') 
		{
		$decision='No decision yet.';  
		}
		
	if ($sor['decision']=='F') 
		{
		$decision='Accepted';  
		}
		
	if ($sor['decision']=='X') 
		{
		$decision='Entrance Examination Required';  
		}
		
	if ($sor['decision']=='P') 
		{
		$decision='Accepted to Foundation Year';  
		}
	
	if ($sor['decision']=='R') 
		{
		$decision='Retake entrance examination';  
		}
	
	if ($sor['decision']=='I') 
		{
		$decision='Accepted to Foundation Year/Retake Entrance Examination';  
		}
	
	if ($sor['decision']=='E') 
		{
		$decision='Rejected';  
		}
		
	if ($sor['decision']=='V') 
		{
		$decision='Waiting list'; 
		}
		
	if ($sor['decision']=='H') 
		{
		$decision='Postponement'; ?> <br /> <?php 
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