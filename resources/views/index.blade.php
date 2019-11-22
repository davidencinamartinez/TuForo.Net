@extends('main')

@section('title', 'TuForo.Net - Internet Somos Todos')

@push('styles')
<meta name="keywords" content="TuForo.Net,tuforo,foro,español">
    <meta name="description" content="Bienvenido a TuForo.Net. Aquí encontrarás temas, opiniones y debates sobre temas de todo tipo. Únete a nuestra comunidad.">
	<link rel='stylesheet' type='text/css' href='{{ asset("css/index.css") }}'>
@endpush
@push('scripts')
@endpush
@section('postSection')
    <div style="width: 100%; height: auto">
        <div style="width: 70%; float: left; margin: 10px 0px 10px 0px;">
            <table id='threadsPanel'>
                <tr class="threadInfo">
                    <td class='threadCategory' style="background-color: #4F4F4F; text-align: center">
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
                @foreach($threadData as $thread)
                    <tr class="threadInfo">
                        <td class="threadCategory">
                            <img class='categoryPic' src='storage/src/categories/{{ $thread->category }}.png'>
                        </td>
                        <td class='threadName'>
                            <b>
                                <a href="thread/{{ $thread->id }}">{{ $thread->thread }}</a>
                            </b>
                            <br>
                            <a href="/profile/{{ strtolower($thread->creator) }}" class="userProf">{{ $thread->creator }}</a>
                        </td>
                        <td class='threadLastMsg'>
                            <label class='threadDate'>{{ date('d/m/Y', strtotime($thread->last_reply_time)) }}</label>
                            -
                            <label>{{ date('H:i', strtotime($thread->last_reply_time)) }}</label>
                            <br>
                            <a href="/profile/{{ strtolower($thread->last_reply_user) }}">{{ $thread->last_reply_user }}</a>
                        </td>
                		<td class='threadStats'>
                			<b>Visitas: </b>
                            <label>{{ $thread->view_count }}</label>
                            <br>
                            <b>Respuestas: </b>
                            <label>{{ $thread->reply_count }}</label>
                		</td>
                	</tr>
                @endforeach
            </table>
           @if ($threadData->hasPages())
             <div style="text-align: center;">
               <div class="pageSelector">
                 {{$threadData->links()}}
               </div>
             </div>
           @endif
        </div>
        <div style='width: 30%; float: right; text-align: center; margin-bottom: 20px;'>
            <div id='miscPanel'>
                <form action='/login' method='POST'>
                    <b>Buscar:&nbsp;</b>
                    <input type="text" name="searchThread">&nbsp;
                    <button type="submit" id="searchButton">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
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
                        <!-- RIGHT AD CONTAINER (INDEX) 300x600 -->
                        <ins class="adsbygoogle"
                             style="display:inline-block;width:300px;height:600px"
                             data-ad-client="ca-pub-2178837299566296"
                             data-ad-slot="4245309061"></ins>
                        <script>
                             (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                    <div style="width: 100%; text-align: center;">
                    <iframe src="https://freesecure.timeanddate.com/clock/i6pw1dlx/n31/tles4/fn14/fs20/fcfff/tc000/pct/ftb/bas2/bacfff/pa12/tt0/tw0/th1/tb4" frameborder="0" width="271" height="74" allowTransparency="true"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop