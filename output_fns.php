<?php

function do_html_header($title)
{
  // print an HTML header
?>
  <!DOCTYPE html>
  <html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="style/AAS_officer_maintest_style.css">
  <script>
	function printpage()
	{
	window.print();
	}
  </script>
    <title>  <?php echo $title;?> </title>
  </head>
  <p class="logo">
  <img src="style/images/aasB.png"></p>
  <body>
  <p class="cim">
  University of Szeged
  </p>
  <p class="fent_small">
  APPLICATION AND ADMISSION SYSTEM<br>
  Faculty of Medicine, Faculty of Dentistry and Faculty of Pharmacy<br> 
  </p>
<?php
 if($title)
    do_html_heading($title);
}

function do_html_footer()
{
  // print an HTML footer
?>
<p class="footer">AAS Application and Admission System v1.80. &#169; <a href="http://aas-szegedmed.hu/kristof" target="somethingUnique">Szilágyi Kristóf</a> 2013-2015</p>
  </body>
  </html>
<?php
}

function do_html_heading($heading)
{
  // print heading
?>
  <p class="text"><?php echo $heading;?></p>
<?php
}

function do_html_URL($url, $name)
{
  // output URL as link and br
?>
  <br><a href="<?php echo $url;?>"><?php echo $name;?></a><br>
<?php
}

function display_site_info() //a login.php-ban kell kimommentelni, ha véget ért a jelentkezési időszak, helyette a display_application_over_inf()-et kell bekapcsolni
{
  // display some general info
?>
<p class="text">
Dear Visitor!<br><br>
Welcome to the Application and Admission System of the English Language Medical, Dental and Pharmacy Programs at the University of Szeged.<br>
Here you can submit your Application Form and follow the status of your application online.<br>
Step 1. <a href='register_form.php'>Create a user account.</a><br>
Step 2. <a href='login.php'>Log in</a> and submit your Application Form.<br>
Step 3. Print your Application Form.<br>
Step 4. Sign the printed Application Form and send it to the Foreign Students' Secretariat or visit us in person and submit your application package.<br>
Step 5. Log in to your account and check the status of your application.<br>
<br>
<br>
Sehr geehrte(r) Besucher(In)!<br>
<br>
Herzlich Willkommen auf der Internetseite,,Application an Admission System" für das deutschsprachige Humanmedizinprogramm der Univerisität Szeged!<br>
<!--NÉMET JELENTKEZÉS LEZÁRULT
1. Schritt: <a href='register_form.php'>Erstellen Sie Ihren Benutzernamen</a><br>
2. Schritt: <a href='login.php'>Melden Sie sich an</a>und füllen Sie Ihre Onlinebewerbung aus.<br>
3. Schritt: Drucken Sie Ihr Bewerbungsformular aus.<br>
4. Schritt: Unterschreiben Sie das ausgedruckte Online-Bewerbungsformular und schicken Sie es zusammen mit Ihren Bewerbungsunterlagen an die Adresse des Sekretariates für ausländische Studenten oder besuchen Sie unsere Universität persönlich um Ihre Bewerbung abgeben zu können.<br>
5. Schritt: Besuchen Sie unsere Seite später, um den Status Ihrer Bewerbung verfolgen zu können.<br>
-->
<br>
Vielen Dank für Ihre Interesse an der Universität Szeged!
<br>
Die Anmeldefrist für das deutschsprachige Humanmedizinprogramm ist mit dem 31.<br>
Mai 2014 und für das deutschsprachige Vorbereitungsjahr mit dem 21. August 2014
abgelaufen.<br>
<br>
Für das Studienjahr 2015/2016 kann man sich ab Mitte Januar 2015 bewerben.<br>
</p>


<?php
}

function display_confirmation()
{
?>
<p class="text2">
Registration Completed! Finish your application <a href='form.php'>here</a>
</p> 	
<?php
}

