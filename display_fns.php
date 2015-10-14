<?php
/*
<!---***********************************************************************P A G E   D I S P L A Y   E L E M E N T S********************************************************-->

<!------------------------------------------------------------------------------------- PRINT HTML HEADING -------------------------------------------------------------------------------------------------------->
*/
function do_html_heading($heading)
{
?>
  <p><?php echo $heading;?></p>
<?php
}
/*--END OF HTML HEADING--*/
?>




<?php
/*------------------------------------------------------------------------------------OUTPUT URL AS LINK AND BR --------------------------------------------------------------------------------------*/
	function do_html_URL($url, $name)
	{
?>
	<div class="grid-container">
		<div class="grid-8">
		<h3>You are not logged in. <a href="<?php echo $url;?>"><?php echo $name;?></a></h3>
		</div>
	 </div>
<?php
}
/*--END OF OUTPUT URL AS LINK AND BR--*/
?>


<?php
/*------------------------------------------------------------------------------------- PRINT HTML HEADER -----------------------------------------------------------------------------------------------*/
	function do_html_header() {
		global $cont_sel;
		global $gal_sel;
		global $proj_sel;
		global $pageLanguage;
		global $pg_type;
?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>AAS - Application and Admission System</title>
			<meta name="viewport" content="width=device-width">
			<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
			<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,700,600,300' rel='stylesheet' type='text/css'>
			<link rel="stylesheet" href="css/normalize.css" type="text/css">
			<link rel="stylesheet" href="css/grid.css" type="text/css">
			<link rel="stylesheet" href="css/AAS_applicant_UI_style.css" type="text/css">
			<link rel="stylesheet" href="css/print.css" type="text/css"> 
				<script>
					function printpage()
					{
					window.print();
					}
				</script>
		</head>
		<body>
			<header class="main-header">
			
				<?php
				 if (isset($_SESSION['valid_user']))
					{
					if ($pageLanguage == 'german') 
						{
						display_user_menu_d();
						}
					else
						{
						display_user_menu();
						}
					
					}
				else
					{
					display_top_and_index();
					}
				?>
			</header>
<?php
	}
/*--END OF HTML HEADER--*/
?>	





<?php
/*------------------------------------------------------------------------------------- PRINT HTML FOOTER -------------------------------------------------------------------------------------------------------*/

	function do_html_footer()
	{
?>
		<footer class="main-footer">
					<p>AAS Application and Admission System &copy; <a href="http://aas-szegedmed.hu/kristof" target="_blank">Kristóf Szilágyi</a> 2013-2015</p>
		</footer>
	</body>
	</html>
<?php
	}
/*-- END OF HTML FOOTER --*/
?>

<?php
/*------------------------------------------------------------------------------------- DIV OPEN DIV CLOSE -------------------------------------------------------------------------------------------------------*/
	function div_open() {
		?>
		<div class="grid-container">
			<div class="grid-12">
		<?php
	}
?>

<?php
	function div_close() {
		?>
			</div>
		<div>
		<?php
	}
/*-- END OF DIV OPEN DIV CLOSE --*/
?>





<?php
/**********************************************************************************S I T E    C O N T E N T    E L E M E N T S*********************************************************************************/

/*------------------------------------------------------------------------------------- DISPLAY SITE INFO ----------------------------------------------------------------------------------------------------*/
function display_site_info() //a login.php-ban kell kimommentelni, ha véget ért a jelentkezési időszak, helyette a display_application_over_inf()-et kell bekapcsolni
{
  // display some general info
?>
	<div class="grid-container">
		<div class="grid-6">
			<h3>Dear Visitor!</h3>
				<p>
						Welcome to the Application and Admission System of the English Language Medical, Dental and Pharmacy Programs at the University of Szeged. 
						On this site, you can submit your Application Form and follow the status of your application online. <br><br>
				</p>
				<p>		
				<img class='pics-in-text' src='css/images/infoblokk_kedv_final_felso_cmyk_en_ESZA_low_res.jpg'>		
				</p>
		</div>

		<div class="grid-6">
				<h3>How to Apply?</h3>
					<p>
					Step 1. <a href='register_form.php'>Create a user account.</a><br>
					Step 2. <a href='login.php'>Log in</a> and submit your Application Form.<br>
					Step 3. Print your Application Form.<br>
					Step 4. Send the hard copy of your Application Form and other required documents directly to:<br>
					<br>
							Foreign Students' Secretariat, <br>
							University of Szeged <br>
							Address: Dóm tér 12.<br>
							H-6720 Szeged, Hungary<br>
							<br>
							or to your local representative (see the list of representatives at <a href="http://www.studyhungary.hu" target="_blank">www.studyhungary.hu</a>).<br>
							<br>
								IMPORTANT NOTICE: <br>
								•	All documents can be accepted only in English<br>
								•	For documents to be submitted after acceptance please visit our website at <a href=" http://szegedmed.hu/prospective_students">szegedmed.hu/prospective_students</a><br>
								•	Submitted documents cannot be returned to the applicants.<br>
					<br>
					Step 5. Log in to your account and check the status of your application.
					</p>
		</div>
	</div>
<?php 
}
?>

