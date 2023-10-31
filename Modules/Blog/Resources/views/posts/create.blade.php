@extends('adminlte::page')

@section('title', 'POSTS')

@section('css')
<link rel="stylesheet" href="{{mix('resources/css/app.css')}}">
@stop

@section('content_header')
    <h1>CREAR POST</h1>
@stop

@section('content')
   <div class="container py-8">   

        <div class="card">
            <div class="card-body">

                <form action method="POST" autocomplete="off">
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
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Categoria:<strong>*</strong></label>
                        <select id="category_id" name="category_id" required
                            class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm disabled:bg-gray-300">
                            <option value="" hidden></option>
                            @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}"
                                {{ $categoria->id == (old('category_id')) ? 'selected' : '' }}>
                                {{ $categoria->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('category_id')
                                <span clas="text-danger">{{menssage}} </span>
                        @enderror
                    </div>

                    <div class="from-group">
                        <label for="state" class="block text-sm font-medium text-gray-700">Estado:<strong>*</strong></label>
                        
                        <label class="block text-sm font-medium text-gray-700">
                            <input type="radio" name="state" value="1" 
                                class="text-indigo-500 form-radio focus:border-indigo-500 focus:ring-0"
                                {{old('state')== 1 ? 'checked' : ''}}>
                            <span class="ml-2">Borrador</span>
                        </label>
                        <label class="block text-sm font-medium text-gray-700">
                            <input type="radio" name="state" value="2" 
                                class="text-indigo-500 form-radio focus:border-indigo-500 focus:ring-0"
                                {{old('state')== 2 ? 'checked' : ''}}>
                            <span class="ml-2">Publicado</span>
                        </label>                        
                    </div>

                    <div class="from-group">
                        <label for="extract" class="block text-sm font-medium text-gray-700">Extract:<strong>*</strong></label>
                        <textarea id="extract" name="extract" maxlength="1200" rows="5"
                            class="form-contro"
                            placeholder="Ingrese extract...">{{ old('extract') }}</textarea>

                        @error('extract')
                                <span clas="text-danger">{{menssage}} </span>
                        @enderror
                    </div>

                    <div class="from-group">
                        <label for="body" class="block text-sm font-medium text-gray-700">Body:<strong>*</strong></label>
                        <textarea id="body" name="body" maxlength="1200" rows="5"
                            class="form-contro"
                            placeholder="Ingrese body...">{{ old('body') }}</textarea>

                        @error('body')
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