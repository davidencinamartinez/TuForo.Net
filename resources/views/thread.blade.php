@extends('main')

@section('title', $threadTitle.' - TuForo.Net')

@push('styles')
	<link rel='stylesheet' type='text/css' href='{{ asset("/css/thread.css") }}'>
 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
 	<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@push('scripts')
  <script type='text/javascript' src='{{ asset("/js/moment_js/moment.js") }}'></script>
  <script type='text/javascript' src='{{ asset("/js/moment_js/es.js") }}'></script>
  <script type='text/javascript' src='{{ asset("/js/reply.js") }}'></script>
  <script type="text/javascript">
		$(document).ready(function() {
		  replyFormat();
		});
	</script>
@endpush
@section('postSection')
	<div id="threadBody">
    <h1>{{ $threadTitle }}</h1>
    @foreach($threadData as $thread)
    <div class="threadMsg">
      <div class="msgInfo">
        <label class="msgTime">{{ date('d/m/Y', strtotime($thread->msg_created_at)) }}</label>
        <label>, {{ date('H:i', strtotime($thread->msg_created_at)) }}</label>
        <label class="msgId">#{{ $thread->on_thread_id }}</label>
      </div>
      <table class="msgBody" cellspacing="0">
        <tr>
          <td class="userInfo">
            <label class="userName"><a href="/profile/{{ $thread->name }}" class="userProf">{{ $thread->name }}</a></label>
            <br>
            <label class="userTitle">{{ $thread->user_title }}</label>
            <br>
            <img class="userPic" src="{{ $thread->user_pic }}">
            <br>
            <b>Registro: </b><label class="userRegDate">{{ strftime('%b %Y', strtotime($thread->reg_date)) }}</label>
            <br>
            <b>Mensajes: </b><label class="userMsgCount">{{ $thread->msg_count }}</label>
          </td>
          <td class="msgText">
            {!! $thread->content !!}
          </td>
        </tr>
      </table>
    </div>
    @endforeach
    @if ($threadData->hasPages())
      <div style="text-align: center;">
        <div class="pageSelector">
          {{$threadData->links()}}
        </div>
      </div>
    @endif
    @if (Auth::check())
      <div id="replyPost">
  	    <div id="replyButtons">
            <button class="wysiwyg" type="button"><i class="fas fa-bold"></i></button>
            <button class="wysiwyg" type="button"><i class="fas fa-italic"></i></button>
            <button class="wysiwyg" type="button"><i class="fas fa-underline"></i></button>
            |
            <button class="wysiwyg" type="button"><i class="fas fa-align-left"></i></button>
            <button class="wysiwyg" type="button"><i class="fas fa-align-center"></i></button>
            <button class="wysiwyg" type="button"><i class="fas fa-align-right"></i></button>
            <button class="wysiwyg" type="button"><i class="fas fa-align-justify"></i></button>
            |
            <button class="wysiwyg" type="button"><i class="fas fa-list-ul"></i></button>
            <button class="wysiwyg" type="button"><i class="fas fa-list-ol"></i></button>
            |
            <button class="wysiwyg" type="button"><i class="fas fa-image"></i></button>
            <button class="wysiwyg" type="button"><i class="fas fa-video"></i></button>
            <button class="wysiwyg" type="button"><i class="fas fa-link"></i></button>
  	    </div>
        <div name="replyMsg" contenteditable="true" data-placeholder="Introduce tu respuesta ..."></div>
        <form action='/sendReply' method="POST" onsubmit="return replyCorrect()">
          @csrf
          <input type="hidden" name="thread_id">
          <input type="hidden" name="creator">
          <input type="hidden" name="content">
          <input type="submit" id="replyButton" value="Responder">
        </form>
      </div>
    @endif
    </div>
  </div>
@stop