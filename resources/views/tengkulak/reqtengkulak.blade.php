{{-- <!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>JamurMarket - Permintaan</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    
    select:focus {
        outline: none;
        box-shadow: 0 0 0 2px rgba(34, 197, 94, 0.4);
      }
      
      tbody tr {
        transition: background-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
      }
      
      tbody tr:hover {
        background-color: #f0fdf4;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); 
         transform: translateX(5px) 
      }
      
      /* Ensuring scroll functionality */
      .bg-white.overflow-x-auto {
        overflow-x: auto;
        overflow-y: auto;
        max-height: 500px; /* Adjust as necessary */
      }
      
      table {
        width: 100%;
        table-layout: fixed;
      }
      
            
      
  </style>
</head>
<body class="bg-gray-100 font-sans">
  <div class="p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
      <div class="text-2xl font-bold text-green-700">Jamur<span class="text-black">Market</span></div>
      <a href="hh.html">
        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow-md">
          + Tambah Permintaan
        </button>
      </a>
    </div>

    {{session('nama')}}

    <!-- Search & Filter -->
    <div class="bg-white p-4 rounded shadow mb-4 flex flex-col md:flex-row md:items-center md:justify-between gap-2">
      <input type="text" placeholder="Cari permintaan..." class="border border-gray-300 rounded px-4 py-2 w-full md:w-1/3" />
      <select class="border border-gray-300 bg-white rounded px-4 py-2 w-full md:w-auto cursor-pointer hover:border-green-500 focus:ring-2 focus:ring-green-300 transition">
        <option>Semua Status</option>
        <option>Pending</option>
        <option>Disetujui</option>
      </select>
    </div>

    <!-- Table -->
    <div class="bg-white rounded shadow overflow-x-auto">
      <table class="min-w-full table-auto">
        <thead class="bg-gray-100">
          <tr class="text-left text-gray-600 text-sm">
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Pengguna</th>
            <th class="px-4 py-2">Jumlah Stok</th>
            <th class="px-4 py-2">Alamat</th>
            <th class="px-4 py-2">Status</th>
            <th class="px-4 py-2">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-t hover:shadow-md">
            <td class="px-4 py-3">#001</td>
            <td class="px-4 py-3 flex items-center gap-2">
              <img src="https://randomuser.me/api/portraits/women/1.jpg" class="w-8 h-8 rounded-full" alt="avatar" />
              Sarah Putri
            </td>
            <td class="px-4 py-3">50 kg</td>
            <td class="px-4 py-3">Pasar Induk, Bondowoso</td>
            <td class="px-4 py-3">
              <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-1 rounded">Pending</span>
            </td>
            <td class="px-4 py-3 space-x-2 text-blue-600 text-lg">
              <button>👁️</button>
              <button>✏️</button>
              <button class="text-red-500">🗑️</button>
            </td>
          </tr>

        </tbody>
      </table>
    </div>

    <!-- Footer & Pagination -->
    <div class="flex justify-between items-center mt-4 text-sm text-gray-600">
      <span>Menampilkan 1-10 dari 50 data</span>
      <div class="flex space-x-1">
        <button class="px-2 py-1 border rounded text-gray-700">&lt;</button>
        <button class="px-3 py-1 bg-green-600 text-white rounded">1</button>
        <button class="px-3 py-1 border rounded">2</button>
        <button class="px-3 py-1 border rounded">3</button>
        <button class="px-2 py-1 border rounded text-gray-700">&gt;</button>
      </div>
    </div>
  </div>
</body>
</html> --}}



@extends('tengkulak.linkaset')
@section('kontentengkulak')

<?php
$query = DB::select("SELECT * FROM permintaan_stok");
$lastCode = "STK0000";

if ($query) {
    $lastCode = $query[count($query) - 1]->id_stok;
}

$lastNumber = (int)substr($lastCode, 3);
$newNumber = $lastNumber + 1;

if ($newNumber < 10) {
    $newCode = "STK000" . $newNumber;
} elseif ($newNumber < 100) {
    $newCode = "STK00" . $newNumber;
} else {
    $newCode = "STK0" . $newNumber;
}

