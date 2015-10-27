<?php
/*$data=$conn->query("SELECT * FROM applicants WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($data);*/
include 'db_switcher.php';
?>
<form action='regdocs.php' method='post'>
<input name="app_year" type="hidden" value="<?php print $app_year ?>" />
<?php
//include 'data_application.php';
include 'data_pers+add.php'; //személyes adatok
include 'data_hs.php'; //gimnáziumi adatok
include 'data_rep.php'; // képviselő
include 'data_studs.php'; //felsőfokú tanulmányok
include 'data_qual.php'; // egyéb végzettségek
include 'data_practices.php'; // egyéb szakmai gyakorlatok
include 'data_appdocs.php'; //jelentkezési dokumentumok
include 'data_payments.php'; //jelentkezési díj befizetése
include 'data_afterappdocs.php'; //felvétel utáni dokumentumok - az appdocs, engdocs táblák alapján. A sorrend variálása miatt ezek teljesen összekeveredtek..
include 'data_regdocs.php'; //beiratkozási dokumentumok
include 'data_entrance.php'; //felvételi vizsga
include 'data_other.php'; //más magyar egyetemre jelentkezett-e
include 'data_remarks_fur.php'; //további megjegyzések

?>
<p>
<input type='submit' name='submit' value='Jelentkezői adatlap mentése'>
</p>
</form>

<?php
include 'data_messages.php'; //üzenetek
include 'data_decisions.php'; //döntések
include 'data_feedbacks.php'; //visszajelzések
include 'data_tuitions.php'; //tandíjbefizetések
include 'data_transfer.php'; //visszautalás
?>
<br><br>
<input type="button" value="Oldal nyomtatása" onclick="printpage()" />  
</body>
</html>