@extends('layouts.app')

@section('content')



    <div class="page-header header-filter" style="background-image: url('{{ asset('img/bg7.jpg')}}'); background-size: cover; background-position: top center;">

         <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-6 ml-auto mr-auto">
              <div class="card card-login">
                <form class="form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                  <div class="card-header card-header-info text-center">
                    <h4 class="card-title">Registro de Usuarios</h4>
                  </div>
                  <p class="description text-center">Ingresa tus datos</p>
                  <div class="card-body">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">face</i>
                        </span>
                       </div>
                      <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="Nombre">
                        @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                         @endif
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">mail</i>
                        </span>
                      </div>
                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Correo Electronico">
                      @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">lock_outline</i>
                        </span>
                      </div>
                      <input id="password" type="password" class="form-control" name="password" required placeholder="Contraseña...">
                        @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">lock_outline</i>
                        </span>
                      </div>
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Repetir Contraseña...">
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
