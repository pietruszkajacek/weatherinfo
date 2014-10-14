WINFO = $.extend(true, (typeof WINFO === 'undefined') ? {} : WINFO, {
	
	weatherinfo: {
		
		index: function () {
			$( '#front-end-cities-select' ).change( function () {
				$('.info-panel').each(function() {
					$(this).addClass('hidden');
				});
				
				$('.info-panel').eq( $( 'option:selected', this ).val() ).removeClass('hidden');
				
				WINFO.weatherinfo._refresh_weather();
			} )
			.change();
	
			$('#update-btn').click(WINFO.weatherinfo._refresh_weather);
		},
		
		
		_ajax_loader: function (visibility, $context) {
			var $icon_loader = $('.ajax-loader', $context);

			if (visibility) {
				$icon_loader.removeClass('invisible');

			} else {
				$icon_loader.addClass('invisible');
			}
		},
		
		_refresh_weather: function () {
			var $current_info_panel = $('.info-panel').not('.hidden');
			
			if ( $current_info_panel.attr( 'data-post-req' ) == '0' ) {

				WINFO.weatherinfo._ajax_loader( true, $current_info_panel );
				$current_info_panel.attr( 'data-post-req', '1' );
				
				$.ajax( {
					cache: false,
					url: '/weatherinfo/refreshweather/',
					type: 'POST',
					data: {
						country: $current_info_panel.attr( 'data-country' ),
						city: $current_info_panel.attr( 'data-city' )
					},
					success: function ( data ) {
						if ( data.status == 1 ) {
							$( 'small[data-location]', $current_info_panel ).text( data.weather.Location );
							$( 'small[data-wind]', $current_info_panel ).text( data.weather.Wind );
							$( 'small[data-visibility]', $current_info_panel ).text( data.weather.Visibility );
							$( 'small[data-skyconditions]', $current_info_panel ).text( data.weather.SkyConditions );
							$( 'small[data-temp]', $current_info_panel ).text( data.weather.Temperature );
							$( 'small[data-dewpoint]', $current_info_panel ).text( data.weather.DewPoint );
							$( 'small[data-relativehumidity]', $current_info_panel ).text( data.weather.RelativeHumidity );
							$( 'small[data-pressure]', $current_info_panel ).text( data.weather.Pressure );
						}
						else if ( data.status == - 1 ) {
							$( 'small[data-location]', $current_info_panel ).text( data.weather.location );
							$( 'small[data-wind]', $current_info_panel ).text( data.weather.wind );
							$( 'small[data-visibility]', $current_info_panel ).text( data.weather.visibility );
							$( 'small[data-skyconditions]', $current_info_panel ).text( data.weather.skyconditions );
							$( 'small[data-temp]', $current_info_panel ).text( data.weather.temperature );
							$( 'small[data-dewpoint]', $current_info_panel ).text( data.weather.dewpoint );
							$( 'small[data-relativehumidity]', $current_info_panel ).text( data.weather.relativehumidity );
							$( 'small[data-pressure]', $current_info_panel ).text( data.weather.pressure );
						}
						
						$current_info_panel.attr( 'data-post-req', '0' );
						WINFO.weatherinfo._ajax_loader( false, $current_info_panel );
					}
				} );
			}
		}	
	}
} );
