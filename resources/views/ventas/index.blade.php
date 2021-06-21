@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="float-left">{{__('ventas.lista')}}</h2>
                <button type="button" class="btn btn-success float-right" data-toggle="modal"
                        data-target="#add">
                    {{__('ventas.agregar')}}
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
                        <th scope="col" class="text-center border-right">{{__('products.client')}}</th>
                        <th scope="col" class="text-center border-right">{{__('products.product')}}</th>
                        <th scope="col" class="text-center border-right">{{__('ventas.name')}}</th>
                        <th scope="col" class="text-center border-right">{{__('ventas.metodoPago')}}</th>
                        <th scope="col" class="text-center border-right">{{__('ventas.cantidad')}}</th>
                        <th scope="col" class="text-center border-right">{{__('ventas.total')}}</th>
                        <th scope="col" class="text-center border-right">{{__('ventas.actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($ventas as $venta)
                        <tr>
                            <td class="text-center border">{{$venta->cliente->name}}</td>
                            <td class="text-center border">{{$venta->producto->name}}</td>
                            <td class="text-center border">{{$venta->name}}</td>
                            <td class="text-center border">{{$venta->metodoPago}}</td>
                            <td class="text-center border">{{$venta->cantidad}}</td>
                            <td class="text-center border">{{$venta->total}}</td>
                            <td class="text-center border">
                                <button type="button" class="btn btn-dark" data-toggle="modal"
                                        data-target="#show{{$venta->id}}">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                    {{__('custom.show')}}
                                </button>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#edit{{$venta->id}}">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                    {{__('custom.edit-button')}}
                                </button>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#delete{{$venta->id}}">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    {{__('custom.delete-button')}}
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $ventas->links() }}
            </div>
        </div>

        <!-- Modal mostrar -->
        @foreach($datos as $venta)
            <div class="modal fade" id="show{{$venta->id}}" tabindex="-1" role="dialog" aria-labelledby="delete"
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
                            <h5 class="card-title">{{__('ventas.venta')}}</h5>
                            <p class="card-text">{{__('products.client')}}: {{$venta->cliente->name ?? 'Null'}}</p>
                            <p class="card-text">{{__('products.product')}}: {{$venta->producto->name ?? 'Null'}}</p>
                            <p class="card-text">{{__('ventas.name')}}: {{$venta->name}}</p>
                            <p class="card-text">{{__('ventas.metodoPago')}}: {{$venta->metodoPago}}</p>
                            <p class="card-text">{{__('ventas.cantidad')}}: {{$venta->cantidad}}</p>
                            <p class="card-text">{{__('ventas.total')}}: {{$venta->total}}</p>
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
                        <h5 class="modal-title" id="exampleModalLabel">{{__('ventas.agregar')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-11 m-2">
                                <form method="POST" action="{{ route('ventas.store') }}">
                                    @csrf
                                    <div class="input-group mx-auto mb-3" style="max-width: 65.666667%;">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text"
                                                   for="inputGroupSelect01">{{__('clients.client')}}</label>
                                        </div>
                                        <select class="custom-select" id="clientes_id" name="clientes_id">
                                            <option selected>{{__('custom.selectOne')}}</option>
                                            @foreach ($clientes as $cliente)
                                                <option value="{{$cliente->id}}">{{$cliente->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group mx-auto mb-3" style="max-width: 65.666667%;">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text"
                                                   for="inputGroupSelect01">{{__('products.product')}}</label>
                                        </div>
                                        <select class="custom-select" id="productos_id" name="productos_id">
                                            <option selected>{{__('custom.selectOne')}}</option>
                                            @foreach ($productos as $producto)
                                                <option value="{{$producto->id}}">{{$producto->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="input-group mx-auto mb-3" style="max-width: 65.666667%;">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text"
                                                   for="metodoPago">{{__('ventas.metodoPago')}}</label>
                                        </div>
                                        <select class="custom-select" id="metodoPago" name="metodoPago">
                                            <option value="efectivo" selected>Efectivo</option>
                                            <option value="tarjeta de credito">Tarjeta de credito</option>
                                            <option value="tarjeta de debito">Tarjeta de debito</option>
                                        </select>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name"
                                               class="col-md-4 col-form-label text-md-right">{{ __('ventas.name') }}</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   name="name" value="{{ old('name') }}" required
                                                   autocomplete="name" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="cantidad"
                                               class="col-md-4 col-form-label text-md-right">{{ __('ventas.cantidad') }}</label>
                                        <div class="col-md-6">
                                            <input id="cantidad" type="text"
                                                   class="form-control @error('cantidad') is-invalid @enderror"
                                                   name="cantidad" value="{{ old('cantidad') }}" required
                                                   autocomplete="cantidad" autofocus>
                                            @error('cantidad')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="total"
                                               class="col-md-4 col-form-label text-md-right">{{ __('ventas.total') }}</label>
                                        <div class="col-md-6">
                                            <input id="total" type="text"
                                                   class="form-control @error('total') is-invalid @enderror"
                                                   name="total" value="{{ old('total') }}" required
                                                   autocomplete="total" autofocus maxlength="10">
                                            @error('total')
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
        @foreach ($ventas as $venta)
            <div class="modal fade" id="delete{{$venta->id}}" tabindex="-1" role="dialog" aria-labelledby="delete"
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
                            <form action="{{route('ventas.destroy', $venta)}}" method="POST">
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
        @foreach($ventas as $venta)
            <div class="modal fade" id="edit{{$venta->id}}" tabindex="-1" role="dialog" aria-labelledby="delete"
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
                                    <form action="{{route('ventas.update',$venta->id)}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="input-group mx-auto mb-3" style="max-width: 65.666667%;">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text"
                                                       for="metodoPago">{{__('ventas.metodoPago')}}</label>
                                            </div>
                                            <select class="custom-select" id="metodoPago" name="metodoPago">
                                                <option value="efectivo" selected>Efectivo</option>
                                                <option value="tarjeta de credito">Tarjeta de credito</option>
                                                <option value="tarjeta de debito">Tarjeta de debito</option>
                                            </select>
                                        </div>

                                        <div class="form-group row">
                                            <label for="name"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('ventas.name') }}</label>
                                            <div class="col-md-6">
                                                <input id="name" type="text"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       name="name" value="{{ old('name') }}" required
                                                       autocomplete="name" autofocus>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="cantidad"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('ventas.cantidad') }}</label>
                                            <div class="col-md-6">
                                                <input id="cantidad" type="text"
                                                       class="form-control @error('cantidad') is-invalid @enderror"
                                                       name="cantidad" value="{{ old('cantidad') }}" required
                                                       autocomplete="cantidad" autofocus>
                                                @error('cantidad')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="total"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('ventas.total') }}</label>
                                            <div class="col-md-6">
                                                <input id="total" type="text"
                                                       class="form-control @error('total') is-invalid @enderror"
                                                       name="total" value="{{ old('total') }}" required
                                                       autocomplete="total" autofocus maxlength="10">
                                                @error('total')
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


