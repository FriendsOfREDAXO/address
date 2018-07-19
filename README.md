Redaxo 5 Addon - Adressverwaltung
=================================

Das Addon bietet die Möglichkeit eine Adresse inkl. Koordinaten (via Googlemaps) im Backend zu verwalten. Im Frontend kann man die gespeicherten Werte anschliessend über die nachfolgenden Methoden auslesen und verwenden.

### Telefon

```php
<?php
   echo address::getTelephone();
?>
```

### Fax

```php
<?php
   echo address::getFax();
?>
```

### Email

```php
<?php
   echo address::getEmail();
?>
```

### Info

```php
<?php
   echo address::getInfo();
?>
```

### Strasse

```php
<?php
   echo address::getStreet();
?>
```

### PLZ

```php
<?php
   echo address::getZipcode();
?>
```

### Ort

```php
<?php
   echo address::getCity();
?>
```

### Land

```php
<?php
   echo address::getCountry();
?>
```

### Breitengrad

```php
<?php
   echo address::getLatitude();
?>
```

### Längengrad

```php
<?php
   echo address::getLongitude();
?>
```
