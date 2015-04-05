<?php
$year=$_POST['year'];
$month=$_POST['month'];
$day=$_POST['day'];

echo $year.'-';
echo $month.'-';
echo $day.' is an ';

if (($month==2) && ($day==29))
	{
	if (($year%400)==0)
		{
		echo 'Valid date'.$year.'year is leap year.<br />';	
		}
	else if (($year%100)==0)
		{
		echo ' invalid date. '.$year.' was not a leap year.'.'<br />';
		}	  
	else if (($year%4)==0)
		{
		echo 'Valid date'.$year.'was leap year.'.'<br/ >';
		}
	else
		{
		echo ' invalid date. '.$year.' was not a leap year.'.'<br />';
		}
	}
else
	{
	echo 'Valid date'.'<br />';
	}
	
/*if year is divisible by 400 then
   is_leap_year
else if year is divisible by 100 then
   not_leap_year
else if year is divisible by 4 then
   is_leap_year
else
   not_leap_year */   
?>

