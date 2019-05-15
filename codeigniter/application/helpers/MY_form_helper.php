<?php
	function bs_form_input($data = '', $value = '', $extra = '')
	{
		$defaults = array(
			'type' => 'text',
			'name' => is_array($data) ? '' : $data,
			'value' => $value
		);

		return '<label>'.ucwords($defaults['name']).'</label><input '._parse_form_attributes($data, $defaults)._attributes_to_string($extra)." />\n";
	}
?>