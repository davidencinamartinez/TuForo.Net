@extends('mobile.main')

@section('title', 'Registro - TuForo.Net')

@push('styles')
@endpush
@push('scripts')
	<script src="https://www.google.com/recaptcha/api.js?render=6Lc1fZ4UAAAAAHd6ygOOHFj5B0vykAjCAZcFkIBU"></script>
	<script>
	grecaptcha.ready(function() {
	    grecaptcha.execute('6Lc1fZ4UAAAAAHd6ygOOHFj5B0vykAjCAZcFkIBU', {action: 'homepage'}).then(function(token) {
	       console.log('probandooooooooooo');
	    });
	});
	</script>
@endpush
@section('postSection')
	<div id="registerPanel">
	    <div id="inputForm">
	        <form>
	            <p><b>Nombre de Usuario</b>*</p><input type="text" name="reg_username" maxlength="20" autofocus>
	            <p><b>Correo electrónico</b>*</p><input type="text" name="reg_email" maxlength="64">
	            <p><b>Contraseña</b>*</p><input type="password" name="reg_password" maxlength="64">
	            &emsp;
	            <img show='on' src="storage/src/other/show.png" onclick="showPassword(this)">
	            <p><b>Confirmar Contraseña</b>*</p><input type="password" name="reg_passwordVerified" maxlength="64">
	            &emsp;
	            <img show='on' src="storage/src/other/show.png" onclick="showPassword(this)">
	            <p>* (Todos los campos son obligatorios)</p>
	            <div class="g-recaptcha" data-sitekey="6LffHMQUAAAAADWK3IBujLvXv3rUNohLWUFUHEdv" data-theme="dark" style="margin: 20px 0px 20px 0px;"></div>
	            <p>
	                <input type="checkbox" name="reg_terms" style="vertical-align: bottom;">
	                <label>He leído y acepto los términos y condiciones de </label>
	                <b>TuForo.Net</b>
	            </p>
	            <input type="button" id="reg_done" value="Registrarse" onclick="return formValidation()">
	        </form>
	    </div>
	    
	</div>
@stop