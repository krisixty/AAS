<?php




//@ - hiba elnyomás azoknál a változóknál, amik nem kellenek a regdocs.php-ba
//angol nyelvű képzések változói
@$medicine=$_POST['medicine']; 
@$dentistry=$_POST['dentistry'];
@$pharmacy=$_POST['pharmacy'];
@$prep=$_POST['prep'];

//német nyelvű képzések változói
@$medizin=$_POST['medizin'];
@$vorbjahr=$_POST['vorbjahr'];

//SZEMÉLYES ADATOK VÁLTOZÓI

$fname=trim($_POST['fname']); 
	$names=array($fname);
		
	foreach ($names as $name) 
		{ 
		$fname=ucname(("{$name}")); //tömbbe rakja a név elemeit és az ucname funkcióval átalakítja (usefuls_fns.php-ban található)
		}


//Régi: A név első betűje nagy, a többi kicsi lesz. Szóköz után megint nagy, majd kicsi
//$fname=str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($fname))))

$gname=trim($_POST['gname']);
	$names=array($gname);
		
	foreach ($names as $name) 
		{ 
		$gname=ucname(("{$name}")); //tömbbe rakja a név elemeit és az ucname funkcióval átalakítja (usefuls_fns.php-ban található)
		}

//Régi: A név első betűje nagy, a többi kicsi lesz. Szóköz után megint nagy, majd kicsi
//$gname=str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($gname))));

$gender=$_POST['gender'];
$pob_country=$_POST['pob_country'];
$pob_city=trim($_POST['pob_city']);
	$names=array($pob_city);
		
	foreach ($names as $name) 
		{ 
		$pob_city=ucname(("{$name}")); //tömbbe rakja a név elemeit és az ucname funkcióval átalakítja (usefuls_fns.php-ban található)
		}

$year=$_POST['year'];
$month=$_POST['month'];
$day=$_POST['day'];
$birthdate=$year.$month.$day;

$citizen=trim($_POST['citizen']);
$citizen=str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($citizen))));

//Kettős állapolgárság:
@$citizen2=str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($_POST['citizen2']))));


$mfname=trim($_POST['mfname']);
	$names=array($mfname);
		
	foreach ($names as $name) 
		{ 
		$mfname=ucname(("{$name}")); //tömbbe rakja a név elemeit és az ucname funkcióval átalakítja (usefuls_fns.php-ban található)
		}


//Régi: A név első betűje nagy, a többi kicsi lesz. Szóköz után megint nagy, majd kicsi
//$mfname=str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($mfname))));

$mgname=trim($_POST['mgname']);
	$names=array($mgname);
		
	foreach ($names as $name) 
		{ 
		$mgname=ucname(("{$name}")); //tömbbe rakja a név elemeit és az ucname funkcióval átalakítja (usefuls_fns.php-ban található)
		}


//Régi: A név első betűje nagy, a többi kicsi lesz. Szóköz után megint nagy, majd kicsi
//$mgname=str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($mgname))));

$permadd=trim($_POST['permadd']);
$add_pc=trim($_POST['add_pc']);

$add_city=trim($_POST['add_city']);
	$names=array($add_city);
		
	foreach ($names as $name) 
		{ 
		$add_city=ucname(("{$name}")); //tömbbe rakja a név elemeit és az ucname funkcióval átalakítja (usefuls_fns.php-ban található)
		}


$add_country=$_POST['add_country'];

$phone = preg_replace("/[^0-9+]/", "", $_POST['phone']); //Eltávolítja a telefonszámból a fölösleges karaktereket. Csak a számokat és a + jelet hagyja meg.
$proof_type=$_POST['proof_type'];
$proof_num=trim($_POST['proof_num']);

$firstlang=trim($_POST['firstlang']);
$firstlang=str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($firstlang))));

$hs_name=trim($_POST['hs_name']);
$hs_year=preg_replace("/[^0-9]/", "", $_POST['hs_year']);
$hs_day=$_POST['hs_day'];
$hs_month=$_POST['hs_month'];
$hs_certnum=trim($_POST['hs_certnum']);
$hs_country=$_POST['hs_country'];
$hs_city=trim($_POST['hs_city']);




@$studs=trim($_POST['studs']);

//Person to notify in Emergency
	$er_fname=trim($_POST['er_fname']); 
		$names=array($er_fname);
			
		foreach ($names as $name) 
			{ 
			$er_fname=ucname(("{$name}")); //tömbbe rakja a név elemeit és az ucname funkcióval átalakítja (usefuls_fns.php-ban található)
			}
			
	$er_gname=trim($_POST['er_gname']); 
		$names=array($er_gname);
			
		foreach ($names as $name) 
			{ 
			$er_gname=ucname(("{$name}")); //tömbbe rakja a név elemeit és az ucname funkcióval átalakítja (usefuls_fns.php-ban található)
			}		

	$er_relation = trim($_POST['er_relation']);
	$er_phone = preg_replace("/[^0-9+]/", "", $_POST['er_phone']); //Eltávolítja a telefonszámból a fölösleges karaktereket. Csak a számokat és a + jelet hagyja meg.
	$er_email = trim($_POST['er_email']);
	$er_permadd=trim($_POST['er_permadd']);
	$er_add_pc=trim($_POST['er_add_pc']);
	$er_add_city=trim($_POST['er_add_city']);
		$names=array($er_add_city);
			
		foreach ($names as $name) 
			{ 
			$er_add_city=ucname(("{$name}")); //tömbbe rakja a név elemeit és az ucname funkcióval átalakítja (usefuls_fns.php-ban található)
			}

	$er_add_country=$_POST['er_add_country'];




@$rep_name=trim($_POST['rep_name']); //nem kell a német programokhoz
@$rep_name=str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($rep_name))));

$pack=$_POST['pack'];
@$about=$_POST['about'];
?>