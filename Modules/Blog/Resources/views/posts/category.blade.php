@extends('adminlte::page')

@section('title', 'CATEGORIES')

@section('css')
<link rel="stylesheet" href="{{mix('resources/css/app.css')}}">
@stop

@section('content_header')
    <div class="py-8">
        <h1 class="text-3xl font-bold text-center uppercase">CATEGORIES: {{$category->name}} </h1>
    </div>
@stop

@section('content')
   <div class="container py-8">   

       <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

       @foreach ($posts as $post)

            {{-- <x-card-post :post="$post"/> --}}
        
            <span class="ml-2 text-gray-600">   Usuario:{{$post->category->created_at}}</span>
            <span class="ml-2 text-gray-500">   Última Modificación:{{$post->category->updated_at}}</span>
            <span class="ml-2 text-gray-500">   Nombre:{{$post->category->name}}</span>
            
            {{-- <div class="px-6 pt-4 pb-2">
                @foreach($post->tags as $tag)
                    <a href="{{route('blg.posts.tag', $tag)}}" class="inline-block h-6 px-3 bg-{{$tag->color}}-600 text-white rounded">
                        {{$tag->name}}
                    </a>
                @endforeach
            </div> --}}

       @endforeach

       </div>

   </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
