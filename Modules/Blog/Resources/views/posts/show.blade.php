@extends('adminlte::page')

@section('title', 'POSTS')

@section('css')
<link rel="stylesheet" href="{{mix('resources/css/app.css')}}">
@stop

@section('content_header')
    <h1 class="text-4x1 font-blond text-gray-600">POSTS:{{ $post->name }}</h1>
    <div class="text-lg text-gray-500 mb-2">
        {{ $post->extract }}
    </div>
@stop

@section('content')

<div class="container mx-auto pb-8">
    <div class="grid grid-cols-1 lg:grid-col-3 grap-6">

        {{-- Contenido Principal--}}
        <div class="lg:grid-col-2">
            {{-- <figure>
                <img src="{{Storage::url($post->image->url)}}" alt="">
            </figure> --}}

            <div class="text-base text-gray-500 mt-4">
                {{$post->body}}
            </div>

        </div>

        {{-- Contenido Relacionado--}}
        <aside>
            <h1>Mas en: {{$post->category->name}} </h1>
            <ul>
                @foreach($post as $p)
                    <li class="mb-4">
                        <a href="{{ route('blg.posts.category', $post->id) }}">
                            <span class="ml-2 text-gray-600">   Nombre:{{$post->category->name}}</span>
                            <br>
                            <span class="ml-2 text-gray-500">   Slug:{{$post->category->slug}}</span>
                        </a>
                    </li>
                    <div class="px-6 pt-4 pb-2">
                        @foreach($post->tags as $tag)
                            <a href="{{route('blg.posts.tag', $tag)}}" class="inline-block h-6 px-3 bg-{{$tag->color}}-600 text-blue rounded">
                                TAG
                            </a>
                        @endforeach
                    </div>

                @endforeach
            </ul>

        </aside>

    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop