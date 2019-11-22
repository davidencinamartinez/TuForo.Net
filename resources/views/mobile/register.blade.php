@extends('mobile.main')

@section('title', 'Registro - TuForo.Net')

@push('styles')
<link rel='stylesheet' type='text/css' href='{{ asset("css/mobile/register.css") }}'>
@endpush
@push('scripts')
	<script src="//www.google.com/recaptcha/api.js"></script>
	<script src='{{ asset("js/register.js") }}'></script>
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
	            <br>
	            <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI" data-theme="dark" style="margin: 1vh auto;"></div>
	            <p id="PTerms" style="margin: 1vh auto;">
	                <input type="checkbox" name="reg_terms" style="width: 40px; height: 40px;">
	                <label style="vertical-align: text-bottom;">He leído y acepto los términos y condiciones de <b>TuForo.Net</b>*</label>
	            </p>
	            <br>
	            <input type="button" class="userPanel" id="reg_done" value="Registrarse" onclick="return formValidation();">
	        </form>
	    </div>
	</div>
	<script type="text/javascript">
		$('iframe').parent().css({ 'transform' : 'scale(0.77)', '-webkit-transform' : 'scale(0.77)' });
	</script>
@stop