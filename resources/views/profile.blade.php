@extends('main')

@section('title', $title.' - TuForo.Net')

@push('styles')
    <link rel='stylesheet' type='text/css' href='{{ asset("css/profile.css") }}'>
@endpush
@push('scripts')
@endpush
@section('postSection')
<div id="userPanel">
@foreach ($userData as $data)
<div id="userPic" style="float: left; width: 50%; text-align: right; align-content: center; display: flex">
	<img src="{!! $data->user_pic !!}"> 
</div>
<div style="float: right; width: 50%; text-align: left">
	<div style="float: left; width: auto; text-align: center;">
	@if (Auth::id() == $data->id)
		<h1>
			<label>{!! $data->name !!}</label>
		</h1>
		<h3>Temas:
			<label>{!! $data->thread_count !!}</label>
		</h3>   
		<h3>Mensajes:
			<label>{!! $data->msg_count !!}</label>
		</h3>   
		<h3>Fecha de registro:
			<label>{{ strftime('%b %Y', strtotime($data->created_at)) }}</label>
		</h3> 
		<h3>Última actividad:
			<label class="msgTime">{{ date('d/m/Y', strtotime($data->last_activity)) }}</label>
			<label>, {{ date('H:i', strtotime($data->last_activity)) }}</label>
		</h3>  
	</div>
	<div id="updatePanel">
		<form action="/updateProfile" method="POST">
			@csrf
			<input type="hidden" name="id" value="{!! $data->id !!}">
			<h3>E-Mail:</h3>
			<h3>
				<label>{!! $data->email !!}</label>
			</h3>
			<h3>Título:</h3>
			<input type="text" name="user_title" value="{!! $data->user_title !!}" maxlength="20">
			<h3>Avatar (URL):</h3>
			<input type="text" name="user_pic" value="{!! $data->user_pic !!}" maxlength="255">
			<br>
			<h3><input type="submit" value="Actualizar"></h3>
		</form>
		@else 
		<h1>
			<label>{!! $data->name !!}</label>
		</h1>
		<h3>
			<label>{!! $data->user_title !!}</label>
		</h3>
		<h3>Temas:
			<label>{!! $data->thread_count !!}</label>
		</h3>   
		<h3>Mensajes:
			<label>{!! $data->msg_count !!}</label>
		</h3>   
		<h3>Fecha de registro:
			<label>{{ strftime('%b %Y', strtotime($data->created_at)) }}</label>
		</h3> 
		<h3>Última actividad:
			<label class="msgTime">{{ date('d/m/Y', strtotime($data->last_activity)) }}</label>
			<label>, {{ date('H:i', strtotime($data->last_activity)) }}</label>
		</h3>  
	@endif
	</div>
</div>
</div>
@endforeach
@stop