@extends('adminlte::page')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Panel</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @else
                    <div class="alert alert-success">
                        Estás conectado!
                    </div>       
                @endif                
            </div>
        </div>
    </div>    
</div>
    
@endsection