<?php
    echo $form->create('Entfernung', array('action' => 'index', 'class'=>'yform columnar'));
    echo $form->input('start_id', array('div'=>'type-select', 'options' => $Flugplaetze));
    echo $form->input('ziel_id', array('div'=>'type-select', 'options' => $Flugplaetze));
    echo $form->input('Entfernung.Entfernung', array('type'=>'text','value'=>$Entfernung,'div'=>'type-text','disabled'=>'disabled'));
    
    echo $form->end(array('label'=>'Berechnen','div'=>'type-button'));
?>

