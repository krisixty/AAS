<?php
//a decisions adattábla decisions oszlopának adataiból íratja ki a döntéseket német nyelven
	if($sor['decision']=='')	//nincs megadva
		{
		print 'Zur Zeit noch keine Entscheidung';?> <br /> <?php 
		}
		
	if ($sor['decision']=='N') //még nincs döntés
		{
		print 'Zur Zeit noch keine Entscheidung'; ?> <br /> <?php 
		}
		
	if ($sor['decision']=='F') 
		{
		print 'Zugelassen'; ?> <br /> <?php 
		}
	
	if ($sor['decision']=='E') //Elutasítva
		{
		print 'Absage'; ?> <br /> <?php 
		}
	
	//német specifikus
	if ($sor['decision']=='W') //Várólista + garantált német előkészítő évfolyam
		{
		print 'Warteliste + Zugelassen zum deutschsprachigen Vorbereitungsjahr'; ?> <br /> <?php 
		}	
		
	if ($sor['decision']=='L') //Elutasítva + jelentkezési lehetőség német ill. angol előkészítőre
		{
		print 'Absage + Bewerbung für das deutsch- bzw. englischsprachiges Vorbereitungsjahr'; ?> <br /> <?php 
		}
		
?>