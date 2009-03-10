<h2>Flugzeugtyp</h2>

<!---------------------------------------------->
<h3>Informationen</h3>
<dl>
<dt>ID</dt>  <dd><?php echo $flugzeugtyp['Flugzeugtyp']['id']?></dd>
<dt>Name</dt><dd><?php echo $flugzeugtyp['Flugzeugtyp']['name']?></dd>
<dt>Hersteller</dt><dd><?php echo $flugzeugtyp['Flugzeughersteller']['name']?></dd>
<dt>Hersteller ID</dt><dd><?php echo $flugzeugtyp['Flugzeughersteller']['id']?></dd>
<dt>Reichweite</dt><dd><?php echo $flugzeugtyp['Flugzeugtyp']['reichweite']?></dd>
<dt>Geschwindigkeit</dt><dd><?php echo $flugzeugtyp['Flugzeugtyp']['vmax']?></dd>
<dt>Jährliche Kosten</dt><dd><?php echo number_format($flugzeugtyp['Flugzeugtyp']['jahreskosten'] / 100,2 , ",", ".");?></dd>
<dt>Stündliche Kosten</dt><dd><?php echo number_format($flugzeugtyp['Flugzeugtyp']['stundenkosten'] / 100,2 , ",", ".");?></dd>
<dt>Crew Personal</dt><dd><?php echo $flugzeugtyp['Flugzeugtyp']['crewPersonal']?></dd>
<dt>Kabinen Personal</dt><dd><?php echo $flugzeugtyp['Flugzeugtyp']['cabinPersonal']?></dd>
<dt>Link</dt><dd><a href="<?php echo $flugzeugtyp['Flugzeugtyp']['wikipedia']?>" target=_blank><?php echo $flugzeugtyp['Flugzeugtyp']['wikipedia']?></a></dd>
<dt>Bild</dt><dd><?php echo $html->image($flugzeugtyp['Flugzeugtyp']['bild'],array('width'=>'300' ))?></dd>
</dl>


<!---------------------------------------------->
<h3>Informationen zum Hersteller</h3>
<dl>
<dt>ID</dt>  <dd><?php echo $flugzeugtyp['Flugzeughersteller']['id']?></dd>
<dt>Name</dt><dd><?php echo $flugzeugtyp['Flugzeughersteller']['name']?></dd>
<dt>Link</dt><dd><a href="<?php echo $flugzeugtyp['Flugzeughersteller']['link']?>" target=_blank><?php echo $flugzeugtyp['Flugzeughersteller']['link']?></a></dd>
<dt>Informatioen</dt><dd><?php echo $flugzeugtyp['Flugzeughersteller']['information']?></dd>
</dl>


<!---------------------------------------------->
<h3>Bestand an Flugzeugen</h3>
<?php
    $model = new Flugzeug();
    $flugzeuge = $model->find('all');
    echo $html->tag('table'); 
    echo $html->tableHeaders(array('Id', 'Kennzeichen'));
    foreach ($flugzeuge as $zeile):
        if ($zeile['Flugzeugtyp']['id'] == $flugzeugtyp['Flugzeugtyp']['id']) {
            echo $html->tableCells( array(
                $zeile['Flugzeug']['id'],
                $html->link($zeile['Flugzeug']['kennzeichen'], "/flugzeuge/view/".$zeile['Flugzeug']['id'])
            ));
        } 
    endforeach; 
    echo $html->tag('/table');
?>