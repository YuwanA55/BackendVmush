@extends('layout.body')
@section('konten')



<link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/flatpickr/flatpickr.css" />
 <script src="{{asset('assetsadmin')}}/vendor/libs/flatpickr/flatpickr.js"></script>

 <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/sweetalert2/sweetalert2.css" />
 <script src="{{asset('assetsadmin')}}/vendor/libs/sweetalert2/sweetalert2.js"></script>
 <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/animate-css/animate.css" />

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



                    <div class="card mb-4">
                    <h3 class="card-header">Edit Data Pembelian</h3>
                    <hr class="my-0" />
                    <!-- Account -->
                    {{-- <form id="formAccountSettings" action="/DataLink/simpan-Link/{{$main->id}}" method="POST" enctype="multipart/form-data" data-kode-lahan="{{ $main->id }}"> --}}
                    <div class="card-body">
                      <form id="editForm" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="d-flex align-items-start align-items-sm-center mb-2 gap-4">
                      </div>
                        <div class="row">

                          <div class="mb-3 ">
                            <label for="firstName" class="form-label">Kode Pembelian</label>
                            <input
                              class="form-control"
                              type="text"
                              name="id" value="{{$main->id}}" required readonly
                              autofocus />
                          </div>

                          <div class="mb-3 ">
                            <label for="lastName" class="form-label">Username </label>
                            <select name="username" placeholder=""  class="select2 form-select">
                              
                            <option value="{{$main->username}}">{{$main->nama}}</option>
                            <option hidden value=""></option>
                            {{-- <option selected value="{{$main->username}}">{{$main->nama}}</option> --}}
                            @foreach ($alluser as $p)
                            <option value="{{$p->username}}">{{$p->nama}}</option>
                            @endforeach
                                </select>
                          </div>

                          <div class="mb-3 ">
                            <label for="lastName" class="form-label">Paket</label>
                            <select name="paket" placeholder=""  class="select2 form-select">
                              
                            <option value="{{$main->id_paket}}">{{$main->nama_paket}}</option>
                            <option hidden value=""></option>
                            {{-- <option selected value="{{$main->username}}">{{$main->nama}}</option> --}}
                            @foreach ($allpaket as $p)
                            <option value="{{$p->id_paket}}">{{$p->nama_paket}}</option>
                            @endforeach
                                </select>
                          </div>

                          <div class="row mb-3 mt-1">

                        </div>
                        <div class="mt-5 text-end">
                          
                          <button type="submit" id="accountActivation" class="btn btn-primary me-3">Edit Data</button>
                          <a class="btn btn-danger" href="/dashboard/admin/Pembelian/Paket">Kembali </a>

                        </div>
                        </form>
                    </div>
                    <!-- /Account -->
                  </div>

<!-- CUSTOM hanya Huruf -->
<script>
  function validateInput(inputElement) {
      const inputValue = inputElement.value;
      const forbiddenCharacters = /[@1234567890!#^&*.?/|\)({}}''"",<>:;]/g; // Karakter yang tidak diinginkan

      if (forbiddenCharacters.test(inputValue)) {
        document.getElementById('error-message').textContent = 'Tidak boleh mengandung karakter tertentu, seperti @, angka, atau karakter lainnya.';
        inputElement.value = inputValue.replace(forbiddenCharacters, ''); // Menghapus karakter yang tidak diinginkan
      } else {
        document.getElementById('error-message').textContent = '';
      }
    }
</script>
<!-- CUSTOM hanya Huruf -->

<!-- CUSTOM TANGGAL -->
<script>
  'use strict';

(function () {

  const flatpickrDate = document.querySelector('#flatpickr-date');

  if (flatpickrDate) {
    flatpickrDate.flatpickr({
      monthSelectorType: 'static'
    });
  }

})();
</script>
<!-- CUSTOM TANGGAL -->






{{-- CUSTOM COBA EDIT --}}

<script>
$(document).ready(function() {
    $('#editForm').submit(function(e) {
        e.preventDefault();

        Swal.fire({
        title: 'Apakah Anda yakin ingin mengedit data?',
        text: "Tindakan ini tidak dapat dibatalkan!",
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
                var id = "{{ $main->id }}";
                var url = "{{ route('simpan.paket', ['id' => ':id']) }}".replace(':id', id);
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
                            window.location.href = "{{ route('datapembelian') }}";
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



@endsection