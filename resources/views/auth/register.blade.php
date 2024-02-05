<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>
  <link rel="icon" type="image/x-icon" href="/assets/police-logo.png">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
    integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
    integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
    crossorigin="anonymous"></script>
 

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
                  <img src="{{asset('user/Bigbite.png')}}" class="logo-img" alt="FoodHub Logo" style="width: 120px;">
                </div>
              </div>
            </div>
          </div>

          <div id="loginbox" class="login-form col-lg-6 bg-white d-flex align-items-center flex-column">
            <form class="form w-100 p-4"method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
		@csrf
              <h3 class="text-center login-head">
                Registration
              </h3>
		<div class="form-group mb-3">
                <label class="form-label" for="name">
		Full Name
                </label>
		<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="first_name"
                                    value="{{ old('first_name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
 			</div>

			<div class="form-group mb-3">
                <label class="form-label" for="name">
                  Last Name
                </label>

 					<input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="last_name"
                                    value="{{ old('Last_name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

<div class="form-group mb-3">
                <label class="form-label" for="phone">
                  Phone Number
                </label>
<input id="phone" type="number"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone_number"
                                    value="{{ old('phone_number') }}" autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

              <div class="form-group mb-3">
                <label class="form-label" for="email">
                  Email
                </label>
                <input required id="email" class="form-control" type="email" name="email"
                  placeholder="">
              </div>
              <div class="form-group mb-3">
                <label class="form-label" for="password">
                  Password
                </label>
                <input required id="password" class="form-control" type="password" name="password"
                  placeholder="">
              </div>




<div class="form-group mb-3">
                <label class="form-label" for="password">
                  Confirm Password
                </label>
                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>

             

                            <div class="form-group">
                <button type="submit" class="btn btn-danger btn-block text-bold"><span class="text-uppercase text-bold">
                    Register
                  </span></button>
              </div>
              <p class="mt-4 mb-2 text-center text-bold">
                Already have account?
              </p>
              <button type="button" class="btn btn-block text-light" style="background-color: #1a479c;"><span
                  class="text-uppercase text-bold">
                  Login
                </span></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 
</body>

</html>