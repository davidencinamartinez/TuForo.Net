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
		errorDisplay(terms,'Debes aceptar las condiciones de TuForo.Net');
		return false;
	} else {
		return true;
	}
}

function formValidation() {
	$('.error').remove();
    var checkForm = [checkName(),checkMail(),checkPassword(),checkCaptcha(),checkTerms()];
    var result = 0;
    var verifyMail = $('input[name="reg_email"]').val();
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});    
    $.each(checkForm, function(index, val) {
        if (val == true) {
            result++;
        }
    });
    if (result > 4) {
        event.preventDefault();
        $.ajax({
            url: 'registro',
            type: 'POST',
            data: { _token: $('input[name="_token"]').val(),
                    reg_username: $('input[name="reg_username"]').val(),
                    reg_email: $('input[name="reg_email"]').val(),
                    reg_password: $('input[name="reg_password"]').val()
        },
        })
        .done(function() {
            $('#registerPanel').empty();
            var successPanel = $('<div></div>').attr('id', 'successPanel').css('background-color', 'value');
            var successImg = $('<img>').attr({
            	id: 'successImg',
            	src: 'storage/src/other/reg_done.png'
            });
            var successText = 	'<b>Bienvenido a TuForo.Net</b>!'+
            					'<br />En breve recibirás un correo a ...<br />'+
            					'<b>'+verifyMail+'</b><br />'+
            					'Podrás acceder en cuánto hayas verificado tu cuenta.'+
            					'<br />Disfruta de tu estancia!';
			successPanel.html('<img id="successImg" src="storage/src/other/reg_done.png"><br><br>'+successText);
			$('#registerPanel').append(successPanel);
        })
        .fail(function(e) {
            console.log("error"+e);
        })
        .always(function() {
            console.log("complete");
        });
    } else {
        return false;
    }            
}
