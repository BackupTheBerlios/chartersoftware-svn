<h2>Zeitzone</h2>

<h3>Informationen</h3>

<dl>
<dt>ID</dt>  <dd><?php echo $zeitzone['Zeitzone']['id']?></dd>
<dt>Name</dt><dd><?php echo $zeitzone['Zeitzone']['name']?></dd>
<dt>Differenz zur UTC</dt><dd><?php echo $zeitzone['Zeitzone']['differenzUtc']?></dd>
</dl>



<h3>Flugplätze in Zeitzone</h3>
<?php
    $model = new Flugplatz();
    echo $html->tag('table'); 
    echo $html->tableHeaders(array('Id', 'Kürzel', 'Name', 'Position'));

    foreach ($model->find('all') as $zeile):
        echo $html->tableCells( array(
            $zeile['Flugplatz']['id'],
            $html->link($zeile['Flugplatz']['iata'], "/flugplaetze/view/".$zeile['Flugplatz']['id']),
            $html->link($zeile['Flugplatz']['name'], "/flugplaetze/view/".$zeile['Flugplatz']['id']),
            $zeile['Flugplatz']['geoPosition'],
        ));
    endforeach;
    echo $html->tag('/table'); 
?>