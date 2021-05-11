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
                                <label for="name">{{ __('Name') }}</label>

                                <div>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('E-Mail Address') }}</label>

                                <div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" >{{ __('Password') }}</label>

                                <div >
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{__('custom.password')}}" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
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
