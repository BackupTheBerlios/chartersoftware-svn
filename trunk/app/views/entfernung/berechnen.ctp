<?php
    echo $form->create('Entfernung', array('action' => 'berechnen', 'class'=>'yform columnar'));
    echo $form->input('start_id', array('div'=>'type-select', 'options' => $Flugplaetze));
    echo $form->input('ziel_id', array('div'=>'type-select', 'options' => $Flugplaetze));
    echo $form->input('Entfernung.distance', array('type'=>'text','value'=>$this->data->Entfernung,'div'=>'type-text','disabled'=>'disabled'));
    echo $form->end(array('label'=>'Berechnen','div'=>'type-button'));
?>

