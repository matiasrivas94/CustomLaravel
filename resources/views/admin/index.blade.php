@extends('adminlte::page')

@section('title', 'Laravel')

@section('css')
<link rel="stylesheet" href="{{mix('resources/css/app.css')}}">
@stop


@section('content_header')
    <h1 class="text-3xl font-bold underline" >MIS PROYECTOS REALIZADOS</h1>
@stop

@section('content')

    <h1>PRIMER PROYECTO:</h1>
    <h3>
        <i class="fab fa-laravel text-gray-900">Sistema de blog autoadministrable en Laravel 10</i>
        <i class="fab fa-laravel"></i> <br>
        <i class="fas fa-box text-gray-900">Laravel-AdminLTE</i>
    </h3>

    <br>

    <h1>SEGUNDO PROYECTO:</h1>
    <h3>
        <i class="fas fa-users text-gray-900">Sistema de Roles y Permisos</i> 
        <i class="fas fa-users text-gray-900"></i><br>
        <i class="fas fa-box text-gray-900">Paquete SPATIE</i>
    </h3>
    <br>

    <h1>ADICIONAL:</h1>
    <h3>
        <i class="fas fa-sign-in-alt text-gray-900">Sistema de autenticación de usuarios(LOGIN)</i><br>
        <i class="fas fa-box text-gray-900">Paquete de traducción al español</i>
    </h3>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
