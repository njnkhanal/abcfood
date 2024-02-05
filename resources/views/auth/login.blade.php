<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
    integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
    integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
    crossorigin="anonymous"></script>
  <style>

    *{
      font-size: 14px;
    }
    .main {
      min-height: 100vh;
    }


    .lang a {
      text-decoration: none;
      color: white;
    }

    .form-control:focus {
      border: 2px solid #bf9410;
      box-shadow: none;
    }

    .app-title{
      color:var(--primary)
    }
  </style>
</head>

<body>
  <div class="container-fluid align-items-center d-flex main">
    <div class="row align-items-center h-100 w-100">

      <div class="login-box col-xxl-6 col-lg-8 col-md-10 mx-auto">
        <div class="row shadow-lg form-container rounded">
          <div class="col-lg-6">
            <div class="row align-items-center text-center h-100">
              <div class="container-fluid">
                <div class="container">
                  <img src="{{asset('user/Bigbite.png')}}" class="logo-img" alt="Nepal Police Logo" style="width: 150px;">
                </div>
              </div>
            </div>
          </div>

          <div id="loginbox" class="login-form col-lg-6 bg-white d-flex align-items-center flex-column">
            <form class="form w-100 p-4"method="POST" action="{{ route('login') }}">
		        @csrf
              <h3 class="text-center login-head">
                Login
              </h3>
		 

              <div class="form-group mb-3">
                <label class="form-label" for="email">
                  Email
                </label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required 			autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="password">
                  Password
                </label>
               <input id="myInput" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  
              </div>

              <div class="form-group">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick="myFunction()">
                <label class="form-check-label" for="flexCheckDefault">
                  Show password
                </label>
              </div>

              <small class="float-right forgot-link mb-3">
                <a href="{{ route('password.request') }}"><button type="button" class="btn btn-link">
                  Forgot password?
                </button></a>
              </small>
              <div class="form-group">
                <button type="submit" style="background-color: #bf9410;" class="btn btn-block text-light"><span class="text-uppercase text-bold">
                    Login
                  </span></button>
              </div>
              <p class="mt-4 mb-2 text-center text-bold">
                Don't have account?
              </p>
              <a href="{{ route('register') }}"><button type="button" class="btn btn-block text-light" style="background-color: black;"><span
                class="text-uppercase text-bold">
                Register
              </span></button>
</a>
             
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
  </script>
</body>

</html>