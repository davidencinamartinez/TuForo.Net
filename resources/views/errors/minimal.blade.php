<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700,200">
        <!-- Styles -->
        <link rel='stylesheet' type='text/css' href='{{ URL::to("/css/error.css") }}'>
    </head>
    <body>
        <div class="container">
            <div id="header"> 
                <h1>@yield('code')</h1>
                <h2>@yield('error')</h2>
            </div>
            <div class="warning">            
                <p class="sign alert"></p>
                <p align="justify">Algo no ha salido como se esperaba.<br>@yield('description')</p>
            </div>
            <h4><i class="sign tip"></i><strong>Sigue estos pasos:</strong></h4>
            <ul>
              <li>@yield('tryout_1')</li>
              <li>@yield('tryout_2')</li>
              <li>@yield('tryout_3')</li>
            </ul>
            <div id="footer">            
                <div class="contact"><i class="sign call"></i><p class="marquee">Si sigues teniendo problemas, no dudes en contactar con un administrador.</p></div>       
                <p class="copyright">&copy; 2019 TuForo.Net</p>
            </div> 
        </div>     
                        
    </body>
</html>
