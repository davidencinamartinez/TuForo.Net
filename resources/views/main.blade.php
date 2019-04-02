<!DOCTYPE html>
<html lang='es'>
<head>
	<meta charset='utf-8'>
	<title>TuForo.Net @yield('title') - Internet somos todos</title>
	<link rel='shortcut icon' type='image/png' href='storage/src/logos/favicon.png'>
	<link rel='stylesheet' type='text/css' href='{{ asset("css/min.css") }}'>
	@stack('styles')
	@stack('scripts')
</head>
<body>
	<div class='header'>
		<img id='Banner' src='storage/src/logos/banner100.png' alt='tuforonetlogo'>
		<div class='UserDiv'>
			<form action='Redirect.php' method='POST'>
				<input type='text' name='User' maxlength='20' placeholder='Usuario'>
				<input type='password' name='Password' maxlength='48' placeholder='Contraseña'>
				<input type='submit' value='Entrar'>
			</form>
		<br>
		</div>
	</div>
	<div class='NavBar'>
		<a href='.' id='StartingPoint' class='Active'>Inicio</a>
		<a href='Web_Files/ForumDisplay.php' id='Forum'>Foro</a>
		<a href='Registro/'>Registro</a>
	</div>
	<div class='HeaderAdsContainer'>
		<a href='https://www.freepik.com/free-vectors/illustrations' target='_blank'>
			<img id='TestImg' src='storage/src/TestImg.jpg' href='https://www.freepik.com/free-vectors/illustrations'>
		</a>
	</div>
	@section('postSection')
    @show
    @section('otherSection')
    @show
	<footer>
		<div class='SocialDiv'>
			<a href='https://twitter.com/?lang=es' target='_blank'><img src='storage/src/logos/social/tw_logo.png' class='SocialNetwork' alt='twitter_logo'></a>
			<a href='https://www.facebook.com/' target='_blank'><img src='storage/src/logos/social/fb_logo.png' class='SocialNetwork' alt='facebook_logo'></a>
			<a href='https://www.instagram.com/' target='_blank'><img src='storage/src/logos/social/ig_logo.png' class='SocialNetwork' alt='instagram_logo'></a>
		</div>
</footer>	
</body>
</html>