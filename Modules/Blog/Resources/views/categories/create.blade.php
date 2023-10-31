@extends('adminlte::page')

@section('title', 'CATEGORIES')

@section('css')
<link rel="stylesheet" href="{{mix('resources/css/app.css')}}">
@stop

@section('content_header')
    <h1>CREAR CATEGORIA</h1>
@stop

@section('content')
   <div class="container py-8">   

        <div class="card">
            <div class="card-body">

                <form action="{{ route('blg.categories.store') }}" method="POST" autocomplete="off">
                    @csrf

                    <div class="from-group">
                        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre:<strong>*</strong></label>
                        <input type="text" name="nombre" id="nombre" maxlength="120" minlength="4" required
                            value="{{ old('name') }}" placeholder="Ingrese un Nombre"
                            class="form-control">

                        @error('nombre')
                            <span clas="text-danger">{{menssage}} </span>
                        @enderror
                    </div>

                    <div class="from-group">
                        <label for="slug" class="block text-sm font-medium text-gray-700">Slug:<strong>*</strong></label>
                        <input type="text" name="slug" id="slug" maxlength="120" minlength="4" required
                            value="{{ old('slug') }}" placeholder="Ingrese el Slug"
                            class="form-control">

                        @error('slug')
                                <span clas="text-danger">{{menssage}} </span>
                        @enderror
                    </div>

                    <div class="from-group">
                        <button type="submit" class="btn btn-success">
                            Crear
                        </button>
                    </div>

                </form>
            </div>
        </div>

   </div>
@stop
