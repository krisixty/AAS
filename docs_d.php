<?php
/*$data=$conn->query("SELECT * FROM applicants WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($data);*/
include 'db_switcher.php';
?>
<form action='regdocs.php' method='post'>
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<?php
//include 'data_application.php';
include 'data_pers+add.php';
include 'data_hs_d.php';
include 'data_studs.php';
include 'data_practices.php';
include 'data_appdocs_d.php';
include 'data_payments.php';
include 'data_gerdocs.php';
include 'data_regdocs_d.php';
include 'data_other_d.php';
include 'data_messages.php';
include 'data_remarks_fur.php'; //további megjegyzések
?>
<p>
<input type='submit' name='submit' value='Jelentkezői adatlap mentése'>
</p>
</form>

<?php
include 'data_decisions_d.php';
include 'data_feedbacks.php';
include 'data_tuitions.php';
include 'data_transfer.php';
?>
<br><br>
<input type="button" value="Oldal nyomtatása" onclick="printpage()" />  
</body>
</html>