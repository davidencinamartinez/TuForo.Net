@extends('main')

@section('title', 'TuForo.Net - Foro')

@push('styles')
	<link rel='stylesheet' type='text/css' href='{{ asset("css/forum.css") }}'>	
@endpush
@section('postSection')
	<script type="text/javascript">
	    $(document).ready(function() {
	        threadCategoryPic();
	        dateConvert();
	    });
	</script>
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
						<img class='categoryPic' alt='{{ $catData->id }}'>
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
	</div>
@stop