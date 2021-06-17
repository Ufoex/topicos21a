@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="float-left">{{__('products.lista')}}</h2>
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
                    {{__('products.agregar')}}
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
                        <th scope="col" class="text-center border-right">{{__('products.descripcion')}}</th>
                        <th scope="col" class="text-center border-right">{{__('products.cantidad')}}</th>
                        <th scope="col" class="text-center border-right">{{__('products.precio')}}</th>
                        <th scope="col" class="text-center border-right">{{__('custom.provider')}}</th>
                        <th scope="col" class="text-center border-right">{{__('custom.actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td class="text-center border">{{$producto->name}}</td>
                            <td class="text-center border">{{$producto->descripcion}}</td>
                            <td class="text-center border">{{$producto->cantidad}}</td>
                            <td class="text-center border">{{$producto->precio}}</td>
                            <td class="text-center border">{{$producto->provider->name}}</td>
                            <td class="text-center border">
                                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#show{{$producto->id}}">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                    {{__('custom.show')}}
                                </button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$producto->id}}">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                    {{__('custom.edit-button')}}
                                </button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$producto->id}}">
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
         @foreach($productos as $producto)
         <div class="modal fade" id="show{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="delete"
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
                         <h5 class="card-title">{{$producto->name}}</h5>
                         <p class="card-text">Descripción: {{$producto->descripcion}}</p>
                         <p class="card-text">Cantidad: {{$producto->cantidad}}</p>
                         <p class="card-text">Precio: {{$producto->precio}}</p>
                         <p class="card-text">Proveedor: {{$producto->provider->name}}</p>
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
                        <h5 class="modal-title" id="exampleModalLabel">{{__('custom.add-product-button')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-11 m-2">
                                <form method="POST" action="{{ route('productos.store') }}">
                                    @csrf
                                    <div class="input-group mx-auto mb-3" style="max-width: 65.666667%;">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">{{__('custom.provider')}}</label>
                                        </div>
                                        <select class="custom-select" id="provider_id" name="provider_id">
                                            <option selected>{{__('custom.selectOne')}}</option>
                                            @foreach ($proveedores as $proveedor)
                                                <option value="{{$proveedor->id}}">{{$proveedor->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>
                                        <div class="col-md-6">
                                            <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ old('descripcion') }}" required autocomplete="descripcion" autofocus>
                                            @error('descripcion')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="cantidad" class="col-md-4 col-form-label text-md-right">{{ __('Cantidad') }}</label>
                                        <div class="col-md-6">
                                            <input id="cantidad" type="text" class="form-control @error('cantidad') is-invalid @enderror" name="cantidad" value="{{ old('cantidad') }}" required autocomplete="cantidad" autofocus>
                                            @error('cantidad')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="precio" class="col-md-4 col-form-label text-md-right">{{ __('Precio') }}</label>
                                        <div class="col-md-6">
                                            <input id="precio" type="text" class="form-control" name="precio" value="{{ old('precio') }}" required autocomplete="precio" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="button" class="btn btn-danger float-right m-1" data-dismiss="modal">
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
        @foreach ($productos as $producto)
        <div class="modal fade" id="delete{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
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
                        <form action="{{route('productos.destroy', $producto)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{__('custom.cancel-button')}}</button>
                            <button type="submit" class="btn btn-danger" ><i class="far fa-trash-alt"></i> Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

         <!-- Modal editar -->
        @foreach($productos as $producto)
            <div class="modal fade" id="edit{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="delete"
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
                                    <form action="{{route('productos.update',$producto->id)}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="input-group mx-auto mb-3" style="max-width:90%;">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01">{{__('custom.provider')}}</label>
                                            </div>
                                            <select class="custom-select" id="provider_id" name="provider_id">
                                                <option selected>{{__('custom.selectOne')}}</option>
                                                @foreach ($proveedores as $proveedor)
                                                    <option value="{{$proveedor->id}}">{{$proveedor->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <div>
                                                <input id="name" type="text"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       name="name" value="{{$producto->name}}" required autocomplete="name"
                                                       autofocus>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="descripcion">Descripcion</label>
                                            <div>
                                                <input id="descripcion" type="text"
                                                       class="form-control @error('descripcion') is-invalid @enderror"
                                                       name="descripcion" value="{{$producto->descripcion}}" required>

                                                @error('descripcion')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="cantidad">Cantidad</label>

                                            <div>
                                                <input id="cantidad" type="text"
                                                       class="form-control @error('cantidad') is-invalid @enderror"
                                                       value="{{$producto->cantidad}}" name="cantidad" required>

                                                @error('cantidad')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="precio">Precio</label>

                                            <div>
                                                <input id="precio" type="text"
                                                       class="form-control @error('precio') is-invalid @enderror"
                                                       value="{{$producto->precio}}" name="precio" required>

                                                @error('precio')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-danger float-right m-1" data-dismiss="modal">
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


