<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
<link rel="stylesheet" type="text/css" href="style/ugyint_style.css">
<title>Jelentkezős tábla</title>
</head>

<body>
<p class="fent">Jelentkezős tábla v.1.0</p>

<table width="2110">
	<tr>
    	<td width="20"><strong>ID</strong></td>
        <td width="150"><strong>Family Name</strong></td>
        <td width="150"><strong>Given Name</strong></td>
        <td width="50"><strong>Gender</strong></td>
        <td width="150"><strong>P.O.B. Country</strong></td>
        <td width="150"><strong>P.O.B. City</strong></td>
        <td width="80"><strong>Date of Birth</strong></td>
        <td width="150"><strong>Citizenship</strong></td>
        <td width="150"><strong>Permanent Address</strong></td>
        <td width="150"><strong>Country</strong></td>
        <td width="150"><strong>City</strong></td>
        <td width="150"><strong>E-mail</strong></td>
        <td width="150"><strong>Phone</strong></td>
        <td width="60"><strong>Proof of ID</strong></td>
        <td width="150"><strong>Number</strong></td>
        <td width="150"><strong>First language</strong></td>
        <td width="150"><strong>Username</strong></td>
    </tr>
<?php
include '..\include\db_conn.php';

//require_once('aas_includes.php');
//$conn = db_connect();

//$fname=$_GET['fname'];

$parancs1="select * from applicants where fname >'$fname' ORDER BY fname LIMIT 1";
mysql_query($parancs1);
$parancs2="select * from applicants where fname >'$parancs1' ORDER BY fname LIMIT 1";
//$parancs3=$conn->query("SELECT * FROM table WHERE fname > 'min(fname)' ORDER BY fname LIMIT 1");

mysql_query($parancs2);

echo date('H:i, jS F');
echo date('Y');

while($sor=mysql_fetch_array($parancs2))
	{
?>	
	<tr>
    	<td><?php print $sor['id'];?></td>
        <td><?php print $sor['fname'];?></td>
        <td><?php print $sor['gname'];?></td>
        <td><?php print $sor['gender'];?></td>
        <td><?php print $sor['pob_country'];?></td>
        <td><?php print $sor['pob_city'];?></td>
        <td><?php print $sor['dob'];?></td>
        <td><?php print $sor['citizen'];?></td>
        <td><?php print $sor['permadd'];?></td>
        <td><?php print $sor['add_country'];?></td>
        <td><?php print $sor['add_city'];?></td>
        <td><?php print $sor['email'];?></td>
        <td><?php print $sor['phone'];?></td>
        <td><?php print $sor['proof_type'];?></td>
        <td><?php print $sor['proof_num'];?></td>
        <td><?php print $sor['firstlang'];?></td>
        <td><?php print $sor['user'];?></td>
    </tr>
<?php	
	}
?>
</table>


</body>
</html>