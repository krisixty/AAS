<?php

function do_html_header($title)
{
  // print an HTML header
?>
  <!DOCTYPE html>
  <html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="style/reg_style.css">
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
  TESZTRENDSZER!<br />
  Faculty of Medicine, Faculty of Dentistry and Faculty of Pharmacy<br /> 
  </p>
<?php
 if($title)
    do_html_heading($title);
}

function do_html_footer()
{
  // print an HTML footer
?>
<p class="footer">AAS Application and Admission System v1.39. &#169; <a href="http://aas-szegedmed.hu/kristof" target="somethingUnique">Szilágyi Kristóf</a> 2013-2014</p>
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
  <br /><a href="<?php echo $url;?>"><?php echo $name;?></a><br />
<?php
}

function display_site_info() //a login.php-ban kell kimommentelni, ha véget ért a jelentkezési időszak, helyette a display_application_over_inf()-et kell bekapcsolni
{
  // display some general info
?>
<p class="text">
Dear Visitor!<br /><br />
Welcome to the Application and Admission System of the English Language Medical, Dental and Pharmacy Programs at the University of Szeged.<br />
Here you can submit your Application Form and follow the status of your application online.<br />
Step 1. <a href='register_form.php'>Create a user account.</a><br />
Step 2. <a href='login.php'>Log in</a> and submit your Application Form.<br />
Step 3. Print your Application Form.<br />
Step 4. Sign the printed Application Form and send it to the Foreign Students' Secretariat or visit us in person and submit your application package.<br />
Step 5. Log in to your account and check the status of your application.<br />
<br />
<br />
Sehr geehrte(r) Besucher(In)!<br />
<br />
Herzlich Willkommen auf der Internetseite,,Application an Admission System" für das deutschsprachige Humanmedizinprogramm der Univerisität Szeged!<br />
<!--NÉMET JELENTKEZÉS LEZÁRULT
1. Schritt: <a href='register_form.php'>Erstellen Sie Ihren Benutzernamen</a><br />
2. Schritt: <a href='login.php'>Melden Sie sich an</a>und füllen Sie Ihre Onlinebewerbung aus.<br />
3. Schritt: Drucken Sie Ihr Bewerbungsformular aus.<br />
4. Schritt: Unterschreiben Sie das ausgedruckte Online-Bewerbungsformular und schicken Sie es zusammen mit Ihren Bewerbungsunterlagen an die Adresse des Sekretariates für ausländische Studenten oder besuchen Sie unsere Universität persönlich um Ihre Bewerbung abgeben zu können.<br />
5. Schritt: Besuchen Sie unsere Seite später, um den Status Ihrer Bewerbung verfolgen zu können.<br />
-->
<br />
Vielen Dank für Ihre Interesse an der Universität Szeged!
<br />
Die Anmeldefrist für das deutschsprachige Humanmedizinprogramm ist mit dem 31.<br />
Mai 2014 und für das deutschsprachige Vorbereitungsjahr mit dem 21. August 2014
abgelaufen.<br />
<br />
Für das Studienjahr 2015/2016 kann man sich ab Mitte Januar 2015 bewerben.<br />
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
<!--
<form action="applicants.php" method="post" id="form1">
<select name="app_year">
<option>2014</option>   
<option>2013</option>   
</select>
<input type="submit" name="Submit" id="Submit" value="választ" />
</form>
-->
<a href="applicants.php">Jelentkezők - angol</a> |
<a href="applicants_d.php">Jelentkezők - német</a> |
<a href="queries.php">Lekérdezések</a> |
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
function display_application_info() //a member php-ban kell kikommenttelni, ha vége a jelentkezési időszaknak + teljes jelentkezés leírása a serveren a php/sve könytárban
{
?>
<p class="text"><strong>Thank you for your interest in applying for a full-time program at the University of Szeged!</strong><br />
<br />
Welcome to the online application for the Foreign Language Programs at the Faculty of Medicine, Faculty of Dentistry and the Faculty of Pharmacy. We are pleased that you are considering undergraduate study at University of Szeged, and we hope that you will find this application to be easy and convenient to complete.<br />
<br />
The application deadline is June 30, 2014.<br />
<br />
Late applicants can be considered on the basis of place availability.<br />
<br />
When you provide information during completion of this Application, you agree to: always provide responsive information that is true, accurate, current and complete; otherwise, you acknowledge that the University reserves the right to terminate your application.<br />
<br />
Please make sure that you use one of the most popular browsers such as Chrome, Internet Explorer, Mozilla Firefox or Opera.
<br />
Start the application process: <a href="appform.php">APPLY NOW</a><br />
<br />
<br />
<!-- NÉMET JELENTKEZÉS LEZÁRULT, HA AZ ANGOL IS LEZÁRUL, AKKOR BEAKTIVÁLNI A display_application_info()-t
<strong>Vielen Dank für Ihre Bewerbung an der Universität Szeged!</strong><br />
<br />
Herzlich Willkommen in dem Online-Bewerbungsprogramm des deutschsprachigen Humanmedizinischen Studiengangs der Universität Szeged. Wir freuen uns über Ihre Interesse an unserer Universität und hoffen, dass Sie das ausfüllen des Bewerbungsformulars als einfach und benutzerfreundlich beurteilen werden.<br />
<br />
Die Anmeldefrist für das deutschsprachige Humanmedizinprogramm ist mit dem 31. Mai 2014 abgelaufen.
Ab dem 01. Juni 2014 können Sie sich nur für das deutschsprachige Vorbereitungsjahr bewerben. Weiterhin ist auch eine paralelle Bewerbung für das englischsprachige Vorbereitungsjahr möglich.<br />
<br />
Es wird darauf aufmerksam gemacht, dass die von Ihnen angegeben Informationen der Wahrheit entsprechen müssen, andernfalls behält sich die Universität das Recht vor Ihre Bewerbung als ungültig zu betrachten.<br />
<br />
Bitte berücksichtigen Sie, dass das Bewerbungsprogramm vom folgenden Browser unterschtützt wird: Chrome, Internet Explorer, Mozilla Firefox oder Opera.<br />
<br />
Hier geht’s direkt zu Online-Bewerbung: <a href="bewform.php">Jetzt bewerben</a><br />
<br />
-->
<strong>Vielen Dank für Ihre Interesse an der Universität Szeged!</strong>
<br />
Die Anmeldefrist für das deutschsprachige Humanmedizinprogramm ist mit dem 31.<br />
Mai 2014 und für das deutschsprachige Vorbereitungsjahr mit dem 21. August 2014
abgelaufen.<br />
<br />
Für das Studienjahr 2015/2016 kann man sich ab Mitte Januar 2015 bewerben.<br />
</p>

<?php
}
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
