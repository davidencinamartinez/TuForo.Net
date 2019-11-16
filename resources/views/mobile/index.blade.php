@extends('mobile.main')

@section('title', 'TuForo.Net - Internet Somos Todos')

@push('styles')
	<link rel='stylesheet' type='text/css' href='{{ asset("/css/mobile/index.css") }}'>
@endpush
@push('scripts')
@endpush
@section('postSection')
	<img src="/storage/src/logos/banner100.png" style="display: flex; margin: auto; margin-top: 1vh;">
	<div id="mobileAdsContainerTop">
		<div style="float: left;">
			<img src="{{url('storage/src/other/mad1.gif')}}" style="border: solid 1px black;">
		</div>
		<div style="float: right;">
			<img src="{{url('storage/src/other/mad2.gif')}}" style="border: solid 1px black;">
		</div>
	</div>
	<br>
	<div id="threadsPanel">
		@foreach($threadData as $threadData)
		<table class="threadInfo">
		    <tr>
		    	<td class="threadCategory" rowspan="2">
		    	    <img class='categoryPic' src='storage/src/categories/{{ $threadData->category }}.png'>
		    	</td>
		        <td class='threadName'>
		            <b>
						<a href="thread/{{ $threadData->id }}">{{ $threadData->thread }}</a>
		            </b>
		         </td>
		     </tr>
		     <tr>
				<td class='threadStats'>
		            <p>{{ $threadData->reply_count }} mensajes. Últ. mens. <label class='threadDate'>{{ date('d/m/Y', strtotime($threadData->last_reply_time)) }}</label> por {{ $threadData->last_reply_user }}</p>
				</td>
			</tr>
		</table>
		@endforeach
	</div>
@stop