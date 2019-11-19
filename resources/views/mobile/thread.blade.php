@extends('mobile.main')

@section('title', $threadTitle)

@push('styles')
	<link rel='stylesheet' type='text/css' href='{{ asset("/css/mobile/thread.css") }}'>
@endpush
@push('scripts')
	<script type='text/javascript' src='{{ asset("/js/reply.js") }}'></script>
@endpush
@section('postSection')
	<script type="text/javascript">
		$(document).ready(function() {
		  replyFormat();
		});
	</script>
	<h1 id="threadTitle">{{ $threadTitle }}</h1>
    @foreach($threadData as $thread)
		<ul class="msgPost">
			<li class="userInfo">
				<img class="userPic" src="{{ $thread->user_pic }}">
				<label class="userName">{{ $thread->name }}</label>
				<br>
				<label class="msgTime">{{ date('d/m/Y', strtotime($thread->msg_created_at)) }}</label><label>, {{ date('H:i', strtotime($thread->msg_created_at)) }}</label>
			</li>
			<li class="msgText">
			  {!! $thread->content !!}
			</li>
		</ul>
	@endforeach
	@if($threadData->count() >= 25)
		<div style="text-align: center;">
		  <div class="pageSelector">
		    {{$threadData->links()}}
		  </div>
		</div>
	@endif
@stop