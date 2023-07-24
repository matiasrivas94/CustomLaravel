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
        <i class="fab fa-laravel"></i>
    </h3>
        
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
