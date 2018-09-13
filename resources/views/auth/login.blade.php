@extends('layouts.app')

@section('content')


    
    <div class="page-header header-filter" style="background-image: url('{{ asset('img/bg7.jpg')}}'); background-size: cover; background-position: top center;">

         <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-6 ml-auto mr-auto">
              <div class="card card-login">
                <form class="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                  <div class="card-header card-header-info text-center">
                    <h4 class="card-title">Inicio de Sesión</h4>
                    <div class="social-line">
                      <a href="#pablo" class="btn btn-just-icon btn-link">
                        <i class="fa fa-facebook-square"></i>
                      </a>
                      <a href="#pablo" class="btn btn-just-icon btn-link">
                        <i class="fa fa-twitter"></i>
                      </a>
                      <a href="#pablo" class="btn btn-just-icon btn-link">
                        <i class="fa fa-google-plus"></i>
                      </a>
                    </div>
                  </div>
                  <p class="description text-center">Ingresa tus Credenciales</p>
                  <div class="card-body">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">mail</i>
                        </span>
                      </div>
                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Correo Electronico">
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">lock_outline</i>
                        </span>
                      </div>
                      <input id="password" type="password" class="form-control" name="password" required placeholder="Contraseña...">
                    </div>
                   
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                         <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordar Sesión
                            </label>
                        </div>
                        </span>
                      </div>
                      
                    </div>




                  </div>
                  <div class="footer text-center">
                    <button type="submit" class="btn btn-info btn-link btn-wd btn-lg">Ingresar</a>
                  </div>
                </form>

                <!--  <a class="btn btn-link" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a> -->
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
