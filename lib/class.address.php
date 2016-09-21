<?php
	class address {
		public static function getTelephone() {
			return rex_addon::get('address')->getConfig('telephone');
		}
		
		public static function getFax() {
			return rex_addon::get('address')->getConfig('fax');
		}
		
		public static function getEmail() {
			return rex_addon::get('address')->getConfig('email');
		}
		
		public static function getInfo() {
			return rex_addon::get('address')->getConfig('info');
		}
		
		public static function getStreet() {
			return rex_addon::get('address')->getConfig('street');
		}
		
		public static function getZipcode() {
			return rex_addon::get('address')->getConfig('zipcode');
		}
		
		public static function getCity() {
			return rex_addon::get('address')->getConfig('city');
		}
		
		public static function getCountry() {
			return rex_addon::get('address')->getConfig('country');
		}
		
		public static function getLatitude() {
			return rex_addon::get('address')->getConfig('latitude');
		}
		
		public static function getLongitude() {
			return rex_addon::get('address')->getConfig('longitude');
		}
	}
?>