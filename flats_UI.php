<?php
require_once('aas_includes.php');
session_start();
do_html_header('');
check_valid_user();
$username=$_SESSION['valid_user'];

isPaidandEngOrGer();
if ($pageLanguage == 'german') {
	include 'flatformLangGer.php';
}

$conn = db_connect();

$flats_result_forPg=$conn->query("SELECT * FROM flats WHERE ispublic = '1' ORDER BY flat_id");

$row_cnt = $flats_result_forPg->num_rows; //megszámolja az applicants tábla sorainak számát
$rows_per_page=25;
$no_of_pages=ceil($row_cnt/$rows_per_page);

$limit=$rows_per_page; //elosztja az oldalszámmal
div_open();
?>
<ul>
	<li>
<?php
for($i=1; $i<$no_of_pages+1; $i++)
	{
	?>
	
	<form class="buttonForm" action='flats_UI.php' method='post'>
	<input class="input_app" name="pg_num" type="hidden" value="<?php print $i ?>" />
    <button class="pageButton" type="submit"><?php print $i ?></button>
    </form>
	<?php	
	} 
	?>
	</li>
</ul>
	<?

if(@$_POST['pg_num']) //ha ki van töltve a post, akkor berakja a pg_num változóba
	{
	$pg_num=$_POST['pg_num'];
	print '#'.$pg_num;
	$limit_num=($pg_num-1)*$limit;
	}
else
	{
	print '#1';
	$limit_num=0;
	}	
	
$flats_result=$conn->query("SELECT * FROM flats WHERE ispublic = '1' ORDER BY flat_id LIMIT $limit_num, $limit");


$picsPath="../maintest/upload/";
?>
<ul class="properties">
<?php
	while($sor=mysqli_fetch_array($flats_result))
		{
	?>
			
				<li>
					<a href="/flat_UI.php"></a>
						
						<?php
						$thisFlatID = $sor['flat_id'];
						//select the highest pic_id for the goven flat
						$flatpics_result=$conn->query("SELECT * FROM flatpics WHERE flat_id='$thisFlatID' ORDER BY pic_id DESC LIMIT 0, 1");
						
							if ($flatpics_result->num_rows>0) //checks image existance
								{
									while($row=mysqli_fetch_array($flatpics_result))	{
										$pic_filename = $row['pic_filename'];
										$file = $picsPath.$pic_filename;
										//echo $file;
										?><img src='<? print $file;?>'></img><?
									}
								} 
							else {
								?><img src='css/images/no_image_uploaded.jpg'></img><?
							}
						
						?>
						<div class="description">
							<p>
								<?php
								print $formStreetLng.' '.$sor['street'].' '.$sor['number'].'<br>';
								print $formRoom_NumberLng.' '.$sor['room_number'].'<br>';
								print $formPriceLng.' '.$sor['price'].' HUF'.'<br>';
								?>
								<br>
								<form class="buttonForm" action="flat_UI.php" method="post">
								<input name="flat_id" type="hidden" value="<?php print $sor['flat_id']?>" />
								<button class="moreButton" type="submit"><?php print $buttonMoreLng; ?></button>
								</form>
								<br><br><br><br><br><br>
							</p>
						</div>
					</a>
				</li>
			
	<?php
		}
	?>	
</ul>		
<!--		
		<li class="cf">
			<a href="/flat_UI.php">
				<img width="400" src='css/images/1.jpg'></img>
				<div class="description">
					<p>
						Petőfi Sándor 35<br>
						6 rooms<br>
						35000Ft/month<br>
					</p>
				</div>
			</a>
		</li>
		<li class="cf">
			<a href="/flat_UI.php">
				<img width="400" src='css/images/1.jpg'></img>
				<div class="description">
					<p>
						Petőfi Sándor 35<br>
						6 rooms<br>
						35000Ft/month<br>
					</p>
				</div>
			</a>
		</li>
	</ul>
-->
<?php		
div_close();
do_html_footer();
?>