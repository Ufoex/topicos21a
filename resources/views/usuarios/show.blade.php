@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <h5 class="card-header">{{__('custom.info')}}</h5>
            <div class="card-body">
                <h5 class="card-title">{{$user->name}}</h5>
                <p class="card-text">Correo: {{$user->email}}</p>
                <a class="btn btn-primary btn-lg" href="{{route('usuario.create')}}" role="button">{{__('custom.return')}}</a>
            </div>
        </div>
    </div>
@endsection
