@extends('layouts.app')

 @section('title', 'Dashboard')

@section('content')


 


  <div class="main main-raised" style="margin-top: 1em">
    <div class="container">



      <div class="section text-center">
        <h2>Dashboard</h2>
             @if (session('status'))
                <div class="alert alert-success">
                     {{ session('status') }}
                </div>
             @endif
                    Usted esta logeado!     
      </div>
          <ul class="nav nav-pills nav-pills-icons nav-pills-info" role="tablist">
            <!--
                color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
            -->
            <li class="nav-item active">
                <a class="nav-link" href="#dashboard-1" role="tab" data-toggle="tab">
                    <i class="material-icons">dashboard</i>
                    Carro de Compras
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
                    <i class="material-icons">list</i>
                    Pedidos  Realizados
                </a>
            </li>
        </ul>

         <p>Tienes <strong>{{ auth()->user()->carrito->details->count() }}</strong> Productos en tu Carro de Compra</p>
          


            <table class="table table-striped">
                <thead>
                  <tr>
                    <th class="col-md-2">Imagen</th>
                    <th class="col-md-4">Nombre</th>
                    <th class="text-right">Precio</th>
                    <th class="text-right">Cantidad</th>
                    <th class="text-right">SubTotal</th>
                    <th class="text-right">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach (auth()->user()->carrito->details as $detail )
                  <tr>
                    <th scope="row">
                      <img src="{{ $detail->product->featured_image_url }}" height="50">
                    </th>
                    <td><a href="{{ url('/products/'.$detail->product->id) }}" target="_blank">{{ $detail->product->name }}</a>
                    </td>
                    <td class="text-right">&dollar;{{ $detail->product->price }}</td>
                    <td class="text-right">{{ $detail->quantity }}</td>
                    <td class="text-right">&dollar;{{ $detail->quantity * $detail->product->price }}</td>
                    <td class="td-actions text-right">
                      <form method="post" action="{{ url('/carrito') }}">
                         {{ csrf_field() }}
                         {{ method_field('DELETE') }}
                         <input type="hidden" name="carrito_detail_id" value="{{ $detail->id }}">
                      <a href="{{ url('/products/'.$detail->product->id) }}" type="button" target="_blank" rel="tooltip" title="Ver Producto" class="btn btn-info btn-simple btn-sm" >
                        <i class="fa fa-info"></i>
                      </a> 
                      <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-sm" >
                          <i class="fa fa-times"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

<br>
    </div>
  </div>


@include('includes.footer')
@endsection


