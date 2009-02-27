<h2>Flugzeugtyp</h2>
<?php echo $html->link('Neuen Flugzeugtyp anlegen','/flugzeugtyps/add')?>

    
    <?php
    echo $html->tag('table'); 
    echo $html->tableHeaders(array('Id', 'Bild', 'Name', 'Hersteller','Kosten Jahr','Kosten Stunde','Crew','Kabine','Ändern','Löschen'));

    foreach ($flugzeugtyps as $zeile):

    echo $html->tableCells( array(
        $zeile['Flugzeugtyp']['id'],
        $html->image($zeile['Flugzeugtyp']['bild'],array('width'=>'90' )),
        $html->link($zeile['Flugzeugtyp']['name'], "/flugzeugtyps/view/".$zeile['Flugzeugtyp']['id']),
        $html->link($zeile['Flugzeughersteller']['name'], "/flugzeugherstellers/view/".$zeile['Flugzeughersteller']['id']),
        number_format($zeile['Flugzeugtyp']['jahreskosten'] / 100,2 , ",", "."),
        number_format($zeile['Flugzeugtyp']['stundenkosten'] / 100,2 , ",", "."),
        $zeile['Flugzeugtyp']['crewPersonal'],
        $zeile['Flugzeugtyp']['cabinPersonal'],
        $html->link('Aendern', "/flugzeugtyps/edit/{$zeile['Flugzeugtyp']['id']}"),
        $html->link('Loeschen', "/flugzeugtyps/delete/{$zeile['Flugzeugtyp']['id']}", null, 'Sind Sie sich sicher?' )
    ));
	
    endforeach;
    echo $html->tag('/table'); 
    ?>
