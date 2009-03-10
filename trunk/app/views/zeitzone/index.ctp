<h2>Zeitzonen</h2>

<?php 
    echo $html->link('Neue Zeitzone anlegen','/zeitzonen/add');
    echo $html->tag('table'); 
    echo $html->tableHeaders(array('Id', 'Name', 'Diff UTC', 'Ändern','Löschen'));

    foreach ($zeitzonen as $zeile):
        echo $html->tableCells( array(
            $zeile['Zeitzone']['id'],
            $html->link($zeile['Zeitzone']['name'], "/zeitzonen/view/".$zeile['Zeitzone']['id']),
            $zeile['Zeitzone']['differenzUtc'],
            $html->link('Ändern', "/zeitzonen/edit/{$zeile['Zeitzone']['id']}"),
            $html->link('Löschen', "/zeitzonen/delete/{$zeile['Zeitzone']['id']}", null, 'Sind Sie sich sicher?' )
        ));
    endforeach; 

    echo $html->tag('/table'); 
?>