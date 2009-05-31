<?php
	echo $html->image($this->data['Flugzeugtyp']['bild'],array('width'=>'300' ));
	echo $html->link('Wikipedia', $this->data['Flugzeugtyp']['wikipedia']);
    echo $form->create('Flugzeugtyp', array('action' => 'index', 'url'=>'/flugzeugtypen', 'class'=>'yform columnar'));
    echo $form->input('Flugzeugtyp.id', array('div'=>'type-text','disabled'=>'disabled'));
    echo $form->input('Flugzeugtyp.name', array('div'=>'type-text','disabled'=>'disabled'));

    echo $form->input('Flugzeugtyp.reichweite', array('div'=>'type-text','disabled'=>'disabled'));
    echo $form->input('Flugzeugtyp.vmax', array('div'=>'type-text', 'disabled'=>'disabled'));
    echo $form->input('Flugzeugtyp.jahreskosten', array('div'=>'type-text','disabled'=>'disabled'));
    echo $form->input('Flugzeugtyp.stundenkosten', array('div'=>'type-text','disabled'=>'disabled'));
    echo $form->input('Flugzeugtyp.crewPersonal', array('div'=>'type-text','disabled'=>'disabled'));
    echo $form->input('Flugzeugtyp.cabinPersonal', array('div'=>'type-text','disabled'=>'disabled'));
    echo $form->input('Flugzeugtyp.seats', array('div'=>'type-text','disabled'=>'disabled'));
    echo $form->input('Flugzeugtyp.wikipedia', array('div'=>'type-text','disabled'=>'disabled'));
    echo $form->input('Flugzeugtyp.bild', array('div'=>'type-text','disabled'=>'disabled'));
    echo $form->end(array('label'=>'Schließen','div'=>'type-button'));
?>



<h3>Informationen zum Hersteller</h3>
<dl>
<dt>ID</dt>  <dd><?php echo $flugzeugtyp['Flugzeughersteller']['id']?></dd>
<dt>Name</dt><dd><?php echo $flugzeugtyp['Flugzeughersteller']['name']?></dd>
<dt>Link</dt><dd><a href="<?php echo $flugzeugtyp['Flugzeughersteller']['link']?>" target=_blank><?php echo $flugzeugtyp['Flugzeughersteller']['link']?></a></dd>
<dt>Informatioen</dt><dd><?php echo $flugzeugtyp['Flugzeughersteller']['information']?></dd>
</dl>


<h3>Bestand an Flugzeugen</h3>
<?php
/*
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
    */
?>
