<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
<head>
    <title>Rent-A-Jet: <?php echo $title_for_layout; ?></title>
    <meta http-equiv="Content-Type"       content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language"   content="de" />
    <?php
        echo $javascript->link('jquery') . "\n";
        echo $javascript->link('ui.datepicker') . "\n";
        echo $javascript->link('ui.core') . "\n";
        echo $javascript->link('rentajet') . "\n";
        echo $javascript->link('jquery-ui-1.7.1.custom.min') . "\n";
        echo $html->meta('icon') . "\n";
        echo $html->css('styles') . "\n";
        echo $html->css('layout_building_forms') . "\n";
        echo $html->css('jquery-ui-1.7.1.custom') . "\n";
    ?>
</head>
<body>
<div id="content">
<div id="banner_top"></div>
<div id="status"><?php echo $title_for_layout?></div>
<div id="logo"></div>
<div id="navigation">
<?php
    $list = array(
        '<span>Workflows</span>',
        $html->link('Startseite','/',array('class'=>'nav1 showhelp','title'=>'Startseite')),
        $html->link('Angebote','/vorgaenge/indexAngebote',array('class'=>'nav1 showhelp','title'=>'Kundenangebot')),
        $html->link('Verträge','/vorgaenge/indexVertraege',array('class'=>'nav1 showhelp','title'=>'Vertraege')),
        $html->link('Rechnungen','/vorgaenge/indexRechnungen',array('class'=>'nav1 showhelp','title'=>'Rechnungen')),
        $html->link('Kundenadressen','/adressen',array('class'=>'nav1 showhelp','title'=>'Kundenadressen')),
        $html->link('Statistik/Mahnwesen','/reports/select',array('class'=>'nav1 showhelp','title'=>'Statistik')),
        $html->link('Impressum','/pages/impressum',array('class'=>'nav1 showhelp','title'=>'Impressum'))
    );
    echo $html->nestedList($list) . "\n";
    $list = array(
        '<span>Administration</span>',
        $html->link('Flugzeughersteller','/flugzeughersteller',array('update'=>'txtcontent','class'=>'nav1 showhelp','title' =>'Flugzeughersteller')),
        $html->link('Flugzeugtypen','/flugzeugtypen',array('update'=>'txtcontent','class'=>'nav1 showhelp','title' =>'Flugzeugtypen')),
        $html->link('Flugzeuge','/flugzeuge',array('class'=>'nav1 showhelp','title' =>'Flugzeuge')),
        $html->link('Flugplätze','/flugplaetze',array('class'=>'nav1 showhelp','title' =>'Flugplätze')),
        $html->link('Mehrwertsteuersätze','/mehrwertsteuersaetze',array('class'=>'nav1 showhelp','title' =>'Mehrwertsteuersätze')),
        $html->link('Vorgangstypen','/vorgangstypen',array('class'=>'nav1 showhelp','title' =>'Vorgangstypen')),
        $html->link('Leistungstypen','/leistungstypen',array('class'=>'nav1 showhelp','title'=>'Leistungstypen')),
        $html->link('Zufriedenheitstypen','/zufriedenheitstypen',array('class'=>'nav1 showhelp','title'=>'Zufriedenheitstypen')),
        $html->link('Statistikformate','/reports',array('class'=>'nav1 showhelp','title'=>'Statistikformate')),
    );
    echo $html->nestedList($list) . "\n";
?>
</div>

<!--BEGIN debug content-->

<?php
if (strlen($content_for_layout)>0 || strlen($cakeDebug)>0 ) {
	
	if ($title_for_layout == 'Angebot erstellen') {
	
	echo '<div id="txtcontent" class="angebot">' . "\n"; 
	echo $cakeDebug . "\n";
	echo $content_for_layout . "\n";
	echo "</div>\n";
	echo "<div id=\"txtcontent2\" class=\"normal\"><div id=\"txtcontent2_wrapper\"><div id=\"fluginfos\"></div><div id=\"flugkosten\"></div></div></div>\n";
	} else {
	echo '<div id="txtcontent" class="normal">' . "\n"; 
	echo $cakeDebug . "\n";
	echo $content_for_layout . "\n";
	echo "</div>\n";
	}
	
} else {
	echo '<div id="txtcontent" class="start">' . "\n"; 
	echo '</div>' . "\n";
}
?>

<!--END txtcontent-->

<div id="footer">
<div id="loader_dist" class="loader">Berechne Entfernungen</div>
<div id="loader_adresse" class="loader">Lade Adresse</div>
<div id="loader_costs" class="loader">Berechne Kosten</div>
</div>


<div id="help_Kundenadressen" class="help"><span>Über diesen Menupunkt können Adressen verwaltet (suchen, löschen, anlegen) werden</span></div>
<div id="help_Impressum" class="help"><span>Anzeigen eines Impressums.</span></div>
<div id="help_Flugzeughersteller" class="help"><span>Flugzeughersteller anlegen, bearbeiten und löschen.</span></div>
<div id="help_Flugzeugtypen" class="help"><span>Flugzeugtypen anlegen, bearbeiten und löschen.</span></div>
<div id="help_Flugzeuge" class="help"><span>Flugzeuge anlegen, bearbeiten und löschen.</span></div>
<div id="help_Flugplätze" class="help"><span>Flugplätze anlegen, bearbeiten und löschen.</span></div>
<div id="help_Mehrwertsteuersätze" class="help"><span>Mehrwertsteuersätze anlegen, bearbeiten und löschen.</span></div>
<div id="help_Vorgangstypen" class="help"><span>Vorgangstypen anlegen, bearbeiten und löschen.</span></div>
<div id="help_Startseite" class="help"><span>Anzeigen der Startseite.</span></div>
<div id="help_Kundenangebot" class="help"><span>Erstellen Sie ein neues Kundenangebot.</span></div>
<div id="help_Vertrag" class="help"><span>Vertrag drucken und verschicken.</span></div>
<div id="help_Rechnung" class="help"><span>Rechnung drucken und verschicken.</span></div>
<div id="help_Kundenangebot" class="help"><span>Erstellen Sie ein neues Kundenangebot.</span></div>
<div id="help_Vertraege" class="help"><span>Erstellen und Verwalten Sie Verträge.</span></div>
<div id="help_Rechnungen" class="help"><span>Erstellen und Verwalten Sie Rechnungen.</span></div>
<div id="help_Statistik" class="help"><span>Erstellen Sie Statistiken (z.B. Listen für Mahnungen)...</span></div>
<div id="help_Statistikformate" class="help"><span>Erstellen Sie neue Formate für Statistiken</span></div>
<div id="help_delzwischenstop" class="help"><span>Zwischenstop entfernen</span></div>
<div id="help_Leistungstypen" class="help"><span>Leistungstypen verwalten (ändern, löschen, neu anlegen)</span></div>
<div id="help_Zufriedenheitstypen" class="help"><span>Zufriedenheitstypen verwalten (ändern, löschen, neu anlegen)</span></div>
<div id="help_selectflugzeugtyp" class="help"><span>Der Flugzeugtyp ist auf Grund der neuen Einstellungen nicht mehr verfügbar. Bitte neu wählen.</span></div>
<div id="help_maxpersonen" class="help"><span>Die maximale Personenanzahl des Flugzeugs ist bereits erreicht.</span></div>
<div id="help_minattendands" class="help"><span>Die für den Flugzeugtyp benötigtet Attendandszahl kann nicht unterschritten werden oder kleine 0 sein.</span></div>
</div>
</body>
</html>