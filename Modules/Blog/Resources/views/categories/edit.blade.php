@extends('adminlte::page')

@section('title', 'CATEGORIES')

@section('css')
<link rel="stylesheet" href="{{mix('resources/css/app.css')}}">
@stop

@section('content_header')
    <h1>EDITAR CATEGORIA</h1>
@stop

@section('content')
   <div class="container py-8">   
    <alert-message class="my-3"></alert-message>
    <div class="card">
        <div class="card-body">
            
            <form action="{{ route('blg.categories.update',$category) }}" method="PUT" autocomplete="off">  
                @csrf
                @method('put')

                <div class="from-group">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre:<strong>*</strong></label>
                    <input type="text" name="name" id="nombre" maxlength="120" minlength="4" required
                            value="{{  old('name') ?? ($category ? $category->name: '') }}" placeholder="Ingrese un Nombre"
                         class="form-control">

                    @error('nombre')
                        <span clas="text-danger">{{menssage}} </span>
                    @enderror
                </div>

                <div class="from-group">
                    <label for="slug" class="block text-sm font-medium text-gray-700">Slug:<strong>*</strong></label>
                    <input type="text" name="slug" id="slug" maxlength="120" minlength="4" required
                        value="{{  old('slug') ?? ($category ? $category->slug: '') }}" placeholder="Ingrese el Slug"
                        class="form-control">

                    @error('slug')
                            <span clas="text-danger">{{menssage}} </span>
                    @enderror
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

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
