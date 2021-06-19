@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="float-left">{{__('providers.providers')}}</h2>
                {{--                @if ($search)--}}
                {{--                    <div class="alert alert-primary d-flex align-items-center" role="alert">--}}
                {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"--}}
                {{--                             class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16">--}}
                {{--                            <path--}}
                {{--                                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>--}}
                {{--                        </svg>--}}
                {{--                        <div>--}}
                {{--                            An example alert with an icon--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                @endif--}}
                <button type="button" class="btn btn-success float-right" data-toggle="modal"
                        data-target="#add">
                    {{__('providers.add')}}
                </button>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <!-- Small button groups (default and split) -->
                        <th scope="col" class="text-center border-right border-left">{{__('custom.name')}}</th>
                        <th scope="col" class="text-center border-right">{{__('providers.rfc')}}</th>
                        <th scope="col" class="text-center border-right">{{__('providers.email')}}</th>
                        <th scope="col" class="text-center border-right">{{__('providers.address')}}</th>
                        <th scope="col" class="text-center border-right">{{__('providers.phone')}}</th>
                        <th scope="col" class="text-center border-right">{{__('custom.actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($proveedores as $proveedor)
                        <tr>
                            <td class="text-center border">{{$proveedor->name}}</td>
                            <td class="text-center border">{{$proveedor->rfc}}</td>
                            <td class="text-center border">{{$proveedor->email}}</td>
                            <td class="text-center border">{{$proveedor->direccion}}</td>
                            <td class="text-center border">{{$proveedor->telefono}}</td>
                            <td class="text-center border">
                                <button type="button" class="btn btn-dark" data-toggle="modal"
                                        data-target="#show{{$proveedor->id}}">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                    {{__('custom.show')}}
                                </button>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#edit{{$proveedor->id}}">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                    {{__('custom.edit-button')}}
                                </button>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#delete{{$proveedor->id}}">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    {{__('custom.delete-button')}}
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal mostrar -->
        @foreach($proveedores as $proveedor)
            <div class="modal fade" id="show{{$proveedor->id}}" tabindex="-1" role="dialog" aria-labelledby="delete"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{__('custom.info')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="card-title">{{__('providers.provider')}}</h5>
                            <p class="card-text">{{__('providers.name')}}: {{$proveedor->name}}</p>
                            <p class="card-text">{{__('providers.rfc')}}: {{$proveedor->rfc}}</p>
                            <p class="card-text">{{__('providers.email')}}: {{$proveedor->email}}</p>
                            <p class="card-text">{{__('providers.address')}}: {{$proveedor->direccion}}</p>
                            <p class="card-text">{{__('providers.phone')}}: {{$proveedor->telefono}}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{__('custom.back')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    <!-- Modal crear -->
        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{__('providers.add-provider')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-11 m-2">
                                <form method="POST" action="{{ route('proveedores.store') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name"
                                               class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                   class="form-control @error('name') is-invalid @enderror" name="name"
                                                   value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="rfc"
                                               class="col-md-4 col-form-label text-md-right">{{ __('providers.rfc') }}</label>
                                        <div class="col-md-6">
                                            <input id="rfc" type="text"
                                                   class="form-control @error('rfc') is-invalid @enderror"
                                                   name="rfc" value="{{ old('rfc') }}" required
                                                   autocomplete="rfc" autofocus>
                                            @error('rfc')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email"
                                               class="col-md-4 col-form-label text-md-right">{{ __('providers.email') }}</label>
                                        <div class="col-md-6">
                                            <input id="email" type="text"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}" required
                                                   autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="direccion"
                                               class="col-md-4 col-form-label text-md-right">{{ __('providers.address') }}</label>
                                        <div class="col-md-6">
                                            <input id="direccion" type="text"
                                                   class="form-control @error('direccion') is-invalid @enderror"
                                                   name="direccion" value="{{ old('direccion') }}" required
                                                   autocomplete="direccion" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="telefono"
                                               class="col-md-4 col-form-label text-md-right">{{ __('providers.phone') }}</label>
                                        <div class="col-md-6">
                                            <input id="telefono" type="text"
                                                   class="form-control @error('telefono') is-invalid @enderror"
                                                   name="telefono" value="{{ old('telefono') }}" required
                                                   autocomplete="telefono" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="button" class="btn btn-danger float-right m-1"
                                                    data-dismiss="modal">
                                                {{__('custom.cancel-button')}}</button>
                                            <button type="submit" class="btn btn-primary float-right m-1">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal eliminar -->
        @foreach ($proveedores as $proveedor)
            <div class="modal fade" id="delete{{$proveedor->id}}" tabindex="-1" role="dialog" aria-labelledby="delete"
                 aria-hidden="true">
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
                            <form action="{{route('proveedores.destroy', $proveedor)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">{{__('custom.cancel-button')}}</button>
                                <button type="submit" class="btn btn-danger"><i
                                        class="far fa-trash-alt"></i> {{__('custom.delete-button')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    <!-- Modal editar -->
        @foreach($proveedores as $proveedor)
            <div class="modal fade" id="edit{{$proveedor->id}}" tabindex="-1" role="dialog" aria-labelledby="delete"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{__('custom.info')}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-11 m-2">
                                    <form action="{{route('proveedores.update',$proveedor->id)}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <div>
                                                <input id="name" type="text"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       name="name" value="{{$proveedor->name}}" required
                                                       autocomplete="name"
                                                       autofocus>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="rfc">{{__('providers.rfc')}}</label>
                                            <div>
                                                <input id="rfc" type="text"
                                                       class="form-control @error('rfc') is-invalid @enderror"
                                                       name="rfc" value="{{$proveedor->rfc}}" required>

                                                @error('rfc')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">{{__('providers.email')}}</label>

                                            <div>
                                                <input id="email" type="text"
                                                       class="form-control @error('email') is-invalid @enderror"
                                                       value="{{$proveedor->email}}" name="email" required>

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="direccion">{{__('providers.address')}}</label>

                                            <div>
                                                <input id="direccion" type="text"
                                                       class="form-control @error('direccion') is-invalid @enderror"
                                                       value="{{$proveedor->direccion}}" name="direccion" required>

                                                @error('direccion')
                                                <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="telefono">{{__('providers.phone')}}</label>

                                            <div>
                                                <input id="telefono" type="text"
                                                       class="form-control @error('telefono') is-invalid @enderror"
                                                       value="{{$proveedor->telefono}}" name="telefono" required>

                                                @error('telefono')
                                                <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-danger float-right m-1"
                                                data-dismiss="modal">
                                            {{__('custom.cancel-button')}}
                                        </button>

                                        <button type="submit"
                                                class="btn btn-primary float-right m-1">{{__('custom.update-button')}}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection


