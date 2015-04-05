Érettségi / féléves jegyek
<table>
<tr><td></td><td>Biologie</td><td>Chemie</td><td>Mathematik</td><td>Physik</td></tr>
<?php
$abitur_lf=$conn->query("SELECT * FROM abitur_lf WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($abitur_lf);
?>
<tr>
<td>LF</td>
<td><input name="bio_lf" type="text" value="<?php print $sor['bio_lf'] ?>" maxlength="1" size="1"/></td>
<td><input name="chem_lf" type="text" value="<?php print $sor['chem_lf'] ?>" maxlength="1" size="1"/></td>
<td><input name="math_lf" type="text" value="<?php print $sor['math_lf'] ?>" maxlength="1" size="1"/></td>
<td><input name="phys_lf" type="text" value="<?php print $sor['phys_lf'] ?>" maxlength="1" size="1"/></td>
</tr>
<?php
$abitur_gf=$conn->query("SELECT * FROM abitur_gf WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($abitur_gf);
?>
<tr>
<td>GF</td>
<td><input name="bio_gf" type="text" value="<?php print $sor['bio_gf'] ?>" maxlength="1" size="1"/></td>
<td><input name="chem_gf" type="text" value="<?php print $sor['chem_gf'] ?>" maxlength="1" size="1"/></td>
<td><input name="math_gf" type="text" value="<?php print $sor['math_gf'] ?>" maxlength="1" size="1"/></td>
<td><input name="phys_gf" type="text" value="<?php print $sor['phys_gf'] ?>" maxlength="1" size="1"/></td>
</tr>
<?php
$semesters=$conn->query("SELECT * FROM semesters WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($semesters);
?>
<tr>
<td>4 Sem</td>
<td>
<input name="bio_1" type="text" value="<?php print $sor['bio_1'] ?>" maxlength="1" size="1"/>
<input name="bio_2" type="text" value="<?php print $sor['bio_2'] ?>" maxlength="1" size="1"/>
<input name="bio_3" type="text" value="<?php print $sor['bio_3'] ?>" maxlength="1" size="1"/>
<input name="bio_4" type="text" value="<?php print $sor['bio_4'] ?>" maxlength="1" size="1"/>
</td>

<td>
<input name="chem_1" type="text" value="<?php print $sor['chem_1'] ?>" maxlength="1" size="1"/>
<input name="chem_2" type="text" value="<?php print $sor['chem_2'] ?>" maxlength="1" size="1"/>
<input name="chem_3" type="text" value="<?php print $sor['chem_3'] ?>" maxlength="1" size="1"/>
<input name="chem_4" type="text" value="<?php print $sor['chem_4'] ?>" maxlength="1" size="1"/>
</td>

<td>
<input name="math_1" type="text" value="<?php print $sor['math_1'] ?>" maxlength="1" size="1"/>
<input name="math_2" type="text" value="<?php print $sor['math_2'] ?>" maxlength="1" size="1"/>
<input name="math_3" type="text" value="<?php print $sor['math_3'] ?>" maxlength="1" size="1"/>
<input name="math_4" type="text" value="<?php print $sor['math_4'] ?>" maxlength="1" size="1"/>
</td>

<td>
<input name="phys_1" type="text" value="<?php print $sor['phys_1'] ?>" maxlength="1" size="1"/>
<input name="phys_2" type="text" value="<?php print $sor['phys_2'] ?>" maxlength="1" size="1"/>
<input name="phys_3" type="text" value="<?php print $sor['phys_3'] ?>" maxlength="1" size="1"/>
<input name="phys_4" type="text" value="<?php print $sor['phys_4'] ?>" maxlength="1" size="1"/>
</td>
</tr>
</table>
<?php
$abitur_ng=$conn->query("SELECT * FROM abitur_ng WHERE jel_id='$jel_id'");
$sor=mysqli_fetch_array($abitur_ng);
?>
<BR />
Nem németországi érettségi:<br />
<textarea name="ab_ng" cols="100" rows="5" ><?php print $sor['ab_ng'] ?></textarea>
