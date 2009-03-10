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
    echo $html->tag('table'); 
    echo $html->tableHeaders(array('Id', 'Bild', 'Name', 'Kosten Jahr','Kosten Stunde','Crew','Kabine'));

    foreach ($flugzeughersteller['Flugzeugtyp'] as $zeile):
            echo $html->tableCells( array(
                $zeile['id'],
                $html->image($zeile['bild'],array('width'=>'90' )),
                $html->link($zeile['name'], "/flugzeugtypen/view/".$zeile['id']),
                number_format($zeile['jahreskosten'] / 100,2 , ",", "."),
                number_format($zeile['stundenkosten'] / 100,2 , ",", "."),
                $zeile['crewPersonal'],
                $zeile['cabinPersonal']
            ));
    endforeach;
    echo $html->tag('/table'); 
?>
