<?php
	if($sor['decision']=='')	
		{
		$decision='Nincs megadva';
		}
		
	if ($sor['decision']=='N') 
		{
		$decision='Még nincs döntés';
		}
		
	if ($sor['decision']=='F') 
		{
		$decision='Felvéve'; 
		}
		
	if ($sor['decision']=='X') 
		{
		$decision='Felvételi vizsga'; 
		}
		
	if ($sor['decision']=='P') 
		{
		$decision='Előkészítőre felvéve'; 
		}
	
	if ($sor['decision']=='R') 
		{
		$decision='Ismételt vizsga'; 
		}
	
	if ($sor['decision']=='I') 
		{
		$decision='Előkészítőre felvéve/ismételt vizsga'; 
		}
	
	if ($sor['decision']=='E') 
		{
		$decision='Elutasítva'; 
		}
		
	if ($sor['decision']=='V') 
		{
		$decision='Várólista'; 
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