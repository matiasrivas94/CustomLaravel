@extends('adminlte::page')

@section('title', 'TAGS')

@section('css')
<link rel="stylesheet" href="{{mix('resources/css/app.css')}}">
@stop

@section('content_header')
    <div class="py-8">
        <h1 class="uppercase text-center text-3xl font-bold">TAGS: {{$tag->name}} </h1>
    </div>
@stop

@section('content')
   <div class="container py-8">   

       <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            
        <span class="ml-2 text-gray-600">   Nombre:{{$tag->name}}</span>
        <span class="ml-2 text-gray-500">   Slug:{{$tag->slug}}</span>
        <span class="ml-2 text-gray-500">   Color:{{$tag->color}}</span>


       </div>

        <div class="mt-4">
            {{ $posts->links() }}
        </div>

   </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
