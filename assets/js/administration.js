WINFO = $.extend(true, (typeof WINFO === 'undefined') ? {} : WINFO, {
	
	administration: {
		start_drag: false,
		sortable_receive:  false,
		disable_city_allowed: false,
		remove_city_allowed: false,
		
		get_cities_requested: false,
		
		index: function () {

		},
		
		frontendcities: function () {
				
			$( '#get-cities-btn' ).click( WINFO.administration._get_cities_by_country );
			$( '#form-settings' ).submit( WINFO.administration._submit );
			$( '#country-name' ).keypress( function ( event ) {
				if ( event.which == 13 ) {
					event.preventDefault();
					if ( ! WINFO.administration.get_cities_requested )
						WINFO.administration._get_cities_by_country( event );
				}
			} );
			
			$("#front-end-cities ul").sortable({
				receive: function ( event, ui )
				{
					//console.log('receive');
					if ( WINFO.administration.start_drag )
					{
						WINFO.administration.sortable_receive = true;
					}
				},
				beforeStop: function ( event, ui )
				{
					//console.log('beforestop');
					if ( WINFO.administration.remove_city_allowed )
					{
						WINFO.administration.remove_city_allowed = false;
						$( "#front-end-cities ul" ).sortable( "enable" );
						$( "li[data-country='" + $(ui.item).attr( 'data-country' ).replace(/\'/g, "\\'") + "'][data-city='" 
								+ $(ui.item).attr( 'data-city' ).replace(/\'/g, "\\'") + "']", $( '#cities' ) ).draggable( 'enable' );
					}
				},
				out: function ( event, ui )
				{
					//console.log('out');
					if ( WINFO.administration.start_drag )
					{
						if ( WINFO.administration.sortable_receive )
						{
							WINFO.administration.disable_city_allowed = true;
							WINFO.administration.sortable_receive = false;
						}
						else
						{
							WINFO.administration.disable_city_allowed = false;
						}
					}
				}
			} ),
			
			$( "#cities" ).droppable( {
				accept: "#front-end-cities li",
				drop: function ( event, ui ) {
					//console.log('drop');
					$( "#front-end-cities ul" ).sortable( "disable" );
					(ui.helper).remove();
					WINFO.administration.remove_city_allowed = true;
				}
			} );
			
			$("ul, li").disableSelection();			
		},
	
		_get_cities_by_country: function ( event ) {
			event.preventDefault();
			var country = $('#country-name').val();
			
			if (country === "") return;
			
			if ( ! WINFO.administration.get_cities_requested ) {
				
				WINFO.administration.get_cities_requested = true;
				
				$( '#get-cities-btn' ).addClass( 'disabled' );
				WINFO.common.clean_alerts();

				$.ajax( {
					cache: false,
					url: '/administration/getcitiesbycountry/',
					type: 'POST',
					data: {country: country},
					success: function ( data ) {
						if ( data.status == 1 ) {

							$( '#cities' ).scrollTop( 0 );

							//add city to #cities
							$( '#cities ul' ).html( data.cities );

							$( "#cities ul > li" ).draggable( {
								connectToSortable: "#front-end-cities ul",
								helper: "clone",
								start: function ( event, ui )
								{
									//console.log('start_drag');
									WINFO.administration.start_drag = true;
								},
								stop: function ( event, ui )
								{
									//console.log('stop_drag');
									WINFO.administration.start_drag = false;

									if ( WINFO.administration.disable_city_allowed )
									{
										$( this ).draggable( "disable" );
										WINFO.administration.disable_city_allowed = false;
									}
								}
							} );

							$( '#cities li' ).each( function () {
								$item = $( this );

								//alert("li[data-country='" + $item.attr( 'data-country' ) + "'][data-city='" + $item.attr( 'data-city' ) + "']");

								if ( $( "li[data-country='" + $item.attr( 'data-country' ).replace( /\'/g, "\\'" ) + "'][data-city='"
										+ $item.attr( 'data-city' ).replace( /\'/g, "\\'" ) + "']", $( '#front-end-cities' ) ).length !== 0 )
								{
									$item.draggable( 'disable' );
								}
							} );
						}
						else if ( data.status == - 1 ) {

							WINFO.common.alert( '#main', 'Error!', data.msg, 'danger' );
						}
						
						$( '#get-cities-btn' ).removeClass( 'disabled' );
						WINFO.administration.get_cities_requested = false;
					},
					error: function ( jqXHR, textStatus, errorThrown ) {
						WINFO.common.alert( '#main', textStatus, errorThrown, 'danger' );
						
						$( '#get-cities-btn' ).removeClass( 'disabled' );
						WINFO.administration.get_cities_requested = false;
					}

				} );
			}
		},
	
		provider: function () {

			$( '#form-settings' ).submit( function () {

				//var number_front_end_cities = $("#front-end-cities li").length;

				var validation_errors = '';

				if ( $( 'input[name="wsdl"]' ).val() == "" ) {

					$( 'input[name="wsdl"]' ).parent().addClass( 'has-error' );

					validation_errors = validation_errors + 'Enter WSDL address.' + '<br />';

				} else {

					$( 'input[name="wsdl"]' ).parent().removeClass( 'has-error' );

				}

				if ( $( 'input[name="con_timeout"]' ).val() == "" ) {

					$( 'input[name="con_timeout"]' ).parent().addClass( 'has-error' );
					validation_errors = validation_errors + 'Enter connection timeout in sec.' + '<br />';

				} else {

					if ( ! /^(0?[1-9]\d*)$/.test( $( 'input[name="con_timeout"]' ).val() ) ) {

						$( 'input[name="con_timeout"]' ).parent().addClass( 'has-error' );
						validation_errors = validation_errors + 'Connection timeout must by positive integer.' + '<br />';

					} else {

						$( 'input[name="con_timeout"]' ).parent().removeClass( 'has-error' );

					}
				}

				if ( validation_errors == '' ) {
					
					return true;
					
				} else {
					
					WINFO.common.clean_alerts();
					WINFO.common.alert( '#main', 'Error!', validation_errors, 'danger' );
					
					return false;
				}
			} );
		},
		
		_submit: function ( event ) {

			/* stop form from submitting normally */
			event.preventDefault();

			WINFO.common.clean_alerts();

			$( "#front-end-cities li" ).each( function ( i, val ) {
				var $city_li_item = $( this );

				$( 'input:hidden', $city_li_item ).eq( 0 ).attr( 'name', 'front-end-cities[' + i + '][country]' );
				$( 'input:hidden', $city_li_item ).eq( 1 ).attr( 'name', 'front-end-cities[' + i + '][city]' );
			} );

			var $form = $( this ),
					url = $form.attr( 'action' );

			$.post( url, $form.serialize(), function ( data ) {
				if ( data.status == 1 ) {
					WINFO.common.alert( '#main', 'Info!', 'Submit successfully', 'info' );
				}
				else if ( data.status == - 1 ) {
					WINFO.common.alert( '#main', 'Error!', 'Submit error', 'danger' );
				}
			}, "json" );

		}
	}
} );
