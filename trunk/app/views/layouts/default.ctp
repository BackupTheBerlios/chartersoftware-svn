<!--XML Header-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">

<!--HTML Header-->
<head>
	<title>Rent-A-Jet: <?php echo $title_for_layout; ?></title>
	<meta http-equiv="Content-Type"       content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language"   content="de" />
	<?php

        echo $javascript->link('jquery');
        echo $javascript->link('prototype');
        echo $javascript->link('scriptaculous');

		echo $html->meta('icon');
		echo $html->css('styles');
		echo $scripts_for_layout;
	?>
</head>

<!--HTML Body-->
<body>



<div id="content">
<div id="banner_top"></div>
<div id="status">Status: <?php echo $html->link('Rent-A-Jet','/')?></div>
<div id="logo"></div>
<div id="navigation">

    <ul>
        <li><span>Navigation</span></li>
        <li><a href="#" class="nav1 showhelp" title="Kundenangebot">Angebot erstellen</a></li>
        <li><a href="#" class="nav1 showhelp" title="Vertrag">Vertrag Drucken</a></li>
        <li><a href="#" class="nav1 showhelp" title="Rechnung">Rechnung Drucken</a></li>
        <li><a href="#" class="nav1 showhelp">Zahlung eingegangen</a></li>
        <li><a href="#" class="nav1 showhelp">Zahlung verfolgen</a></li>
        <li><a href="#" class="nav1 showhelp">Kundenzufriedenheit</a></li>
        <li><a href="#" class="nav1 showhelp">Gr&uuml;nde f&uuml;r Ablehnung</a></li>
        <li><a href="#" class="nav1 showhelp">Analyse Drucken</a></li>
        <li><a href="#" class="nav2 showhelp">Kundenverwaltung</a></li>
        <li><a href="#" class="nav2 showhelp">Administration</a></li>
        <li><a href="flugzeughersteller" class="nav2 showhelp">Flugzeughersteller</a></li>
    </ul>
</div>
<div id="txtcontent" class="start">
            <?php $session->flash(); ?>
            <?php echo $content_for_layout; ?>
</div>
<div id="footer">
            <TABLE WIDTH=100% BORDER=0 CELLPADDING=0 CELLSPACING=0>
                <COL WIDTH=128*>
                <COL WIDTH=128*>
                <TR VALIGN=TOP>
                    <TD WIDTH=50%><?php echo $html->link('Start','/')?></TD>
                    <TD WIDTH=50%><?php echo $html->link('Impressum','/pages/impressum')?></TD>
                </TR>
            </TABLE>
</div>


<div id="help_Kundenangebot" class="help"><span>Erstellen Sie ein neues Kundenangebot.</span></div>
<div id="help_Vertrag" class="help"><span>Vertrag drucken und verschicken.</span></div>
<div id="help_Rechnung" class="help"><span>Rechnung drucken und verschicken.</span></div>
<div id="help_Kundenangebot" class="help"><span>Erstellen Sie ein neues Kundenangebot.</span></div>
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
    <?php echo $cakeDebug; ?>
</body>
</html>