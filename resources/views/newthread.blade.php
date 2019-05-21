@extends('main')

@section('title', 'TuForo.Net - Nuevo Tema')

@push('styles')
	<link rel='stylesheet' type='text/css' href='{{ asset("css/newthread.css") }}'>
@endpush
@push('scripts')
    <script src='{{ asset("js/newthread.js") }}'></script>
@endpush
@section('postSection')
	<div id="newThreadPanel">
		<form>
			<h2><b>Título del tema</b></h2><input type="text" name="thread_title" maxlength="85" autofocus>
		    <div id="replyPost">
			    <div id="replyButtons">
			      <button><i class="fas fa-fill-drip"></i></button>
			      <button><i class="fas fa-bold"></i></button>
			      <button><i class="fas fa-italic"></i></button>
			      <button><i class="fas fa-underline"></i></button>
			      |
			      <button><i class="fas fa-align-left"></i></button>
			      <button><i class="fas fa-align-center"></i></button>
			      <button><i class="fas fa-align-right"></i></button>
			      <button><i class="fas fa-align-justify"></i></button>
			      |
			      <button><i class="fas fa-list-ul"></i></button>
			      <button><i class="fas fa-list-ol"></i></button>
			      |
			      <button><i class="fas fa-image"></i></button>
			      <button><i class="fas fa-video"></i></button>
			      <button><i class="far fa-laugh-beam"></i></button>
			      <button><i class="fas fa-link"></i></button>
			    </div>
	      		<div name="replyMsg" placeholder="Introduce tu respuesta..." contenteditable="true"></div>
			@csrf
			<input type="hidden" name="thread_id">
			<input type="hidden" name="creator">
			<input type="hidden" name="content">
			<b>Categoría: </b><select name="thread_category">
			@foreach($cat as $category) 
	        	<option>{{ $category->name }}</option>
	        @endforeach	
			</select>
	        <input type="submit" id="replyButton" value="Responder">
        </form>
		</div>
	</div>
@stop