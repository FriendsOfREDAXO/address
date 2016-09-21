<?php
	$content = '';
	
	if (rex_post('address-address-submit', 'boolean')) {
		$this->setConfig(rex_post('address', [
			['street', 'string'],
			['zipcode', 'string'],
			['city', 'string'],
			['country', 'string'],
			['latitude', 'string'],
			['longitude', 'string'],
		]));
		
		$content .= rex_view::info($this->i18n('saved'));
	}

	$content .= '<div class="rex-form">';
	$content .= '  <form action="'.rex_url::currentBackendPage().'" method="post">';
	$content .= '    <fieldset>';
	
	$formElements = [];
	
	//Start - street
		$n = [];
		$n['label'] = '<label for="address-address-street">'.$this->i18n('address_street').'</label>';
		$n['field'] = '<input type="text" id="address-address-street" name="address[street]" value="'.$this->getConfig('street').'"/>';
		$formElements[] = $n;
	//End - street
	
	//Start - zipcode
		$n = [];
		$n['label'] = '<label for="address-address-zipcode">'.$this->i18n('address_zipcode').'</label>';
		$n['field'] = '<input type="text" id="address-address-zipcode" name="address[zipcode]" value="'.$this->getConfig('zipcode').'"/>';
		$formElements[] = $n;
	//End - zipcode
	
	//Start - city
		$n = [];
		$n['label'] = '<label for="address-address-city">'.$this->i18n('address_city').'</label>';
		$n['field'] = '<input type="text" id="address-address-city" name="address[city]" value="'.$this->getConfig('city').'"/>';
		$formElements[] = $n;
	//End - city
	
	//Start - country
		$n = [];
		$n['label'] = '<label for="address-address-country">'.$this->i18n('address_country').'</label>';
		$n['field'] = '<input type="text" id="address-address-country" name="address[country]" value="'.$this->getConfig('country').'"/>';
		$formElements[] = $n;
	//End - country
	
	//Start - latitude
		$n = [];
		$n['label'] = '<label for="address-address-latitude">'.$this->i18n('address_latitude').'</label>';
		$n['field'] = '<input type="text" id="address-address-latitude" name="address[latitude]" value="'.$this->getConfig('latitude').'" readonly/>';
		$formElements[] = $n;
	//End - latitude
	
	//Start - longitude
		$n = [];
		$n['label'] = '<label for="address-address-longitude">'.$this->i18n('address_longitude').'</label>';
		$n['field'] = '<input type="text" id="address-address-longitude" name="address[longitude]" value="'.$this->getConfig('longitude').'" readonly/>';
		$formElements[] = $n;
	//End - longitude
	
	//Start - coords
		$n = [];
		$n['field'] = '<input type="button" id="address-address-getcoords" value="'.$this->i18n('address_action_getcoords').'"/>';
		$formElements[] = $n;
	//End - coords
	
	$fragment = new rex_fragment();
	$fragment->setVar('elements', $formElements, false);
	$content .= $fragment->parse('core/form/form.php');
	
	$content .= '    </fieldset>';
	
	$content .= '    <fieldset>';
	$content .= '      <div id="address_map" class="form-group"></div>';
	$content .= '    </fieldset>';
	
	$content .= '    <fieldset class="rex-form-action">';
	
	$formElements = [];
	
	$n = [];
	$n['field'] = '<input type="submit" name="address-address-submit" value="'.$this->i18n('action_save').'" '.rex::getAccesskey($this->i18n('action_save'), 'save').' />';
	$formElements[] = $n;
	
	$fragment = new rex_fragment();
	$fragment->setVar('elements', $formElements, false);
	$content .= $fragment->parse('core/form/submit.php');
	
	$content .= '    </fieldset>';
	$content .= '  </form>';
	$content .= '</div>';
	
	$fragment = new rex_fragment();
	$fragment->setVar('class', 'edit');
	$fragment->setVar('title', $this->i18n('address'));
	$fragment->setVar('body', $content, false);
	echo $fragment->parse('core/page/section.php');
?>