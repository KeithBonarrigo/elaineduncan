jQuery(document).ready(function($) {
			
    $('#home-email-api-button').click(function(){
          
          /*var widgetId = grecaptcha.render('captcha_element', {
            'sitekey' : '6LfPU34UAAAAAMs4MnMWOx3nBKI0EH6KiDxCJdZA'
            }, true);
          grecaptcha.reset(widgetId);*/
          /*grecaptcha.render('captcha_element', {
            'sitekey' : '6LfPU34UAAAAAMs4MnMWOx3nBKI0EH6KiDxCJdZA'
            });*/
          //$('#captcha_submit').click();
          //var resp = grecaptcha.getResponse(widgetId);
          //alert(resp);
              //var onloadCallback = function() {
                //grecaptcha.render('captcha_element', {
                //'sitekey' : '6LfPU34UAAAAAMs4MnMWOx3nBKI0EH6KiDxCJdZA'
                //});
              //};


          //$('.g-recaptcha').show();
          
        /* var $button = $(this);
        // e.g. Add loading classs
        //$button.addClass('loading');
        // Endpoint from wpApiSetting variable passed from wp-api.
        //var endpoint = wpApiSettings.root + 'hametuha/v1/friend/';*/
        var endpoint = 'https://www.google.com/recaptcha/api/siteverify';
        $.ajax({
        url: endpoint,
        method: 'POST', // POST means "add friend" for example.
        beforeSend: function(xhr){
            // Set nonce here
            xhr.setRequestHeader( 'X-WP-Nonce', wpApiSettings.nonce );
        },
        // Build post data.
        // If method is "delete", data should be passed as query params.
        data: {
            sitekey : '6LfPU34UAAAAAMs4MnMWOx3nBKI0EH6KiDxCJdZA',
            secret: '6LfPU34UAAAAADBUZB3cmIqyNphpQlKGwUCnCxNO'
            //'response: 'fuga'
        }
        }).done(function(response){
        // Do something.
        }).fail(function(response){
        // Show error message
        console.log('failed');
        //alert( response.responseJSON.message );
        }).always(function(){
            console.log('hhhh');
        // e.g. Remove 'loading' class.
        //$button.removeClass('loading');
        });
    });



 })