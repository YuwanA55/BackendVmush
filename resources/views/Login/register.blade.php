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

    <title>Register Basic - Pages | Vuexy - Bootstrap Admin Template</title>

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

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center mb-4 mt-2">
                <a href="index.html" class="app-brand-link gap-2">
                   <img src="{{asset('assetsadmin')}}/img/flipvmush55.png" alt="" srcset="">
                  <span class="app-brand-text demo text-body fw-bold ms-1">Vmush</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-1 pt-2">Bikin akunmu sekarang! 🚀</h4>
              <p class="mb-4">Vmush: Monitoring dan Penjualan Jamur Tiram</p>

              <form enctype="multipart/form-data" class="mb-3" action="/register/tambah-data" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="username"
                    placeholder="Masukan username"
                    autofocus />
                </div>

                 <div class="mb-3">
                  <label for="email" class="form-label">Nama</label>
                  <input type="text" class="form-control" name="nama" placeholder="Masukkan nama" />
                </div>


                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan email" />
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label">No Handphone</label>
                  <input type="Number" class="form-control" name="nohp" placeholder="Masukkan No hp" />
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label">Alamat</label>
                  <input type="text" class="form-control" name="alamat" placeholder="Masukkan alamat" />
                </div>

                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="pass"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password" />
                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                  </div>
                </div>

             <div class="mb-3">
                  <label for="email" class="form-label">Gambar Profile</label>
                  <input type="file" class="form-control" name="upload" />
                </div>

                <input type="datetime-local" id="tgl" hidden name="tgl" />

<div class="mb-3 mt-4"></div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                    <label class="form-check-label" for="terms-conditions">
                      I agree to
                      <a href="javascript:void(0);">privacy policy & terms</a>
                    </label>
                  </div>
                </div>
                <button class="btn btn-primary d-grid w-100">Sign up</button>
              </form>

              <p class="text-center">
                <span>Already have an account?</span>
                <a href="/login">
                  <span>Sign in instead</span>
                </a>
              </p>

              <div class="divider my-4">
                <div class="divider-text">or</div>
              </div>

              <div class="d-flex justify-content-center">
                {{-- <a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
                  <i class="tf-icons fa-brands fa-facebook-f fs-5"></i>
                </a>

                <a href="javascript:;" class="btn btn-icon btn-label-google-plus me-3">
                  <i class="tf-icons fa-brands fa-google fs-5"></i>
                </a>

                <a href="javascript:;" class="btn btn-icon btn-label-twitter">
                  <i class="tf-icons fa-brands fa-twitter fs-5"></i>
                </a> --}}
              </div>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- / Content -->

                      <script>
                    // Fungsi untuk mengatur nilai elemen input datetime-local menjadi tanggal dan waktu saat ini
                    function setDateTime() {
                        var now = new Date(); // Mendapatkan tanggal dan waktu saat ini
                        var year = now.getFullYear();
                        var month = (now.getMonth() + 1).toString().padStart(2, '0'); // Bulan dimulai dari 0
                        var day = now.getDate().toString().padStart(2, '0');
                        var hours = now.getHours().toString().padStart(2, '0');
                        var minutes = now.getMinutes().toString().padStart(2, '0');
                        var dateTimeString = year + '-' + month + '-' + day + 'T' + hours + ':' + minutes;
                        document.getElementById('tgl').value = dateTimeString; // Mengatur nilai elemen input
                    }
            
                    // Panggil fungsi setDateTime saat halaman dimuat
                    setDateTime();
                </script>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('assetsadmin')}}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/libs/popper/popper.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/js/bootstrap.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/libs/node-waves/node-waves.js"></script>

    <script src="{{asset('assetsadmin')}}/vendor/libs/hammer/hammer.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/libs/i18n/i18n.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="{{asset('assetsadmin')}}/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{asset('assetsadmin')}}/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

    <!-- Main JS -->
    <script src="{{asset('assetsadmin')}}/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{asset('assetsadmin')}}/js/pages-auth.js"></script>
  </body>
</html>