<p>Das Addon bindet die Möglichkeit eine Adresse inkl. Koordinaten (via Googlemaps) im Backend zu verwalten. Im Frontend kann man die gespeicherten Werte anschliessend über die nachfolgenden Methoden auslesen und verwenden.</p>

<p><b>Strasse</b></p>
<?php
	$code = "";
	$code .= "<?php".PHP_EOL;
	$code .= "	echo rex_address::getStreet();".PHP_EOL;
	$code .= "?>".PHP_EOL;
?>
<pre><?=highlight_string($code,true);?></pre>

<p><b>PLZ</b></p>
<?php
	$code = "";
	$code .= "<?php".PHP_EOL;
	$code .= "	echo rex_address::getZipcode();".PHP_EOL;
	$code .= "?>".PHP_EOL;
?>
<pre><?=highlight_string($code,true);?></pre>

<p><b>Ort</b></p>
<?php
	$code = "";
	$code .= "<?php".PHP_EOL;
	$code .= "	echo rex_address::getCity();".PHP_EOL;
	$code .= "?>".PHP_EOL;
?>
<pre><?=highlight_string($code,true);?></pre>

<p><b>Land</b></p>
<?php
	$code = "";
	$code .= "<?php".PHP_EOL;
	$code .= "	echo rex_address::getCountry();".PHP_EOL;
	$code .= "?>".PHP_EOL;
?>
<pre><?=highlight_string($code,true);?></pre>

<p><b>Breitengrad</b></p>
<?php
	$code = "";
	$code .= "<?php".PHP_EOL;
	$code .= "	echo rex_address::getLatitude();".PHP_EOL;
	$code .= "?>".PHP_EOL;
?>
<pre><?=highlight_string($code,true);?></pre>

<p><b>Längengrad</b></p>
<?php
	$code = "";
	$code .= "<?php".PHP_EOL;
	$code .= "	echo rex_address::getLongitude();".PHP_EOL;
	$code .= "?>".PHP_EOL;
?>
<pre><?=highlight_string($code,true);?></pre>