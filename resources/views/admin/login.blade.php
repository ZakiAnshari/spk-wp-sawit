<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('back_end/dist/assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('back_end/dist/assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('back_end/dist/assets/modules/bootstrap-social/bootstrap-social.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('back_end/dist/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('back_end/dist/assets/css/components.css') }}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>
<style>
  .rounded-image {
      border-radius: 50%;
  }
</style>
<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">

        

        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand ">
              <a href="/">
             
              
              <img src="{{ asset('back_end/dist/assets/img/sawit.jpg') }}" alt="logo" width="160" class="rounded-image">
              
              </a>
            </div>
            
              @if (session('status'))
                <div class="alert alert-primary text-center">
                    {{ session('message') }}
                </div>
              @endif

            <div class="card card-primary">
              <div class="card-header">
                <h4>Login</h4>
              </div>

              <div class="card-body">
                <form action=""  method="post" class="needs-validation">
                  @csrf
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required>
                    <div class="invalid-feedback" >
                      Please fill in your username
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                  {{-- <div class="text-center">Belum punya akun? <a href="/register">Register</a></div> --}}
                </form>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('back_end/dist/assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('back_end/dist/assets/modules/popper.js') }}"></script>
  <script src="{{ asset('back_end/dist/assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset('back_end/dist/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('back_end/dist/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('back_end/dist/assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('back_end/dist/assets/js/stisla.js') }}"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="{{ asset('back_end/dist/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('back_end/dist/assets/js/custom.js') }}"></script>

  @include('sweetalert::alert')

</body>
</html>

