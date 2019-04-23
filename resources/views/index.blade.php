@extends('main')

@section('title', 'TuForo.Net - Internet Somos Todos')

@push('styles')
	<link rel='stylesheet' type='text/css' href='{{ asset("css/index.css") }}'>
@endpush
@push('scripts')
@endpush
@section('postSection')
    <script type="text/javascript">
        $(document).ready(function() {
            threadCategoryPic();
        });
    </script>
    <div style="width: 100%; height: auto">
        <div style="width: 70%; float: left">
            <table id='threadsPanel' cellpadding='0' cellspacing='0'>
            	<tr class='threadInfo' onclick='window.open("thread")'>
            		<td class='threadCategory'>
            			<img class="categoryPic" alt='motor'>
            		</td>
                    <td class='threadTitle'>
                        <label><b>Bienvenido a TuForo.Net</b></label>
                        <br>
                        <label>ViBoXx</label>
                    </td>
            		<td class='threadLastMsg'>
            			<label><b>Fecha:</b> <?php echo date('d/m/y - H:m:s'); ?></label>
                        <br>
                        <label>Lazarillo777</label>
            		</td>
            		<td class='threadLastMsg'>
            			<label><b>Visitas: </b>239</label>
                        <br>
                        <label><b>Respuestas: </b>31</label>
            		</td>
            	</tr>
                <tr class='threadInfo'>
                    <td class='threadCategory'>
                        <img class="categoryPic" alt="informatica">
                    </td>
                    <td class='threadTitle'>
                        <label><b>Cheat Engine 18.4 - Instalación/Guía/Consejos</b></label>
                        <br>
                        <label>H@cK€rM@n</label>
                    </td>
                    <td class='threadLastMsg'>
                        <label><b>Fecha:</b> <?php echo date('d/m/y - H:m:s'); ?></label>
                        <br>
                        <label>PepitoGriego</label>
                    </td>
                    <td class='threadLastMsg'>
                        <label><b>Visitas: </b>122</label>
                        <br>
                        <label><b>Respuestas: </b>4</label>
                    </td>
                </tr>
                <tr class='threadInfo'>
                    <td class='threadCategory'>
                        <img class="categoryPic" alt="general">
                    </td>
                    <td class='threadTitle'>
                        <label><b>Necesito un PC Gaming (Presupuesto 500€)</b></label>
                        <br>
                        <label>ViBoXx</label>
                    </td>
                    <td class='threadLastMsg'>
                        <label><b>Fecha:</b> <?php echo date('d/m/y - H:m:s'); ?></label>
                        <br>
                        <label>Ilitri</label>
                    </td>
                    <td class='threadLastMsg'>
                        <label><b>Visitas: </b>298</label>
                        <br>
                        <label><b>Respuestas: </b>6</label>
                    </td>
                </tr>
            </table>
        </div>
        <div style="width: 30%; float: right; text-align: center; margin-bottom: 20px;">
            <div id="miscPanel">
                <h2>Estadísticas</h2>
                <div style="text-align: justify; font-size: 16px">
                    <b>Miembros: </b><label id="memberCount">{{$countMembers}}</label>
                    <br>
                    <b>Hilos: </b><label id="threadCount">{{ $countThreads }}</label>
                    <br>
                    <b>Mensajes: </b><label id="messageCount">{{ $countMessages }}</label>
                    <br>
                    <b>Visitas: </b><label id="visitorCount">913.000</label>
                    <br>
                    <b>En línea: </b><label id="onlineCount">913.000</label>
                    <br><br>
                    <div class='RightAdsContainer'>
                        <a href="https://www.coolmod.com/promociones" target='_blank'>
                            <img src='storage/src/other/ad2.jpeg'>
                        </a>
                    </div>
                    <div style="width: 100%; text-align: center;">
                    <iframe src="https://freesecure.timeanddate.com/clock/i6pw1dlx/n31/tles4/fn14/fs20/fcfff/tc000/pct/ftb/bas2/bacfff/pa12/tt0/tw0/th1/tb4" frameborder="0" width="271" height="74" allowTransparency="true"></iframe>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
@stop