function display_login_form()
{
?>

<table class="table_reg3">
   	<tr><td></td><td>Users log in here:</td></tr>
    <form method='post' action='member.php'>
 	<tr><td>Username:</td><td><input type='text' name='username'></td></tr>
 	<tr><td>Password:</td><td><input type='password' name='passwd'></td></tr>
 	<tr><td></td><td><input type='submit' value='Log in'></td></tr>
    </form>
        <tr><td></td><td><a href='forgot_form.php'>Forgot your password?</a></td></tr>
</table>  
  
<?php
}

function display_login_for_officers_form()
{
?>

<table class="table_change">
   	<tr><td></td><td>Academic officers log in here:</td></tr>
    <form method='post' action='officers.php'>
 	<tr><td>Username:</td><td><input type='text' name='username'></td></tr>
 	<tr><td>Password:</td><td><input type='password' name='passwd'></td></tr>
 	<tr><td></td><td><input type='submit' value='Log in'></td></tr>
    </form>
        <tr><td></td><td><a href='forgot_form.php'>Forgot your password?</a></td></tr>
</table>  

<?php
}

function display_registration_form()
{
?>
<form method='post' action='cap.php'>
<table class="table_reg">
	<tr><td></td><td>Create a user account:</td></tr>
	<tr><td>Email address:</td>
	<td><input type='text' name='email' size=30 maxlength=100></td></tr>
	<tr><td>Preferred username*:</td>
	<td><input type='text' name='username' size=30 maxlength=16></td></tr>
	<tr><td>Password**:</td>
	<td><input type='password' name='passwd' size=30 maxlength=16></td></tr>
	<tr><td>Confirm password:</td>
	<td><input type='password' name='passwd2' size=30 maxlength=16></td></tr>
	<tr><td></td>
	<td><input type='submit' value='Register'></td></tr>
	<tr><td>*max 16 chars</td><td></td></tr>
	<tr><td>**between 6 and 16 chars</td><td></td></tr>
</table>
</form>
<?php 
}

function display_registration_form_for_officers()
{
?>
<form method='post' action='cap3.php'>
<table class="table_reg">
	<tr><td></td><td>Create a user account:</td></tr>
	<tr><td>Email address:</td>
	<td><input type='text' name='email' size=30 maxlength=100></td></tr>
	<tr><td>Preferred username*:</td>
	<td><input type='text' name='username' size=30 maxlength=16></td></tr>
	<tr><td>Password**:</td>
	<td><input type='password' name='passwd' size=30 maxlength=16></td></tr>
	<tr><td>Confirm password:</td>
	<td><input type='password' name='passwd2' size=30 maxlength=16></td></tr>
	<tr><td></td>
	<td><input type='submit' value='Register'></td></tr>
	<tr><td>*max 16 chars</td><td></td></tr>
	<tr><td>**between 6 and 16 chars</td><td></td></tr>
</table>
</form>
<?php
}

function display_user_menu()
{
  // display the menu options on this page
?>
<p class="menu">
<a href="form.php">My Application</a> |
<a href="status.php">Application Status Report</a> |
<a href="change_passwd_form.php">Change Password</a> |
<a href="http://szegedmed.hu" target="_blank">www.szegedmed.hu</a> |
<a href="http://www.szegedmed.hu/application_and_admission_steps" target="_blank">Application Guide</a> |
<a href="logout.php">Logout</a> 
</p>
<?php
}

function display_user_menu_d()
{
  // display the menu options on this page
?>
<p class="menu">
<a href="form.php">Meine Bewerbung</a> |
<a href="status.php">Status der Bewerbung</a> |
<a href="change_passwd_form.php">Passwort ändern</a> |
<a href="http://szegedmed.hu" target="_blank">www.szegedmed.hu</a> |
<a href="http://szegedmed.hu/de/bewerbung" target="_blank">Bewerbungverfahren</a> |
<a href="logout.php">Logout</a> 
</p>
<?php
}

function display_officer_menu()
{
  // display the menu options on this page
?>
<p class="menu">
<a href="officers.php">Home</a> |
<a href="maintenance.php">Karbantartás</a> |
<a href="applicants.php">Jelentkezők - angol</a> |
<a href="applicants_d.php">Jelentkezők - német</a> |
<a href="queries.php">Lekérdezések</a> |
<a href="flat_admin.php">Albérletek (teszt)</a> |
<a href="logout.php">Logout</a> 
</p>
<?php
}

