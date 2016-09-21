<?php
	$content = '';
	
	if (rex_post('address-miscellaneous-submit', 'boolean')) {
		$this->setConfig(rex_post('miscellaneous', [
			['telephone', 'string'],
			['fax', 'string'],
			['email', 'string'],
			['info', 'string'],
		]));
		
		$content .= rex_view::info($this->i18n('saved'));
	}

	$content .= '<div class="rex-form">';
	$content .= '  <form action="'.rex_url::currentBackendPage().'" method="post">';
	$content .= '    <fieldset>';
	
	$formElements = [];
	
	//Start - telephone
		$n = [];
		$n['label'] = '<label for="address-miscellaneous-telephone">'.$this->i18n('miscellaneous_telephone').'</label>';
		$n['field'] = '<input type="text" id="address-miscellaneous-telephone" name="miscellaneous[telephone]" value="'.$this->getConfig('telephone').'"/>';
		$formElements[] = $n;
	//End - telephone
	
	//Start - fax
		$n = [];
		$n['label'] = '<label for="address-miscellaneous-fax">'.$this->i18n('miscellaneous_fax').'</label>';
		$n['field'] = '<input type="text" id="address-miscellaneous-fax" name="miscellaneous[fax]" value="'.$this->getConfig('fax').'"/>';
		$formElements[] = $n;
	//End - fax
	
	//Start - email
		$n = [];
		$n['label'] = '<label for="address-miscellaneous-email">'.$this->i18n('miscellaneous_email').'</label>';
		$n['field'] = '<input type="text" id="address-miscellaneous-email" name="miscellaneous[email]" value="'.$this->getConfig('email').'"/>';
		$formElements[] = $n;
	//End - email
	
	//Start - info
		$n = [];
		$n['label'] = '<label for="address-miscellaneous-info">'.$this->i18n('miscellaneous_info').'</label>';
		$n['field'] = '<textarea id="address-miscellaneous-info" name="miscellaneous[info]">'.$this->getConfig('info').'</textarea>';
		$formElements[] = $n;
	//End - info
	
	$fragment = new rex_fragment();
	$fragment->setVar('elements', $formElements, false);
	$content .= $fragment->parse('core/form/form.php');
	
	$content .= '    </fieldset>';
	
	$content .= '    <fieldset class="rex-form-action">';
	
	$formElements = [];
	
	$n = [];
	$n['field'] = '<input type="submit" name="address-miscellaneous-submit" value="'.$this->i18n('action_save').'" '.rex::getAccesskey($this->i18n('action_save'), 'save').' />';
	$formElements[] = $n;
	
	$fragment = new rex_fragment();
	$fragment->setVar('elements', $formElements, false);
	$content .= $fragment->parse('core/form/submit.php');
	
	$content .= '    </fieldset>';
	$content .= '  </form>';
	$content .= '</div>';
	
	$fragment = new rex_fragment();
	$fragment->setVar('class', 'edit');
	$fragment->setVar('title', $this->i18n('miscellaneous'));
	$fragment->setVar('body', $content, false);
	echo $fragment->parse('core/page/section.php');
?>