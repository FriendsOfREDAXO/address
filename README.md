Redaxo 5 Addon - Adressverwaltung
=================================

Das Addon bindet die Möglichkeit eine Adresse inkl. Koordinaten (via Googlemaps) im Backend zu verwalten. Im Frontend kann man die gespeicherten Werte anschliessend über die nachfolgenden Methdoden auslesen und verwenden.

###Strasse

```
<?php
	echorex_address::getStreet();
?>
```

###PLZ

```
<?php
	echorex_address::getZipcode();
?>
```

###Ort

```
<?php
	echorex_address::getCity();
?>
```

###Land

```
<?php
	echorex_address::getCountry();
?>
```

###Breitengrad

```
<?php
	echorex_address::getLatitude();
?>
```

###Längengrad

```
<?php
	echorex_address::getLongitude();
?>
```