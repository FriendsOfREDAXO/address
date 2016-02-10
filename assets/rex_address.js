$(document).on('ready pjax:success',function() {
	$('#rex_address_map').googleMapsForm({
		streetInput: '#rex_address-config-street',
		zipInput: '#rex_address-config-zipcode',
		cityInput: '#rex_address-config-city',
		countryInput: '#rex_address-config-country',
		latInput: '#rex_address-config-latitude',
		lngInput: '#rex_address-config-longitude',
		latLngLookupButton: '#rex_address-config-getcoords'
	});
});