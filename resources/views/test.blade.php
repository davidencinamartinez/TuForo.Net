@extends('main')

@section('title', ' - Test')

@push('styles')
	<link rel='stylesheet' type='text/css' href='{{ asset("css/subject.css") }}'>
@endpush
@section('postSection')
    <div id='subjectPanel'>
    	<div id='subject'>
    		<table>
    			<tr>
    				<td>
    					<img id='subjectImg' src='https://cdn.pixabay.com/photo/2012/04/12/23/47/car-30984_960_720.png'>
    					<label>Bienvenido a TuForo.Net</label>
    				</td>
    				<td>
    					<label><?php echo date('d-m-Y H:m:s'); ?></label>
    				</td>
    				<td>
    					PEDRO
    				</td>
    			</tr>	
    		</table>
    	</div>
    </div>
@stop