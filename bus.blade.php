<!DOCTYPE html>
  <html>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bus Registration Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../../../../../code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.html">
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <style>
    .error{
        color:red;
    }
  </style>
  </head>
  <body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="../../index2.html"><b>NEGADRAS</b></a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new user</p>

        <form method="POST" action="busregistration" >
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" 
                placeholder="Bus company" name="name" value="{{ old('name')}}">
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
                </div>
                <div>
                @error('name')
                    <span class="error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
            </div>

            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="phone no." name="phone" value="{{ old('phone')}}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                <div>
                    @error('phone')
                            <span class="error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
            </div>

            <div class="input-group mb-3">
                <input type="number" class="form-control" placeholder="No. of buses" name="number" value="{{ old('number')}}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                <div>
                    @error('number')
                            <span class="error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
            </div>

            <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email')}}">
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
                </div>
                <div>
                    @error('email')
                                <span class="error" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>
            </div>

              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
                <div>
                    @error('password')
                        <span class="error" role="alert" >
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>
          
            <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Retype password"  name="password_confirmation">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
            </div>

            <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                  I agree to the <a href="#">terms</a>
                </label>
            </div>

            <div>
                <button type="submit" class="btn btn-primary btn-block btn-flat">
                    {{ __('signup') }}
                </button>
            </div>   

        </form>
		

		<div class="col-3">
              <a href="{{ url('/login-custom') }}" class="text-center">Sign in</a>
          </div>
      </div>
    </div>
  </div>    
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
