@extends('errors.minimal')

@section('title', 'Error 500: Algo ha ido mal')
@section('code', '500')
@section('error', 'Error en el Servidor')
@section('description', 'El servidor tarda mucho en cargar. Puede haber colapsado tras recibir muchas peticiones.')
@section('tryout_1', 'Actualiza la página cada cierto tiempo')
@section('tryout_2', 'Ponte en contacto con nosotros: support@tuforo.net')
@section('tryout_3', 'Vuelve a la página de inicio del sitio')