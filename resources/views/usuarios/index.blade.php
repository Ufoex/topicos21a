@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="float-left">{{__('custom.list-user')}}</h2>
                @if ($search)
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div>
                            An example alert with an icon
                        </div>
                    </div>
                @endif
                <a href="{{route('usuarios')}}">
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

                                <a href="{{route('usuarios.show', $user)}}">
                                    <button type="button" class="btn btn-dark">{{__('custom.show')}}</button>
                                </a>
                                <a href="{{route('usuarios.edit', $user)}}">
                                    <button type="button" class="btn btn-primary">Editar</button>
                                </a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">
                                    {{__('custom.delete-button')}}
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{__('custom.alert-message')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{__('custom.aler-menssage2')}}
                    </div>
                    <div class="modal-footer">
                        <form action="{{route('usuarios.destroy', $user)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('custom.cancel-button')}}</button>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>

                    </div>
                </div>
            </div>
    </div>
@endsection
