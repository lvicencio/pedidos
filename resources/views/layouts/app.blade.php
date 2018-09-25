<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>@yield('title', "Pedidos a Domicilio")
    
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{ asset('/css/material-kit.css') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('/demo/demo.css')}}" rel="stylesheet" />
</head>

<body> 
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
  

    <div class="container text-secondary">
      <div class="navbar-translate">
        <a class="navbar-brand" href="{{ url('/')}}">
          Pedidos de Sushi </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            @guest
             <li class="nav-item"><a href="{{ route('login') }}" class="nav-link" rel="tooltip">Login</a></li>
             <li class="nav-item"><a href="{{ route('register') }}" class="nav-link" rel="tooltip">Register</a></li>
             @else

        
           <li class="dropdown nav-item">
              <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"  role="button" aria-expanded="false" aria-haspopup="true" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
               </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="{{ url('/home') }}" class="dropdown-toggle nav-link" >Dashboard</a>
              @if(auth()->user()->admin == true)
              <a href="{{ url('/admin/categories') }}" class="dropdown-toggle nav-link" >Admin Categorias</a>
              <a href="{{ url('/admin/products') }}" class="dropdown-toggle nav-link" >Admin Productos</a>
              @endif
              <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();"  class="dropdown-toggle nav-link" data-toggle="dropdown" class="dropdown-item">
                  Cerrar Sesión
              </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
            </div>
          </li>

          @endguest



        </ul>
      </div>
    </div>
  </nav>

    <div>
     

        @yield('content')

   </div>



  
</body>

 <script src="{{ asset('/js/core/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('/js/core/popper.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
  <script src="{{ asset('/js/plugins/moment.min.js')}}"></script>
  <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="{{ asset('/js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
  <!--  Plugin for Sharrre btn -->
  <script src="{{ asset('/js/plugins/jquery.sharrre.js')}}" type="text/javascript"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('js/material-kit.js')}}" type="text/javascript"></script>

</html>




