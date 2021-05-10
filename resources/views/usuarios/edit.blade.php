@extends('layouts.app')

@section('content')
    <div class="container row justify-content-center">
        <div class="card " style="width: 25rem;">
            <div class="card-header">{{__('pagination.edit')}}</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-11 m-2">
                        <form action="{{route('usuarios.update',$user->id)}}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">{{__('custom.name')}}</label>
                                <input type="text" class="form-control" name="name" value="{{$user->name}}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">{{__('custom.email')}}</label>
                                <input type="email" class="form-control" name="email" value="{{$user->email}}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">{{__('custom.password')}}</label>
                                <input type="text" class="form-control" name="password" value="{{$user->password}}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">{{__('custom.update-button')}}</button>
                            <a href="{{route('usuario.create')}}"><button type="button" class="btn btn-danger">
                                {{__('custom.cancel-button')}}</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