function display_officer_site_info()
{
  // display the menu options on this page
?>
<p class="text">
Kedves Mindenki!<br>
<br>
A Excel táblák átkerültek a lekérdezésekhez! A teszt végűeket ne használjátok!<br>
<br>
A program során az alábbi dolgokra figyeljetek oda légyszíves:<br>
<br>
- Enter: a szövegmezőkbe ne rakjatok entert, mert a generált excel táblák szét fognak csúszni.<br>A letöltött táblában látszik, hogy melyik jelentkezőnél melyik mezőben van enter, tehát a javításhoz ki kell törölni az entert a megfelelő mezőből.<br>
<br>
-Dupla szóköz: a dupla szóközt sem szereti az excel tábla, szóval ne használjatok. Javítás: ugyanúgy, mint ahogy az enternél leírtam.<br>
<br>
-Tab: A tab sem az excel barátja, javítás ugyanúgy. + Ha excelből másolunk két egymás melletti cellát egy mezőbe, akkor tabot rak közé.<br>
<br>
- Szövegmezők törlése: ha már egy szövegmezőbe volt korábban beírva valami, akkor úgy tudjátok "kitörölni" azt, hogy beraktok egy szóközt a mezőbe. (Ideiglenes megoldás.)<br>
<br>
- Átlag: az átlag mezőben a tizedesvesszőt ponttal kell írni, a vesszőt nem megfelelően dolgozza fel a rendszer.<br>
<br>
- A tesztfelhasználók ki lettek törölve. A tesztrendszer felállításáig ezzel a két felhasználóval tudtok tesztelni:<br>
Németes: username: teszt1 password: teszt1 jel_id: 260 (Jelentkeztetve van német orvos 1 évre, statisztikák számainál vegyétek figyelembe!)<br>
Angolos: username: teszt2 password: teszt2 jel_id: 258 (Jelentkeztetve van angol orvos 1 évre, statisztikák számainál vegyétek figyelembe!)<br>
Új tesztfelhasználót légyszi ne hozzatok létre anélkül, hogy írásban jeleznétek nekem.<br>
<br>
<br>
Jó munkát és sok türelmet meg kitartást a studentkákhoz!<br>
<br>
Üdv.<br>
Kri<br>
</p>
<?php
}


function display_password_form()
{
  // display html change password form
?>
<form action='change_passwd.php' method='post'>

<table class="table_change">
	<tr><td></td><td>Change password:</td></tr>
	<tr><td>Old password:</td>
    <td><input type='password' name='old_passwd' size=16 maxlength=16></td></tr>
	<tr><td>New password:</td>
    <td><input type='password' name='new_passwd' size=16 maxlength=16></td></tr>
	<tr><td>Repeat new password:</td>
    <td><input type='password' name='new_passwd2' size=16 maxlength=16></td></tr>
   <tr><td></td><td><input type='submit' value='Change password'></td></tr>
</table>
<?php
}

function display_forgot_form()
{
  // display HTML form to reset and email password
?>
<table class="table_reg">
	<form action='cap2.php' method='post'>
   	<tr><td></td><td>Reset password:</td></tr>
    <tr><td>Enter your username:</td>
   	<td><input type='text' name='username' size=16 maxlength=16></td></tr>
  	<tr><td></td><td><input type='submit' value='Change password'>
   	</td></tr>
</table>

<?php
};
?>

<?php
function display_officers_info()
{
?>
<p class="text2"><a href="officers.php">Tanulmányi előadói felület</a><br> 
</p>
<?php
}
?>

