'use strict';

window.onerror = function jsErrorHandler(msg, url, lineNumber) {

	var form_data = '';

	if ($('#form1').length) {
		form_data = $('#form1').serialize();
	}

	if ($('#form2').length)	{
		form_data = $('#form2').serialize();
	}

	if ($('#form3').length)	{
		form_data = $('#form3').serialize();
	}

	var params = {
		errorMessage: msg,
		url: url,
		errorLineNumber: lineNumber,
		screen: { width: window.screen.width, height: window.screen.height },
		inputValue: $(document).serialize(),
		formdata: form_data,
		page: $('input[name="page"]').val()
	};

	sendJsError( params );

	return true;
};

function sendJsError(params) {
	$.ajax({
		type: 'POST',
		url: basic_url + 'log_js_error/',
		data: $.extend(params, {log_s: 1}),
		dataType: 'json'
	});
}