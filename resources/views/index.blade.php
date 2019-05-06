@extends('main')

@section('title', 'TuForo.Net - Internet Somos Todos')

@push('styles')
	<link rel='stylesheet' type='text/css' href='{{ asset("css/index.css") }}'>
@endpush
@push('scripts')
<script type='text/javascript' src='{{ asset("js/moment_js/moment.js") }}'></script>
<script type='text/javascript' src='{{ asset("js/moment_js/es.js") }}'></script>
@endpush
@section('postSection')
    <?php
        $threadData = json_decode($threadData);
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            threadCategoryPic();
            dateConvert();
        });
    </script>
    <div style="width: 100%; height: auto">
        <div style="width: 70%; float: left">
            <table id='threadsPanel'>
                <tr class="threadInfo">
                    <td class='threadCategory' style="background-color: #4F4F4F; padding: 5px">
                        <b>Categoría</b>
                    </td>
                    <td class='threadName' style="background-color: #4F4F4F; padding: 5px">
                        <b>Tema</b>
                    </td>
                    <td class='threadLastMsg' style="background-color: #4F4F4F; border: 1px solid black; border-width: 0px 1px 0px 1px; padding: 0px 5px 0px 5px">
                        <b>Último Mensaje</b>
                    </td>
                    <td style='background-color: #4F4F4F; padding: 0px 5px 0px 5px'>
                        <b>Visitas/Respuestas</b>
                    </td>
                </tr>
                @foreach($threadData as $threadData)
                    <tr class="threadInfo" onclick='window.open("thread")'>
                        <td class="threadCategory">
                            <img class='categoryPic' alt='{{ $threadData->category }}'>
                        </td>
                        <td class='threadName'>
                            <b>{{ $threadData->thread }}</b>
                            <br>
                            <label style="float: left;">{{ $threadData->creator }}</label>
                        </td>
                        <td class='threadLastMsg'>
                            <label class='threadDate'>{{ date('d/m/Y', strtotime($threadData->last_reply_time)) }}</label>
                            -
                            <label>{{ date('H:i', strtotime($threadData->last_reply_time)) }}</label>
                            <br>
                            <label>{{ $threadData->last_reply_user }}</label>
                        </td>
                		<td class='threadStats'>
                			<b>Visitas: </b>
                            <label>{{ $threadData->view_count }}</label>
                            <br>
                            <b>Respuestas: </b>
                            <label>{{ $threadData->reply_count }}</label>
                		</td>
                	</tr>
                @endforeach
            </table>
        </div>
        <div style='width: 30%; float: right; text-align: center; margin-bottom: 20px;'>
            <div id='miscPanel'>
                <h2>Estadísticas</h2>
                <div>
                    <b>Miembros: </b><label id="memberCount">{{$countMembers}}</label>
                    <br>
                    <b>Temas: </b><label id="threadCount">{{ $countThreads }}</label>
                    <br>
                    <b>Mensajes: </b><label id="messageCount">{{ $countMessages }}</label>
                    <br>
                    <b>Visitas: </b><label id="visitorCount">{{ $countVisitors }}</label>
                    <br>
                    <b>En línea: </b><label id="onlineCount">{{ $countOnline }}</label>
                    <br><br>
                    <div class='RightAdsContainer'>
                        <a href="https://www.coolmod.com/promociones" target='_blank'>
                            <img src='storage/src/other/ad3.gif'>
                        </a>
                    </div>
                    <div style="width: 100%; text-align: center;">
                    <iframe src="https://freesecure.timeanddate.com/clock/i6pw1dlx/n31/tles4/fn14/fs20/fcfff/tc000/pct/ftb/bas2/bacfff/pa12/tt0/tw0/th1/tb4" frameborder="0" width="271" height="74" allowTransparency="true"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop