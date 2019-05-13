@extends('main')

@section('title', 'Bienvenido a TuForo.Net')

@push('styles')
	<link rel='stylesheet' type='text/css' href='{{ asset("css/thread.css") }}'>
@endpush
@push('scripts')
  <script src='{{ asset("js/thread.js") }}'></script>
  <script type='text/javascript' src='{{ asset("js/moment_js/moment.js") }}'></script>
  <script type='text/javascript' src='{{ asset("js/moment_js/es.js") }}'></script>
@endpush
@section('postSection')
  <?php
      $msgData = json_decode($threadData);
      setlocale(LC_ALL,'es_ES');
  ?>
  <script type="text/javascript">
    $(document).ready(function() {
      var data = <?php print_r($threadData) ?>;
      console.log(data);
    });
</script>
  <div id="threadBody">
    <h1>Bienvenido a TuForo.Net</h1>
    <div class="threadMsg">
      <div class="msgInfo">
        <label class="msgTime">Hoy, 14:00</label>
        <label class="msgId">#1</label>
      </div>
      <table class="msgBody" cellspacing="0">
        <tr>
          <td class="userInfo">
            <label class="userName">Administrador</label>
            <br>
            <label class="userTitle">⭐ Maestro del Foro ⭐</label>
            <br>
            <img class="userPic" src="storage/src/logos/logo128.png">
            <br>
            <b>Registro: </b><label class="userRegDate">Abril 2019</label>
            <br>
            <b>Mensajes: </b><label class="userMsgCount">3640</label>
          </td>
          <td class="msgText">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras luctus ante at elementum molestie. Nunc nec nibh nisi. In congue vehicula tellus, at scelerisque sem ornare eu. Praesent eu lacinia ipsum, ut varius nulla. Fusce a ornare turpis. Praesent porttitor, ligula vitae mattis pretium, dui nunc tempus massa, et ultrices lectus dui eget metus. In vel finibus nisi. Nullam malesuada rutrum metus non efficitur. Nunc id mi justo. Etiam mollis, velit vitae faucibus consequat, nisi tortor interdum purus, id finibus eros sem nec massa. Nullam eu lorem tincidunt, eleifend diam et, cursus dolor. Cras maximus quis dolor quis viverra. Quisque ante nisl, condimentum sed sagittis quis, viverra sed odio. Cras rhoncus malesuada tortor nec maximus. Nulla condimentum hendrerit libero. Donec urna turpis, imperdiet quis placerat sit amet, bibendum vitae velit.
            <iframe class="ytVideo" src="https://www.youtube.com/embed/C0DPdy98e4c" frameborder="0" align="middle" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
            Ut id ante sem. Vestibulum gravida magna eget consectetur cursus. Etiam pretium bibendum risus vitae rutrum. Etiam malesuada aliquet diam vitae facilisis. Quisque lacus nulla, egestas quis placerat at, malesuada quis eros. Pellentesque molestie nisi ut mollis maximus. Sed feugiat sed augue nec faucibus. Pellentesque justo urna, egestas et accumsan ut, dictum sed quam. Phasellus et nisi egestas, pretium leo in, elementum sem.
            </p>
          </td>
        </tr>
      </table>
    </div>
    @foreach($msgData as $msgData)
    <div class="threadMsg">
      <div class="msgInfo">
        <label class="msgTime">{{ $msgData->created_at }}</label>
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
            <b>Registro: </b><label class="userRegDate">{{ date('F Y', strtotime($msgData->created_at)) }}</label>
            <br>
            <b>Mensajes: </b><label class="userMsgCount">{{ $msgData->msg_count }}</label>
          </td>
          <td class="msgText">
            <p msgId="{{ $msgData->on_thread_id }}">
              <script type="text/javascript">
                $('p[msgId={{ $msgData->on_thread_id }}]').html(atob('{{ $msgData->content }}'));
              </script>
            </p>
          </td>
        </tr>
      </table>
    </div>
    @endforeach
  </div>
@stop