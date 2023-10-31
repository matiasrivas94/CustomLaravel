@extends('adminlte::page')

@section('title', 'ROLES')

@section('content_header')
    <h1>Lista de roles</h1>
@stop

@section('content')
<div class="card">   

    <div class="card-header">
        <a href="{{ route('admin.roles.create') }}" class="btn btn-success">Crear Rol</a>
    </div>
    
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>

                        <!--BOTONES-->
                        <td width="10px">
                            <a href="{{ route('admin.roles.edit',$role) }}" class="btn btn-primary btn-sm">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{ route('admin.roles.destroy',$role->id) }}" method="POST">
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
            {{-- {{ $role->links() }} --}}
        </div>
    </div>
   
   </div>
@stop