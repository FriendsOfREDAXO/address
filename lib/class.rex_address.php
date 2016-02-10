<?php
	class rex_address {
		public static function getStreet() {
			return rex_addon::get('rex_address')->getConfig('street');
		}
		
		public static function getZipcode() {
			return rex_addon::get('rex_address')->getConfig('zipcode');
		}
		
		public static function getCity() {
			return rex_addon::get('rex_address')->getConfig('city');
		}
		
		public static function getCountry() {
			return rex_addon::get('rex_address')->getConfig('country');
		}
		
		public static function getLatitude() {
			return rex_addon::get('rex_address')->getConfig('latitude');
		}
		
		public static function getLongitude() {
			return rex_addon::get('rex_address')->getConfig('longitude');
		}
	}
?>