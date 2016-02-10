<?php
	$content = '';
	
	if (rex_post('rex_address-config-submit', 'boolean')) {
		echo '<pre>'.print_r($_POST,true).'</pre>';
		$this->setConfig(rex_post('config', [
			['street', 'string'],
			['zipcode', 'string'],
			['city', 'string'],
			['country', 'string'],
			['latitude', 'string'],
			['longitude', 'string'],
		]));
		
		$content .= rex_view::info($this->i18n('config_saved'));
	}

	$content .= '<div class="rex-form">';
	$content .= '  <form action="'.rex_url::currentBackendPage().'" method="post">';
	$content .= '    <fieldset>';
	
	$formElements = [];
	
	//Start - street
		$n = [];
		$n['label'] = '<label for="rex_address-config-street">'.$this->i18n('config_street').'</label>';
		$n['field'] = '<input type="text" id="rex_address-config-street" name="config[street]" value="'.$this->getConfig('street').'"/>';
		$formElements[] = $n;
	//End - street
	
	//Start - zipcode
		$n = [];
		$n['label'] = '<label for="rex_address-config-zipcode">'.$this->i18n('config_zipcode').'</label>';
		$n['field'] = '<input type="text" id="rex_address-config-zipcode" name="config[zipcode]" value="'.$this->getConfig('zipcode').'"/>';
		$formElements[] = $n;
	//End - zipcode
	
	//Start - city
		$n = [];
		$n['label'] = '<label for="rex_address-config-city">'.$this->i18n('config_city').'</label>';
		$n['field'] = '<input type="text" id="rex_address-config-city" name="config[city]" value="'.$this->getConfig('city').'"/>';
		$formElements[] = $n;
	//End - city
	
	//Start - country
		$n = [];
		$n['label'] = '<label for="rex_address-config-country">'.$this->i18n('config_country').'</label>';
		$n['field'] = '<input type="text" id="rex_address-config-country" name="config[country]" value="'.$this->getConfig('country').'"/>';
		$formElements[] = $n;
	//End - country
	
	//Start - latitude
		$n = [];
		$n['label'] = '<label for="rex_address-config-latitude">'.$this->i18n('config_latitude').'</label>';
		$n['field'] = '<input type="text" id="rex_address-config-latitude" name="config[latitude]" value="'.$this->getConfig('latitude').'" readonly/>';
		$formElements[] = $n;
	//End - latitude
	
	//Start - longitude
		$n = [];
		$n['label'] = '<label for="rex_address-config-longitude">'.$this->i18n('config_longitude').'</label>';
		$n['field'] = '<input type="text" id="rex_address-config-longitude" name="config[longitude]" value="'.$this->getConfig('longitude').'" readonly/>';
		$formElements[] = $n;
	//End - longitude
	
	//Start - coords
		$n = [];
		$n['field'] = '<input type="button" id="rex_address-config-getcoords" value="'.$this->i18n('config_action_getcoords').'"/>';
		$formElements[] = $n;
	//End - coords
	
	$fragment = new rex_fragment();
	$fragment->setVar('elements', $formElements, false);
	$content .= $fragment->parse('core/form/form.php');
	
	$content .= '    </fieldset>';
	
	$content .= '    <fieldset>';
	$content .= '      <div id="rex_address_map" class="form-group"></div>';
	$content .= '    </fieldset>';
	
	$content .= '    <fieldset class="rex-form-action">';
	
	$formElements = [];
	
	$n = [];
	$n['field'] = '<input type="submit" name="rex_address-config-submit" value="'.$this->i18n('config_action_save').'" '.rex::getAccesskey($this->i18n('config_action_save'), 'save').' />';
	$formElements[] = $n;
	
	$fragment = new rex_fragment();
	$fragment->setVar('elements', $formElements, false);
	$content .= $fragment->parse('core/form/submit.php');
	
	$content .= '    </fieldset>';
	$content .= '  </form>';
	$content .= '</div>';
	
	$fragment = new rex_fragment();
	$fragment->setVar('class', 'edit');
	$fragment->setVar('title', $this->i18n('config'));
	$fragment->setVar('body', $content, false);
	echo $fragment->parse('core/page/section.php');
?>