<?php
function display_site_info_d() {
?>
	<div class="grid-container">
		<div class="grid-6">
			<h3>Sehr geehrte(r) Besucher(In)!</h3>
			<p>
					Herzlich Willkommen auf der Internetseite,,Application an Admission System" für das deutschsprachige Humanmedizinprogramm der Universität Szeged!<br>
					<br>
					<strong>Die Bewerbungsfrist für das deutsche Humanmedizinprogram ist abgelaufen.<br />
					Sie können sich bis zum 04. September 2015 für unser deutsch- oder englischsprachiges Vorbereitungsjahr bewerben.</strong> 
			</p>
			<p>		
				<img class='pics-in-text' src='css/images/infoblokk_kedv_final_felso_cmyk_en_ESZA_low_res.jpg'>		
			</p>
			<p>
			<br>
			<br>
			<br>
			</p>

		</div>

		<div class="grid-6">
				<h3>Wie kann ich mich bewerben?</h3>
					<p>
					1. Schritt: <a href='register_form.php'>Erstellen Sie Ihren Benutzernamen</a><br />
					2. Schritt: <a href='login.php'>Melden Sie sich an</a> und füllen Sie Ihre Onlinebewerbung aus.<br />
					3. Schritt: Drucken Sie Ihr Bewerbungsformular aus.<br />
					4. Schritt: Unterschreiben Sie das ausgedruckte Online-Bewerbungsformular und schicken Sie es zusammen mit Ihren Bewerbungsunterlagen an die Adresse des Sekretariates für ausländische Studenten oder besuchen Sie unsere Universität persönlich um Ihre Bewerbung abgeben zu können.<br />
					5. Schritt: Besuchen Sie unsere Seite später, um den Status Ihrer Bewerbung verfolgen zu können.<br />
					</p>
		</div>
	</div>	
<?php
}
/*-- END OF DISPLAY SITE INFO --*/
?>





<?php
/*------------------------------------------------------------------------------------- DISPLAY CONFIRMATION--------------------------------------------------------------------------*/
	function display_confirmation()
	{
	?>
	<h3>
	Registration Completed. Finish your application <a href='form.php'>here</a>
	</h3> 	
	<?php
	}
/*-- END OF DISPLAY CONFIRMATION--*/	
?>






<?php
/*------------------------------------------------------------------------------------ DISPLAY NEW TOP AND INDEX -----------------------------------------------------------------------*/
function display_top_and_index() {
		global $ind_sel;
		global $ind_d_sel;

?>
			<div class="grid-container">
				<h1 class="grid-2 main-logo"><a href="index.php">AAS</a></h1>
					<ul class="grid-10 main-nav">
						<li><a href="index.php" class="<?php echo $ind_sel; ?>">English</a></li>
						<li><a href="index_d.php" class="<?php echo $ind_d_sel; ?>">German</a></li> 
					</ul>
				</div>
			</div>
<?php
}
/*--END OF TOP AND INDEX--*/
?>




<?php
/*------------------------------------------------------------------------------------- DISPLAY NEW USER MENU ---------------------------------------------------------------------------*/
function display_user_menu(){
?>
				<div class="grid-container">
					<h1 class="grid-2 main-logo"><a href="index.php">AAS</a></h1>
						<ul class="grid-10 main-nav">
						  <li><a href="form.php" class="<?php echo $ab_sel; ?>">Application </a></li>
						  <li><a href="status.php" class="<?php echo $cont_sel; ?>">App Status</a></li> 
						  
						  <? //FELTÉTELHEZ KÖTNI?>
						  <li><a href="flats_UI.php" class="<?php //echo $cont_sel; ?>">Flats</a></li> 
						  
						  <li><a href="change_passwd_form.php" class="<?php echo $gal_sel; ?>">Password</a></li>
						  <li><a href="http://www.szegedmed.hu/application_and_admission_steps" target="_blank" class="<?php echo $proj_sel; ?>">Guide</a></li>
						  <li><a href="logout.php" class="<?php echo $proj_sel; ?>">Logout</a></li>
						</ul>
				</div>
<?php
/*--END OF DISPLAY NEW USER MENU--*/
}
?>




