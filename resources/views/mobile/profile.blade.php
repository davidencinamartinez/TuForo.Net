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
			<form action="/updateProfile" method="POST">
				@csrf
				<img id="profilePic" src="{!! $data->user_pic !!}" onerror="this.src='/storage/src/logos/logo128.png';$('input[name=user_pic]').attr('value', '/storage/src/logos/logo128.png');">
				<br>
				<ul id="dataInfo">
					<input type="hidden" name="id" value="{!! $data->id !!}">
					<li>
						<label><b>Temas:</b>
							{!! $data->thread_count !!}
						</label>
					</li>
					<li>
						<label><b>Mensajes:</b>
							<label>{!! $data->msg_count !!}</label>
						</label>   
					</li>
					<li>
						<label><b>Fecha de registro:</b>
							<label>{{ strftime('%b %Y', strtotime($data->created_at)) }}</label>
						</label> 
					</li>
					<li>
						<label><b>E-Mail:</b>
							<label>{!! $data->email !!}</label>
						</label>
					</li>
					<li>
						<label><b>Título:</b></label>
						<br>
						<input type="text" name="user_title" value="{!! $data->user_title !!}" maxlength="20">
						<input type="text" name="user_pic" value="{!! $data->user_pic !!}" maxlength="255" style="display: none;">
					</li>
				</ul>
				<input class="userPanel" type="submit" value="Actualizar" style="display: none">
			</form>  
			<script type="text/javascript">
				$("#profilePic").on('click', function(event) {
					var newImg = prompt("Introduce la URL de la imagen:");
					if (newImg != null) {
						$("input[name='user_pic']").attr('value', newImg);
						$("#profilePic").attr("src", newImg);
						$("input[value='Actualizar']").css('display', 'block');
					} else {
						return false;
					}
				});
				$("form[action='/updateProfile'] input").on('input change', function(event) {
					$("input[value='Actualizar']").css('display', 'block');
				});
			</script>
		@else 
			
		@endif
		</div>
	@endforeach
@stop