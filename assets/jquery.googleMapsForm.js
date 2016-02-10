(function($) {
	$.fn.googleMapsForm = function(options) {
		return this.each(function() {
		
		var mapCanvas = this;
		
		function getAddress() {
			var street = $(options.streetInput).val();
			var zip = $(options.zipInput).val();
			var city = $(options.cityInput).val();
			var country = $(options.countryInput).val();
			if (street == undefined || zip == undefined || city == undefined || country == undefined) {
				return false;
			} else if (street == '' && zip == '' && city == '' || country == '') {
				return false
			} else {
				return {
					street: street,
					zip: zip,
					city: city,
					country: country
				}
			}
		}
		
		function updateAddress(values, overwrite) {
			if (overwrite || $(options.streetInput).val() == '') {
				$(options.streetInput).val(values.street);
			}
			if (overwrite || $(options.zipInput).val() == '') {
				$(options.zipInput).val(values.zip);
			}
			if (overwrite || $(options.cityInput).val() == '') {
				$(options.cityInput).val(values.city);
			}
			if (overwrite || $(options.countryInput).val() == '') {
				$(options.countryInput).val(values.country);
			}
		}
		
		function compareAddress(values) {
			var formAddress = getAddress();
			return (values.street == '' || formAddress.street == values.street) && (values.zip == '' || formAddress.zip == values.zip) && (values.city == '' || formAddress.city == values.city) &&  (values.country == '' || formAddress.country == values.country);
		}
		
		var settings = {
			/*todo: anpassen */
			mapOptions: {
				center: new google.maps.LatLng(46.801111,8.226667), // Älggialp, Center of Switzerland
				zoom: 8,
				mapTypeId: google.maps.MapTypeId.ROADMAP
				
			},
		
			streetInput: null,
			zipInput: null,
			cityInput: null,
			countryInput: null,
			latInput: null,
			lngInput: null,
			latLngLookupButton: null,
			statusIndicator: null,
			
			getAddress: getAddress,
			updateAddress: updateAddress,
			compareAddress: compareAddress
		}
		
		// If options exist, lets merge them with our default settings
		if (options) {
			settings = $.extend(settings, options);
		}
		
		var marker;
		var infoWindow;
		var insertBefore = $(this);
		
		 // Call this function when the page has been loaded
		function initialize() {
			// Init map and lookup controls
			var map = new google.maps.Map(mapCanvas, settings.mapOptions);
			map.setCenter(settings.mapOptions.center);
			
			google.maps.event.addListener(map, 'click', function(e) {
				setMarker(e.latLng);
				updateLatLngInputs(e.latLng);
				lookupLocation({latLng: e.latLng});
			});
			
			var updateLatLngInputs = function(latLng) {
				var lat = '';
				var lng = '';
				if (latLng) {
					lat = latLng.lat();
					lng = latLng.lng();
				}
				$(settings.latInput).val(lat);
				$(settings.lngInput).val(lng);
			}
			
			var removeMarker = function() {
				if (marker != null) {
					marker.setMap(null);
				}
				marker = null;
			}
			
			var closeInfoWindow = function() {
				if (infoWindow != null) {
					infoWindow.close();
				}
			}
			
			var setMarker = function(point, info) {
				closeInfoWindow();
				removeMarker();
				marker = new google.maps.Marker({
					position: point,
					map: map,
					draggable: true
				});
				
				google.maps.event.addListener(marker, 'drag', function(e) {
					closeInfoWindow();
				});
				google.maps.event.addListener(marker, 'drag', function(e) {
					updateLatLngInputs(e.latLng);
				});
				google.maps.event.addListener(marker, 'dragend', function(e) {
					lookupLocation({latLng: e.latLng});
				});
				
				map.panTo(point);
				
				if (info) {
					infoWindow = new google.maps.InfoWindow({
						content: info
					});
					infoWindow.open(map, marker);
				}
			}
			
			function lookupEnteredLocation(event) {
				event.preventDefault();
				values = {
					street: '',
					zip: '',
					city: '',
					country: '',
					str: ''
				};
				
				values = $.extend(values, settings.getAddress());
				if (values.str == '') {
					str = (values.street != '' ? values.street+', ' : '') + values.city + ' ' + values.zip + (values.country ? ', '+values.country : '');
				}
				
				lookupLocation({address: str});
			}
			
			function lookupLocation(request, nearestLocality) {
				var geocoder = new google.maps.Geocoder();
				var request = $.extend({}, settings.geocoderOptions, request);
				$(settings.statusIndicator).text(trans("loading"));
				geocoder.geocode(request, function(results, status) {
					if (status == google.maps.GeocoderStatus.OK) {
						$(settings.statusIndicator).text('');
						var geocodedLocation = results[0].geometry.location;
						var addressDetails = getAddressDetails(results);
						
						if (nearestLocality == null || nearestLocality) {
							nearestLocality = addressDetails != false;
						}
						
						if (!request.latLng) {
							var point = geocodedLocation;
							updateLatLngInputs(point);
							map.panTo(point);
							// TODO set accuracy zoom
							//map.setZoom(7 + place.AddressDetails.Accuracy);
							if (addressDetails != false) {
								if (settings.updateAddress) {
									settings.updateAddress(addressDetails, false);
								}
								nearestLocality = !settings.compareAddress(addressDetails);
							}
						} else {
							var point = request.latLng;
						}
						
						var info = null;
						var address = results[0].formatted_address;
						if (nearestLocality) {
							var info = $('<fieldset class="module" />');
							info.append($('<strong>'+trans("Nearest locality")+'</strong>'))
							info.append($('<div class="form-row">'+address+'</div>'));
							if (settings.updateAddress) {
								var button = $('<button>'+trans("Use this locality")+'</button>');
								button.click(function(event) {
									if (addressDetails != false) {
										settings.updateAddress(addressDetails, true)
										setMarker(geocodedLocation, address);
										updateLatLngInputs(geocodedLocation);
									}
									return false;
								});
								var p = $('<div class="form-row" />');
								p.append(button);
								info.append(p);
							}
							info = info[0];
						} else {
							//var info = $('<div>'+address+'</div>');
						}
						
						setMarker(point, info);
					} else {
						$(settings.statusIndicator).text(trans("No address found"));
						updateLatLngInputs(null);
					}
				});
			}
			
			function getAddressDetails(results) {
				var d = {};
				var ok = false;
				for (var p = results.length - 1; p >= 0; p--) {
					var place = results[p];
					var placeType = place.types[0];
					var c = {};
					
					for (var i = place.address_components.length - 1; i >= 0; i--) {
						var comp = place.address_components[i];
						var compType = comp.types[0];
						c[compType] = comp.long_name;
					}
					
					switch (placeType) {
						case 'street_address':
							d.street = c.route+' '+c.street_number;
							d.zip = c.postal_code;
							d.city = c.locality;
							ok = true;
						break;
						case 'postal_code':
							d.zip = c.postal_code;
							ok = true;
						break;
						case 'locality':
						case 'route':
							d.city = c.locality;
							ok = true;
						break;
						case 'country':
							d.country = c.country;
							ok = true;
						break;
					}
				}
				
				if (!ok) return false;
				return d;
				return result;
			}
			
			var locationTyping = function(event) {
				if (event != null) {
					event.preventDefault();
				}
				$(options.latLngLookupButton)[0].disabled = !settings.getAddress();
			}
			
			var latLngTyping = function(event) {
				if (event != null) {
					event.preventDefault();
				}
				if ($(settings.latInput).val() != '' && $(settings.latInput).val() != 0 && $(settings.lngInput).val() != ''&& $(settings.lngInput).val() != 0) {
					var latlng = new google.maps.LatLng($(settings.latInput).val(), $(settings.lngInput).val());
					setMarker(latlng);
					lookupLocation({latLng: latlng}, event != null);
				} else {
					removeMarker();
				}
			}
			
			latLngTyping();
			locationTyping();
			
			$(settings.latInput).keyup(latLngTyping);
			$(settings.lngInput).keyup(latLngTyping);
			
			$(options.latLngLookupButton).click(lookupEnteredLocation);
			
			$(options.streetInput).keyup(locationTyping);
			$(options.zipInput).keyup(locationTyping);
			$(options.cityInput).keyup(locationTyping);
			$(options.countryInput).keyup(locationTyping);
			
		}
			 // function initialize()

						initialize();

				});
		};

		function trans(id)
		{
				return id;
		}

})(jQuery);