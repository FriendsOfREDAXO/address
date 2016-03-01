<p><?=$this->i18n('rex_address_help_intro');?></p>

<p><b><?=$this->i18n('rex_address_config_street');?></b></p>
<?php
	$code = "";
	$code .= "<?php".PHP_EOL;
	$code .= "	echo rex_address::getStreet();".PHP_EOL;
	$code .= "?>".PHP_EOL;
?>
<pre><?=highlight_string($code,true);?></pre>

<p><b><?=$this->i18n('rex_address_config_zipcode');?></b></p>
<?php
	$code = "";
	$code .= "<?php".PHP_EOL;
	$code .= "	echo rex_address::getZipcode();".PHP_EOL;
	$code .= "?>".PHP_EOL;
?>
<pre><?=highlight_string($code,true);?></pre>

<p><b><?=$this->i18n('rex_address_config_city');?></b></p>
<?php
	$code = "";
	$code .= "<?php".PHP_EOL;
	$code .= "	echo rex_address::getCity();".PHP_EOL;
	$code .= "?>".PHP_EOL;
?>
<pre><?=highlight_string($code,true);?></pre>

<p><b><?=$this->i18n('rex_address_config_country');?></b></p>
<?php
	$code = "";
	$code .= "<?php".PHP_EOL;
	$code .= "	echo rex_address::getCountry();".PHP_EOL;
	$code .= "?>".PHP_EOL;
?>
<pre><?=highlight_string($code,true);?></pre>

<p><b><?=$this->i18n('rex_address_config_latitude');?></b></p>
<?php
	$code = "";
	$code .= "<?php".PHP_EOL;
	$code .= "	echo rex_address::getLatitude();".PHP_EOL;
	$code .= "?>".PHP_EOL;
?>
<pre><?=highlight_string($code,true);?></pre>

<p><b><?=$this->i18n('rex_address_config_longitude');?></b></p>
<?php
	$code = "";
	$code .= "<?php".PHP_EOL;
	$code .= "	echo rex_address::getLongitude();".PHP_EOL;
	$code .= "?>".PHP_EOL;
?>
<pre><?=highlight_string($code,true);?></pre>