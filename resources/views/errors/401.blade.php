@extends('errors.minimal')

@section('title', 'Error 401: Algo ha ido mal')
@section('code', '401')
@section('error', 'Requiere autorización')
@section('description', 'La página que intentas solicitar no se encuentra disponible o requiere estar autorizado.')
@section('tryout_1', 'Utiliza el mapa web del sitio para navegar')
@section('tryout_2', 'Ponte en contacto con nosotros: support@tuforo.net')
@section('tryout_3', 'Vuelve a la página de inicio del sitio')