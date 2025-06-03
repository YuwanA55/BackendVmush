<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="{{asset('assetsadmin')}}/" data-template="vertical-menu-template">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Lupa Password - Vmush</title>
  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{asset('assetsadmin')}}/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

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
  <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
  <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/sweetalert2/sweetalert2.css" />

  <!-- Page CSS -->
  <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/css/pages/page-auth.css" />

  <!-- Helpers -->
  <script src="{{asset('assetsadmin')}}/vendor/js/helpers.js"></script>
  <script src="{{asset('assetsadmin')}}/vendor/js/template-customizer.js"></script>
  <script src="{{asset('assetsadmin')}}/js/config.js"></script>
  <script src="{{asset('assetsadmin')}}/vendor/libs/sweetalert2/sweetalert2.js"></script>
</head>
<body>
  <div class="container">
    <div class="mt-5">
      <div class="row">
        <div class="col-md-12">
          <!-- Forgot Password -->
          <div class="card mb-4">
            <h3 class="card-header">Lupa Password</h3>
            <hr class="my-0" />
            <div class="card-body">
              <form id="formForgotPassword" action="actforgotpassword.php" method="POST" onsubmit="return confirmReset(event)" enctype="multipart/form-data">
                <div class="row">
                  <!-- Username -->
                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="username">Username</label>
                    <input
                      class="form-control"
                      type="text"
                      id="username"
                      name="username"
                      required
                      placeholder="Masukkan username"
                      oninput="validateUser()"
                    />
                  </div>
                  <!-- Email -->
                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="email">Email</label>
                    <input
                      class="form-control"
                      type="email"
                      id="email"
                      name="email"
                      required
                      placeholder="Masukkan email"
                      oninput="validateUser()"
                    />
                  </div>
                </div>
                <!-- Status Display -->
                <div id="status-container" class="mb-3"></div>
                <!-- Password Fields (Initially Hidden) -->
                <div id="password-fields" style="display: none;">
                  <div class="row">
                    <div class="mb-3 col-md-6 form-password-toggle">
                      <label class="form-label" for="newPassword">Sandi Baru</label>
                      <div class="input-group input-group-merge">
                        <input
                          class="form-control"
                          type="password"
                          id="newPassword"
                          name="pass"
                          required
                          placeholder="············"
                          oninput="validatePassword()"
                        />
                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                      </div>
                    </div>
                    <div class="mb-3 col-md-6 form-password-toggle">
                      <label class="form-label" for="confirmPassword">Konfirmasi Sandi Baru</label>
                      <div class="input-group input-group-merge">
                        <input
                          class="form-control"
                          type="password"
                          id="confirmPassword"
                          name="konfirmasi_password"
                          required
                          placeholder="············"
                          oninput="validatePassword()"
                        />
                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                      </div>
                    </div>
                  </div>
                  <div id="password-requirements" class="col-12 mt-3 mb-4">
                    <h6>Persyaratan Sandi:</h6>
                    <ul class="ps-3 mb-0">
                      <li id="length" class="mb-1 text-danger">Panjang minimal 8 karakter</li>
                      <li id="uppercase" class="mb-1 text-danger">Setidaknya satu huruf besar</li>
                      <li id="special" class="mb-1 text-danger">Setidaknya satu angka atau simbol</li>
                      <li id="match" class="mb-1 text-danger">Sandi harus cocok</li>
                    </ul>
                  </div>
                </div>
                <div id="message-container"></div>
                <div>
                  <button type="submit" id="resetPassword" class="btn btn-primary me-2" disabled>Ubah Sandi</button>
                  <a href="detailadmin.php" class="btn btn-label-danger">Kembali</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Core JS -->
  <script src="{{asset('assetsadmin')}}/vendor/js/core.js"></script>
  <script src="{{asset('assetsadmin')}}/js/main.js"></script>

  <!-- Validation Script -->
  <script>
    let isPasswordValid = false;

    function validatePassword() {
      const newPassword = document.getElementById('newPassword').value;
      const confirmPassword = document.getElementById('confirmPassword').value;
      const submitButton = document.getElementById('resetPassword');
      
      // Password requirements
      const lengthCheck = newPassword.length >= 8;
      const uppercaseCheck = /[A-Z]/.test(newPassword);
      const specialCheck = /[0-9!@#$%^&*]/.test(newPassword);
      const matchCheck = newPassword === confirmPassword && newPassword !== '';

      // Update visual feedback
      document.getElementById('length').className = lengthCheck ? 'mb-1 text-success' : 'mb-1 text-danger';
      document.getElementById('uppercase').className = uppercaseCheck ? 'mb-1 text-success' : 'mb-1 text-danger';
      document.getElementById('special').className = specialCheck ? 'mb-1 text-success' : 'mb-1 text-danger';
      document.getElementById('match').className = matchCheck ? 'mb-1 text-success' : 'mb-1 text-danger';

      // Update submit button state
      isPasswordValid = lengthCheck && uppercaseCheck && specialCheck && matchCheck;
      if (document.getElementById('password-fields').style.display === 'block') {
        submitButton.disabled = !isPasswordValid;
      }
    }

    function validateUser() {
      const username = document.getElementById('username').value.trim();
      const email = document.getElementById('email').value.trim();
      const statusContainer = document.getElementById('status-container');
      const passwordFields = document.getElementById('password-fields');
      const submitButton = document.getElementById('resetPassword');

      if (username && email) {
        statusContainer.innerHTML = '<div class="alert alert-info">Memvalidasi akun...</div>';
        
        fetch('validate_user.php', {
          method: 'POST',
          headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
          body: `username=${encodeURIComponent(username)}&email=${encodeURIComponent(email)}`
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            statusContainer.innerHTML = `<div class="alert alert-success">Akun ditemukan! Status: ${data.status}</div>`;
            passwordFields.style.display = 'block';
            submitButton.disabled = !isPasswordValid;
          } else {
            statusContainer.innerHTML = `<div class="alert alert-danger">${data.message}</div>`;
            passwordFields.style.display = 'none';
            submitButton.disabled = true;
          }
        })
        .catch(error => {
          console.error('Error:', error);
          statusContainer.innerHTML = '<div class="alert alert-danger">Terjadi kesalahan saat memvalidasi. Silakan coba lagi.</div>';
          passwordFields.style.display = 'none';
          submitButton.disabled = true;
        });
      } else {
        statusContainer.innerHTML = '';
        passwordFields.style.display = 'none';
        submitButton.disabled = true;
      }
    }

    function confirmReset(event) {
      event.preventDefault();

      if (!isPasswordValid) {
        Swal.fire({
          icon: 'error',
          title: 'Sandi Tidak Valid',
          text: 'Pastikan semua persyaratan sandi terpenuhi!',
          customClass: {
            confirmButton: 'btn btn-primary'
          },
          buttonsStyling: false
        });
        return;
      }

      Swal.fire({
        title: 'Apakah yakin ingin mengubah sandi?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
        customClass: {
          confirmButton: 'btn btn-primary me-2',
          cancelButton: 'btn btn-label-secondary'
        },
        buttonsStyling: false
      }).then((result) => {
        if (result.isConfirmed) {
          const formData = new FormData(document.getElementById('formForgotPassword'));

          fetch('actforgotpassword.php', {
            method: 'POST',
            body: formData
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              Swal.fire({
                icon: 'success',
                title: 'Sandi Berhasil Diubah',
                showConfirmButton: false,
                timer: 1500
              });
              setTimeout(() => {
                window.location.href = 'detailadmin.php';
              }, 1500);
            } else {
              document.getElementById('message-container').innerHTML = `<div class="alert alert-danger">${data.message}</div>`;
            }
          })
          .catch(error => {
            console.error('Error:', error);
            document.getElementById('message-container').innerHTML = '<div class="alert alert-danger">Terjadi kesalahan saat menyimpan data. Silakan coba lagi.</div>';
          });
        }
      });
    }
  </script>
</body>
</html>