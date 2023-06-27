@extends('adminlte::page')

@section('title', 'CATEGORIES')

@section('css')
<link rel="stylesheet" href="{{mix('resources/css/app.css')}}">
@stop

@section('content_header')
    <div class="py-8">
        <h1 class="uppercase text-center text-3xl font-bold">CATEGORIES: {{$category->name}} </h1>
    </div>
@stop

@section('content')
   <div class="container py-8">   

       <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

       @foreach ($posts as $post)
            <span class="ml-2 text-gray-600">   Usuario:{{$post->category->created_at}}</span>
            <span class="ml-2 text-gray-500">   Última Modificación:{{$post->category->updated_at}}</span>
            <span class="ml-2 text-gray-500">   Tags:{{$post->tags}}</span>
            
            {{-- <div>
                @foreach ($post->tags as tag)
                    <a href="" class="inline-block h-6 px-3 bg-{{$tag->color}}-600 text-white rounded">
                        {{$tag->name}}
                    </a>
                @endforeach
            </div> --}}

       @endforeach

       </div>

        <div class="mt-4">
            {{ $posts->links() }}
        </div>

   </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
