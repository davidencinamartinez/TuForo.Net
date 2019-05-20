<?php
  $msgData = json_decode($threadData);
  setlocale(LC_TIME, 'es_ES');
?>
@extends('main')

@section('title', '-')

@push('styles')
	<link rel='stylesheet' type='text/css' href='{{ asset("/css/thread.css") }}'>
 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
 	<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
@push('scripts')
  <script src='{{ asset("/js/thread.js") }}'></script>
  <script type='text/javascript' src='{{ asset("/js/moment_js/moment.js") }}'></script>
  <script type='text/javascript' src='{{ asset("/js/moment_js/es.js") }}'></script>
@endpush
@section('postSection')
	<script type="text/javascript">
		$(document).ready(function() {
		  setTitle();
		  dateConvertMsg();
		  replyFormat();
		});
	</script>
	<div id="threadBody">
    <h1>{!! $msgData[0]->thread !!}</h1>
    @foreach($msgData as $msgData)
    <div class="threadMsg">
      <div class="msgInfo">
        <label class="msgTime">{{ date('d/m/Y', strtotime($msgData->msg_created_at)) }}</label>
        <label>, {{ date('H:i', strtotime($msgData->msg_created_at)) }}</label>
        <label class="msgId">#{{ $msgData->on_thread_id }}</label>
      </div>
      <table class="msgBody" cellspacing="0">
        <tr>
          <td class="userInfo">
            <label class="userName">{{ $msgData->name }}</label>
            <br>
            <label class="userTitle">{{ $msgData->user_title }}</label>
            <br>
            <img class="userPic" src="{{ $msgData->user_pic }}">
            <br>
            <b>Registro: </b><label class="userRegDate">{{ strftime('%b %Y', strtotime($msgData->created_at)) }}</label>
            <br>
            <b>Mensajes: </b><label class="userMsgCount">{{ $msgData->msg_count }}</label>
          </td>
          <td class="msgText">
            {!! $msgData->content !!}
          </td>
        </tr>
      </table>
    </div>
    @endforeach
    @if (Auth::check())
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