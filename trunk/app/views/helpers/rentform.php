<?php

/**
 * For more information: http://msdn.microsoft.com/en-us/library/aa140066.aspx
 * 
 */

class RentformHelper extends Helper {
	public $helpers = array('Form','Html');
	

	public function create($name, $action=null){
		if ($action == null) $action='';
		return $this->Form->create($name, array('action' => $action, 'class'=>'yform columnar'));
	}

	public function begFieldset($legend){
		return "<fieldset><legend>$legend</legend>\n";
	}	


	public function label($fieldname=null, $text=null, $attributes=null){
		return $this->Form->label($fieldname, $text, $attributes);
	}	


	public function endFieldset(){
		return "</fieldset>\n";
	}	

	public function hidden($name, $value=null){
		if ($value == null)
			return $this->Form->input($name,array('type' => 'hidden'));
		else
			return $this->Form->input($name,array('type' => 'hidden', 'value'=>$value));
	}

	public function button($name, $option){
		$result = 
			'<div class="type-button">' . "\n" . 
			$this->Form->button($name, $option)  . "\n" .
			'</div>' . "\n"; 
		return $result;
	}
	
	public function buttonadddel($name, $option, $name2, $option2){
		$result = 
			'<div class="type-button">' . "\n" . 
			$this->Form->button($name, $option)  . "\n" .
			$this->Form->button($name2, $option2)  . "\n" .
			'</div>' . "\n"; 
		return $result;
	}
	
	public function disabledTextInput($name, $label=null){
		if ($label == null)
			return $this->Form->input($name, array('type'=>'text','div'=>'type-text','disabled'=>'disabled', 'class'=>'readonly'));
		else
			return $this->Form->input($name, array('type'=>'text','div'=>'type-text','disabled'=>'disabled', 'class'=>'readonly', 'label'=>$label));
	}
	
	public function textInput($name, $label=null){
		if ($label == null)
			return $this->Form->input($name, array('type'=>'text','div'=>'type-text', 'error'=>array('required'=>'Bitte Eingabefeld ausfüllen','length'=>"Der eingegebene Text ist zu lang")));
		else
			return $this->Form->input($name, array('label'=>$label, 'type'=>'text','div'=>'type-text', 'error'=>array('required'=>'Bitte Eingabefeld ausfüllen','length'=>"Der eingegebene Text ist zu lang")));
	}
	
	public function end($name){
		return $this->Form->end(array('label'=>$name,'div'=>'type-button'));
	}
	
	
	public function select($name, $source, $label=null){
		if ($label == null)
			return $this->Form->input($name, array('div'=>'type-select', 'options' => $source, 'empty' =>'Bitte wählen'));
		else
			return $this->Form->input($name, array('div'=>'type-select', 'options' => $source, 'label'=>$label, 'empty' => 'Bitte wählen'));
	}
	
}
?>