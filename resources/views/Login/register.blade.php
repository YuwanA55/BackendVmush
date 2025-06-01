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

    <!-- Custom CSS for validation and password toggle -->
    <style>
      .is-invalid {
        border-color: #dc3545 !important;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25) !important;
      }
      
      .invalid-feedback {
        display: block !important;
        color: #dc3545 !important;
        font-size: 0.875em !important;
        margin-top: 0.25rem !important;
      }
      
      .form-control:focus.is-invalid {
        border-color: #dc3545 !important;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25) !important;
      }
      
      .valid-feedback {
        display: block !important;
        color: #28a745 !important;
        font-size: 0.875em !important;
        margin-top: 0.25rem !important;
      }

      /* Fixed password toggle styles */
      .form-password-toggle {
        position: relative;
      }
      
      .form-password-toggle .input-group {
        position: relative;
        display: flex;
      }
      
      .form-password-toggle .input-group-text {
        position: absolute;
        right: 1px;
        top: 1px;
        bottom: 1px;
        z-index: 10;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        padding: 0;
        background: transparent;
        border: none;
        cursor: pointer;
        pointer-events: auto;
      }
      
      .form-password-toggle .form-control {
        padding-right: 45px !important;
        position: relative;
        z-index: 1;
      }
      
      .form-password-toggle .input-group-text:hover {
        background: rgba(0,0,0,0.05);
        border-radius: 0 4px 4px 0;
      }
      
      .form-password-toggle .input-group-text i {
        font-size: 1.2rem;
        color: #6c757d;
      }
    </style>

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
                  <small class="form-text text-muted">*Masukkan username unik untuk akun Anda</small>
                </div>

                 <div class="mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" />
                  <small class="form-text text-muted">*Masukkan nama lengkap Anda</small>
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" />
                  <small class="form-text text-muted">*Masukkan alamat email yang valid untuk verifikasi akun</small>
                </div>

                <div class="mb-3">
                  <label for="nohp" class="form-label">No Handphone</label>
                  <input type="number" class="form-control" id="nohp" name="nohp" placeholder="Masukkan No hp" />
                  <small class="form-text text-muted">*Masukkan nomor handphone yang aktif (contoh: 08123456789)</small>
                </div>

                <div class="mb-3">
                  <label for="alamat" class="form-label">Alamat</label>
                  <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" />
                  <small class="form-text text-muted">*Masukkan alamat lengkap tempat tinggal Anda</small>
                </div>

                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="pass"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password" />
                    <span class="input-group-text cursor-pointer" id="togglePassword">
                      <i class="ti ti-eye-off" id="toggleIcon"></i>
                    </span>
                  </div>
                  <small class="form-text text-muted">*Buat password yang kuat minimal 8 karakter</small>
                </div>

                <div class="mb-3">
                  <label for="upload" class="form-label">Gambar Profile</label>
                  <input type="file" class="form-control" id="upload" name="upload" accept="image/*" />
                  <small class="form-text text-muted">*Upload foto profil Anda (format: JPG, PNG, maksimal 2MB)</small>
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
                  <small class="form-text text-muted">*Anda harus menyetujui syarat dan ketentuan untuk melanjutkan</small>
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

      // Password toggle functionality
      function initPasswordToggle() {
          const toggleButton = document.getElementById('togglePassword');
          const passwordInput = document.getElementById('password');
          const toggleIcon = document.getElementById('toggleIcon');

          if (toggleButton && passwordInput && toggleIcon) {
              toggleButton.addEventListener('click', function(e) {
                  e.preventDefault();
                  e.stopPropagation();
                  
                  console.log('Toggle clicked'); // Debug log
                  
                  // Toggle the type attribute
                  const currentType = passwordInput.getAttribute('type');
                  const newType = currentType === 'password' ? 'text' : 'password';
                  passwordInput.setAttribute('type', newType);
                  
                  // Toggle the eye icon
                  if (newType === 'password') {
                      toggleIcon.className = 'ti ti-eye-off';
                  } else {
                      toggleIcon.className = 'ti ti-eye';
                  }
              });
              
              // Also add click event to the icon itself
              toggleIcon.addEventListener('click', function(e) {
                  e.preventDefault();
                  e.stopPropagation();
                  toggleButton.click();
              });
          }
      }

      // Fungsi untuk menampilkan error message
      function showError(fieldId, message) {
          const field = document.getElementById(fieldId);
          const errorElement = document.getElementById(fieldId + '-error');
          
          // Hapus error message sebelumnya jika ada
          if (errorElement) {
              errorElement.remove();
          }
          
          // Tambahkan class error pada field
          field.classList.add('is-invalid');
          
          // Buat element error baru
          const errorDiv = document.createElement('div');
          errorDiv.id = fieldId + '-error';
          errorDiv.className = 'invalid-feedback d-block';
          errorDiv.style.color = '#dc3545';
          errorDiv.style.fontSize = '0.875em';
          errorDiv.style.marginTop = '0.25rem';
          errorDiv.innerHTML = '<i class="ti ti-alert-circle me-1"></i>' + message;
          
          // Insert error message setelah field
          field.parentNode.insertBefore(errorDiv, field.nextSibling);
      }

      // Fungsi untuk menghapus error message
      function clearError(fieldId) {
          const field = document.getElementById(fieldId);
          const errorElement = document.getElementById(fieldId + '-error');
          
          if (errorElement) {
              errorElement.remove();
          }
          field.classList.remove('is-invalid');
      }

      // Validasi Username
      function validateUsername() {
          const username = document.getElementById('username').value;
          const invalidChars = /[{}[\]()]/;
          
          if (invalidChars.test(username)) {
              showError('username', 'Username tidak boleh mengandung kurung kurawal {} atau kurung siku []');
              return false;
          } else if (username.length < 3) {
              showError('username', 'Username minimal 3 karakter');
              return false;
          } else if (username.length > 20) {
              showError('username', 'Username maksimal 20 karakter');
              return false;
          } else {
              clearError('username');
              return true;
          }
      }

      // Validasi Nama
      function validateNama() {
          const nama = document.getElementById('nama').value;
          const invalidChars = /[{}[\]()<>]/;
          const minLength = 2;
          
          if (invalidChars.test(nama)) {
              showError('nama', 'Nama tidak boleh mengandung karakter khusus seperti {}, [], (), <>');
              return false;
          } else if (nama.length < minLength) {
              showError('nama', 'Nama minimal 2 karakter');
              return false;
          } else {
              clearError('nama');
              return true;
          }
      }

      // Validasi Email
      function validateEmail() {
          const email = document.getElementById('email').value;
          const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
          
          if (!emailRegex.test(email)) {
              showError('email', 'Format email tidak valid (contoh: user@domain.com)');
              return false;
          } else {
              clearError('email');
              return true;
          }
      }

      // Validasi No HP
      function validateNoHP() {
          const nohp = document.getElementById('nohp').value;
          const phoneRegex = /^[0-9+\-\s()]{10,15}$/;
          
          if (!phoneRegex.test(nohp)) {
              showError('nohp', 'Nomor HP harus berupa angka 10-15 digit');
              return false;
          } else if (nohp.length < 10) {
              showError('nohp', 'Nomor HP minimal 10 digit');
              return false;
          } else {
              clearError('nohp');
              return true;
          }
      }

      // Validasi Password
      function validatePassword() {
          const password = document.getElementById('password').value;
          const minLength = 8;
          const hasUpperCase = /[A-Z]/.test(password);
          const hasLowerCase = /[a-z]/.test(password);
          const hasNumbers = /\d/.test(password);
          
          if (password.length < minLength) {
              showError('password', 'Password minimal 8 karakter');
              return false;
          } else if (!hasUpperCase || !hasLowerCase || !hasNumbers) {
              showError('password', 'Password harus mengandung huruf besar, huruf kecil, dan angka');
              return false;
          } else {
              clearError('password');
              return true;
          }
      }

      // Validasi File Upload
      function validateFileUpload() {
          const fileInput = document.getElementById('upload');
          const file = fileInput.files[0];
          
          if (file) {
              const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
              const maxSize = 2 * 1024 * 1024; // 2MB
              
              if (!allowedTypes.includes(file.type)) {
                  showError('upload', 'Format file harus JPG, JPEG, atau PNG');
                  return false;
              } else if (file.size > maxSize) {
                  showError('upload', 'Ukuran file maksimal 2MB');
                  return false;
              } else {
                  clearError('upload');
                  return true;
              }
          }
          return true;
      }

      // Event listeners untuk validasi real-time
      document.addEventListener('DOMContentLoaded', function() {
          setDateTime();
          initPasswordToggle(); // Initialize password toggle
          
          // Username validation
          document.getElementById('username').addEventListener('input', validateUsername);
          document.getElementById('username').addEventListener('blur', validateUsername);
          
          // Nama validation
          document.getElementById('nama').addEventListener('input', validateNama);
          document.getElementById('nama').addEventListener('blur', validateNama);
          
          // Email validation
          document.getElementById('email').addEventListener('blur', validateEmail);
          
          // No HP validation
          document.getElementById('nohp').addEventListener('input', function() {
              // Hanya izinkan angka, +, -, spasi, dan kurung
              this.value = this.value.replace(/[^0-9+\-\s()]/g, '');
          });
          document.getElementById('nohp').addEventListener('blur', validateNoHP);
          
          // Password validation
          document.getElementById('password').addEventListener('blur', validatePassword);
          
          // File upload validation
          document.getElementById('upload').addEventListener('change', validateFileUpload);
          
          // Form submission validation
          document.querySelector('form').addEventListener('submit', function(e) {
              const isUsernameValid = validateUsername();
              const isNamaValid = validateNama();
              const isEmailValid = validateEmail();
              const isNoHPValid = validateNoHP();
              const isPasswordValid = validatePassword();
              const isFileValid = validateFileUpload();
              const isTermsChecked = document.getElementById('terms-conditions').checked;
              
              if (!isTermsChecked) {
                  alert('Anda harus menyetujui syarat dan ketentuan');
                  e.preventDefault();
                  return false;
              }
              
              if (!isUsernameValid || !isNamaValid || !isEmailValid || !isNoHPValid || !isPasswordValid || !isFileValid) {
                  e.preventDefault();
                  alert('Mohon perbaiki kesalahan pada form sebelum melanjutkan');
                  return false;
              }
          });
      });
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