?>

<!-- Page CSS -->
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/css/pages/cards-advance.css" />
    <!-- Helpers -->
    <script src="{{asset('assetsadmin')}}/vendor/js/helpers.js"></script>

<link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/animate-css/animate.css" />
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/sweetalert2/sweetalert2.css" />

                  <!-- build:js assets/vendor/js/core.js -->
     <script src="{{asset('assetsadmin')}}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/libs/popper/popper.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="{{asset('assetsadmin')}}/js/ui-modals.js"></script>
   <script src="{{asset('assetsadmin')}}/js/pages-account-settings-account.js"></script> 
    <script src="{{asset('assetsadmin')}}/vendor/libs/sweetalert2/sweetalert2.js"></script>

     <script src="{{asset('assetsadmin')}}/js/main.js"></script>


      <!-- alert data berhasil -->
     
  <div class="alert alert-success" role="alert" style="display: none;">Data Permintaan Jamur Telah Ditambahkan!</div>
  <script>
      $(document).ready(function() {
          // Tangkap parameter alert dari URL dan tampilkan alert jika ada
          var urlParams = new URLSearchParams(window.location.search);
          var alertParam = urlParams.get('alert');
          if (alertParam === 'success') {
              $('.alert').fadeIn().delay(5000).fadeOut(); // Tampilkan alert, kemudian hilangkan setelah 5 detik
          }
      });
  </script>

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

<style>

    .ssedtt{
    cursor:pointer;
    }
    
    </style>




<div class="card">
    <div class="card-header">
<div class=" d-flex flex-column mb-3 flex-md-row justify-content-between align-items-center"> <!-- Menambahkan class align-items-center -->
<h2>Data Permintaan Jamur</h2>
<div >


    <div class="btn btn-label-primary dropdown-toggle me-2" data-bs-toggle="dropdown" ><i class="ti ti-file-export me-sm-1"></i> <span class="d-none d-sm-inline-block">Export</span></div>
    <button type="button" data-bs-toggle="modal" class="btn btn-primary" data-bs-target="#tambahModal"><i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Tambah Data</span></button>

    <div class="dropdown-menu">
     {{-- <a class="dropdown-item" href="javascript:void(0);" id="printTable"
     ><i class="ti ti-copy me-1" ></i>Copy</a> --}}
     <a class="dropdown-item ssedtt" href="javascript:void(0);" id="csvTable"
     ><i class="ti ti-file-spreadsheet me-1" ></i>Exel</a>
     <a class="dropdown-item ssedtvt" href="javascript:void(0);" id="excelTable"
      ><i class="ti ti-file-text me-1"></i>CSV</a>
      <a class="dropdown-item ssdelee" href="javascript:void(0);" id="pdfTable"
      ><i class="ti ti-file-description me-1"></i>Pdf</a>
      <a class="dropdown-item ssdelee" href="javascript:void(0);"  id="copyTable"
      ><i class="ti ti-printer me-1" ></i>Print</a>
    </div>
</div>
</div>


<div class="table-responsive text-nowrap mb-2">
<table id="table-user" class="table table-hove display">
<thead class="table-light">
  <tr>
    <th>No</th>
    <th>Username</th>
    <th>Jumlah (KG)</th>
    <th>Status</th>
    {{-- <th>Alamat</th> --}}
    <th>Tanggal</th>
    <th>Aksi</th>
  </tr>
</thead>
<tbody class="table-border-bottom-0 mb-5">
            @if(count($permintaan) > 0)
                @foreach($permintaan as $p)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td class="p-3">{{ $p->username }}</td>
                    <td>{{ $p->jumlah_stok }} KG</td>
                         <td>
  @if($p->status_permintaan == 'Berhasil')
    <span class="badge bg-success">Berhasil</span>
  @elseif($p->status_permintaan == 'Ditolak')
    <span class="badge bg-danger">Ditolak</span>
  @else
    <span class="badge bg-primary">Pending</span>
  @endif