<?php
	function display_flatForm() {

	//FIELD VALUE GLOBALS
		global $street;
		global $street;
		global $number;
		global $postcode;
		global $flat_type;
		global $flat_size;
		global $room_number;
		global $bus; if($bus==1) {$bus='checked';} else {$bus=' ';} ;
		global $tram; if($tram==1) {$tram='checked';} else {$tram=' ';} ;
		global $trolley; if($trolley==1) {$trolley='checked';} else {$trolley=' ';} ;
		global $shop; if($shop==1) {$shop='checked';} else {$shop=' ';} ;
		global $restaurant; if($restaurant==1) {$restaurant='checked';} else {$restaurant=' ';} ;
		global $library; if($library==1) {$library='checked';} else {$library=' ';} ;
		global $furnished; if($furnished==1) {$furnished='checked';} else {$furnished=' ';} ;
		global $stove; if($stove==1) {$stove='checked';} else {$stove=' ';} ;
		global $tv; if($tv==1) {$tv='checked';} else {$tv=' ';} ;
		global $fridge; if($fridge==1) {$fridge='checked';} else {$fridge=' ';} ;
		global $w_machine; if($w_machine==1) {$w_machine='checked';} else {$w_machine=' ';} ;
		global $micro; if($micro==1) {$micro='checked';} else {$micro=' ';} ;
		global $vacum; if($vacum==1) {$vacum='checked';} else {$vacum=' ';} ;
		global $internet; if($internet==1) {$internet='checked';} else {$internet=' ';} ;
		global $distance;
		global $extras;
		global $price;
		global $add_cost;
		global $deposit;
		global $name;
		global $phone_num;
		global $email;
	
	//LANGUAGE GLOBALS	
		
		global $formParagraphLng;
		global $flatInfo; 
		global $formStreetLng;
		global $formNumberLng ;
		global $formPostCodeLng;
		
		global $formFlat_TypeLng;
			global $formFT_1; 
			global $formFT_2;
			global $formFT_3;
			global $formFT_4; 
			global $formFT_5;
			global $formFT_6;
			global $formFT_7;
			
		global $formFlat_SizeLng;
		global $formRoom_NumberLng;

		global $formFlatAdditionalLng; 
		
		global $formTransLng;
		global $formBusLng;
		global $formTramLng;
		global $formTrolleyLng;

		global $formCloseToLng;
		global $formShopLng;
		global $formRestaurantLng;
		global $formLibraryLng;

		global $formFurnishedLng;

		global $formAppliancesLng;
		global $formStoveLng;
		global $formTvLng;
		global $formFridgeLng;
		global $form_W_MachineLng;
		global $formMicroLng;
		global $formVacumLng;
		global $formInternetLng;
		global $formDistanceLng;
		global $formExtrasLng;
		
		global $formCostsLng; 
		global $formPriceLng;
		global $formAdd_CostLng;
		global $formDepositLng;

		global $formContactLng;
		global $formNameLng;
		global $formPhoneLng;
		global $formEmailLng;

		global $formRegisterLng;

		global $formFooterLng;
						
		//flat id
		global $flat_id;

?>

		<form method='post' action='register_flat.php' enctype="multipart/form-data">
		<fieldset>	
			<legend><?php print $formParagraphLng; ?></legend>	
				
				<fieldset>	
					<legend><?print $flatInfo;?></legend>
			               
                        <label for="street"><?php print $formStreetLng; ?></label>              
                        <input type="text" id="street" name="street" size="30" maxlength="100" value="<?php print $street;?>">           
                        <br>
                        <label for="number"><?php print $formNumberLng; ?></label>
                        <input type="text" id="number" name="number" size="30" maxlength="30" value="<?php print $number;?>">
                        <br>
                        <label for="postcode"><?php print $formPostCodeLng; ?></label>
                        <input type="text" id="postcode" name="postcode" size="30" maxlength="4" value="<?php print $postcode;?>">
                        <br>
						
						<label for="flat_type"><?php print $formFlat_TypeLng; ?></label>
							<select name="flat_type" id="flat_type">
								<option><?php include 'flatTyper.php';?></option>
								<option value="">-- select one --</option>
								<option value="T1"><?php print $formFT_1; ?></option>
								<option value="T2"><?php print $formFT_2; ?></option>
								<option value="T3"><?php print $formFT_3; ?></option>
								<option value="T4"><?php print $formFT_4; ?></option>
								<option value="T5"><?php print $formFT_5; ?></option>
								<option value="T6"><?php print $formFT_6; ?></option>
								<option value="T7"><?php print $formFT_7; ?></option>
						</select>
						<br>
						
                        <label for="flat_size"><?php print $formFlat_SizeLng; ?></label>
                        <input type="text" id="flat_size" name="flat_size" size="4" maxlength="4" value="<?php print $flat_size;?>"> m2
                        <br>
                        <label for="room_number"><?php print $formRoom_NumberLng; ?></label>
                        <input type="text" id="room_number" name="room_number" size="30" maxlength="30" value="<?php print $room_number;?>">
                        <br>
						
				</fieldset>		
                       
				<fieldset>
					<legend><?php print $formFlatAdditionalLng; ?></legend>
					
						<?php print $formTransLng; ?>
                        <?php print $formBusLng; ?>
						<input type="checkbox" name="bus" id="bus" value="1" <?php print $bus;?>>
						<?php print $formTramLng; ?>
						<input type="checkbox" name="tram" id="tram" value="1" <?php print $tram;?>>
						<?php print $formTrolleyLng; ?>
						<input type="checkbox" name="trolley" id="trolley" value="1" <?php print $trolley;?>><br>
                        <br>
                    
						<?php print $formCloseToLng; ?>
						<?php print $formShopLng; ?>
						<input type="checkbox" name="shop" id="shop" value="1" <?php print $shop;?>>
						<?php print $formRestaurantLng; ?>
						<input type="checkbox" name="restaurant" id="restaurant" value="1" <?php print $restaurant;?>>
						<?php print $formLibraryLng; ?>
						<input type="checkbox" name="library" id="library" value="1" <?php print $library;?>><br>
                        <br>

                        <?php print $formFurnishedLng; ?>
						<input type="checkbox" name="furnished" id="furnished" value="1" <?php print $furnished;?>><br>
                        <br>

                        <?php print $formAppliancesLng; ?>
						<?php print $formStoveLng; ?>
						<input type="checkbox" name="stove" id="stove" value="1" <?php print $stove;?>>
						<?php print $formTvLng; ?>
						<input type="checkbox" name="tv" id="tv" value="1" <?php print $tv;?>>
						<?php print $formFridgeLng; ?>
						<input type="checkbox" name="fridge" id="fridge" value="1" <?php print $fridge;?>>
						<?php print $form_W_MachineLng; ?>
						<input type="checkbox" name="w_machine" id="w_machine" value="1" <?php print $w_machine;?>>
						<?php print $formMicroLng; ?>
						<input type="checkbox" name="micro" id="micro" value="1" <?php print $micro;?>>
						<?php print $formVacumLng; ?>
						<input type="checkbox" name="vacum" id="vacum" value="1" <?php print $vacum;?>><br>                       
                        <br>

                        <?php print $formInternetLng; ?>
						<input type="checkbox" name="internet" id="internet" value="1" <?php print $internet;?>><br> 
						<?php print $formDistanceLng; ?>
						<input type="text" id="distance" name="distance" size="30" maxlength="20" value="<?php print $distance;?>"><br> 
                    
                        <label for="extras"><?php print $formExtrasLng; ?></label><br>          
                        <textarea id="extras" name="extras" maxlength="250" cols="100" rows="3"><?php print $extras;?></textarea>          
                </fieldset>
                    
				<fieldset>
					<legend><?php print $formCostsLng; ?></legend>
					
						<label for="price"><?php print $formPriceLng; ?></label>              
                        <input type="text" id="price" name="price" size="30" maxlength="8" value="<?php print $price;?>"> HUF           
                        <br>
                        <label for="add_cost"><?php print $formAdd_CostLng; ?></label>              
                        <input type="text" id="add_cost" name="add_cost" size="30" maxlength="8" value="<?php print $add_cost;?>"> HUF           
                        <br>
                        <label for="deposit"><?php print $formDepositLng; ?></label>              
                        <input type="text" id="deposit" name="deposit" size="30" maxlength="8" value="<?php print $deposit;?>"> HUF           
                        <br>
				</fieldset>
				
				<fieldset>
					<legend><?php print $formContactLng; ?></legend>

                        <label for="name"><?php print $formNameLng; ?></label>              
                        <input type="text" id="name" name="name" size="30" maxlength="100" value="<?php print $name;?>">           
                        <br>
                        <label for="phone_num"><?php print $formPhoneLng; ?></label>              
                        <input type="text" id="phone_num" name="phone_num" size="30" maxlength="20" value="<?php print $phone_num;?>">           
                        <br>
                        <label for="email"><?php print $formEmailLng; ?></label>              
                        <input type="email" id="email" name="email" size="30" maxlength="100" value="<?php print $email;?>">           
                        <br>
						
						<input name="flat_id" type="hidden" value="<?php print $flat_id; ?>" />	
				</fieldset>		
                <br>        
				<fieldset>
					<legend>Upload picture</legend>
					<!--<input type="hidden" name="MAX_FILE_SIZE" value="5242880" />-->
					<input type="file" id="file" name="uploaded_files[]" multiple="multiple">
					<!--<input type="submit" id="submit" name="submit" value="Upload">-->
				</fieldset>
				<br>
				<br>
						
				<button type="submit"><?php print $formRegisterLng; ?></button>
						
			</fieldset>	

        </form>
		
<!--
		<form action="upload_flatpic.php" method="post" enctype="multipart/form-data" id="upload" class="upload">
				<fieldset>
					<legend>Upload picture</legend>
					<input type="file" id="file" name="uploaded_files[]" multiple="multiple">
					<input type="submit" id="submit" name="submit" value="Upload">
				</fieldset>
		</form>

<!--
		<form action="delete_confirm.php" method="post">
				<fieldset>
					<legend>Delete Flat</legend>
					<input name="flat_id" type="hidden" value="<?php print $flat_id; ?>" />
					<input name="app_year" type="hidden" value="<?php print $app_year; ?>" />
					<input type="submit" name="Submit" id="Submit" value="Delete Flat" />
				</fieldset>
		</form>
-->		
<?php	
	}
