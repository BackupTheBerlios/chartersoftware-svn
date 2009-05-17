<?php
    echo $ajax->link('Neues Flugzeug anlegen','/flugzeuge/add',array('update'=>'divFlugzeuge'));

    echo $html->tag('table');
    echo $html->tableHeaders(array('Id', 'Kennzeichen', 'Typ', 'Ändern','Löschen'));

    var_dump($flugzeuge);
    foreach ($flugzeuge as $zeile):
        echo $html->tableCells( array(
            $zeile['Flugzeug']['id'],
            $html->link($zeile['Flugzeug']['kennzeichen'], "/flugzeuge/view/".$zeile['Flugzeug']['id']),
            $html->link($zeile['Flugzeugtyp']['name'], "/flugzeugtypen/view/".$zeile['Flugzeugtyp']['id']),
            $ajax->link('Ändern',
                        array( 'controller' => 'flugzeuge', 'action' => 'edit', $zeile['Flugzeug']['id'] ),
                        array( 'update' => 'divFlugzeuge' )),
            $ajax->link('Löschen',"/flugzeuge/delete/".$zeile['Flugzeug']['id'],array( 'update' => 'divFlugzeuge' ),'Sind Sie sicher?')
            ));
    endforeach;

    echo $html->tag('/table');
?>
