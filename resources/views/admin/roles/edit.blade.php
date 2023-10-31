@extends('adminlte::page')

@section('title', 'ROLES')

@section('content_header')
    <h1>Editar Rol</h1>
@stop

@section('content')
<div class="container py-8">   
    <alert-message class="my-3"></alert-message>
    <div class="card">
        <div class="card-body">
            
            <form action="{{ route('admin.roles.update',$role) }}" method="PUT" autocomplete="off">  
                @csrf
                @method('put')

                <div class="from-group">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre:<strong>*</strong></label>
                    <input type="text" name="name" id="nombre" maxlength="120" minlength="4" required
                            value="{{  old('name') ?? ($role ? $role->name: '') }}" placeholder="Ingrese un Nombre"
                         class="form-control">

                    @error('name')
                        <span clas="text-danger">{{menssage}} </span>
                    @enderror
                </div>

                <div class="from-group my-3">
                    <h4 class="block font-medium">Lista de Permisos</h4>
                    @foreach ($permissions as $permission)
                        <div>
                            <label>
                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                                {{ $permission->description }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="from-group">
                    <button type="submit" class="btn btn-success">
                        Actualizar
                    </button>
                </div>

            </form>
        </div>
    </div>

   </div>
@stop