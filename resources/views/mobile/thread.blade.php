@extends('mobile.main')

@section('title', $threadTitle.' - TuForo.Net')

@push('styles')
<meta name="keywords" content="{{ $threadTitle }}, tuforo,foro,español">
    <meta name="description" content="{{ $threadTitle }}">
	<link rel='stylesheet' type='text/css' href='{{ asset("/css/mobile/thread.css") }}'>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="description" content="{{ html_entity_decode($threadData[0]->content) }}">
@endpush
@push('scripts')
	<script src='{{ asset("/js/mobile/reply.js") }}'></script>
@endpush
@section('postSection')
	<script type="text/javascript">
		$(document).ready(function() {
		 	replyFormat();
		});
	</script>
	<h1 class="contentTitle">{{ $threadTitle }}</h1>
    @foreach($threadData as $thread)
		<ul class="msgPost">
			<li class="userInfo">
				<img class="userPic" src="{{ $thread->user_pic }}">
				<label class="userName"><a href="/profile/{{ $thread->name }}">{{ $thread->name }}</a></label>
				<br>
				<label class="msgTime">{{ date('d/m/Y', strtotime($thread->msg_created_at)) }}</label><label>, {{ date('H:i', strtotime($thread->msg_created_at)) }}</label>
			</li>
			<li class="msgText">
			  {!! $thread->content !!}
			</li>
		</ul>
	@endforeach
	@if ($threadData->hasPages())
		<div style="text-align: center;">
		  <div class="pageSelector">
		    {{$threadData->links()}}
		  </div>
		</div>
	@endif
	@if (Auth::check())
	<button id="replyPanel" class="userPanel">Responder</button>
		<div id="replyPost" style="visibility: hidden; display: none;">
		    <div id="replyButtons">
		    <button class="wysiwyg" type="button"><i class="fas fa-bold"></i></button>
		    <button class="wysiwyg" type="button"><i class="fas fa-italic"></i></button>
		    <button class="wysiwyg" type="button"><i class="fas fa-underline"></i></button>
		    <button class="wysiwyg" type="button"><i class="fas fa-image"></i></button>
		    <button class="wysiwyg" type="button"><i class="fas fa-link"></i></button>
		    </div>
		<div id="userMsg" name="replyMsg" contenteditable="false" data-placeholder="Introduce tu respuesta ..."></div>
		<form action='/sendReply' method="POST" onsubmit="return replyCorrect()">
		  @csrf
		  <input type="hidden" name="thread_id">
		  <input type="hidden" name="creator">
		  <input type="hidden" name="content">
		  <input class="userPanel" type="submit" id="replyButton" value="Enviar respuesta">
		</form>
		</div>
	@endif
@stop