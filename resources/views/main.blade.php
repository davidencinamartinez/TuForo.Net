<!DOCTYPE html>
<html lang='es'>
<head>
	<meta charset='utf-8'>
	<title>@yield('title')</title>
	<link rel='shortcut icon' type='image/png' href='/storage/src/logos/favicon.png'>
	@stack('styles')
	<link rel='stylesheet' type='text/css' href='{{ asset("/css/min.css") }}'>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
	@stack('scripts')
	<!-- <script data-ad-client="ca-pub-2178837299566296" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> 
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-140861516-1"></script>
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/es.js"></script>
	<script src='{{ asset("/js/main.js") }}'></script>
	<script type="text/javascript">
		$(document).ready(function() {
			navBarActive();
			dateConvert();
			//function gtag(){dataLayer.push(arguments);}
			//gtag('js', new Date());	
			//gtag('config', 'UA-140861516-1');
		});
	</script>
</head>
<body>
	<div class='header'>
		<a href="/">
			<img id='Banner' src='/storage/src/logos/banner100.png' alt='tuforonetlogo' clickeable>
		</a>
		<div class='userDiv'>
			@if (Auth::check())
				<div class="userLoged">
					Bienvenido
				  	<a href="/profile/{{ strtolower(Auth::user()->name)}}">
				  		<b class="dropbtn">{{ Auth::user()->name }}</b>
				  	</a>&nbsp;
				  <a href="/logout"><i class="fas fa-power-off"></i></a>
				</div>
			@else
			<form action='/login' method='POST'>
				@csrf
				<input type='text' name='user' maxlength='20' placeholder='Usuario'>
				<input type='password' name='password' maxlength='48' placeholder='Contraseña'>
				<input type='submit' value='Entrar'>
			</form>
			No tienes cuenta?&nbsp;<a href="/registro" style="color: white; text-decoration: none;"><b>Regístrate</b></a>
			@if(session()->has('err'))
			<br>
				<p class="error" style="display: contents">{{session('err')}}</p>
			@endif
		<br>
		@endif
		</div>
	</div>
	<div class='navBar'>
		<a href='/' id='startingPoint'>Inicio</a>
		<a href='/foro' id='forumEntry'>Foro</a>
		<a href='/registro' id="registerPage">Registro</a>
		@if (Auth::check())
			<a href='/newthread' id="newThreadButton">Crear Tema</a>
		@else
			<a onclick="alert('Debes estar logeado para crear un nuevo tema.\nSerás redirigido a la página de inicio.')" href='/' id="newThreadButton">Crear Tema</a>
		@endif
	</div>
	<div class='headerAdsContainer'>
		<!-- HEADER AD CONTAINER (MAIN) 728x90 
		<ins class="adsbygoogle"
		     style="display:inline-block;width:728px;height:90px"
		     data-ad-client="ca-pub-2178837299566296"
		     data-ad-slot="7738881260"></ins>
		-->
	</div>
	@section('postSection')
    @show
</body>
</html>