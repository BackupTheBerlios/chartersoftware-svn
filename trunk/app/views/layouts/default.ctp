<!--XML Header-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">

<!--HTML Header-->
<head>
    <title>Rent-A-Jet: <?php echo $title_for_layout; ?></title>
    <meta http-equiv="Content-Type"       content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language"   content="de" />
    <?php
        echo $javascript->link('prototype');
        echo $javascript->link('scriptaculous.js?load=effects');
        echo $html->meta('icon');
        echo $html->css('cake.generic');
        echo $scripts_for_layout;
    ?>
</head>

<!--HTML Body-->
<body>
    <div id="container">

        <!--Kopfzeile-->
        <div id="header">
            <h1><?php echo $html->link('Rent-A-Jet','/')?></h1>
        </div>


        <!--Content-->
        <div id="content">
            <?php $session->flash(); ?>
            <?php echo $content_for_layout; ?>
        </div>

        <!--Fussleiste-->
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
    </div>
    <?php echo $cakeDebug; ?>
</body>
</html>