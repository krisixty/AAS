<?php
//Egyéb infók adatainak teljes nevét tárolja el változókban

//Pünkösdi nyílt napon volt-e?
if ($sor['punk']=='') //ideiglenes
	{
	$punk=' ';  
	} 
if ($sor['punk']=='I') 
	{
	$punk='Igen'; 
	} 
if ($sor['punk']=='N') 
	{
	$punk='Nem'; 
	} 

//POTE
if ($sor['pote']=='') //ideiglenes
	{
	$pote=' ';  
	} 
if ($sor['pote']=='N') 
	{
	$pote='Nem';  
	} 
if ($sor['pote']=='J') 
	{
	$pote='Jelentkezett';  
	} 
if ($sor['pote']=='F') 
	{
	$pote='Felvett';  
	} 
if ($sor['pote']=='T') 
	{
	$pote='Tandíjat befizette';  
	} 
	
//SOTE	
if ($sor['sote']=='') //ideiglenes
	{
	$sote=' ';  
	} 
if ($sor['sote']=='N') 
	{
	$sote='Nem';  
	} 
if ($sor['sote']=='J') 
	{
	$sote='Jelentkezett';  
	} 
if ($sor['sote']=='F') 
	{
	$sote='Felvett';  
	} 
if ($sor['sote']=='T') 
	{
	$sote='Tandíjat befizette';  
	} 
	
//Jön-e?
if ($sor['jon']=='') //ideiglenes
	{
	$jon='-';  
	} 
if ($sor['jon']=='I') 
	{
	$jon='Igen';  
	} 
if ($sor['jon']=='N') 
	{
	$jon='Nem';  
	} 			

?>