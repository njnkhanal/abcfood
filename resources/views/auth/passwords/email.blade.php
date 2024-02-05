
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
  <link rel="icon" type="image/x-icon" href="/assets/police-logo.png">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/Public/icons/webfont/tabler-icons.min.css">
  <link rel="stylesheet" href="/Public/icons/webfont/tabler-icons.css">


  <style>
    *{
      font-size: 16px;
    }
    .form-control:focus {
      border: 2px solid #bf9410;
      box-shadow: none;
    }
  </style>
</head>
<body>
  <div class="container-fluid justify-content-center align-items-center d-flex h" style="height: 100vh;">

    <div class="card shadow">
        <div class="card-body">
          <h4 class="card-title text-center">Forgot Password</h4>
          @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif
          <form method="POST" action="{{ route('password.email') }}">
             @csrf
            <div class="form-group m-3">
              <label for="email" class="py-2">Email</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
             
              @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror

              <small class="form-text text-muted">Please provide email that is registered with FoodHub</small>
            </div>

            <div class="form-group" style="text-align: center">
              <button class="btn text-light  btn-block" style="background-color: #bf9410;"><i class="ti ti-send-2"></i> Send OTP</button>

            </div>
            
          </form>
        </div>
      </div>
  </div>
  <body>
</html>