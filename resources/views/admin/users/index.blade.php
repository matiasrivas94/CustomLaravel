@extends('adminlte::page')

@section('title', 'USUARIOS')

@section('css')
<link rel="stylesheet" href="{{mix('resources/css/app.css')}}">
@stop

@section('content_header')
    <h1>LISTA DE USUARIOS</h1>
@stop

@section('content')
<div class="card">   

    <div class="card-header">
        <button id="toggleFilters"
            class="mr-1 inline-flex justify-center py-2 px-2 mt-2 sm:mt-0 items-center border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-400 hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 ">
            <i class="fas fa-filter text-white pr-1"></i>Filtros
        </button>
    </div>

    <div id="filters">
        <form action="{{ route('admin.users.index') }}" method="get" class="border rounded px-2 py-3 shadow-sm m-1 bg-gray-50">

            {{-- Filters Section --}}
            <div class="grid grid-cols-12 gap-4">

                {{-- Buscar Nombre-Apellido --}}
                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                    <label for="search" class="block text-sm font-medium text-gray-700">Buscar</label>
                    <input type="text" name="search" maxlength="30" minlength="3" value="{{ request()->get('search') ?? '' }}"
                        placeholder="Buscar por nombre o emial"
                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                {{-- BOTONES --}}
                <div class="col-span-12  place-self-end">
                    <button type="submit" class="inline-flex justify-center text-white bg-blue-500 hover:bg-blue-600
                            focus:ring-blue-600
                            font-semibold text-sm mr-4 py-2 px-2 rounded shadow-md focus:ring-2 focus:ring-offset-1 focus:outline-none">
                        Buscar
                    </button>

                    <a href="{{route('admin.users.index')}}" class="inline-flex justify-center text-white bg-gray-400 hover:bg-gray-500
                            focus:ring-gray-500
                            font-semibold text-sm mr-4 py-2 px-2 rounded shadow-md focus:ring-2 focus:ring-offset-1
                            focus:outline-none">
                        Limpiar
                    </a>
                </div>
            </div>
        </form>
    </div>
    
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                </tr>
            </thead>
            <tbody>
                @if (count($users)>0)
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>

                        <!--BOTONES-->
                        <td width="10px">
                            <a href="{{ route('admin.users.edit',$user) }}" class="btn btn-primary btn-sm">Editar</a>
                        </td>
                    </tr>
                @endforeach

                @else
                <caption class="italic text-gray-500 py-8 text-center">
                    No se encontraron resultados!
                </caption>
                @endif

            </tbody>
          
        </table>
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
   
   </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    $("#toggleFilters").click(function () {
        $("#filters").slideToggle("fast");
    });

</script>
@stop

