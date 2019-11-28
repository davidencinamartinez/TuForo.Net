
function showPassword(element) {
	if ($(element).attr('show') == 'on') {
		$(element).attr({
			src: 'storage/src/other/hide.png',
			show: 'off'
		});
		$(element).prev('input').attr('type', 'text');
	} else {
		$(element).attr({
			src: 'storage/src/other/show.png',
			show: 'on'
		});
		$(element).prev('input').attr('type', 'password');
	}
}

/*function userAvailable() {
	var user = $('input[name="reg_username"]').val();
	var _token = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
	    url: '/ajax/checkUser',
	    type: 'POST',
	    data: { user: user, _token: _token },
	    success: function (result) {
			getIt(result);
	        
	    },
	    complete: function(x) {
	    	console.log(this.url);
	    	console.log(x);
	    }

	});
};


function mailAvailable() {
	var mail = $('input[name="reg_email"]').val();
	var _token = $('input[name="_token"]').val();
	$.ajax({
	    url: '/ajax/checkMail',
	    type: 'POST',
	    datatype: 'json',
	    data: { mail: mail, _token: _token },
	    success: function (result) {
	        if (result == 'true') {
	            $('input[name="reg_email"]').before().remove('.error');
	            errorDisplay($('input[name="reg_email"]'),'El correo introducido ya está en uso');
	        } else {
	            $('input[name="reg_email"]').before().remove('.error');
	        }
	    }
	});
}

function checkName() {
	var user = $('input[name="reg_username"]');
	if (user.val().length < 6) {
		errorDisplay(user,'El nombre de usuario debe contener mínimo 6 carácteres');
		return false;
	} else if (user.val().length > 20) {
		errorDisplay(user,'El nombre de usuario debe contener máximo 20 carácteres');
		return false;
	} else {
		return true;
	}
}

function checkMail() {
	var mail = $('input[name="reg_email"]');
	var reg = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,3}\b$/i;
	if (reg.test(mail.val())) {
        return true;
    } else {
        errorDisplay(mail,'El correo electrónico introducido no es correcto');
        return false;
    }
}

function checkPassword() {
	var pass = $('input[name="reg_password"]');
	var pass_v = $('input[name="reg_passwordVerified"]');
	if (pass.val().length < 8) {
		errorDisplay(pass,'La contraseña introducida es demasiado corta');
		return false;
	} else if (pass.val() !== pass_v.val()) {
		errorDisplay(pass_v,'Las contraseñas no coinciden');
		return false;
	} else {
		return true;
	}
}
function checkCaptcha() {
	var captcha = $('.g-recaptcha');
	var captchaResponse = grecaptcha.getResponse();
	if (captchaResponse.length <= 0) {
		errorDisplay(captcha,'Verifica que eres humano');
		return false;
	} else {
		return true;
	}
}

function checkTerms() {
	var terms = $('input[name="reg_terms"]');
	if (terms.is(':checked') == false) {
		errorDisplay(PTerms,'<br>Debes aceptar las condiciones de TuForo.Net');
		return false;
	} else {
		return true;
	}
}
*/
function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }

function formValidation() {
	$('.error').remove();
    /*
    var checkForm = [checkName(),checkMail(),checkPassword(),checkCaptcha(),checkTerms()];
    var result = 0;
    var verifyMail = $('input[name="reg_email"]').val();
    */
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});    
        event.preventDefault();
        $.ajax({
            url: 'registro',
            type: 'POST',
            data: { _token: $('input[name="_token"]').val(),
                    reg_username: $('input[name="reg_username"]').val(),
                    reg_email: $('input[name="reg_email"]').val(),
                    reg_password: $('input[name="reg_password"]').val(),
                    reg_passwordVerified: $('input[name="reg_passwordVerified"]').val(),
                    reg_captcha: grecaptcha.getResponse(),
                    reg_terms: $('input[name="reg_terms"]').is(':checked')

        },
        })
        .done(function(data) {
        	if($.isEmptyObject(data.error)){
	        	var successPanel = $('<div></div>').attr('id', 'successPanel').css('background-color', 'value');
	            var successImg = $('<img>').attr({
	            	id: 'successImg',
	            	src: 'storage/src/other/reg_done.png'
	            });
	            var successText = 	'<b>Bienvenido a TuForo.Net</b>!'+
	            					'<br />Disfruta de tu estancia!'+
	            					'<a href="/"><h3>Haz click aquí para volver al inicio</h3></a>';
				successPanel.html('<img id="successImg" src="storage/src/other/reg_done.png"><br><br>'+successText);
				$('#registerPanel').append(successPanel);
        	}else{
        	    $.each( data.error, function( key, value ) {
        	    	if (key == 'reg_username') {
        	    		errorDisplay($('input[name="reg_username"]'), value[0]);
        	    	}
        	    	if (key == 'reg_email') {
						errorDisplay($('input[name="reg_email"]'), value[0]);
        	    	}
        	    	if (key == 'reg_password') {
        	    		errorDisplay($('input[name="reg_password"]'), value[0]);
        	    	}
        	    	if (key == 'reg_passwordVerified') {
        	    		errorDisplay($('input[name="reg_passwordVerified"]'), value[0]);
        	    	}
        	    	if (key == 'reg_captcha') {
        	    		errorDisplay($('.g-recaptcha'), value[0]);
        	    	}
        	    	if (key == 'reg_terms') {
        	    			errorDisplay($('#PTerms'), value[0]);
        	    	}
            	});
        	}
        })
        .fail(function(e) {
        	errorDisplay($('input[name="reg_username"]'),'El nombre de usuario ya está en uso');
        	console.log('error');

        })
        .always(function() {
            
        });       
}