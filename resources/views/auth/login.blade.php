<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="/assets/css/style.css" />
    <title>Login</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="assets/img/ddlogo.svg" class="logo" alt=""/>
        </a>
      </div>
    </nav>
    <div class="container">
      <div
        class="row justify-content-center align-items-center"
        style="height: 80vh"
      >
        <div class="col-md-8 col-lg-5">
          <p class="special-text fs-32 mb-0">Login</p>
          <div class="custom-card">
            <div class="card-body">
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group mb-4">
                  <label for="email" class="form-label label-form">Email</label>
                  <input
                    id="email"
                    type="email" 
                    name="email"
                    :value="old('email')" 
                    required autofocus 
                    autocomplete="username"
                    class="form-control input-control"
                    placeholder="Email"
                  />
                </div>
                <div class="form-group mb-4">
                  <label for="password" class="form-label label-form">Password</label>
                  <input
                    id="password"
                    type="password"
                    name="password"
                    required 
                    autocomplete="current-password"
                    class="form-control input-control"
                    placeholder="Password"
                  />
                </div>
                @if($errors->any())
                  {!! implode('', $errors->all('
                    <div class="form-group">
                      <div class="alert alert-warning">
                        :message
                      </div>
                    </div>')) !!}
                @endif
                  <div class="form-group">
                    <input
                      type="submit"
                      class="btn btn-primary"
                      value="Log in"
                    />
                    <a class="navbar-brand" href="{{ route('register') }}">
                      <input
                        type="button"
                        class="btn btn-outline-primary"
                        value="Register"
                      />
                    </a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
