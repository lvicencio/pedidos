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
            <li class="nav-item">
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

    </div>
  </div>


@include('includes.footer')
@endsection


