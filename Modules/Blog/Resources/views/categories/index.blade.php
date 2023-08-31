@extends('adminlte::page')

@section('title', 'CATEGORIES')

@section('css')
<link rel="stylesheet" href="{{mix('resources/css/app.css')}}">
@stop

@section('content_header')
    <h1>LISTA DE CATEGORIAS</h1>
@stop

@section('content')
   <div class="card">   

    <div class="card-header">
        <a href="{{ route('blg.categories.create') }}" class="btn btn-success">Crear Categoria</a>
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
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>

                        <!--BOTONES-->
                        <td width="10px">
                            <a href="{{ route('blg.categories.edit',$category) }}" class="btn btn-primary btn-sm">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{ route('blg.categories.destroy',$category->id) }}" method="POST">
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
            {{ $categories->links() }}
        </div>
    </div>
   
   </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
