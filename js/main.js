$(document).ready(function() {
	// Функция сброса формы.
	var resetForm = function() {
		$('#my-form').trigger('reset');
	};

// Функции отслеживания событий
	var submitListener = function() {
		$('#my-form').on("submit", sendAjax);
	};

// Аяксовая отправка форм.
	var sendAjax = function(event) {
		event.preventDefault();
		var submitButton = $(this).find('input[type="submit"]');
		submitButton.attr('disabled', '');
		var
			form   = $(this),
			url    = form.attr('action'),
			data   = form.serialize(),
			result = $.ajax({
				url: url,
				type: 'POST',
				dataType: 'json',
				data: data
			})
			.done(function(a) {
				console.log(a);
				console.log("script sucsess");
				if (a === "Ваше письмо будет отправлено в назначенное время!") {
					console.log('input sucsess');
					$('#message-div').html(a);
					$('.inputs-wrap').addClass('hidden');
					$('#error-div').addClass('hidden');
				} else {
					console.log('input error');
					if ( a.length === 2 ) {
						$('#error-div').html(a[0] + '<br>' + a[1]);
					} else {
						$('#error-div').html(a[0]);
					}
				}
				//resetForm();
			})
			.fail(function() {
				console.log("script error");
			})
			.always(function() {
				submitButton.removeAttr('disabled');
				console.log(result);
			});
	};

	// Инилизация функций.
	submitListener();
});