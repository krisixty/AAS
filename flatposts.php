<?php
$street=trim($_POST['street']);
/*
$names=array($street);
		
	foreach ($names as $name) 
		{ 
		$street=ucname(("{$name}")); //tömbbe rakja a név elemeit és az ucname funkcióval átalakítja (usefuls_fns.php-ban található)
		}
		*/

$number=trim($_POST['number']);
$postcode=trim($_POST['postcode']);
$flat_type=trim($_POST['flat_type']);
$flat_size=trim($_POST['flat_size']);
$room_number=trim($_POST['room_number']);
//transportation
$bus=$_POST['bus'];
$tram=$_POST['tram'];
$trolley=$_POST['trolley'];
//close to
$shop=$_POST['shop'];
$restaurant=$_POST['restaurant'];
$library=$_POST['library'];
//
$furnished=$_POST['furnished'];
//appliances
$stove=$_POST['stove'];
$tv=$_POST['tv'];
$fridge=$_POST['fridge'];
$w_machine=$_POST['w_machine'];
$micro=$_POST['micro'];
$vacum=$_POST['vacum'];
//
$internet=$_POST['internet'];
$distance=trim($_POST['distance']);
$extras=trim($_POST['extras']);
$price=trim($_POST['price']);
$add_cost=trim($_POST['add_cost']);
$deposit=trim($_POST['deposit']);
$name=trim($_POST['name']);
$phone_num=preg_replace("/[^0-9+]/", "", $_POST['phone_num']);
$email=trim($_POST['email']);

$ispublic=$_POST['ispublic'];
















?>