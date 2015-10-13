<?php
//ini_set('include_path', '../include'); LOCALHOSTON!
//meghatározza az include könyvtár útvonalát. 
ini_set("include_path", '/home/aassdhu1/UI_test/include:' . ini_get("include_path")  ); //WEBEN
ob_start(); //Turn on output buffering
require_once('data_valid_fns.php');
require_once('db_fns.php');
require_once('user_auth_fns.php');
require_once('output_fns.php');
//require_once('display_fns.php');
require_once('useful_fns.php');

	//include 'flatformLangGer.php';
	include 'flatformLangEng.php';
	//include 'flatformLangHun.php;'

require_once('mimereader.class.php');	

/*	
$picsPath="../maintest/upload/";	
$docsPath="../maintest/upload/docs/";		
*/	
?>