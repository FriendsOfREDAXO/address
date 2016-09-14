$(document).on('ready pjax:success',function() {
	$('#rex_address_map').googleMapsForm({
		streetInput: '#rex_address-address-street',
		zipInput: '#rex_address-address-zipcode',
		cityInput: '#rex_address-address-city',
		countryInput: '#rex_address-address-country',
		latInput: '#rex_address-address-latitude',
		lngInput: '#rex_address-address-longitude',
		latLngLookupButton: '#rex_address-address-getcoords'
	});
});