<?php
function display_user_menu_d() {
?>
				<div class="grid-container">
					<h1 class="grid-2 main-logo"><a href="index.php">AAS</a></h1>
						<ul class="grid-10 main-nav">
							<li><a href="form.php">Bewerbung</a></li>
							<li><a href="status.php">Status</a></li>
							
							 <? //FELTÉTELHEZ KÖTNI?>
							<li><a href="flats_UI.php" class="<?php //echo $cont_sel; ?>">Wohnung</a></li>
						  
							<li><a href="change_passwd_form_d.php">Passwort</a></li>
							<li><a href="http://szegedmed.hu/de/bewerbung" target="_blank">Verfahren</a></li>
							<li><a href="logout.php">Logout</a></li> 
						</ul>
				</div>
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
Kedves Mindenki!<br />
<br />
A Excel táblák átkerültek a lekérdezésekhez! A teszt végűeket ne használjátok!<br />
<br />
A program során az alábbi dolgokra figyeljetek oda légyszíves:<br />
<br />
- Enter: a szövegmezőkbe ne rakjatok entert, mert a generált excel táblák szét fognak csúszni.<br />A letöltött táblában látszik, hogy melyik jelentkezőnél melyik mezőben van enter, tehát a javításhoz ki kell törölni az entert a megfelelő mezőből.<br />
<br />
-Dupla szóköz: a dupla szóközt sem szereti az excel tábla, szóval ne használjatok. Javítás: ugyanúgy, mint ahogy az enternél leírtam.<br />
<br />
-Tab: A tab sem az excel barátja, javítás ugyanúgy. + Ha excelből másolunk két egymás melletti cellát egy mezőbe, akkor tabot rak közé.<br />
<br />
- Szövegmezők törlése: ha már egy szövegmezőbe volt korábban beírva valami, akkor úgy tudjátok "kitörölni" azt, hogy beraktok egy szóközt a mezőbe. (Ideiglenes megoldás.)<br />
<br />
- Átlag: az átlag mezőben a tizedesvesszőt ponttal kell írni, a vesszőt nem megfelelően dolgozza fel a rendszer.<br />
<br />
- A tesztfelhasználók ki lettek törölve. A tesztrendszer felállításáig ezzel a két felhasználóval tudtok tesztelni:<br />
Németes: username: teszt1 password: teszt1 jel_id: 260 (Jelentkeztetve van német orvos 1 évre, statisztikák számainál vegyétek figyelembe!)<br />
Angolos: username: teszt2 password: teszt2 jel_id: 258 (Jelentkeztetve van angol orvos 1 évre, statisztikák számainál vegyétek figyelembe!)<br />
Új tesztfelhasználót légyszi ne hozzatok létre anélkül, hogy írásban jeleznétek nekem.<br />
<br />
<br />
Jó munkát és sok türelmet meg kitartást a studentkákhoz!<br />
<br />
Üdv.<br />
Kri<br />
</p>
<?php
}
?>




<?php
/*******************************************************************************************F O R M S*****************************************************************************/

/*<!---------------------------------------------------------------------------------- DISPLAY NEW LOGIN FORM--------------------------------------------------------------------*/

	function display_login_form()
	{
?>
		<form action="member.php" method="post">
			<label for="username">Username</label>
			<input type="text" id="username" name="username">
			<label for="password" >Password</label>
			<input type="password" id="password" name="passwd">
			<button type="submit">Login</button>
			<p><a href='register_form.php'>Create a user account.</a></p>
			<p><a href='forgot_form.php'>Forgot your password?</a></p>
		 </form>
<?php
	}
/*-- END OF DISPLAY NEW LOGIN FORM --*/
?>





<?php
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
?>




<?php
/*----------------------------------------------------------------------------------- DISPLAY NEW REGISTRATION FORM----------------------------------------------------------------*/
	function display_registration_form() {
?>
		<form method='post' action='cap.php'>
			<p>Create a user account:</p>
			
			<label for="email">Email address:</label>
			<input type='text' id="email"name='email' size=30 maxlength=100>
			<label for="username">Preferred username*:</label>
			<input type='text' id="username" name='username' size=30 maxlength=16>
			<label for="passwd">Password**:</label>
			<input type='password' id="passwd" name='passwd' size=30 maxlength=16>
			<label for="passwd2">Confirm password:</label>
			<input type='password' id="passwd2" name='passwd2' size=30 maxlength=16>
			<button type="submit">Register</button>
			<p>*max 16 chars</p>
			<p>**between 6 and 16 chars</p>
		</form>
<?php 
	}
