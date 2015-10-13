<?php
//elavult, magyarul volt eredetileg, de már itt is angolul van
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
	
	//német specifikus
	if ($sor['decision']=='W') 
		{
		$decision='Várólista + garantált német előkészítő évfolyam'; 
		}	
		
	if ($sor['decision']=='L') 
		{
		$decision='Elutasítva + jelentkezési lehetőség német ill. angol előkészítőre'; 
		}
		
?>