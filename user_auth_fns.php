<?php
require_once('db_fns.php');


function register($username, $email, $password) 
//új felhasználó regisztrációja
{
$conn = db_connect();
$result = $conn->query("SELECT * FROM user WHERE username='$username'"); 

if (!$result)
	{
  	throw new Exception('Could not execute query');
	}
//van-e már ilyen username?
if ($result->num_rows>0) 
	{ 
    throw new Exception('That username is already in use. Go back and choose an other one.');
	}
// ha nincs akkor adatbázisba rakja
//kreál egy random számot + megadott számot hozzáfűzi a jelszóhoz, majd sha1-el kódolja
$dynamic_salt = mt_rand();
$static_salt = '123456789987654321';
$hash = sha1($dynamic_salt . $password . $static_salt);
$result = $conn->query("INSERT INTO user VALUES ('$username', '$hash', '$email', '$dynamic_salt')");
if (!$result)
	{
    throw new Exception('Could not register you in database. Please try again later.');
	}
	return true;
	}

function register_officer($username, $email, $password) 
//új felhasználó regisztrációja
{
$conn = db_connect();
$result = $conn->query("SELECT * FROM officers WHERE username='$username'"); 

if (!$result)
	{
  	throw new Exception('Could not execute query');
	}
//van-e már ilyen username?
if ($result->num_rows>0) 
	{ 
    throw new Exception('That username is already in use. Go back and choose an other one.');
	}
// ha nincs akkor adatbázisba rakja
//kreál egy random számot + megadott számot hozzáfűzi a jelszóhoz, majd sha1-el kódolja
$dynamic_salt = mt_rand();
$static_salt = '123456789987654321';
$hash = sha1($dynamic_salt . $password . $static_salt);
$result = $conn->query("INSERT INTO officers VALUES ('$username', '$hash', '$email', '$dynamic_salt')");
if (!$result)
	{
    throw new Exception('Could not register you in database. Please try again later.');
	}
	return true;
	}

function login($username, $password) //bejelentkezés jelentkezőknek
{

$conn = db_connect();
$ds=$conn->query("SELECT ds FROM user WHERE username='$username'"); //megkeresi a ds-t
$sor=mysqli_fetch_array($ds);
$dynamic_salt=$sor['ds'];
$static_salt = '123456789987654321';
$hash = sha1($dynamic_salt . $password . $static_salt);
$result = $conn->query("SELECT * FROM user WHERE username='$username' and passwd ='$hash'");

if (!$result)
	{
    throw new Exception('Could not log you in.');
	}
	
if ($result->num_rows>0)
	{
    return true;
	}
	else 
    	{
		throw new Exception('Could not log you in.');
		}
	}

function login2($username, $password) //bejelentkezés tanulmányi előadóknak
{
$conn = db_connect_officers();
$ds=$conn->query("SELECT ds FROM officers WHERE username='$username'"); //megkeresi a ds-t
$sor=mysqli_fetch_array($ds);
$dynamic_salt=$sor['ds'];
$static_salt = '123456789987654321';
$hash = sha1($dynamic_salt . $password . $static_salt);
$result = $conn->query("SELECT * FROM officers WHERE username='$username' and passwd ='$hash'");

if (!$result)
	{
    throw new Exception('Could not log you in.');
	}
	
if ($result->num_rows>0)
	{
    return true;
	}
	else 
    	{
		throw new Exception('Could not log you in.');
		}
	}
?>
	
<?php
/*------------------------------------------------------------------------------------- DISPLAY LOGIN MESSSAGE---------------------------------------------*/

	function display_login_message() {
?>
		<div class="grid-container">
			<div class="grid-12">
				<p class="login_message">Welcome <?php echo $_SESSION['valid_user'].','; ?> you are logged in to AAS. </p>
			</div>
		</div>
<?php
	}
/*--END OF DISPLAY LOGIN MESSAGE--*/
?>	


<?php
function check_valid_user()
//ellenőrzi, h a user be van-e jelentkezve és értesíti
{
  if (isset($_SESSION['valid_user']))
  {
	display_login_message();
  }
  else
  {
     // they are not logged in 
     //do_html_heading();
     //echo 'You are not logged in.<br />';
     do_html_url('login.php', 'Login');
     do_html_footer();
     exit;
  }  
} 

function check_valid_officer_user()
//ellenőrzi, h a user be van-e jelentkezve és értesíti
{
  if (isset($_SESSION['valid_user']))
  {?>
  <p class="fent_login">Welcome <?php
      echo $_SESSION['valid_user'].',';
      echo ' ';?>you are logged in to AAS. </p><?php  
  }
  else
  {
     // they are not logged in 
     do_html_heading('Problem:');
     echo '
	 logged in.<br />';
     do_html_url('login2.php', 'Login');
     do_html_footer();
     exit;
  }  
} 

function change_password($username, $old_password, $new_password)
// jelszó megváltoztatása username/old_password-ből new_password
// return true or false
{
  // ha a régi jelszó érvényes, akkor a new_password változóba új jelszót rak, majd return true. Ha nem, akkor kivétel.
  login($username, $old_password);
  
 //kreál egy random számot + megadott számot hozzáfűzi a jelszóhoz, majd sha1-el kódolja
 $conn = db_connect();
 $ds = $conn->query("SELECT ds FROM user WHERE username='$username'"); //megkeresi a ds-t
 $sor = mysqli_fetch_array($ds);
 $dynamic_salt = $sor['ds'];
 $static_salt = '123456789987654321';
 $hash = sha1($dynamic_salt . $new_password . $static_salt);
 
  $result = $conn->query("UPDATE user SET passwd = '$hash' WHERE username = '$username'");
  if (!$result)
    throw new Exception('Password could not be changed.');
  else
    return true;  // jelszó sikeresen megváltoztatva
}


function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}


function reset_password($username)
{
$new_password=randomPassword(); //random jelszót állít be a felhasználóhoz, ha sikertelen, akkor false

if ($new_password==false)
	{
	throw new Exception ('Could not generate new password.'); 
	}

 $conn = db_connect();
 $ds = $conn->query("SELECT ds FROM user WHERE username='$username'"); //megkeresi a ds-t
 $sor = mysqli_fetch_array($ds);
 $dynamic_salt = $sor['ds'];
 $static_salt = '123456789987654321';
 $hash = sha1($dynamic_salt . $new_password . $static_salt);

$result=$conn->query("UPDATE user SET passwd = '$hash' WHERE username = '$username'");

if(!$result)
	{
	throw new Exception ('Could not change password.');
	}
else
	{
	return $new_password; //jelszó sikeresen megváltoztatva
	}	
}

function notify_password($username, $password)
// notify the user that their password has been changed
{
    $conn = db_connect();
    $result = $conn->query("SELECT email FROM user
                            WHERE username='$username'");
    if (!$result)
    {
      throw new Exception('Could not find email address.');  
    }
    else if ($result->num_rows==0)
    {
      throw new Exception('Could not find email address.');   // username not in db
    }
    else
    {
      $row = $result->fetch_object();
      $to = $row->email;
      include('email.php');
    }
} 

function send_application_email($username)
// notify the user that their password has been changed
{
    $conn = db_connect();
    $result = $conn->query("SELECT email FROM user
                            WHERE username='$username'");
    if (!$result)
    {
      throw new Exception('Could not find email address.');  
    }
    else if ($result->num_rows==0)
    {
      throw new Exception('Could not find email address.');   // username not in db
    }
    else
    {
      $row = $result->fetch_object();
      $to = $row->email;
      include('email_application.php');
    }
} 

?>
