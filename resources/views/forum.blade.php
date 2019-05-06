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
		<div style="width: 70%; float: left">
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
					<td class='catInfo' onclick='window.open("forum/general")'>
						<img class='categoryPic' alt='{{ $catData->id }}'>
						<b class='catName'>{{ $catData->name }}</b>
						<br>
						<label class='catDesc'>{{ $catData->description }}</label>
					</td>
					<td class='catLastMsg'>
						<b>Bienvenido a TuForo.Net</b>
						<br>
						<label>Hoy - 14:25</label>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
@stop