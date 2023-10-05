@extends('adminlte::page')

@section('title', 'USUARIO')

@section('css')
<link rel="stylesheet" href="{{mix('resources/css/app.css')}}">
@stop

@section('content_header')
    <h1>EDITAR USUARIO</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong> {{session('info')}} </strong>
        </div>
    @endif

   <div class="container py-8">   
    <alert-message class="my-3"></alert-message>
    <div class="card">
        <div class="card-body">
            
            {{-- <form action="{{ route('admin.users.edit',$user) }}" method="PUT" autocomplete="off">  
                @csrf
                @method('put') --}}

                <div class="from-group">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre:<strong>*</strong></label>
                    <input type="text" name="name" id="nombre" maxlength="120" minlength="4" required
                            value="{{  old('name') ?? ($user ? $user->name: '') }}" placeholder="Ingrese un Nombre"
                         class="form-control">

                    @error('nombre')
                        <span clas="text-danger">{{menssage}} </span>
                    @enderror
                </div>

                <div class="from-group">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email:<strong>*</strong></label>
                    <input type="email" name="email" id="email" maxlength="120" minlength="4" required
                        value="{{  old('email') ?? ($user ? $user->email: '') }}" placeholder="Ingrese un Email"
                        class="form-control">

                    @error('email')
                            <span clas="text-danger">{{menssage}} </span>
                    @enderror
                </div>
                <br>
                <div class="from-group">
                    <h3>Listado de Roles</h3>
                    {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
                        @foreach ($roles as $role)
                        <div>
                            <label>
                                {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                                {{ $role->name }}
                            </label>
                        </div>
                        @endforeach

                    {!! Form::submit('Asignar Rol', ['class' => 'btn btn-primary mt-2']) !!}

                    {!! Form::close() !!}
                </div>
            {{-- </form> --}}
        </div>
    </div>

   </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