</td>
                    {{-- <td>{{ $p->alamat_permintaan }}</td> --}}
                    <td>{{ $p->tanggal_permintaan }}</td>
                    <td>
                        {{-- <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="ti ti-dots-vertical"></i>
                            </button> --}}
                            <div class="d-flex">
                                <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#largeModal{{ $p->username }}">
                                    <i class="ti ti-list-details me-1"></i>
                                </button>
                                <a class="btn btn-warning me-3" href="/akun/edit/{{ $p->username }}">
                                    <i class="ti ti-pencil me-1"></i>
                                </a>
                                <a class="btn btn-danger hapusdataa me-3" href="javascript:void(0);" 
                                   data-user="{{ $p->id_stok }}" 
                                   data-nama="{{ $p->username }}"
                                   >
                                    <i class="ti ti-trash me-1"></i>
                                </a>
                            </div>
                        {{-- </div> --}}
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center">No data available</td>
                </tr>
            @endif
        </tbody>

</table >
</div>
</div>


                    
<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" action="/permintaan/jamur/tambah-data" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h3 class="modal-title fw-bold" id="exampleModalLabel3">Tambah Permintaan Jamur</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <hr class="my-0 mb-3" />

                    <!-- Hidden field untuk id_stok -->
                    <input type="text" value="{{ $newCode }}" hidden id="id_stok"  name="id_stok" />

                    <!-- Username -->
                    <div class="row">
                        <div class="col mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" value="{{session('username')}}" readonly required class="form-control" placeholder="namakamu12" />
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Jumlah Stok -->
                    <div class="row">
                        <div class="col mb-3">
                            <label for="jumlah" class="form-label">Jumlah Stok (KG)</label>
                            <input type="number" name="jumlah" required class="form-control" placeholder="10" min="1" />
                            @error('jumlah')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="row">
                        <div class="col mb-3">
                            <label for="alamat" class="form-label">Alamat (harap isi dengan lengkap)</label>
                            <textarea required class="form-control mt-1 mb-4" name="alamat" rows="4"></textarea>
                            @error('alamat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Tanggal (otomatis terisi dengan waktu saat ini) -->
                            <input type="datetime-local" hidden id="tgl"  name="tgl" />

                    <!-- Script untuk mengisi tanggal otomatis -->
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary me-2">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Modal Tambah -->

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



                  <!-- Detail Modal -->
                  {{-- @foreach ($alldata as $p)
                  <div class="modal fade" id="largeModal{{$p->username}}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h3 class="modal-title" id="exampleModalLabel3">Detail Akun</h3>
                          <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        </div>
                        <br>
                        <hr class="my-0" />
                        <div class="modal-body">
                        <div class="d-flex align-items-start align-items-sm-center mb-3 gap-4">
                    <img
                      src="{{$p->gambar}}"
                      alt="user-avatar"
                      class="d-block w-px-100 h-px-100 rounded"
                      id="uploadedAvatar" />

                  </div>
                          <div class="row">
                            <div class="col mb-3">
                              <label for="nameLarge" class="form-label">username</label>
                              <input type="text" readonly class="form-control" placeholder="" value="{{$p->username}}" />
                            </div>
                          </div>
                          <div class="row g-2 mb-3">
                            <div class="col mb-0">
                              <label for="dobLarge" class="form-label">nama</label>
                              <input type="text" readonly class="form-control" placeholder="" value="{{$p->nama}}" />
                            </div>
                            <div class="col mb-0">
                              <label for="emailLarge" class="form-label">Email</label>
                              <input type="email" value="{{$p->email}}" readonly class="form-control" placeholder="" />
                            </div>
                          </div>
                          <div class="row g-2 mb-3">
                          <div class="col mb-0">
                              <label for="emailLarge" class="form-label">Nomor Hp</label>
                              <input type="number" value="62{{$p->nohp}}" readonly class="form-control" placeholder="" />
                            </div>
                            <div class="col mb-0">
                              <label for="emailLarge" class="form-label">alamat</label>
                              <input type="text" value="{{$p->alamat}}" readonly class="form-control" placeholder="" />
                            </div>

                            </div>
                           
                            <div class="row g-2 mb-3">
                            <div class="col mb-0">
                              <label for="emailLarge" class="form-label">Status</label>
                              <input type="text" value="{{$p->status}}" readonly class="form-control" placeholder="" />
                            </div>
                            <div class="col mb-0">
                              <label for="emailLarge" class="form-label">Tanggal Regis</label>
                              <input type="datetime" class="form-control" value="{{$p->tanggal_create}}" readonly placeholder="" />
                            </div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                            Close
                          </button>
                          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach --}}
               


<style>
.ssdele:hover{
background-color:#DE3163;
color:#eaeaea;
}

.ssdelee:hover{
background-color:#DE3163;
color:#eaeaea;
}

.ssedtt:hover{
background-color:#53B956;
color:#eaeaea;
}
.ssedtvt:hover{
background-color:#EAE041;
color: #fff;;
}
#table-controls {
margin-bottom: 10px;
}

