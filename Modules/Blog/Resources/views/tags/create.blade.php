@extends('adminlte::page')

@section('title', 'TAGS')

@section('content_header')
    <h1>Crear Tag</h1>
@stop

@section('content')
<div class="container py-8">   

    <div class="card">
        <div class="card-body">

            <form action="{{ route('blg.tags.store') }}" method="POST" autocomplete="off">
                @csrf

                <div class="from-group">
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre:<strong>*</strong></label>
                    <input type="text" name="nombre" id="nombre" maxlength="120" minlength="4" required
                        value="{{ old('nombre') }}" placeholder="Ingrese un Nombre"
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
                    <label for="color" class="block text-sm font-medium text-gray-700">Color:<strong>*</strong></label>
                    <select name="color" id="" class="form-control">
                            <option value="red">Rojo</option>
                            <option value="green" selected>Verde</option>
                            <option value="blue">Azul</option>
                    </select>

                    @error('color')
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