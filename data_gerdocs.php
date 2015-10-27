<?php
$gerdocs=$conn->query("SELECT * FROM gerdocs WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($gerdocs);
?>
<fieldset><legend>Egyéb dokumentumok:</legend>
<table>
<tr><td>
Rhein. Bildungszentrum Köln/Prometheus Med. Akademie Berlin: <select name="rh_pro">
<option><?php print $sor['rh_pro'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>
Rett. Helfer: <select name="r_helf">
<option><?php print $sor['r_helf'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>
Rett.San: <select name="r_san">
<option><?php print $sor['r_san'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>
Rett.ass: <select name="r_ass">
<option><?php print $sor['r_ass'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>
Gesundheits- und Krankenpfleger(In): <select name="ges_kr">
<option><?php print $sor['ges_kr'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>
Med.Fachangestellte: <select name="m_fach">
<option><?php print $sor['m_fach'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>
Physiotherapeut: <select name="phys">
<option><?php print $sor['phys'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>
sonstige gesundheitliche Fachangestellte: <select name="sg_fach">
<option><?php print $sor['sg_fach'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>
ITB/TMS: <select name="itbtms">
<option><?php print $sor['itbtms'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>
Krankenpflegedienst: <select name="krank">
<option><?php print $sor['krank'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>
VBJ Mc Danel: <select name="vbjmcd">
<option><?php print $sor['vbjmcd'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>
Zivieldienst: <select name="ziv_d">
<option><?php print $sor['ziv_d'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>
FSJ: <select name="fsj">
<option><?php print $sor['fsj'] ?></option>
<option>No</option>
<option>Yes</option>
<option>NA</option>
</select><br>
</tr></td>
</table>
<?php include 'data_remarks_gerdocs.php' ?>
</fieldset>

