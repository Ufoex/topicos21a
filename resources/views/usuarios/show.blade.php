@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="jumbotron row justify-content-center " style="width: 35rem;">
            <h1 class="display-4">{{$user->name}}</h1>
            <p class="lead">Correo: {{$user->email}}</p>
            <a class="btn btn-primary btn-lg" href="{{route('usuario.create')}}" role="button">{{__('custom.return')}}</a>
        </div>
    </div>
@endsection
