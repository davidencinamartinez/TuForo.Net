@extends('main')

@section('title', 'Bienvenido a TuForo.Net')

@push('styles')
	<link rel='stylesheet' type='text/css' href='{{ asset("css/success.css") }}'>
@endpush
@push('scripts')
@endpush
@section('postSection')
	<div id="successPanel">
		<p>Enhorabuena!</p>
	</div>
@stop