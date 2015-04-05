<?php
$year=$_POST['year'];
$month=$_POST['month'];
$day=$_POST['day'];

echo $year.'-';
echo $month.'-';
echo $day.' is ';

if (($month==2 || $month==4 || $month==6 || $month==9 || $month==11 ) && ($day==31))
	{
	echo 'an invalid date: There is no 31st day in this month!<br />';
	}
else if (($month==2) && ($day==30))
	{
	echo 'an invalid date: There is no 30th day in this month!<br />';
	}
else
	{
	if (($month==2) && ($day==29))
	{
	if (($year%400)==0)
		{
		echo 'a valid date'.$year.'year is leap year<br />';	
		}
	else if (($year%100)==0)
		{
		echo 'an invalid date! '.$year.' was not a leap year!'.'<br />';
		}	  
	else if (($year%4)==0)
		{
		echo 'a valid date'.$year.'was leap year'.'<br/ >';
		}
	else
		{
		echo 'an invalid date! '.$year.' was not a leap year!'.'<br />';
		}
	}
else
	{
	echo 'a valid date'.'<br />';
	}
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

