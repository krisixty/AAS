<?php
?><fieldset class="text2">
			<legend class="text2"><?print $flatInfo;?></legend><?
print 'Flat ID: '.$flat_id.'<br>';
print $formStreetLng.' '.$street.'<br>';
print $formNumberLng.' '.$number.'<br>';
print $formPostCodeLng.' '.$postcode.'<br>';
print $formFlat_TypeLng.' '.$flat_type.'<br>';
print $formFlat_SizeLng.' '.$flat_size.' m2<br>';
print $formRoom_NumberLng.' '.$room_number.'<br><br>';
?></fieldset><?

?><fieldset class="text2">
			<legend class="text2"><?print $formFlatAdditionalLng;?></legend><?
print $formTransLng.' '; if (($bus != 1) && ($tram != 1) && ($trolley != 1)) {print '-'.'<br>';} else {print ' <br>';};
if ($bus == 1) {print $formBusLng.'<br>';};
if ($tram == 1) {print $formTramLng.'<br>';};
if ($trolley == 1) {print $formTrolleyLng.'<br>';};

print '<br>'.$formCloseToLng.' '; if (($shop != 1) && ($restaurant != 1) && ($library != 1)) {print '-'.'<br>';} else {print ' <br>';};
if ($shop == 1) {print $formShopLng.'<br>';};
if ($restaurant == 1) {print $formRestaurantLng.'<br>';};
if ($library == 1) {print $formLibraryLng.'<br>';};

print '<br>'.$formFurnishedLng.' ';
if ($furnished == 1) {print $formYes_1_Lng.'<br>';} else {print $formNo_1_Lng.'<br>';};

print '<br>'.$formAppliancesLng.' '; if (($stove != 1) && ($tv != 1) && ($fridge != 1) && ($w_machine != 1) && ($micro != 1) && ($vacum != 1)) {print '-'.'<br>';} else {print ' <br>';};
if ($stove == 1) {print $formStoveLng.'<br>';};
if ($tv== 1) {print $formTvLng.'<br>';};
if ($fridge == 1) {print $formFridgeLng.'<br>';};
if ($w_machine == 1) {print $form_W_MachineLng.'<br>';};
if ($micro == 1) {print $formMicroLng.'<br>';};
if ($vacum == 1) {print $formVacumLng.'<br>';};

print '<br>'.$formInternetLng.' ';
if ($internet == 1) {print $formYes_1_Lng.'<br>';} else {print $formNo_1_Lng.'<br>';};

print $formExtrasLng.' '.$extras.'<br>';
?></fieldset><?

?><fieldset class="text2">
			<legend class="text2"><?print $formCostsLng;?></legend><?
			
print $formPriceLng.' '.$price.' HUF<br>';
print $formAdd_CostLng.' '.$add_cost.' HUF<br>';
print $formDepositLng.' '.$deposit.' HUF<br>';
?></fieldset><?

?><fieldset class="text2">
			<legend class="text2"><?print $formContactLng;?></legend><?
print $formContactLng.'<br>';
print $formNameLng.' '.$name.'<br>';
print $formPhoneLng.' '.$phone_num.'<br>';
print $formEmailLng.' '.$email.'<br>';

print $formPublishLng.' '; if ($ispublic == 1) {print $formPublishLng.'<br>';};
?></fieldset><?

//print $formRegisterLng.' '.$submit.'<br>';
//print $formFooterLng.'<br>';












?>