@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2 class="float-left">{{__('custom.list-user')}}</h2>
                @if ($search)
                    <div class="alert alert-primary d-flex align-items-center" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                             class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16">
                            <path
                                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div>
                            An example alert with an icon
                        </div>
                    </div>
                @endif
                <button type="button" class="btn btn-success float-right" data-toggle="modal"
                        data-target="#add">
                    {{__('custom.add-user-button')}}
                </button>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">{{__('custom.name')}}</th>
                        <th scope="col">{{__('custom.descripcion')}}</th>
                        <th scope="col">{{__('custom.cantidad')}}</th>
                        <th scope="col">{{__('custom.precio')}}</th>
                        <th scope="col" class="justify-content-center">{{__('custom.actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{$producto->name}}</td>
                            <td>{{$producto->descripcion}}</td>
                            <td>{{$producto->cantidad}}</td>
                            <td>{{$producto->precio}}</td>
                            <td>
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
                        <h5 class="modal-title" id="exampleModalLabel">{{__('custom.add-user-button')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >

                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('productos.create')
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
