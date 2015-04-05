<?php
//ez azoknak a programoknak a nevét rakja változóba, melyek a decisions táblában szerepelnek
	if($sor['prog']=='M1')	
		{
		$prog='Medicine - Entrance examination for year 1'; 
		}
	if($sor['prog']=='M1e')	
		{
		$prog='Medicine - Exemption from the examination for year 1';
		}
	if($sor['prog']=='A')	
		{
		$prog='Medicine - Anatomy Summer Course + Transfer to year 2'; 
		}	
	if($sor['prog']=='M2')	
		{
		$prog='Medicine - Transfer to 2nd year';
		}
	if($sor['prog']=='M3')	
		{
		$prog='Medicine - Transfer to 3rd year';
		}
	if($sor['prog']=='D1')	
		{
		$prog='Dentistry - Entrance examination for year 1'; 
		}
	if($sor['prog']=='D1e')	
		{
		$prog='Dentistry - Exemption from the examination for year 1';
		}
	if($sor['prog']=='D2')	
		{
		$prog='Dentistry - Transfer to 2nd year';
		}
	if($sor['prog']=='D3')	
		{
		$prog='Dentistry - Transfer to 3rd year';
		}
	if($sor['prog']=='P1')	
		{
		$prog='Pharmacy - Entrance examination for year 1';
		}
	if($sor['prog']=='P1e')	
		{
		$prog='Pharmacy Exemption from the entrance examination for year 1'; 
		}
	if($sor['prog']=='P2')	
		{
		$prog='Pharmacy - Transfer to 2nd year';
		}
	if($sor['prog']=='P3')	
		{
		$prog='Pharmacy - Transfer to 3rd year';
		}
	if($sor['prog']=='F')	
		{
		$prog='Foundation Year (Preparatory Course)';
		}
	if($sor['prog']=='G1')	
		{
		$prog='Humanmedizin in deutscher Sprache';
		}
	if($sor['prog']=='V')	
		{
		$prog='deutschessprachige Vorbereitungsjahr';
		}
?>