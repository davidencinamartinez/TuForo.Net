@extends('main')

@section('title', $category.' - TuForo.Net')

@push('styles')
<meta name="keywords" content="{{ $category }},tuforo,foro,español">
    <meta name="description" content="{{  $category }}">
	<link rel='stylesheet' type='text/css' href='{{ asset("css/index.css") }}'>
@endpush
@push('scripts')
@endpush
@section('postSection')
    <script type="text/javascript">
        $(document).ready(function() {
            dateConvert();
            var showText = function (target, message, index, interval) {    
              if (index < message.length) { 
                $(target).append(message[index++]); 
                setTimeout(function () { showText(target, message, index, interval); }, interval); 
              } 
            }
            $(function () { 
              showText("h1", "No hay temas disponibles", 0, 90);    
            }); 
        });
    </script>
    @if($catData->count())
    <div style="width: 100%; height: auto">
        <div style="width: 70%; float: left; margin: 10px 0px 10px 0px;">
            <table id='threadsPanel'>
                <tr class="threadInfo">
                    <td class='threadCategory' style="background-color: #4F4F4F; padding: 5px; text-align: center">
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
                @foreach($catData as $catData)
                    <tr class="threadInfo">
                        <td class="threadCategory">
                            <img class='categoryPic' src='/storage/src/categories/{{ $catData->category }}.png'>
                        </td>
                        <td class='threadName'>
                            <b><a href="/thread/{{ $catData->id }}">{{ $catData->thread }}</a></b>
                            <br>
                            <label style="float: left;">{{ $catData->creator }}</label>
                        </td>
                        <td class='threadLastMsg'>
                            <label class='threadDate'>{{ date('d/m/Y', strtotime($catData->last_reply_time)) }}</label>
                            -
                            <label>{{ date('H:i', strtotime($catData->last_reply_time)) }}</label>
                            <br>
                            <label>{{ $catData->last_reply_user }}</label>
                        </td>
                		<td class='threadStats'>
                			<b>Visitas: </b>
                            <label>{{ $catData->view_count }}</label>
                            <br>
                            <b>Respuestas: </b>
                            <label>{{ $catData->reply_count }}</label>
                		</td>
                	</tr>
                @endforeach
            </table>
        </div>
        <div style='width: 30%; float: right; text-align: center; margin-bottom: 20px;'>
            <div id='miscPanel'>
                <div class='RightAdsContainer'>
                    <!-- RIGHT AD CONTAINER (THREAD LIST) 300x600 -->
                    <ins class="adsbygoogle"
                         style="display:inline-block;width:300px;height:600px"
                         data-ad-client="ca-pub-2178837299566296"
                         data-ad-slot="9281534392"></ins>
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
    @else    
    <div id="noData">
        <img src="/storage/src/other/error.png">
        <h1></h1>
    </div>
    @endif
@stop