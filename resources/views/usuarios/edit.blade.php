@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <form action="{{route('usuarios.update',$user->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" value="{{$user->name}}"  placeholder="Ingresa tu nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" name="email" value="{{$user->email}}"  placeholder="Ingresa tu correo" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{route('usuario.create')}}"><button type="button" class="btn btn-danger">Cancelar</button></a>
                </form>
            </div>
        </div>
    </div>
@endsection
