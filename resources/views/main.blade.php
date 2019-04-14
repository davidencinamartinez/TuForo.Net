<!DOCTYPE html>
<html lang='es'>
<head>
	<meta charset='utf-8'>
	<title>@yield('title')</title>
	<link rel='shortcut icon' type='image/png' href='storage/src/logos/favicon.png'>
	@stack('styles')
	<link rel='stylesheet' type='text/css' href='{{ asset("css/min.css") }}'>
	@stack('scripts')
	<script src='{{ asset("js/main.js") }}'></script>
	<script src='{{ asset("js/jquery-3.3.1.js") }}'></script>
</head>
<script type="text/javascript">
	$(document).ready(function() {
		navBarActive();
	});
</script>
<body>
	<div class='header'>
		<img id='Banner' src='storage/src/logos/banner100.png' alt='tuforonetlogo'>
		<div class='userDiv'>
			<form action='Redirect.php' method='POST'>
				<input type='text' name='user' maxlength='20' placeholder='Usuario'>
				<input type='password' name='password' maxlength='48' placeholder='Contraseña'>
				<input type='submit' value='Entrar'>
			</form>
		<br>
		</div>
	</div>
	<div class='navBar'>
		<a href='/' id='startingPoint'>Inicio</a>
		<a href='forum' id='forumEntry'>Foro</a>
		<a href='register' id="registerPage">Registro</a>
		<a href='create' id="newThreadButton">Crear Hilo</a>
	</div>
	<div class='headerAdsContainer'>
	</div>
	@section('postSection')
    @show
    @section('otherSection')
    @show
	<footer>
		<div class='socialDiv'>
			<a href='https://twitter.com/?lang=es' target='_blank'><img src='storage/src/logos/social/tw_logo.png' class='socialNetwork' alt='twitter_logo'></a>
			<a href='https://www.facebook.com/' target='_blank'><img src='storage/src/logos/social/fb_logo.png' class='socialNetwork' alt='facebook_logo'></a>
			<a href='https://www.instagram.com/' target='_blank'><img src='storage/src/logos/social/ig_logo.png' class='socialNetwork' alt='instagram_logo'></a>
		</div>
	</footer>	
</body>
</html>