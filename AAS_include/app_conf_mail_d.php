<?php
include 'germail_data.php';
//német nyelvű visszajelzés a jelentkezésről: tárgy, szöveg
$gersub = "Rückmeldung zur Bewerbung an der Universität Szeged";
$germail = "Sehr geehrte(r) $gname $fname,\n\nDies ist eine Rückmeldung zu der folgenden Bewerbung an der Universität Szeged:

Herzlich Willkommen auf der Internetseite „Application and Admission System“ der Universität Szeged!

Ihr Benutzername ist $username

Bewerbung für das Programm/die Programme:
$medizin
$vorbjahr
$medicine
$prep

Nachname: $fname
Vorname: $gname
Geschlecht: $gender
Geburtsort: $pob_city, $pob_country
Geburtsdatum: $day-$month-$year
Staatbürgerschaft: $citizen
Staatbürgerschaft 2: $citizen2

Mother's maiden name:
Nachname: $mfname
Vorname: $mgname

Wohnadresse: $permadd
Postleitzahl: $add_pc
Stadt: $add_city, Land: $add_country
Tel.: $phone
Identifizierungsdokument: $proof_type, Nummer: $proof_num

Muttersprache: $firstlang

Abiturprüfung:
$hs_name, $hs_year
$hs_city, $hs_country

Im Notfall zu verständigen:
Nachname: $er_fname
Vorname: $er_gname
Angehörige: $er_relation
Tel: $er_phone
E-Mail: $er_email
Wohnadresse: $er_permadd
Postleitzahl: $er_add_pc
Stadt: $er_add_city
Land: $er_add_country

Studium nach der Abiturprüfung
(Es ist keine Vorraussetzung der Bewerbung):$studs

Woher haben Sie die Information, dass an unserer Universität die Möglichkeit eines deutschsprachigen Studiums besteht? $about

Bitte besuchen Sie unsere Seite später, um den Verlauf Ihrer Bewerbung verfolgen zu können.

___________________________________________________________________________

Vielen Dank für Ihr Interesse an einem Studium an der Universität Szeged.
 
Ihre Bewerbungsdaten wurden in unserem  Application ans Admission System  gespeichert. Um Ihre Bewerbung für das Studium der Humanmedizin in deutscher Sprache der Medizinischen Fakultät  der Universität Szeged zu vervollständigen, bitten wir Sie Ihre Bewerbungsunterlagen bis zu dem 31. Mai 2015 per Post an die folgende Adresse zu senden:
 
Sekretariat für ausländische Studenten
H-6720 Szeged
Dóm tér 12.
Ungarn
 

Für weitere Informationen zum Bewerbungsverfahren besuchen Sie bitte das folgende Link:

http://szegedmed.hu/de/bewerbung
 
Für weitere Fragen stehen wir Ihnen jederzeit gerne zur Verfügung! 
Studentensekretariat
Tel.: +36-62/546-865
german1.fs@med.u-szeged.hu (Szilvia Baunok)
german2.fs@med.u-szeged.hu (Erzsébet Gutáné Nagy)";





?>