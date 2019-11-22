<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>@yield('title')</title>
	<link rel='shortcut icon' type='image/png' href='/storage/src/logos/favicon.png'>
	@stack('styles')
	<link rel='stylesheet' type='text/css' href='{{ asset("/css/mobile/min.css") }}'>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	@stack('scripts')
	<script src='{{ asset("/js/jquery-3.3.1.js") }}'></script>
	<script src='{{ asset("/js/main.js") }}'></script>
	<script type='text/javascript' src='{{ asset("js/moment_js/moment.js") }}'></script>
	<script type='text/javascript' src='{{ asset("js/moment_js/es.js") }}'></script>
	<script type="text/javascript">
		$(document).ready(function() {
			dateConvert();
			(adsbygoogle = window.adsbygoogle || []).push({
				google_ad_client: "ca-pub-2178837299566296",
				enable_page_level_ads: true
	        	});
	        	window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());	
			gtag('config', 'UA-140861516-1');
		});
	</script>
</head>
<body>
	<div class='header'>
		@if(session()->has('err'))
			<div style="text-align: center;">
				<p class="error">{{session('err')}}</p>
			</div>
		@endif
		<button class="userPanel" onclick="window.location = '/'">Inicio</button>
		<button class="userPanel">Foro</button>
		<button class="userPanel">Usuario</button>
		<div class="userForm">
			@if (Auth::check())
				<div class="userLoged">
					Bienvenido
				  	<a href="/profile/{{ strtolower(Auth::user()->name)}}">
				  		<b class="dropbtn">{{ Auth::user()->name }}</b>
				  	</a>&nbsp;
				  <a href="/logout"><i class="fas fa-power-off"></i></a>
				  <br>
				</div>
			@else
				<form id="loginForm" action='/login' method='POST'>
					@csrf
					<b>Usuario:</b>
					<br>
					<input type='text' name='user' maxlength='20'>
					<br>
					<b>Contraseña:</b>
					<br>
					<input type='password' name='password' maxlength='48'>
					<br>
					<input id='loginButton' type='submit' value='Entrar' style="font-weight: bold;">
				</form>
				No tienes cuenta? <a href="/registro" style="text-decoration: none; color: white;"><b>Regístrate</b></a>
				<br><br>
			@endif
		</div>
	<script>
		document.getElementsByClassName("userPanel")[2].addEventListener("click", function() {
			var panel = this.nextElementSibling;
			this.classList.toggle("active");
			document.getElementsByClassName("userForm")[0].focus();
			if (panel.style.maxHeight) {
			  panel.style.maxHeight = null;
			} else {
			  panel.style.maxHeight = panel.scrollHeight + "px";
			} 
		});
	</script>
	</div>
	@section('postSection')
	@show
	<div id='footer'>
		<div class='socialDiv'>
			<a href='https://twitter.com/?lang=es' target='_blank'><img src='/storage/src/logos/social/tw_logo.png' class='socialNetwork' alt='twitter_logo'></a>
			<a href='https://www.facebook.com/tuforonetofficial/' target='_blank'><img src='/storage/src/logos/social/fb_logo.png' class='socialNetwork' alt='facebook_logo'></a>
			<a href='https://www.instagram.com/' target='_blank'><img src='/storage/src/logos/social/ig_logo.png' class='socialNetwork' alt='instagram_logo'></a>
		</div>
		<button id="goUpButton" class="userPanel" onclick="document.documentElement.scrollTop = 0;">Ir Arriba</button>
	</div>	
</body>
</html>