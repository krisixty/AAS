<?php
$result=$conn->query("SELECT * FROM flats WHERE flat_id='$flat_id'");
$row=mysqli_fetch_array($result);

$street = $row['street'];
$number = $row['number'];
$postcode = $row['postcode'];
$flat_type = $row['flat_type'];
$flat_size = $row['flat_size'];
$room_number = $row['room_number'];

$bus=$row['bus'].'<br>';
$tram=$row['tram'].'<br>';
$trolley=$row['trolley'].'<br>';

$shop=$row['shop'].'<br>';
$restaurant=$row['restaurant'].'<br>';
$library=$row['library'].'<br>';

$furnished = $row['furnished'];

$stove=$row['stove'].'<br>';
$tv=$row['tv'].'<br>';
$fridge=$row['fridge'].'<br>';
$w_machine=$row['w_machine'].'<br>';
$micro=$row['micro'].'<br>';
$vacum=$row['vacum'].'<br>';


$internet = $row['internet'];

$distance = $row['distance'];
$extras = $row['extras'];
$price = $row['price'];
$add_cost = $row['add_cost'];
$deposit = $row['deposit'];
$name = $row['name'];
$phone_num = $row['phone_num'];
$email = $row['email'];
?>