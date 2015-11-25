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
	$pote='No';  
	} 
if ($sor['pote']=='J') 
	{
	$pote='Applied';  
	} 
if ($sor['pote']=='F') 
	{
	$pote='Accepted';  
	} 
if ($sor['pote']=='T') 
	{
	$pote='Paid tuition fee';  
	} 
	
//SOTE	
if ($sor['sote']=='') //ideiglenes
	{
	$sote=' ';  
	} 
if ($sor['sote']=='N') 
	{
	$sote='No';  
	} 
if ($sor['sote']=='J') 
	{
	$sote='Applied';  
	} 
if ($sor['sote']=='F') 
	{
	$sote='Accepted';  
	} 
if ($sor['sote']=='T') 
	{
	$sote='Paid tuition fee';  
	} 
	
//Jön-e?
if ($sor['jon']=='') //ideiglenes
	{
	$jon='-';  
	} 
if ($sor['jon']=='I') 
	{
	$jon='Yes';  
	} 
if ($sor['jon']=='N') 
	{
	$jon='No';  
	} 			
if ($sor['jon']=='P') 
	{
	$jon='Postponement';  
	} 
?>