/* Menyembunyikan tombol-tombol JS bawaan DataTables */
.dt-buttons {
display: none;
z-index: 100;
}

div.dataTables_length {
float: left;
}
div.dataTables_filter {
float: right;
}


div.dataTables_info {
float: left;
}
div.dataTables_paginate {
float: right;
}

</style>


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



<script>
$(document).ready(function() {
  $('.hapusdataa').click(function() {
      var user = $(this).data('user');
      var nama = $(this).data('nama');

      Swal.fire({
  title: 'Apakah Anda yakin ingin menghapus data nama ' + user + '?',
  text: "Tindakan ini tidak dapat dibatalkan!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  confirmButtonText: 'Ya, Hapus Data!',
  cancelButtonText: 'Tidak',
  showClass: {
      popup: 'animate__animated animate__tada'
  },
  customClass: {
      confirmButton: 'btn btn-primary me-3',
      cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
}).then((result) => {
          if (result.isConfirmed) {
              $.ajax({
                  type: 'DELETE', // Ubah method menjadi DELETE
                  url: '/permintaan/jamur/hapus-data/' + user,
                  data: {
                      _token: '{{ csrf_token() }}'
                  },
                  success: function(response) {
                    if (response.error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 2500
                        });
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses!',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1800
                        }).then(() => {
                            window.location.href = "{{ route('akunuser') }}";
                        });
                    }
                },
                  error: function(xhr, status, error) {
                      Swal.fire({
                          icon: 'error',
                          title: 'Oops...',
                          text: xhr.responseText
                      });
                  }
              });
          }
      });
  });
});
</script>



<script>

document.addEventListener('DOMContentLoaded', function (e) {
(function () {
// Update/reset user image of account page
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



$(document).ready(function() {
// Inisialisasi DataTables
var table = $('#table-user').DataTable({
    "language": {
        "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "paginate": {
            "previous": "Sebelumnya",
            "next": "Selanjutnya"
        },
    },
    "format": {
        body: function (inner, coldex, rowdex) {
            if (!inner) return inner;
            var el = $.parseHTML(inner);
            var result = '';

            el.forEach(function (item) {
                if (item.classList !== undefined && item.classList.contains('user-name')) {
                    result += item.textContent;
                } else {
                    result += item.innerText || item.textContent;
                }
            });

            return result;
        },
    },
    "lengthMenu": [10, 25, 50],
    dom: '<"top"Blfr>t<"bottom"ip>',
});


// Hapus tombol-tombol JS yang ingin Anda sembunyikan
$('.dt-button').remove();

// Tambahkan fungsi klik untuk tombol dropdown menu ke tombol DataTables yang sudah ada
$("#printTable").on('click', function() {
    table.button('0').trigger();
});
$("#csvTable").on('click', function() {
    table.button('1').trigger();
});
$("#excelTable").on('click', function() {
    table.button('2').trigger();
});
$("#pdfTable").on('click', function() {
    table.button('3').trigger();
});
$("#copyTable").on('click', function() {
    table.button('4').trigger();
});
});
</script>


@endsection
