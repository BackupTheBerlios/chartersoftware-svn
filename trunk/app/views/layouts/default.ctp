<!--XML Header-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">

<head>
    <title>Rent-A-Jet: <?php echo $title_for_layout; ?></title>
    <meta http-equiv="Content-Type"       content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language"   content="de" />
    <?php
        echo $javascript->link('jquery');
        //echo $javascript->link('prototype');
        //echo $javascript->link('scriptaculous');
        echo $javascript->link('ui.datepicker');
        echo $javascript->link('ui.core');
        echo $javascript->link('jquery-ui-1.7.1.custom.min');
        echo $html->meta('icon');
        echo $html->css('styles');
        echo $html->css('layout_building_forms');
        echo $html->css('jquery-ui-1.7.1.custom');
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
        $html->link('Angebote erstellen','/pages/angebote',array('class'=>'nav1 showhelp','title'=>'Kundenangebot')),
        $html->link('Kundenadressen verwalten','/adressen',array('class'=>'nav1 showhelp','title'=>'Kundenadressen')),
        $html->link('Impressum','/pages/impressum',array('class'=>'nav1 showhelp','title'=>'Impressum'))
    );
    echo $html->nestedList($list);
    $list = array(
        '<span>Administration</span>',
        $html->link('Flugzeughersteller','/flugzeughersteller',array('update'=>'txtcontent','class'=>'nav1 showhelp')),
        $html->link('Flugzeugtypen','/flugzeugtypen',array('update'=>'txtcontent','class'=>'nav1 showhelp')),
        $html->link('Flugzeuge','/flugzeuge',array('class'=>'nav1 showhelp')),
        $html->link('Flugplätze','/flugplaetze',array('class'=>'nav1 showhelp')),
        $html->link('Entfernungen','/entfernungen',array('class'=>'nav1 showhelp')),
        $html->link('Mehrwertsteuersätze','/mehrwertsteuersaetze',array('class'=>'nav1 showhelp')),
        $html->link('Vorgangstypen','/vorgangstypen',array('class'=>'nav1 showhelp')),
        //$html->link('Ajax screen','/ajaxtests/index',array('class'=>'nav1 showhelp', 'onclick'=>"einblenden('txtcontent')")),
        //$ajax->link('Ajax index','/ajaxtests/index',array('class'=>'nav1 showhelp', 'onclick'=>"einblenden('txtcontent')", 'update'=>'txtcontent'))
    );
    echo $html->nestedList($list);
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

<!--BEGIN txtcontent-->
<?php echo $content_for_layout;?>
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


function einblenden(elementname)
{
 document.getElementById(elementname).style.display='block';
}

function ausblenden(elementname)
{
 document.getElementById('element').style.display='none';
}

function toggleMe(a){
  var e=document.getElementById(a);
  if(!e)return true;
  if(e.style.display=="none"){
    einblenden();
  } else {
    einblenden();
  }
  return true;
}

	$(function() {
		$("#datepicker").datepicker({ dateFormat: 'dd.mm.yy', dayNamesMin: ['So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa'], dayNames: ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'], monthNames: ['Januar','Februar','M�rz','April','Mai','Juni','Juli','August','September','Oktober','November','Dezember']});
	});
	
	$(function() {
		$("#datepicker2").datepicker({ dateFormat: 'dd.mm.yy', dayNamesMin: ['So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa'], dayNames: ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'], monthNames: ['Januar','Februar','M�rz','April','Mai','Juni','Juli','August','September','Oktober','November','Dezember']});
	});
	
	$(document).ready(function () {
		
		$("#customer").change(function () {
			var query= "controller=ajax_customerinfo&id="+$("#customer").val();
			$.ajax({
				type: "POST",
				url: "data/index.php",
				data: "controller=ajax_customerinfo&id="+$("#customer").val(),
				dataType: "xml",
				cache: false,
				success:function(xml){
					$(xml).find('contact').each(function(){  
						$("#name").val($(this).find('name').text())
						$("#vorname").val($(this).find('vorname').text())
						$("#anrede").val($(this).find('anrede').text())
						$("#firma").val($(this).find('firma').text())
					});
				}
        
			});	
		});
		
		$("#customer2").change(function () {
			$.ajax({
				type: "GET",
				url: "data/test.xml",
				dataType: "xml",
				cache: false,
				success:function(xml){
					$(xml).find('contact').each(function(){  
						$("#firma").val($(this).find('firma').text())
					});
				}
        
			});	
		});
		
		
	});
	


</script>


    <?php echo $cakeDebug; ?>
</body>
</html>