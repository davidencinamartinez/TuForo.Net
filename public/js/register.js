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

function userExists() {
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$.ajaxSetup({
		headers: {  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
	   	type: 'get',
	   	url: 'lol',
	   	data: {_token: CSRF_TOKEN},
	   success:function(data) {
	      console.log(data[0].id);

	      //$('input').eq(4).after('<label class="preventError"> '+data.msg+'</label>');
	   }
	});      
}

function errorDisplay(position,message) {
	$(position).before($('<p>'+message+'</p>').attr({
		class: 'error'
	}));
}

function checkName() {
	var user = $('input').eq(3);
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
	var mail = $('input').eq(4);
	var reg = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,3}\b$/i;
	if (reg.test(mail.val())) {
        return true;
    } else {
        errorDisplay(mail,'El correo electrónico introducido no es correcto');
        return false;
    }
}

function checkPassword() {
	var pass = $('input').eq(5);
	var pass_v = $('input').eq(6);
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
	if (captchaResponse.length < 334) {
		errorDisplay(captcha,'Verifica que eres humano');
		return false;
	} else {
		return true;
	}
}

function checkTerms() {
	var terms = $('input').eq(7);
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
	$.each(checkForm, function(index, val) {
		if (val == true) {
			result++;
		}
	});
	if (result > 4) {
		return true;
	} else {
		return false;	
	}
}