/*--END OF NEW REGISTRATION FORM--*/
?>



<?php
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
?>




<?php
	function display_password_form()
{
  // display html change password form
?>
		<form action='change_passwd.php' method='post'>
			Change password:
			<label for="old_passwd">Old password:</label>
			<input type='password' id='old_passwd' name='old_passwd' size=16 maxlength=16>
			<label for="new_passwd">New password:</label>
			<input type='password' id='new_passwd' name='new_passwd' size=16 maxlength=16>
			<label for="new_passwd2">Repeat new password:</label>
			<input type='password' id='new_passwd2' name='new_passwd2' size=16 maxlength=16>
			<button type='submit'>Change password</button>
		</form>	
<?php
}
?>


<?php // display HTML form to reset and email password
/*--------------------------------------------------------------------------------------DISPLAY NEW FORGOT FORM --------------------------------------------------------------------------------*/
	function display_forgot_form() {
?>
		<form action='cap2.php' method='post'>
			<label for="username">Enter your username:</label>
			<input type='text' id="username" name='username' size=16 maxlength=16></td></tr>
			<button type='submit'>Reset password</button>
		</form>	
<?php
}
/*--END OF NEW FORGOT FORM--*/
?>





<?php
/*******************************************************************************************S I T E   I N F O S*****************************************************************************/

/*<!--------------------------------------------------------------------------------------DISPLAY NEW APPLICATION INFO -----------------------------------------------------------------------------*/
	function display_program_switcher() //a member php-ban kell kikommenttelni, ha vége a jelentkezési időszaknak + teljes jelentkezés leírása a serveren a php/sve könytárban
	{
?>
	<div class="grid-container">
		<div class="grid-6">
			<h3><a href="appform.php">Application for English language programs</a></h3>		
		</div>

		<div class="grid-6">
			<h3><a href="bewform.php">Application for German language programs</a></h3>
		</div>
	</div>

<?php
}
/*--END OF DISPLAY NEW APPLICATION INFO--*/
?>



<?php
/*<!--------------------------------------------------------------------------------------DISPLAY NEW APPLICATION INFO -----------------------------------------------------------------------------*/
	function display_application_info() //a member php-ban kell kikommenttelni, ha vége a jelentkezési időszaknak + teljes jelentkezés leírása a serveren a php/sve könytárban
	{
?>
	<div class="grid-container">
		<div class="grid-6">
			<h3>Thank you for your interest in applying for a full-time program at the University of Szeged!</h3>
				<p>
						Welcome to the online application for the Foreign Language Programs at the Faculty of Medicine, Faculty of Dentistry and the Faculty of Pharmacy. We are pleased that you are considering undergraduate study at University of Szeged, and we hope that you will find this application to be easy and convenient to complete.<br />
						<br />
						Please make sure that you use one of the most popular browsers such as Chrome, Internet Explorer, Mozilla Firefox or Opera.
				</p>		
		</div>

		<div class="grid-6">
			<h3>The application deadline is June 30, 2015</h3>
				<p>
						Late applicants can be considered on the basis of place availability.<br />
						<br />
						When you provide information during completion of this Application, you agree to: always provide responsive information that is true, accurate, current and complete; otherwise, you acknowledge that the University reserves the right to terminate your application.<br />
						<br />
						<strong><a href="bewform.php">Application for German language programs</a></strong>						
				</p>
		</div>
	</div>

<?php
}
/*--END OF DISPLAY NEW APPLICATION INFO--*/
?>


