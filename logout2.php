<?php
require_once('aas_includes.php'); 
session_start();
$old_user = $_SESSION['valid_user'];
  
// ellenőrzi, h be volt-e a user jelentkezve
unset($_SESSION['valid_user']);
$result_dest = session_destroy();

// start output html
do_html_header('');

?>
<p class="text">
<?php
if (!empty($old_user))
{
  if ($result_dest)
  {
	echo 'Logged out.' ?> <a href="login2.php">Log in</a> <?php ;
    // ha be volt jelentkezve a user, akkor most már ki van jelentkezve
    //header("Location:login.php");
  }
  else
  {
   // be volt jelentkezve a user, de nem tud kijelentkezni
    echo 'Could not log you out.<br />';
  }
}
else
{
  // nem volt bejelentkezve, de valahogy ide került
  echo 'You were not logged in, and so have not been logged out.<br />';
  do_html_url('login.php', 'Login');
}

?>
</p>
<?php
do_html_footer();

?>
