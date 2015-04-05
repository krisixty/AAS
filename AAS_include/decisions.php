<?php
	if($sor['decision']=='')	
		{
		print 'Nincs megadva';?> <br /> <?php 
		}
		
	if ($sor['decision']=='N') 
		{
		print 'Még nincs döntés'; ?> <br /> <?php 
		}
		
	if ($sor['decision']=='F') 
		{
		print 'Felvéve'; ?> <br /> <?php 
		}
		
	if ($sor['decision']=='X') 
		{
		print 'Felvételi vizsga'; ?> <br /> <?php 
		}
		
	if ($sor['decision']=='P') 
		{
		print 'Előkészítőre felvéve'; ?> <br /> <?php 
		}
	
	if ($sor['decision']=='R') 
		{
		print 'Ismételt vizsga'; ?> <br /> <?php 
		}
	
	if ($sor['decision']=='I') 
		{
		print 'Előkészítőre felvéve/ismételt vizsga'; ?> <br /> <?php 
		}
	
	if ($sor['decision']=='E') 
		{
		print 'Elutasítva'; ?> <br /> <?php 
		}
		
	if ($sor['decision']=='V') 
		{
		print 'Várólista'; ?> <br /> <?php 
		}
	
	//német specifikus
	if ($sor['decision']=='W') 
		{
		print 'Várólista + garantált német előkészítő évfolyam'; ?> <br /> <?php 
		}	
		
	if ($sor['decision']=='L') 
		{
		print 'Elutasítva + jelentkezési lehetőség német ill. angol előkészítőre'; ?> <br /> <?php 
		}
		
?>