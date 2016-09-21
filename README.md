Redaxo 5 Addon - Adressverwaltung
=================================

Das Addon bietet die Möglichkeit eine Adresse inkl. Koordinaten (via Googlemaps) im Backend zu verwalten. Im Frontend kann man die gespeicherten Werte anschliessend über die nachfolgenden Methoden auslesen und verwenden.

###Telefon

```
<?php
	echo address::getTelephone();
?>
```

###Fax

```
<?php
	echo address::getFax();
?>
```

###Email

```
<?php
	echo address::getEmail();
?>
```

###Info

```
<?php
	echo address::getInfo();
?>
```

###Strasse

```
<?php
	echo address::getStreet();
?>
```

###PLZ

```
<?php
	echo address::getZipcode();
?>
```

###Ort

```
<?php
	echo address::getCity();
?>
```

###Land

```
<?php
	echo address::getCountry();
?>
```

###Breitengrad

```
<?php
	echo address::getLatitude();
?>
```

###Längengrad

```
<?php
	echo address::getLongitude();
?>
```