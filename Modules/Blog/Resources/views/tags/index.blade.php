@extends('adminlte::page')

@section('title', 'TAGS')

@section('content_header')
    <h1>Lista de Tags</h1>
@stop

@section('content')
<div class="card">   

    <div class="card-header">
        <a href="{{ route('blg.tags.create') }}" class="btn btn-success">Crear Tag</a>
    </div>
    
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>

                        <!--BOTONES-->
                        <td width="10px">
                            <a href="{{ route('blg.tags.edit',$tag->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{ route('blg.tags.destroy',$tag->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
