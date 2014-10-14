WINFO = $.extend(true, (typeof WINFO === 'undefined') ? {} : WINFO, {
	common: {
		init: function () {

		},
		
		clean_alerts: function ( ) {
			$( "div.alert.app-alert" ).remove( );
		},
		
		// type: error, info, warning, success
		alert: function (layer, head_text, msg, type) {
			var X = '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>',
				head = '<h4>'+ head_text + '</h4>';
		
			$(layer).prepend('<div class="alert alert-' + type + ' app-alert" role="alert">'+ X + head + '<p>' + msg + '</p>' + '</div>');
		}
	}
});

UTIL = {
	exec: function (controller, action) {
		var ns = WINFO,
				action = (action === undefined) ? "init" : action;

		if (controller !== "" && ns[controller] && typeof ns[controller][action] == "function") {
			ns[controller][action]();
		} 
	},
	init: function () {
		var body = document.body,
				controller = body.getAttribute("data-controller"),
				action = body.getAttribute("data-action");

		UTIL.exec("common");
		UTIL.exec(controller);
		UTIL.exec(controller, action);
	}
};

$(document).ready(UTIL.init);