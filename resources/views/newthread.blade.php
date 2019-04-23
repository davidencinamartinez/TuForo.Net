@extends('main')

@section('title', 'TuForo.Net - Nuevo Hilo')

@push('styles')
	<link rel='stylesheet' type='text/css' href='{{ asset("css/newthread.css") }}'>
@endpush
@push('scripts')
    <script src='{{ asset("js/newthread.js") }}'></script>
@endpush
@section('postSection')
<script type="text/javascript">
	function manolo() {
		var data = <?php print_r($mydata) ?>;
		
		console.log(data[0].username);
		$('button').after('<p>'+data[0].username+'</p>');
	}
</script>

<button onclick="manolo()">TESTING</button>
@stop