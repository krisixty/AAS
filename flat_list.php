<?php
require_once('aas_includes_UI_test.php');
//require_once('aas_includes.php'); 
session_start();
do_html_header('');
check_valid_user();
display_officer_menu();
$username=$_SESSION['valid_user'];

include 'db_switcher.php';

$flats_result=$conn->query("SELECT * FROM flats ORDER BY flat_id");
?>

		<table class="table_applicants">
		<tr>
				<td>Flat ID</td>
				<td><?php print $formStreetLng;?></td>
				<td><?php print $formNumberLng;?></td>
				<td><?php print $formPostCodeLng;?></td>
				<td><?php print $formFlat_TypeLng;?></td>
				<td><?php print $formFlat_SizeLng;?></td>
				<td><?php print $formRoom_NumberLng;?></td>
				<td><?php print $formPriceLng;?></td>
				<td><?php print $formNameLng;?></td>
		</tr>       	
		<?php
		while($sor=mysqli_fetch_array($flats_result))
			{
			?>
				<tr>
				<td><?php print $sor['flat_id'];?></td>
				<td><?php print $sor['street'];?></td>
				<td><?php print $sor['number'];?></td>
				<td><?php print $sor['postcode'];?></td>
				<td><?php $flat_type = $sor['flat_type']; include 'flatTyper.php';?></td>
				<td><?php print $sor['flat_size'];?></td>
				<td><?php print $sor['room_number'];?></td>
				<td><?php print $sor['price'];?></td>
				<td><?php print $sor['name'];?></td>
				<td>
		<form action="flatform.php" method="post" id="form1">
		<input name="flat_id" type="hidden" value="<?php print $sor['flat_id']?>" />
		<input name="app_year" type="hidden" value="<?php print $app_year?>" />
		<input type="submit" name="Submit" id="Submit" value="Részletek" />
		</form></td>
			   </tr>
			<?php
			}
		?>
		</table>
<?php
//do_html_footer();
?>