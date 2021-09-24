<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Seguridad Ciudadana</title>
	<link rel="icon" type="img/icon" href="/img/ico.ico">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">
</head>
<body style="background-color: rgb(255,255,255);" >

<img src="/img/Captura.PNG" style="float: left; width: 700px; margin-left: 120px; margin-top: 100px;">
    
    <div style="float: right; margin-right: 120px; margin-top: 120px;">
        <!-- /.login-logo -->
        
        <div>   
            <img src="/img/Captura2.PNG" style="width: 90px;">
            <a class="h1" style="color:red; font-size: 30pt;"><b>SEGURIDAD CIUDADANA</b> </a>
            <p class="login-box-msg" style="font-size: 55pt; margin-top: 60px;"><b>BIENVENIDO</b></p>
      
            <form action="{{ route ('login')}}" method="post">
                @csrf
              <div class="input-group mb-3" >
                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" id="email" value="{{old('email')}}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <br>
              <div class="input-group mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" id="password" value="{{old('password')}}">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <!--<div class="icheck-primary">
                    <input type="checkbox" id="remember">
                    <label for="remember">
                      Recordarme
                    </label>
                  </div>-->
                </div>
                <!-- /.col -->
                
                <!-- /.col -->
              </div><br><br>
              <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block" style="width: 190px; height: 45px; margin-left: 160px; font-size: 15pt;">INGRESAR</button>
                </div>
            </form>
      
            <!--<div class="social-auth-links text-center mt-2 mb-3">
              <a href="#" class="btn btn-block btn-primary">
                <i class="fab fa-facebook mr-2"></i> 
                Iniciar sesión con Facebook
              </a>
              <a href="#" class="btn btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i> 
                Iniciar sesión con Google+
              </a>
            </div>-->
            <!-- /.social-auth-links -->
            <!--<p class="mb-1">
              <a href="forgot-password.html">I forgot my password</a>
            </p>-->
            <!-- <p class="mb-0">
              <a href="{{ route('register') }}" class="text-center">Crear Cuenta</a>
            </p> -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
<!-- jQuery -->
<script src="adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>
