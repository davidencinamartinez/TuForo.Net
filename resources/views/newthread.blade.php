@extends('main')

@section('title', 'Nuevo Tema - TuForo.Net')

@push('styles')
	<link rel='stylesheet' type='text/css' href='{{ asset("css/newthread.css") }}'>
@endpush
@push('scripts')
    <script type='text/javascript' src='{{ asset("/js/reply.js") }}'></script>
    <script type='text/javascript' src='{{ asset("/js/newthread.js") }}'></script>
@endpush
@section('postSection')
<script type="text/javascript">
	$(document).ready(function() {
		replyFormat();
	});
</script>
	<div id="newThreadPanel">
		<form action='/createThread' method="POST" onsubmit="return threadEmptyTitle() && replyCorrect()">
			<h2><b>Título del tema</b></h2><input type="text" name="thread_title" maxlength="85" autofocus>
		    <div id="replyPost">
			    <div id="replyButtons">
			      <button type="button"><i class="fas fa-bold"></i></button>
			      <button type="button"><i class="fas fa-italic"></i></button>
			      <button type="button"><i class="fas fa-underline"></i></button>
			      |
			      <button type="button"><i class="fas fa-align-left"></i></button>
			      <button type="button"><i class="fas fa-align-center"></i></button>
			      <button type="button"><i class="fas fa-align-right"></i></button>
			      <button type="button"><i class="fas fa-align-justify"></i></button>
			      |
			      <button type="button"><i class="fas fa-list-ul"></i></button>
			      <button type="button"><i class="fas fa-list-ol"></i></button>
			      |
			      <button type="button"><i class="fas fa-image"></i></button>
			      <button type="button"><i class="fas fa-video"></i></button>
			      <button type="button"><i class="fas fa-link"></i></button>
			    </div>
	      		<div name="replyMsg" contenteditable="true" data-placeholder="Introduce tu respuesta ..."></div>
	      		<br>
			@csrf
			<input type="hidden" name="thread_id">
			<input type="hidden" name="creator">
			<input type="hidden" name="content">
			<b>Categoría: </b>
			<select name="thread_category">
			@foreach($cat as $category) 
	        	<option value="{{ $category->url }}">{{ $category->name }}</option>
	        @endforeach	
			</select>
			<br>
	        <input type="submit" id="replyButton" value="Responder">
        </form>
		</div>
	</div>
@stop