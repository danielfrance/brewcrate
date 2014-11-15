$(document).ready(function(){

	var form = $('#contact');
	var button = $('#submit-contact');
	var success = $('.success');

	button.on('click',function(e)
	{
		e.preventDefault();
		if(form[0].checkValidity())
		{
			button.text('Processing...');
			$.ajax({
				url: '/contact/submit',
				type: 'post',
				data: form.serialize(),
				success: function(data) {
					if(data.success)
					{
						form.slideUp(100,function()
						{
							success.slideDown(100);
						});
					} else {
						button.text('Submit');
					}
				}
			});
		}

	});
	
});