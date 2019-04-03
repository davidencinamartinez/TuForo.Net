@extends('main')

@section('title', ' - Test')

@push('styles')
	<link rel='stylesheet' type='text/css' href='{{ asset("css/index.css") }}'>
@endpush
@section('postSection')
    <table id='threadsPanel' cellpadding='0' cellspacing='0'>
    	<tr class='threadInfo'>
    		<td class='threadCategory'>
    			<img src='storage/src/logos/categories/category02.png'>
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
                <img src='storage/src/logos/categories/category06.png'>
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
                <img src='storage/src/logos/categories/category04.png'>
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
@stop