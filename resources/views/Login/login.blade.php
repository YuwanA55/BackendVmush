<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{asset('assetsadmin')}}/"
  data-template="vertical-menu-template">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login Sip-Kopi</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assetsadmin')}}/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/sweetalert2/sweetalert2.css" />
    <script src="{{asset('assetsadmin')}}/vendor/libs/sweetalert2/sweetalert2.js"></script>
    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="{{asset('assetsadmin')}}/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{asset('assetsadmin')}}/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('assetsadmin')}}/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

              <script>
            function showAlerte() {
                Swal.fire({
                    title: 'Fitur Segera Hadir!',
                    text: 'Bersabar Yah...',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2500
                });
            }
            </script>

    <div class="authentication-wrapper authentication-cover authentication-bg">
      <div class="authentication-inner row">
        <!-- /Left Text -->
        <div class="d-none d-lg-flex col-lg-7 p-0">
          <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
            <img
              src="{{asset('assetsadmin')}}/img/illustrations/auth-login-illustration-light.png"
              alt="auth-login-cover"
              class="img-fluid my-5 auth-illustration"
              data-app-light-img="illustrations/auth-login-illustration-light.png"
              data-app-dark-img="illustrations/auth-login-illustration-dark.png" />

            <img
              src="{{asset('assetsadmin')}}/img/illustrations/bg-shape-image-light.png"
              alt="auth-login-cover"
              class="platform-bg"
              data-app-light-img="illustrations/bg-shape-image-light.png"
              data-app-dark-img="illustrations/bg-shape-image-dark.png" />
          </div>
        </div>
        <!-- /Left Text -->

        <!-- Login -->
        <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
          <div class="w-px-400 mx-auto">
            <!-- Logo -->
            <div class="app-brand mb-4">
              <a href="#" class="app-brand-link gap-2">
              
                    <img src="{{asset('assetsadmin')}}/img/flipvmush55.png" alt="" srcset="">
                
              </a>
            </div>
            <!-- /Logo -->
            <h3 class="mb-1 fw-bold">Welcome to Vmush! 👋</h3>
            <p class="mb-4">Mohon Login dengan akun kamu dan rasakan pengalaman baru!</p>
            <form class="user" action="/authlogin" method="POST">
              @csrf
              <div class="mb-3">
                <label for="email" class="form-label">Username</label>
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="username"
                  placeholder="Enter your username"
                  autofocus
                  required
                   />
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Password</label>
                  <a class="text-primary ssse" onclick="showAlerte()">
                    <small>Forgot Password?</small>
                  </a>
                </div>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password"
                    class="form-control"
                    name="password"
                    required
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                </div>
              </div>
              @if (session('error'))
              <p class="text-danger">{{ session('error') }}</p>
          @endif
              <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="remember-me" />
                  <label class="form-check-label" for="remember-me"> Remember Me </label>
                </div>
              </div>
              <button type="submit" name="submit" class="btn btn-primary d-grid w-100">Login</button>
            </form>
            <br>

            <p class="text-center">
              <span>New on our platform?</span>
              <a class="text-primary ssse" onclick="showAlerte()">
                <span>Create an account</span>
              </a>
            </p>

            <div class="divider my-4">
              <div class="divider-text">or</div>
            </div>

            <div class="d-flex justify-content-center">
              {{-- <a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
                <i class="tf-icons fa-brands fa-facebook-f fs-5"></i>
              </a> --}}

              <a href="javascript:;" class="btn btn-icon btn-label-google-plus me-3">
                <i class="tf-icons fa-brands fa-google fs-5"></i>
              </a>
{{-- 
              <a href="javascript:;" class="btn btn-icon btn-label-twitter">
                <i class="tf-icons fa-brands fa-twitter fs-5"></i>
              </a> --}}
            </div>
          </div>
        </div>
        <!-- /Login -->
      </div>
    </div>

    <style>
          
      .ssse{
      cursor:pointer;
      }
      
      </style>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('assetsadmin')}}/vendor/js/core.js"></script>
    <script src="{{asset('assetsadmin')}}/js/main.js"></script>

    <!-- Page JS -->

  </body>
</html>
