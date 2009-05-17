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
        //echo $scripts_for_layout;
    ?>
</head>

<!--HTML Body-->
<body>



<div id="content">
<div id="banner_top"></div>
<div id="status">Start <?php echo $html->link('Rent-A-Jet','/')?></div>
<div id="logo"></div>
<div id="navigation">

<?php
    $list = array(
        '<span>Administration</span>',
        $html->link('Flugzeughersteller','/flugzeughersteller',array('update'=>'txtcontent','class'=>'nav1 showhelp')),
        $html->link('Flugzeugtypen','/flugzeugtypen',array('update'=>'txtcontent','class'=>'nav1 showhelp')),
        $html->link('Flugzeuge','/flugzeuge',array('class'=>'nav1 showhelp')),
        $html->link('Flugplätze','/flugplaetze',array('class'=>'nav1 showhelp')),
        $html->link('Entfernungen','/entfernungen',array('class'=>'nav1 showhelp')),
        $html->link('Mehrwertsteuersätze','/mehrwertsteuersaetze',array('class'=>'nav1 showhelp')),
        $html->link('Vorgangstypen','/vorgangstypen',array('class'=>'nav1 showhelp')),
        $html->link('Ajax screen','/ajaxtests/index',array('class'=>'nav1 showhelp', 'onclick'=>"einblenden('txtcontent')")),
        $ajax->link('Ajax index','/ajaxtests/index',array('class'=>'nav1 showhelp', 'onclick'=>"einblenden('txtcontent')", 'update'=>'txtcontent'))
    );
    echo $html->nestedList($list);
?>
<!--
    <ul>
        <li><span>Navigation</span></li>
        <li><a href="#" class="nav1 showhelp" title="Kundenangebot">Angebot erstellen</a></li>
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
<div id="maincontent" class="start">
    <div id="txtcontent" style="display:none">
        <?php echo $content_for_layout;?>
    </div>
</div>
<!--END txtcontent-->



<div id="footer">
            <TABLE WIDTH=100% BORDER=0 CELLPADDING=0 CELLSPACING=0>
                <COL WIDTH=128*>
                <TR VALIGN=TOP>
                    <TD WIDTH=100%><?php echo $html->link('Impressum','/pages/impressum')?></TD>
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

</script>


    <?php echo $cakeDebug; ?>
</body>
</html>