@extends('main')

@section('title', 'TuForo.Net - Foro')

@push('styles')
	<link rel='stylesheet' type='text/css' href='{{ asset("css/forum.css") }}'>	
@endpush
@section('postSection')
	<?php
	    $catData = json_decode($catData);
	?>
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
						@if ($catData->last_msg_thread_id->isEmpty()) {
						<b>{{$catData->last_msg_thread_id}}</b>
						<br>
						<label>Hoy - 14:25</label>
					}
						@else
						@endif
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
@stop