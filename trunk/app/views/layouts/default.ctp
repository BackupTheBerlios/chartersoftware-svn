<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">

<head>
    <title>Rent-A-Jet: <?php echo $title_for_layout; ?></title>
    <meta http-equiv="Content-Type"       content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language"   content="de" />
    <?php
        echo $javascript->link('jquery') . "\n";
        //echo $javascript->link('prototype') . "\n";
        //echo $javascript->link('scriptaculous') . "\n";
        echo $javascript->link('ui.datepicker') . "\n";
        echo $javascript->link('ui.core') . "\n";
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
<div id="status">Startseite</div>
<div id="logo"></div>
<div id="navigation">
<?php
    $list = array(
        '<span>Workflows</span>',
        $html->link('Startseite','/',array('class'=>'nav1 showhelp','title'=>'Startseite')),
        $html->link('Angebote','/angebote',array('class'=>'nav1 showhelp','title'=>'Kundenangebot')),
        $html->link('Kundenadressen','/adressen',array('class'=>'nav1 showhelp','title'=>'Kundenadressen')),
        $html->link('Impressum','/pages/impressum',array('class'=>'nav1 showhelp','title'=>'Impressum'))
    );
    echo $html->nestedList($list) . "\n";
    $list = array(
        '<span>Administration</span>',
        $html->link('Flugzeughersteller','/flugzeughersteller',array('update'=>'txtcontent','class'=>'nav1 showhelp')),
        $html->link('Flugzeugtypen','/flugzeugtypen',array('update'=>'txtcontent','class'=>'nav1 showhelp')),
        $html->link('Flugzeuge','/flugzeuge',array('class'=>'nav1 showhelp')),
        $html->link('Flugplätze','/flugplaetze',array('class'=>'nav1 showhelp')),
        $html->link('Entfernungen','/entfernungen',array('class'=>'nav1 showhelp')),
        $html->link('Mehrwertsteuersätze','/mehrwertsteuersaetze',array('class'=>'nav1 showhelp')),
        $html->link('Vorgangstypen','/vorgangstypen',array('class'=>'nav1 showhelp')),
    );
    echo $html->nestedList($list) . "\n";
?>
<!--
    <ul>
        <li><span>Navigation</span></li>
        <li><a href="#" class="nav1 showhelp" title="Vertrag">Vertrag Drucken</a></li>
        <li><a href="#" class="nav1 showhelp" title="Rechnung">Rechnung Drucken</a></li>
        <li><a href="#" class="nav1 showhelp">Zahlung eingegangen</a></li>
        <li><a href="#" class="nav1 showhelp">Zahlung verfolgen</a></li>
        <li><a href="#" class="nav1 showhelp">Kundenzufriedenheit</a></li>
        <li><a href="#" class="nav1 showhelp">Gründe für Ablehnung</a></li>
        <li><a href="#" class="nav1 showhelp">Analyse Drucken</a></li>
        <li><a href="#" class="nav2 showhelp">Kundenverwaltung</a></li>
        <li><a href="#" class="nav2 showhelp">Administration</a></li>
    </ul>
    -->
</div>

<!--BEGIN debug content-->

<?php
if (strlen($content_for_layout)>0 || strlen($cakeDebug)>0 ) {
	echo '<div id="txtcontent" class="normal">' . "\n"; 
	echo $cakeDebug . "\n";
	echo $content_for_layout . "\n";
	echo <<< HTMLTEXT
</div>
	<div id="txtcontent2" class="normal">
<div id="txtcontent2_wrapper">
<h2>Flugdaten</h2>

<div id="us_content">
<div class="type-text">
	<label for="us_abflug">Von</label>
	<input type="text" name="us_abflug" size="20" />
</div>
<div class="type-text">
	<label for="us_ankunft">Nach</label>
	<input type="text" name="us_ankunft" size="20" />
</div>
<div class="type-text">
	<label for="us_ankunft">Distanz</label>
	<input type="text" name="us_distanz" size="20" />
</div>
<input type="button" value="löschen" id="us_del_1" name="us_del_1" />
<hr class="hr2">
<div class="type-text">
	<label for="us_distancesum">Distanz Gesamt</label>
	<input type="text" name="us_distancesum" size="20" />
</div>
</div>
</div>
</div>
HTMLTEXT;
	
} else {
	echo '<div id="txtcontent" class="start">' . "\n"; 
	echo '</div>' . "\n";
}
?>

<!--END txtcontent-->

<div id="footer">
</div>


<div id="help_Kundenadressen" class="help"><span>Über diesen Menupunkt können Adressen verwaltet (suchen, löschen, anlegen) werden</span></div>
<div id="help_Impressum" class="help"><span>Anzeigen eines Impressums.</span></div>
<div id="help_Startseite" class="help"><span>Anzeigen der Startseite.</span></div>
<div id="help_Kundenangebot" class="help"><span>Erstellen Sie ein neues Kundenangebot.</span></div>
<div id="help_Vertrag" class="help"><span>Vertrag drucken und verschicken.</span></div>
<div id="help_Rechnung" class="help"><span>Rechnung drucken und verschicken.</span></div>
<div id="help_Kundenangebot" class="help"><span>Erstellen Sie ein neues Kundenangebot.</span></div>
</div>

<script language="javascript" type="text/javascript">



$("*.showhelp").mouseenter(function(){   	
	var title = $(this).attr("title");
	$("#help_"+title).fadeIn("fast");
}); 

$("*.showhelp").mouseleave(function(){   
    var title = $(this).attr("title");
	$("#help_"+title).fadeOut("fast");
}); 
</script>


</body>
</html>