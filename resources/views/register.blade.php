@extends('main')

@section('title', 'TuForo.Net - Registro')

@push('styles')
    <link rel='stylesheet' type='text/css' href='{{ asset("css/register.css") }}'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@push('scripts')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src='{{ asset("js/register.js") }}'></script>
@endpush
@section('postSection')
    <div id="registerPanel">
        <div id="inputForm">
            <form method="POST" action="/register" autocomplete="off" onsubmit="return formValidation()">
                <p><b>Nombre de Usuario</b>*</p><input type="text" name="reg_username" maxlength="20" autofocus>
                <p><b>Correo electrónico</b>*</p><input type="text" name="reg_email" maxlength="64">
                <p><b>Contraseña</b>*</p><input type="password" name="reg_password" maxlength="64">
                &emsp;
                <img show='on' src="storage/src/other/show.png" onclick="showPassword(this)">
                <p><b>Confirmar Contraseña</b>*</p><input type="password" name="reg_passwordVerified" maxlength="64">
                &emsp;
                <img show='on' src="storage/src/other/show.png" onclick="showPassword(this)">
                <p>* (Todos los campos son obligatorios)</p>
                <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI" style="margin: 20px 0px 20px 0px;"></div>
                <p>
                    <input type="checkbox" name="reg_terms" style="vertical-align: bottom;">
                    <label>He leído y acepto los términos y condiciones de </label>
                    <b>TuForo.Net</b>
                </p>
                <input type="submit" id="reg_done" value="Registrarse">
            </form>
        </div>
        <div id="privacyPolicy">
            <iframe src="storage/src/other/AvisoLegal.pdf" type="application/pdf" width="100%" height="100%"></iframe>
        </div>
    </div>
    <br><br>
@stop