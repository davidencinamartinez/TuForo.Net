@extends('mobile.main')

@section('title', $title.' - TuForo.Net')

@push('styles')
	<link rel='stylesheet' type='text/css' href='{{ asset("css/mobile/profile.css") }}'>
@endpush
@push('scripts')
@endpush
@section('postSection')
	@foreach ($userData as $data)
		<h1 class="contentTitle">
			<label>{!! $data->name !!}</label>
		</h1>
		<div id="userInfo">
		@if (Auth::id() == $data->id)
			<img id="profilePic" src="{!! $data->user_pic !!}">
			<h3>Temas:
				<label><b>{!! $data->thread_count !!}</b></label>
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
			<form action="/updateProfile" method="POST">
				@csrf
				<input type="hidden" name="id" value="{!! $data->id !!}">
				<h3>E-Mail:</h3>
				<h3>
					<label>{!! $data->email !!}</label>
				</h3>
				<h3>Título:</h3>
				<input type="text" name="user_title" value="{!! $data->user_title !!}" maxlength="20">
				<h3><input type="submit" value="Actualizar"></h3>
			</form>  
		@else 
			<h1 class="contentTitle">
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
	@endforeach
@stop