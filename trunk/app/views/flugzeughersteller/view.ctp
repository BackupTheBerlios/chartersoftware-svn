<h2>Flugzeughersteller</h2>

<h3>Informationen</h3>

<dl>
<dt>ID</dt>  <dd><?php echo $flugzeughersteller['Flugzeughersteller']['id']?></dd>
<dt>Name</dt><dd><?php echo $flugzeughersteller['Flugzeughersteller']['name']?></dd>
<dt>Link</dt><dd><a href="<?php echo $flugzeughersteller['Flugzeughersteller']['link']?>" target=_blank><?php echo $flugzeughersteller['Flugzeughersteller']['link']?></a></dd>
<dt>Informatioen</dt><dd><?php echo $flugzeughersteller['Flugzeughersteller']['information']?></dd>
</dl>



<h3>Flugzeugtypen</h3>
<?php 
    $model = new Flugzeugtyp();
    $flugzeugtypen = $model->find('all');

    echo $html->link('Neuen Flugzeugtyp anlegen','/flugzeugtypen/add');
    echo $html->tag('table'); 
    echo $html->tableHeaders(array('Id', 'Bild', 'Name', 'Kosten Jahr','Kosten Stunde','Crew','Kabine','Ändern','Löschen'));

    foreach ($flugzeugtypen as $zeile):
        if ($zeile['Flugzeughersteller']['id'] == $flugzeughersteller['Flugzeughersteller']['id']) {
            echo $html->tableCells( array(
                $zeile['Flugzeugtyp']['id'],
                $html->image($zeile['Flugzeugtyp']['bild'],array('width'=>'90' )),
                $html->link($zeile['Flugzeugtyp']['name'], "/flugzeugtypen/view/".$zeile['Flugzeugtyp']['id']),
                number_format($zeile['Flugzeugtyp']['jahreskosten'] / 100,2 , ",", "."),
                number_format($zeile['Flugzeugtyp']['stundenkosten'] / 100,2 , ",", "."),
                $zeile['Flugzeugtyp']['crewPersonal'],
                $zeile['Flugzeugtyp']['cabinPersonal'],
                $html->link('Ändern', "/flugzeugtypen/edit/{$zeile['Flugzeugtyp']['id']}"),
                $html->link('Löschen', "/flugzeugtypen/delete/{$zeile['Flugzeugtyp']['id']}", null, 'Sind Sie sich sicher?' )
            ));
        } 
    
    endforeach;
    echo $html->tag('/table'); 
?>
