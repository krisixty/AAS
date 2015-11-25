<?php 
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_officer_user();
display_officer_menu();

$username=$_SESSION['valid_user'];

include 'db_switcher.php'; //Eldönti az $app_year alapján, hogy melyik adatbázishoz kapcsolódjon

?>
Állampolgárság, adott állampolgárságra, <strong><?php echo $app_year ?></strong><br  />
<?php
if(@$_POST['orderby'])
	{
		$orderby=$_POST['orderby'];
		$result=$conn->query("SELECT * FROM applicants ORDER BY $orderby");
		$i=1;
		?>
		<table class="table_applicants">
		<td>No.</td>
        <td>Vezetéknév</td>
        <td>Keresztnév</td>
        <td>Állampolgárság</td>
		<?php
		while($sor=mysqli_fetch_array($result))
			{				
		?>
     	   	 <tr>
             <td><?php print $i;?></td>
       		 <td><?php print $sor['fname'];?></td>
       		 <td><?php print $sor['gname'];?></td>
             <td><?php print $sor['citizen'];?></td>
             <?php
			 $i++;
			}	
    }
/*	else
		{
		echo 'Nincs találat';
		}*/
		
if($_POST['citizen'])
	{
		$citizen=$_POST['citizen'];
		$result=$conn->query("SELECT * FROM applicants WHERE citizen='$citizen'");
		$i=1;
		?><table class="table_applicants">
		<td>No.</td>
        <td>Vezetéknév</td>
        <td>Keresztnév</td>
        <td>Állampolgárság</td>
		<?php
		while($sor=mysqli_fetch_array($result))
			{				
		?>
     	   	 <tr>
             <td><?php print $i;?></td>
       		 <td><?php print $sor['fname'];?></td>
       		 <td><?php print $sor['gname'];?></td>
             <td><?php print $sor['citizen'];?></td>
             <?php
			 $i++;
			}	
    }
	else
		{
		echo 'Nincs találat';
		}
?>



