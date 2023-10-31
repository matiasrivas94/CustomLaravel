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
                        <td>{{$post->category->name ?? 'SIN ASIGNAR'}}</td>

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