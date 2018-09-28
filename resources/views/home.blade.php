@extends('layouts.app')

 @section('title', 'Dashboard')

@section('content')


 


  <div class="main main-raised" style="margin-top: 1em">
    <div class="container">



      <div class="section text-center">
        <h2>Dashboard</h2>
             @if (session('notification'))
                <div class="alert alert-danger">
                     {{ session('notification') }}
                </div>
             @endif 
             @if (session('noti'))
                <div class="alert alert-success">
                     {{ session('noti') }}
                </div>
             @endif                     
      </div>
          <ul class="nav nav-pills nav-pills-icons nav-pills-info" role="tablist">
            <!--
                color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
            -->
            <li class="nav-item">
                <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
                    <i class="material-icons">dashboard</i>
                    Carro de Compras
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#tasks-1" role="tab" data-toggle="modal" data-target="#exampleModal">
                    <i class="material-icons">list</i>
                    Pedidos  Realizados
                </a>

                <!--   <button class="btn btn-info btn-round" data-toggle="modal" data-target="#exampleModal">
                   Añadir a Cesta
                   </button> -->
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
                   <?php
                    $cont = 0
                    
                  ?>
                  @foreach (auth()->user()->carrito->details as $detail )

                  <?php
                    $cont++
                    
                  ?>
                  
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
             
             @if($cont > 0)
                <div class="text-center">
                  <form method="post" action="{{ url('/order') }}">
                    {{ csrf_field() }}
                      <button class="btn btn-info btn-round">
                        <i class="material-icons">done</i> Realizar Pedido
                      </button>
                    </form>
                </div>
             @endif 
<br><br>
    </div>
  </div>



          <!--  MODAL -->

 
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pedidos Realizados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

          <!--    <form action="{{ url('/carrito') }}" method="post">
                {{ csrf_field() }}
              
                <div class="modal-body">
                  <input type="number" name="quantity" value="1" class="form-control">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-info">Añadir</button>
                </div>
              </form> -->

                <div class="modal-body">
                 <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Numero Orden</th>
                        <th scope="col">Fecha de Orden</th>
                        <th scope="col">Fecha Entrega</th>
                        <th scope="col">Estado</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($ordenes as $orden )
                      <tr>
                        <th scope="row">{{ $orden->id }}</th>
                        <td>{{  $orden->order_date }}</td>
                        <td>{{  $orden->arrived_date }}</td>
                        <td>{{  $orden->status }}</td>
                       
                        @if( Auth::user()->admin == 1)
                        <td> 
                      <form method="post" action="{{ url('/order') }}" class="form-inline" >
                         {{ csrf_field() }}
                      <input type="hidden" name="carrito_id" value="{{ $orden->id }}">
                      <button type="submit" rel="tooltip" title="Entregar Orden" class="btn btn-info btn-simple btn-sm"  >
                          <i class="fa fa-info"></i>
                        </button>
                      <a href="{{ url('/order/'.$orden->id.'/delete') }}" type="button" rel="tooltip" title="Eliminar Orden" class="btn btn-danger btn-simple btn-sm"  >
                        <i class="fa fa-times"></i>
                      </a> 
                      
                      </form>
                        </td>
                      </tr>
                      @endif

                     @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="modal-footer">
                  
                </div>
            </div>
          </div>
        </div>



          <!--  CIERRE MODAL-->

@include('includes.footer')
@endsection


