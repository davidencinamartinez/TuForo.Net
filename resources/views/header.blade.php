@section('header')
	<div class="header">
	<img id="Banner" src="storage/src/logos/banner100.png" alt="tuforonetlogo">
	<div class="UserDiv">
		<form action="Redirect.php" method="POST">
			<input type="text" name="User" maxlength="20" placeholder="Usuario">
			<input type="password" name="Password" maxlength="48" placeholder="Contraseña">
			<input type="submit" value="Entrar">
		</form>
		<br>
	</div>
	</div>
	<div class="NavBar">
    	<a href="." id="StartingPoint" class="Active"><h2>Inicio</h2></a>
    	<a href="Web_Files/ForumDisplay.php" id="Forum"><h2>Foro</h2></a>
    	<a href="Registro/"><h2>Registro</h2></a>
	</div>
	<div class="HeaderAdsContainer">
		<a href="https://www.freepik.com/free-vectors/illustrations" target="_blank">
			<img id="TestImg" src="storage/src/TestImg.jpg" href="https://www.freepik.com/free-vectors/illustrations">
		</a>
	</div>
<!-- @yield('footer')
	<footer>
		<div class="SocialDiv">
			<a href="https://twitter.com/?lang=es" target="_blank"><img src="storage/src/logos/social/tw_logo.png" class="SocialNetwork" alt="twitter_logo"></a>
			<a href="https://www.facebook.com/" target="_blank"><img src="storage/src/logos/social/fb_logo.png" class="SocialNetwork" alt="facebook_logo"></a>
			<a href="https://www.instagram.com/" target="_blank"><img src="storage/src/logos/social/ig_logo.png" class="SocialNetwork" alt="instagram_logo"></a>
		</div>
	</footer>-->