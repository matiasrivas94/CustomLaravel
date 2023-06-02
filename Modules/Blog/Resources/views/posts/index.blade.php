@extends('adminlte::page')

@section('title', 'POSTS')

@section('css')
<link rel="stylesheet" href="{{mix('resources/css/app.css')}}">
@stop

@section('content_header')
    <h1>POSTS</h1>
@stop

@section('content')
   <div class="container py-8">   

       <div class="grid grid-cols-1 gap-6 bg-blue md:grid-cols-2">

        @foreach ($posts as $post )
            {{-- <article class="w-full bg-center bg-cover h-80" sytle="background-image: url({{ Storage::url($post->image->url)}})"> --}}
            <article class="w-full bg-center bg-cover h-80">
                <div class="flex flex-col justify-center w-full h-full px-8">

                    {{-- <div>
                        @foreach ($post->tags as tag)
                            <a href="" class="inline-block h-6 px-3 bg-{{$tag->color}}-600 text-white rounded">
                                {{$tag->name}}
                            </a>
                        @endforeach
                    </div> --}}

                    <h1 class="leading-8 text-white text-4x1 font-blod">
                        <a href="">
                            {{$post->name}}
                            {{$post->tags}}
                        </a>
                    </h1>

                </div>
            </article>
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
