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
        <i class="text-gray-900 fab fa-laravel">Sistema de blog autoadministrable en Laravel 10</i>
        <i class="fab fa-laravel"></i> <br>
        <i class="text-gray-900 fas fa-box">Laravel-AdminLTE</i>
    </h3>

    <br>

    <h1>SEGUNDO PROYECTO:</h1>
    <h3>
        <i class="text-gray-900 fas fa-users">Sistema de Roles y Permisos</i> 
        <i class="text-gray-900 fas fa-users"></i><br>
        <i class="text-gray-900 fas fa-box">Paquete SPATIE</i>
    </h3>

    <br>

    <h1>TERCER PROYECTO:</h1>
    <h3>
        <i class="text-gray-900 fas fa-cloud-upload-alt">Api Rest Con Postam</i> 
        <i class="text-gray-900 fas fa-cloud-upload-alt"></i><br>
        <i class="text-gray-900 fas fa-box">Modelo Person</i>
    </h3>

    <br>

    <h1>CUARTO PROYECTO:</h1>
    <h3>
        <i class="text-gray-900 fas fa-file-alt">Api Rest con Pruebas Unitarias</i> 
        <i class="text-gray-900 fas fa-file-alt"></i><br>
        <i class="text-gray-900 fas fa-box">Modelo Restaurant</i>
    </h3>

    <br>
    
    <h1>ADICIONAL:</h1>
    <h3>
        <i class="text-gray-900 fas fa-sign-in-alt">Sistema de autenticación de usuarios(LOGIN)</i><br>
        <i class="text-gray-900 fas fa-box">Paquete de traducción al español</i>
    </h3>

@stop
