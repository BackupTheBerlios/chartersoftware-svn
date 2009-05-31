<?php

/**
 * For more information: http://msdn.microsoft.com/en-us/library/aa140066.aspx
 * 
 */

class RentformHelper extends Helper {
	public $helpers = array('Form');
	

	public function create($name, $action=null){
		if ($action == null) $action='';
		return $this->Form->create($name, array('action' => $action, 'class'=>'yform columnar'));
	}

	public function hidden($name){
		return $this->Form->input($name,array('type' => 'hidden'));
	}
	
	public function disabledTextInput($name){
		return $this->Form->input($name, array('type'=>'text','div'=>'type-text','disabled'=>'disabled'));
	}
	
	public function textInput($name){
		return $this->Form->input($name, array('type'=>'text','div'=>'type-text', 'error'=>array('required'=>'Bitte Eingabefeld ausfüllen','length'=>"Der eingegebene Text ist zu lang")));
	}
	
	public function end($name){
		return $this->Form->end(array('label'=>$name,'div'=>'type-button'));
	}
	
	
	public function select($name, $source){
		return $this->Form->input($name, array('div'=>'type-select', 'options' => $source));
	}
	
}
?>