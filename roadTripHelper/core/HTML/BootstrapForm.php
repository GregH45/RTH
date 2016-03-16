<?php


namespace Core\HTML;

Class BootstrapForm extends Form{
	
	
	
	protected function surround($html){
	
		return "<div class =\"form-group\">{$html}</div>";
	}
	
	
	/*
	 * @param $name string
	 * @param $label string
	 * @param array $option
	 * @return string
	 */
	public function input($name, $label, $option = []){
		
		$type = isset($option['type']) ? $option['type'] : $type = 'text';
		
		$label = '<label>'. $label .'</label>';
		
		if($type === 'textarea'){
			
			$input = '<textarea name = "'. $name .'"  class = "form-control">' . $this->getValue($name) . '</textarea>';
			
		}else{
			
			$input = '<input type = "'. $type . '" name = "'. $name .'" Value = "' . $this->getValue($name) . '"class = "form-control">';
			
		}
				
		return $this->surround($label.$input);
	
	}
	

	public function select($name, $label,$options){
	
		$label = '<label>  '. $label .' </label>';
		
		$input = '<select classe = "form-control" name = "' . $name . '">';
		
		foreach( $options as $k => $v)
		{
			$attributes = '';
			
			if($k == $this->getValue($name))
			{
				$attributes = ' selected';
			}
			
			
			$input .= "<option value = '$k'$attributes>$v</option>";
		}
		
		$input .= '</select>';
		
		return $this->surround($label.$input);
	
	}
	
	
	public function submit($msg){
	
		return $this->surround('<button type="submit" class="btn btn-primary">'.$msg.'</button>');
	
	}
	

}
	
	
	
