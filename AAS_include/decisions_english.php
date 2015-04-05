<?php
//a decisions adattábla decisions oszlopának adataiból íratja ki a döntéseket angol nyelven
	if($sor['decision']=='')	
		{
		print 'No decision yet.';?> <br /> <?php 
		}
		
	if ($sor['decision']=='N') 
		{
		print 'No decision yet.'; ?> <br /> <?php 
		}
		
	if ($sor['decision']=='F') 
		{
		print 'Accepted'; ?> <br /> <?php 
		}
		
	if ($sor['decision']=='X') 
		{
		print 'Entrance Examination'; ?> <br /> <?php 
		}
		
	if ($sor['decision']=='P') 
		{
		print 'Accepted to Foundation Year'; ?> <br /> <?php 
		}
	
	if ($sor['decision']=='R') 
		{
		print 'Entrance Examination Repeat'; ?> <br /> <?php 
		}
	
	if ($sor['decision']=='I') 
		{
		print 'Accepted to Foundation Year/Entrance Examination Repeat'; ?> <br /> <?php 
		}
	
	if ($sor['decision']=='E') 
		{
		print 'Rejected'; ?> <br /> <?php 
		}
		
	if ($sor['decision']=='V') 
		{
		print 'Waiting list'; ?> <br /> <?php 
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