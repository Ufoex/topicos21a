@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="float-left">{{__('custom.list-user')}}</h2>
                <a href="{{route('register')}}">
                    <button type="button" class="btn btn-success float-right">{{__('custom.add-user-button')}}</button>
                </a>
            </div>
            <div class="card-body">

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">{{__('custom.name')}}</th>
                        <th scope="col">{{__('custom.email')}}</th>
                        <th scope="col">{{__('custom.actions')}}</th>

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
                                    <a href="{{route('usuarios.edit', $user)}}">
                                        <button type="button" class="btn btn-primary">Editar</button>
                                    </a>
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
        </div>
    </div>
@endsection
