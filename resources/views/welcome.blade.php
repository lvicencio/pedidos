@extends('layouts.app')

 @section('title', 'Bienvenidos')

@section('content')


    
   <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{ asset('img/profile_city.jpg')}}')">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="title">Comida y productos a domicilio</h1>
          <h4>Pedidos gratis dentro del sector.</h4>
          <br>
          <a href="#" class="btn btn-danger btn-raised btn-lg">
            <i class="fa fa-play"></i> Mas Información!
          </a>
        </div>
      </div>
    </div>
  </div>


  <div class="main main-raised">
    <div class="container">
      <div class="section text-center">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="title">Productos a tu domicilio</h2>
            <h5 class="description">Recibe tus productos en la comodidad de tu hogar, con calidad y los mejores precios.</h5>
          </div>
        </div>
        <div class="features">
          <div class="row">
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-info">
                  <i class="material-icons">chat</i>
                </div>
                <h4 class="info-title">Atención Garantizada</h4>
                <p>Tus productos llegaran a tu destino en menos de 30minutos.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-success">
                  <i class="material-icons">verified_user</i>
                </div>
                <h4 class="info-title">Privacidad</h4>
                <p>Tu información esta protegida y segura con nosotros.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-danger">
                  <i class="material-icons">fingerprint</i>
                </div>
                <h4 class="info-title">Precios mas bajos</h4>
                <p>Encontraran los mejores precios del mercado.</p>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="section text-center">
        <h2 class="title">Listado de Productos</h2>
        <div class="team">
          <div class="row">

          

            @foreach ($products as $product)
              
              <div class="col-md-4">
              <div class="team-player">
                <div class="card card-plain">
                  <div class="col-md-6 ml-auto mr-auto">
                    <img src="{{ $product->images()->first()->image }}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                  </div>
                  <h4 class="card-title">{{ $product->name }}
                    <br>
                    <small class="card-description text-muted">{{ $product->category->name }}</small>
                  </h4>
                  <div class="card-body">
                    <p class="card-description"> {{ $product->description }}
                  </div>
                  <div class="card-footer justify-content-center">
                    <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-twitter"></i></a>
                    <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-instagram"></i></a>
                    <a href="#pablo" class="btn btn-link btn-just-icon"><i class="fa fa-facebook-square"></i></a>
                  </div>
                </div>
              </div>
              </div>

            @endforeach
          </div>
        </div>
      </div>
      <div class="section section-contacts">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="text-center title">¿Preguntas o Dudas?</h2>
            <h4 class="text-center description">Registrate y resuelve tus dudas.</h4>
            <form class="contact-form">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nombre</label>
                    <input type="email" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Correo Electronico</label>
                    <input type="email" class="form-control">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleMessage" class="bmd-label-floating">Mensaje</label>
                <textarea type="email" class="form-control" rows="4" id="exampleMessage"></textarea>
              </div>
              <div class="row">
                <div class="col-md-4 ml-auto mr-auto text-center">
                  <button class="btn btn-primary btn-raised">
                    Enviar
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


 <footer class="footer">
      <div class="container">
        <nav class="float-left">
          
        </nav>
        <div class="copyright float-right">
          &copy;
          <script>
            document.write(new Date().getFullYear())
          </script>, realizado por  Luis V
        </div>
      </div>
    </footer>



@endsection
