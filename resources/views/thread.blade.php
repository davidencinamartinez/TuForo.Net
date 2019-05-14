@extends('main')

@section('title', '{{ json_decode($threadData, true)[0]["thread"] }}')

@push('styles')
	<link rel='stylesheet' type='text/css' href='{{ asset("/css/thread.css") }}'>
@endpush
@push('scripts')
  <script src='{{ asset("/js/thread.js") }}'></script>
  <script type='text/javascript' src='{{ asset("/js/moment_js/moment.js") }}'></script>
  <script type='text/javascript' src='{{ asset("/js/moment_js/es.js") }}'></script>
@endpush
@section('postSection')
  <?php
      $msgData = json_decode($threadData);
      setlocale(LC_TIME, 'es_ES');
  ?>
  <script type="text/javascript">
    $(document).ready(function() {
      var data = <?php print_r($threadData) ?>;
      document.title = data[0].thread;
      dateConvertMsg();
    });
</script>
  <div id="threadBody">
    <h1>{{ json_decode($threadData, true)[0]['thread'] }}</h1>
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
  </div>
@stop