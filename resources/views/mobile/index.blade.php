@extends('mobile.main')

@section('title', 'TuForo.Net - Internet Somos Todos')

@push('styles')
	<link rel='stylesheet' type='text/css' href='{{ asset("/css/mobile/index.css") }}'>
@endpush
@push('scripts')
@endpush
@section('postSection')
	<img src="/storage/src/logos/banner100.png" style="display: flex; margin: 1vh auto;">
	<div id="mobileAdsContainerTop">
		<div style="float: left;">
			<img src="{{url('storage/src/other/mad1.gif')}}" style="border: solid 1px black;">
		</div>
		<div style="float: right;">
			<img src="{{url('storage/src/other/mad2.gif')}}" style="border: solid 1px black;">
		</div>
	</div>
	<h1 class="contentTitle">Últimos temas</h1>
	<div id="threadsPanel">
		@foreach($threadData as $thread)
		<table class="threadInfo">
		    <tr>
		    	<td class="threadCategory" rowspan="2">
		    	    <img class='categoryPic' src='storage/src/categories/{{ $thread->category }}.png'>
		    	</td>
		        <td class='threadName'>
		            <b>
						<a href="thread/{{ $thread->id }}">{{ $thread->thread }}</a>
		            </b>
		         </td>
		     </tr>
		     <tr>
				<td class='threadStats'>
		            <p>{{ $thread->reply_count }} mensajes. Últ. mens. <label class='threadDate'>{{ date('d/m/Y', strtotime($thread->last_reply_time)) }}</label> ({{ date('H:i', strtotime($thread->last_reply_time)) }}) por {{ $thread->last_reply_user }}</p>
				</td>
			</tr>
		</table>
		@endforeach
		@if($threadData->count() >= 25)
			<div style="text-align: center;">
			  <div class="pageSelector">
			    {{$threadData->links()}}
			  </div>
			</div>
		@endif
	</div>
	<h1 class="contentTitle">Estadísticas</h1>
	<ul id="forumStats">
		<li>Temas: <b>{{ $countThreads }}</b></li>
		<li>Visitas: <b>{{ $countVisitors }}</b></li>
		<li>Miembros: <b>{{$countMembers}}</b></li>
		<li>Mensajes: <b>{{ $countMessages }}</b></li>
		<li>En línea: <b>{{ $countOnline }}</b></li>
	</ul>
	<div id="mobileAdsContainerBottom">
		<div style="float: left;">
			<img src="{{url('storage/src/other/mad3.jpeg')}}" style="border: solid 1px black;">
		</div>
		<div style="float: right;">
			<img src="{{url('storage/src/other/mad4.jpg')}}" style="border: solid 1px black;">
		</div>
	</div>
@stop