<?php
/*<!--------------------------------------------------------------------------------------DISPLAY NEW APPLICATION INFO -----------------------------------------------------------------------------*/
	function display_application_info_d() //a member php-ban kell kikommenttelni, ha vége a jelentkezési időszaknak + teljes jelentkezés leírása a serveren a php/sve könytárban
	{
?>
	<div class="grid-container">
		<div class="grid-6">
			<h3>Vielen Dank für Ihr Interesse an der Bewerbung für die fremdsprachigen Studiengänge der Universität Szeged!</h3>
				<p>
						Willkommen in dem Online-Bewerbungssystem für die fremdsprachigen Studiengänge an den Medizinischen, Zahnmedizinischen und Pharmazeutischen Fakultäten der Universität Szeged. Wir freuen uns sehr, dass Sie Ihr Studium an der Universität Szeged vortsetzen werden. Wir hoffen, dass die Ausfüllung des Bewerbungsformulars einfach und verständlich wird.<br>
						<br>
						Bitte vergewissern Sie sich, dass sie eins der folgenden Browsers wie Chrome, Internet Explorer, Mozila Firefox oder Opera nutzen.<br>
				</p>		
		</div>

		<div class="grid-6">
			<h3>Bewerbung 2015</h3>
				<p>
						Bei dem Ausfüllen der Online-Bewerbug müssen die angegebenen Daten der Wahrheit entsprechen, die aktuell und vollständig sind, andererseits behält sich die Universität das Recht vor die Bewerbung bei falsch angegebenen Daten zu löschen.<br />
						<br />
						<strong>Die Bewerbungsfrist für das deutsche Humanmedizinprogram ist abgelaufen.<br />
						Sie können sich bis zum 04. September 2015 für unser deutsch- oder englischsprachiges Vorbereitungsjahr bewerben.</strong> 
						<br />
						<br />
						<strong><a href="appform.php">Bewerbung für die englischsprachigen Programme</a></strong>						
				</p>
		</div>
	</div>

<?php
}
/*--END OF DISPLAY NEW APPLICATION INFO--*/
?>


<?php
function display_application_over_info() //a member php-ban kell kikommenttelni, ha a jelentkezési időszak elkezdődött
{
?>
<p class="text">Thank you for your interest in applying for a full-time program at the University of Szeged.<br />
<br />
The application has already been closed for the first and upper year programs in the academic year 2013/2014. The online application for the academic year 2014/2015 will open in February, 2014.<br />
<br />
For further information on the application procedure, please contact your local representative (for the list of representatives please visit the following website: <a href="http://www.studyhungary.hu" target="_blank">http://www.studyhungary.hu</a>) or our admission team at <a href="mailto:apply.fs@med.u-szeged.hu">apply.fs@med.u-szeged.hu</a> or at +36 (62) 342-124<br />
<br />
<br />
Vielen Dank für Ihre Bewerbung an der Universität Szeged!<br />
<br />
Die Anmeldefrist für das deutschsprachige Humanmedizinprogramm ist mit dem 31. Mai 2013 abgelaufen.<br />
<br />
Für das Studienjahr 2014/2015 kann man sich ab dem 15. Januar 2014 bewerben.<br />
</p>
<br /><br /><br /><br /><br /><br />

<?php	
}
function display_applicant_info()
{
?>
<p class="text">This is your application info.</p>
<?php
}

function display_officers_info()
{
?>
<p class="text2"><a href="officers.php">Tanulmányi előadói felület</a><br /> 
</p>
<?php
}
?>

<?php
function db_switcher_table() {
	
	global $app_year;

?>
	<!-- Adatbázis választó táblázat: -->
	<table class="table_database">
	<tr>
	<td>Jelenlegi adatbázis: <strong><?php echo $app_year ?></strong> | Váltás a következőre:</td>
	<td>
	<form action="applicants.php" method="post" id="form1">
		<select name="app_year">
			<option>2015</option>
			<option>2014</option>   
			<option>2013</option>   
		</select>
	<input type="submit" name="Submit" id="Submit" value="választ" />
	</form>
	</td>
	</tr>
	</table>
<?php
}
?>

<?php
	function docUploadForm() {
		
		global $type_of_doc;
		global $jel_id;

?>
		<form class="fileUpload" action="upload_docs.php" method="post" enctype="multipart/form-data">
					<!-- <input type="file" id="file" name="uploaded_files"> -->
					<input type="hidden" id="jel_id" name="jel_id" value="<?php print $jel_id; ?>" />
					<input type="hidden" id="type_of_doc" name="type_of_doc" value="<?php print $type_of_doc; ?>" />
					<input type="file" id="file" name="uploaded_files[]" multiple="multiple" required = "required"/>
					<input type="submit" id="submit" name="submit" value="Upload">

		</form>
<?php
	}
?>

<?php
function backTo() {

	global $jel_id;
	global $backTo;
?>
		<form class="buttonForm" action="<?php print $backTo; ?>" method="post">
				<input name="jel_id" type="hidden" value="<?php print $jel_id; ?>" />
				<button class="okButton" type="submit">OK</button>
		</form>
<?php
}
?>
	