?>

<?php
function backToFlat() {

	global $flat_id;
?>
		<form action="flatform.php" method="post">
				<input name="flat_id" type="hidden" value="<?php print $flat_id; ?>" />
				<input name="app_year" type="hidden" value="<?php print $app_year; ?>" />
				<input type="submit" name="Submit" id="Submit" value="OK" />
		</form>
<?php
}
?>


<?php
function dbSwitcherSelect() {

	global $app_year;
	global $formAction;
?>
	<table class="table_database">
		<tr>
		<td>Jelenlegi adatbázis: <strong><?php echo $app_year ?></strong> | Váltás a következőre:</td>
		<td>
		<form action="<?php echo $formAction ?>" method="post" id="form1">
			<select name="app_year">
				<option>2015</option>
				<option>2014</option>   
				<option>2013</option>
				<option>maintest_15</option>		
			</select>
		<input type="submit" name="Submit" id="Submit" value="választ" />
		</form>
		</td>
		</tr>
		</table>
<?
}
?>

<?php
	function docUploadFormOfficerUI() {
		
		global $type_of_doc;
		global $jel_id;
		global $app_year;

?>
		<form class="fileUpload" action="updocs_officer.php" method="post" enctype="multipart/form-data">
					<!-- <input type="file" id="file" name="uploaded_files"> -->
					<input type="hidden" id="jel_id" name="jel_id" value="<?php print $jel_id; ?>" />
					<input type="hidden" id="type_of_doc" name="type_of_doc" value="<?php print $type_of_doc; ?>" />
					<input name="app_year" type="hidden" value="<?php print $app_year; ?>" />
					<input type="file" id="file" name="uploaded_files[]" multiple="multiple" required = "required"/>
					<input type="submit" id="submit" name="submit" value="Upload">

		</form>
<?php
	}
?>












