<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PhoneIo</title>
  <link rel="stylesheet" href="style2.css" />
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;0,700;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet" />
</head>

<body>

  <!-- main content -->
  <div class="login-container">
    <div class="login-div">
      {{-- <form action="">
        <h1>Login</h1>
        <label for="Email">Email/Contact:</label>
        <input type="email" />
        <label for="">Password:</label>
        <input type="password" name="" />
        <button>Continue</button>
        <p>
          By continuing, you agree to PhoneIo's Conditions of Use and Privacy
          Notice.
        </p>
      </form> --}}
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <h1>Login</h1>
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
      
       
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
      
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
      
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
      
      
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
      
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
      
      
                  
      
                    <label class="form-check-label" for="remember">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        {{ __('Remember Me') }}
                    </label>
      
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>
      
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
      
      </form>
    </div>
  </div>
  <!-- main content -->
</body>

</html>




