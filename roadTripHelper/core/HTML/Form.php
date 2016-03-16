<?php

namespace  Core\HTML;

class Form{
	
	
	protected $data;
	public $surround = '<p>';
	
	public function __construct($data = array()){
		$this->data = $data;
	}
	
	protected function surround($html){
		
		return "<{$this->surround}>{$html}</{$this->surround}>";
	}
	
	protected function getValue($index){
		
		//Si je passe directement l'objet formulaire 
		if(is_object($this->data)){
			
			return $this->data->$index;
			
		}
		
		return isset($this->data[$index]) ? $this->data[$index] : null;
	}
	
	
	/*
	 * @param $name string
	 * @param $label string
	 * @param array $option
	 * @return string
	 */
	
	
	public function input($name, $label, $option = []){
		
		$type = isset($option['type']) ? $option['type'] : $type = 'text';
		
		return $this->surround(
				'<input type = "'. $type .'" name = "'.name.'" Value = "' . $this->getValue($name) . '">'
				);
		
	}
	
	public function submit($msg){
	
		return $this->surround('<button type="submit">'.$msg.'/button>');
	
	}
}