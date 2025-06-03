@extends('layout.body')
@section('konten')


<link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/sweetalert2/sweetalert2.css" />
<script src="{{asset('assetsadmin')}}/vendor/libs/sweetalert2/sweetalert2.js"></script>
<link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/animate-css/animate.css" />

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-4">
                    <li class="nav-item">
                      <a class="nav-link active" href="/edit/admin/{{$mainn->user}}"
                        ><i class="ti-xs ti ti-users me-1"></i> Edit Akun</a
                      >
                    </li>
                    <li class="nav-item">
                      <button class="nav-link" onclick="showAlerte()"
                        ><i class="ti-xs ti ti-lock me-1"></i> Edit Password</button
                      >
                    </li>

                  </ul>
                  <div class="card mb-1">
                    <h3 class="card-header">Edit Akun Admin</h3>
                    <hr class="my-0" />
                    <!-- Account -->
                    <div class="card-body">
                      <form id="editForm" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="d-flex align-items-start align-items-sm-center mb-4 gap-4">
                        <img
                          src="{{$mainn->gambar}}"
                          alt="user-avatar"
                          class="d-block w-px-100 h-px-100 rounded"
                          name="uploadd"
                          id="uploadedAvatar" />
                        <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                            <span class="d-none d-sm-block">Upload Foto Baru</span>
                            <i class="ti ti-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              value="{{$mainn->gambar}}"
                              id="upload"
                              name="upload"
                              class="account-file-input"
                              hidden
                              accept="image/png, image/jpeg" />
                          </label>
                          <button type="button" class="btn btn-label-secondary account-image-reset mb-3">
                            <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button>

                          <div class="text-muted">Diperbolehkan bentuk JPG, GIF or PNG. Maximum 5MB</div>
                        </div>
                      </div>
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Username</label>
                            <input
                              class="form-control"
                              type="text"
                              name="user"
                              value="{{$mainn->user}}" readonly
                              placeholder="" required
                              autofocus />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Nama Lengkap</label>
                            <input class="form-control" id="inputHuruf" oninput="validateInput(this)" type="text" name="nama" value="{{$mainn->nama}}" required />
                            <span id="error-message" style="color: cyan;"></span>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input
                              class="form-control"
                              type="email"
                              value="{{$mainn->email}}" required
                              name="email"
                              placeholder="john.doe@example.com" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">No HP</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text">ID (+62)</span>
                              <input
                                type="number"
                                value="{{$mainn->nohp}}" required
                                name="nohp"
                                class="form-control"
                                placeholder="" />
                            </div>
                          </div>
                          <div class="mb-4">
                            <label for="address" class="form-label">Lokasi</label>
                            <input type="text" class="form-control"  value="{{$mainn->lokasi}}" required name="lokasi" />
                          </div>
                          {{-- <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">Level Akun</label>
                            <input class="form-control" type="text" value="{{$mainn->level}}" readonly required name="level" placeholder="" />
                          </div> --}}

                        </div>
                        <div class="mt-3 mb-2 text-end">
                          
                          <button type="submit" class="btn btn-primary me-2">Simpan Data</button>
                          
                          <a class="btn btn-label-danger" href="/detail/admin/{{$mainn->user}}">Kembali </a>
                          
                        </div>
                        </form>
                    </div>
                    <!-- /Account -->
               


                </div>
              </div>

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

                <script>
  $(document).ready(function() {
      $('#editForm').submit(function(e) {
          e.preventDefault();
  
          Swal.fire({
          title: 'Apakah Anda yakin ingin mengedit data?',
          icon: 'question',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              // cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, Edit Data!',
              cancelButtonText: 'Tidak',
          showClass: {
            popup: 'animate__animated animate__tada'
          },
          customClass: {
            confirmButton: 'btn btn-primary me-3',
            cancelButton: 'btn btn-danger '
          },
          buttonsStyling: false
          }).then((result) => {
              if (result.isConfirmed) {
                  // Jika pengguna menekan tombol "Ya", lanjutkan dengan penyimpanan data
                  var user = "{{ $mainn->user }}";
                  var url = "{{ route('simpan.admin', ['user' => ':user']) }}".replace(':user', user);
                  var formData = new FormData($(this)[0]);
  
                  $.ajax({
                      url: url,
                      type: 'POST',
                      data: formData,
                      async: false,
                      cache: false,
                      contentType: false,
                      processData: false,
                      success: function(response) {
                          // Tindakan setelah penyimpanan berhasil
                          Swal.fire({
                              icon: 'success',
                              title: 'Sukses!',
                              text: response.message,
                              showConfirmButton: false,
                              timer: 1700
                          }).then(() => {
                              // Setelah 1.7 detik, arahkan kembali ke halaman /data/lahan
                              window.location.href = "/detail/admin/{{ $mainn->user }}";
                          });
                      },
                      error: function(xhr, status, error) {
                          // Tindakan jika ada kesalahan
                          Swal.fire({
                              icon: 'error',
                              title: 'Oops...',
                              text: xhr.responseText
                          });
                      }
                  });
              }
          });
  
          return false;
      });
  });
  
  </script>



              <script>

function validateInput(inputElement) {
      const inputValue = inputElement.value;
      const forbiddenCharacters = /[@1234567890!#^&*]/g; // Karakter yang tidak diinginkan

      if (forbiddenCharacters.test(inputValue)) {
        document.getElementById('error-message').textContent = 'Tidak boleh mengandung karakter tertentu, seperti @, angka, atau karakter lainnya.';
        inputElement.value = inputValue.replace(forbiddenCharacters, ''); // Menghapus karakter yang tidak diinginkan
      } else {
        document.getElementById('error-message').textContent = '';
      }
    }


document.addEventListener('DOMContentLoaded', function () {
  (function () {
    // Update/reset user image on the account page
    const accountUserImage = document.getElementById('uploadedAvatar');
    const fileInput = document.querySelector('.account-file-input');
    const resetFileInput = document.querySelector('.account-image-reset');

    if (accountUserImage) {
      const resetImage = accountUserImage.src;

      fileInput.onchange = () => {
        if (fileInput.files[0]) {
          accountUserImage.src = window.URL.createObjectURL(fileInput.files[0]);
        }
      };

      resetFileInput.onclick = () => {
        fileInput.value = '';
        accountUserImage.src = resetImage;
      };
    }
  })();
});

</script>



@endsection