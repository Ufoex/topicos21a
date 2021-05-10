@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Lista de Usuarios <a href="{{route('register')}}">
                <button type="button" class="btn btn-success float-right">Agregar usuario</button>
            </a></h2>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Acciones</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <form action="{{route('usuarios.destroy', $user)}}" method="POST">
                            <a href="{{route('usuarios.edit', $user)}}"><button type="button" class="btn btn-primary">Editar</button></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>
@endsection
