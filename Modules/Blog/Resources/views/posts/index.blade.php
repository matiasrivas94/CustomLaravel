@extends('adminlte::page')

@section('title', 'POSTS')

@section('css')
<link rel="stylesheet" href="{{mix('resources/css/app.css')}}">
@stop

@section('content_header')
    <h1>LISTA DE POSTS</h1>
@stop

@section('content')
    <div class="card">   

    <div class="card-header">
        {{-- <a class="btn btn-success">Crear Post</a> --}}
        <a href="{{ route('blg.posts.create') }}" class="btn btn-success">Crear Post</a>
    </div>
    
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>CATEGORIE</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->name }}</td>
                        <td>{{$post->category->name ?? 'Sin Asignar'}}</td>

                        <!--BOTONES-->
                        <td width="10px">
                            <a href class="btn btn-primary btn-sm">Editar</a>
                        </td>
                        <td width="10px">
                            <form action method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          
        </table>
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
   
   </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


<!-- CODIGO VIEJO
{{-- @section('content') --}}
   <div class="container py-8">   

       <div class="grid grid-cols-1 gap-6 bg-blue md:grid-cols-2">

        {{-- @foreach ($posts as $post ) --}}
            {{-- <article class="w-full bg-center bg-cover h-80" sytle="background-image: url({{ Storage::url($post->image->url)}})"> --}}
            <article class="w-full bg-center bg-cover h-80">
                <div class="flex flex-col justify-center px-8 bg-red">

                    {{-- <div>
                        @foreach ($post->tags as tag)
                            <a href="" class="inline-block h-6 px-3 bg-{{$tag->color}}-600 text-white rounded">
                                {{$tag->name}}
                            </a>
                        @endforeach
                    </div> --}}

                    <h1 class="leading-8 text-white text-4x1 font-blod">
                        {{-- <a href="{{ route('blg.posts.show', $post->id) }}">
                            {{$post->name}}
                            {{$post->category->name}}
                        </a> --}}
                    </h1>

                </div>
            </article>
        {{-- @endforeach --}}

       </div>

        <div class="mt-4">
            {{-- {{ $posts->links() }} --}}
        </div>

   </div>
{{-- @stop --}}
-->