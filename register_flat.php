<?php
$pg_name = 'register_flat';
require_once('aas_includes.php');
//require_once('aas_includes.php'); 
session_start();
do_html_header('');
check_valid_user();
display_officer_menu();
$username=$_SESSION['valid_user'];

include 'db_switcher.php';
	
	include 'flatposts.php';

	$flat_id=$_POST['flat_id'];
	
	//ellenőrzi, hogy van-e már ilyen flat_id
	$flat_idCheck=$conn->query("SELECT * FROM flats WHERE flat_id='$flat_id'");

	if ($flat_idCheck->num_rows==0) 
		{
			if ($insert_flat=$conn->query("INSERT INTO flats (street, number, postcode, flat_type, flat_size, room_number, bus, tram, trolley, shop, restaurant, library, furnished, stove, tv, fridge, w_machine, micro, vacum, internet, distance, extras, price, add_cost, deposit, name, phone_num , email, ispublic)
			VALUES
			('$street', '$number', '$postcode', '$flat_type', '$flat_size', '$room_number', '$bus', '$tram', '$trolley', '$shop', '$restaurant', '$library', '$furnished', '$stove', '$tv', '$fridge', '$w_machine', '$micro', '$vacum', '$internet', '$distance', '$extras', '$price', '$add_cost', '$deposit', '$name', '$phone_num', '$email', '$ispublic')")
			)	{
					$flat_id = $conn->insert_id;
					echo 'Új albérlet rögzítve.<br>';
				}
				else 
				{
					throw new Exception('Új albérlet rögzítése sikertelen!<br>');
				}

		}
		else
			{
			if ($updateFlat=$conn->query
			("UPDATE flats SET street='$street', number='$number', postcode='$postcode', flat_type='$flat_type', flat_size='$flat_size', room_number='$room_number', bus='$bus', tram='$tram', trolley='$trolley', shop='$shop', restaurant='$restaurant', library='$library', 
			furnished='$furnished', stove='$stove', tv='$tv', fridge='$fridge', w_machine='$w_machine', micro='$micro', vacum='$vacum', internet='$internet', distance='$distance', extras='$extras', price='$price', add_cost='$add_cost', deposit='$deposit', name='$name', phone_num='$phone_num', 
			email='$email', ispublic='$ispublic' WHERE flat_id='$flat_id'")) {
		
				echo 'Albérletadatok frissítve.';			
			}
			else
				{
				echo 'Albérletadatok frissítése sikertelen.';	
				}
		}	
	


?><fieldset><legend><?php echo $formParagraphLng;?></legend><?php
echo 'Flat ID: '.$flat_id.'<br>';
echo $formStreetLng.$street.'<br>';
echo $formNumberLng.$number.'<br>';
echo $formPostCodeLng.$postcode.'<br>';
echo $formFlat_TypeLng.$flat_type.'<br>';
echo $formFlat_SizeLng.$flat_size.'<br>';
echo $formRoom_NumberLng.$room_number.'<br>';
//transportation
echo $formTransLng.'<br>';
	if($bus)
		{
		echo $formBusLng.'<br>';
		}
	if($tram)
		{
		echo $formTramLng.'<br>';
		}	
	if($trolley)
		{
		echo $formTrolleyLng.'<br>';
		}	

echo '<br>'.$formCloseToLng.'<br>'; 
	if($shop)
		{
		echo $formShopLng.'<br>';
		}
	if($restaurant)
		{
		echo $formRestaurantLng.'<br>';
		}	
	if($library)
		{
		echo $formLibraryLng.'<br>';
		}

if($furnished)
		{
		echo $formFurnishedLng.'<br>';	
		}
		
echo '<br>'.$formAppliancesLng.'<br>'; 

	if($stove)
		{
		echo $formStoveLng.'<br>';
		}
	if($tv)
		{
		echo $formTvLng.'<br>';
		}
	if($fridge)
		{
		echo $formFridgeLng.'<br>';
		}
	if($w_machine)
		{
		echo $form_W_MachineLng.'<br>';
		}
	if($micro)
		{
		echo $formMicroLng.'<br>';
		}
	if($vacum)
		{
		echo $formVacumLng.'<br>';
		}	
		
echo $formInternetLng.$internet.'<br>';
echo $formDistanceLng.$distance.'<br>';
echo $formExtrasLng.$extras.'<br>';
echo $formPriceLng.$price.'<br>';
echo $formAdd_CostLng.$add_cost.'<br>';
echo $formDepositLng.$deposit.'<br>';
echo $formNameLng.$name.'<br>';
echo $formPhoneLng.$phone_num.'<br>';
echo $formEmailLng.$email.'<br>';

echo '<br>'.$formPublicLng.': <br>'; 

	if($ispublic)
		{
		echo $formPublishLng.'<br>';
		}

include 'upload_flatpic.php';

	backToFlat();
	?>
		</fieldset>
	<?php
	//return true;
?></fieldset><?php	

?>


<?php
do_html_footer();	
?>