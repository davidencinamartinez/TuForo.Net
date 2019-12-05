@extends('main')

@section('title', 'Foro - TuForo.Net')

@push('styles')
	<link rel='stylesheet' type='text/css' href='{{ asset("css/forum.css") }}'>	
@endpush
@section('postSection')
	<div style="width: 100%; height: auto;">
		<div style="width: 70%; float: left; margin: 10px 0px 10px 0px;">
			<table id="catPanel">
				<tr>
					<td class='catInfo' style="background-color: #4F4F4F">
						<b>Categoría</b>
					</td>
					<td class='catLastMsg' style="background-color: #4F4F4F">
						<b>Último Mensaje</b>
					</td>
				</tr>
				@foreach($catData as $catData)
				<tr>
					<td class='catInfo'>
						<img class='categoryPic' src='storage/src/categories/{{ $catData->id }}.webp'>
						<a href="foro/{{ $catData->url }}"><b class='catName'>{{ $catData->name }}</b></a>
						<br>
						<label class='catDesc'>{{ $catData->description }}</label>
					</td>
					<td class='catLastMsg'>
						@if (is_null($catData->last_msg_title)) 
						<b>No hay temas disponibles</b>
						@else
						<b>{{ $catData->last_msg_title }}</b>
						<br>
						<label class="threadDate">{{ date('d/m/Y', strtotime($catData->last_msg_time)) }}</label>
						-
						<label>{{ date('H:i', strtotime($catData->last_msg_time)) }}</label>
						@endif
					</td>
				</tr>
				@endforeach
			</table>
		</div>
		<div style='width: 30%; float: right; text-align: center; margin-bottom: 20px;'>
		    <div id='miscPanel'>
				<div class='RightAdsContainer'>
                    <!-- RIGHT AD CONTAINER (FORUM) 300x600 -->
                    <ins class="adsbygoogle"
                         style="display:inline-block;width:300px;height:600px"
                         data-ad-client="ca-pub-2178837299566296"
                         data-ad-slot="4871639807"></ins>
				</div>
				<div style="width: 100%; text-align: center;">
                    <iframe src="https://freesecure.timeanddate.com/clock/i6pw1dlx/n31/tles4/fn14/fs20/fcfff/tc000/pct/ftb/bas2/bacfff/pa12/tt0/tw0/th1/tb4" frameborder="0" width="271" height="74" allowTransparency="true"></iframe>
				</div>
			</div>
		</div>
	</div>
@stop