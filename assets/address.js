$(document).on('ready pjax:success',function() {
	$('#address_map').googleMapsForm({
		streetInput: '#address-address-street',
		zipInput: '#address-address-zipcode',
		cityInput: '#address-address-city',
		countryInput: '#address-address-country',
		latInput: '#address-address-latitude',
		lngInput: '#address-address-longitude',
		latLngLookupButton: '#address-address-getcoords'
	});
});