@extends('layout.body')
@section('konten')

<link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/animate-css/animate.css" />
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/sweetalert2/sweetalert2.css" />

<!-- build:js assets/vendor/js/core.js -->
<script src="{{asset('assetsadmin')}}/vendor/libs/jquery/jquery.js"></script>
<script src="{{asset('assetsadmin')}}/vendor/libs/popper/popper.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="{{asset('assetsadmin')}}/js/ui-modals.js"></script>
<script src="{{asset('assetsadmin')}}/vendor/libs/sweetalert2/sweetalert2.js"></script>
<script src="{{asset('assetsadmin')}}/vendor/libs/flatpickr/flatpickr.js"></script>
<link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/flatpickr/flatpickr.css" />

<div class="card mb-4">
    <h3 class="card-header">Edit Data Pembelian</h3>
    <hr class="my-0" />
    <div class="card-body">
        <form id="editForm" action="{{ route('simpan.paket', ['id_sewa' => $main->id_sewa]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="d-flex align-items-start align-items-sm-center mb-2 gap-4"></div>

            <div class="modal-body">
                <div class="row">
                    <div class="d-flex align-items-start align-items-sm-center mb-3 gap-4">
                        <img src="{{$main->gambar_sewa}}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                        <a target="__blank" href="{{$main->gambar_sewa}}" class="btn btn-primary mb-3">
                            <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                            <span class="d-none text-white d-sm-block">Bukti Pembayaran</span>
                        </a>
                    </div>
                </div>
                <div class="row g-2 mb-3">
                    <div class="col-sm-6">
                        <label for="nameLarge" class="form-label">Id Pembelian</label>
                        <input type="text" name="id" readonly value="{{$main->id_sewa}}" required class="form-control" />
                    </div>
                    <div class="col-sm-6">
                        <label for="nameLarge" class="form-label">Nama User</label>
                        <input type="text" name="id" readonly value="{{$main->nama}}" required class="form-control" />
                    </div>
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-sm-6">
                        <label for="nameLarge" class="form-label">Nama Paket</label>
                        <input type="text" name="id" readonly value="{{$main->nama_paket}}" required class="form-control" />
                    </div>
                    <div class="col-sm-6">
                        <label for="nameLarge" class="form-label">Tanggal Pembelian</label>
                        <input type="text" name="id" readonly value="{{$main->tanggal_pembelian}}" required class="form-control" />
                    </div>
                </div>

                <div class="col mb-3">
                    <label for="dobLarge" class="form-label">Update Status Pembayaran</label>
                    <select name="status_sewa" class="select2 form-select" id="statusSewa">
                        <option value="Berhasil">Berhasil</option>
                        <option value="Pending">Pending</option>
                        <option value="Ditolak">Ditolak</option>
                    </select>
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-sm-6">
                        <label for="nameLarge" class="form-label">Tanggal Awal Sewa</label>
                        <input type="text" placeholder="YYYY-MM-DD" name="tanggal_sewa" id="flatpickr-datee" class="form-control" />
                    </div>
                    <div class="col-sm-6">
                        <label for="nameLarge" class="form-label">Tanggal Akhir Sewa</label>
                        <input type="text" placeholder="YYYY-MM-DD" name="tanggal_akhir" id="flatpickr-date" class="form-control" />
                    </div>
                </div>

                <br>
                <input type="datetime-local" id="tgl" hidden name="tanggal_create" />
            </div>

            <div class="mt-5 text-end">
                <button type="submit" id="accountActivation" class="btn btn-primary me-3">Edit Data Sewa</button>
                <a class="btn btn-danger" href="/dashboard/admin/Penyewaan/Paket">Kembali </a>
            </div>
        </form>
    </div>
</div>

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


<script>
  // Mendapatkan elemen select
  const selectElement = document.getElementById('statusSewa');

  // Menentukan nilai default yang sudah dipilih
  const defaultValue = "{{$main->status_sewa}}"; // Misalnya $p->status_sewa adalah nilai yang sudah dipilih sebelumnya
  
  // Fungsi untuk menambah default value dan menyembunyikan opsi yang dipilih
  window.onload = function() {
    // Membuat option yang dipilih sebagai default
    const selectedOption = document.createElement('option');
    selectedOption.value = defaultValue;
    selectedOption.textContent = defaultValue;
    selectedOption.selected = true;
    selectElement.prepend(selectedOption); // Menambahkan option default ke awal select

    // Menyembunyikan opsi yang sudah dipilih
    const options = selectElement.querySelectorAll('option');
    options.forEach(function(option) {
      if (option.value === defaultValue) {
        option.style.display = 'none'; // Menyembunyikan opsi yang sudah dipilih
      }
    });
  }

  // Memperbarui dropdown jika ada perubahan
  selectElement.addEventListener('change', function() {
    const selectedValue = selectElement.value;
    // Menyembunyikan opsi yang sudah dipilih
    const options = selectElement.querySelectorAll('option');
    options.forEach(function(option) {
      if (option.value === selectedValue) {
        option.style.display = 'none'; // Menyembunyikan opsi yang sudah dipilih
      } else {
        option.style.display = 'block'; // Menampilkan opsi lainnya
      }
    });
  });
</script>

<script>
    $(document).ready(function () {
        // Initialize Flatpickr for date selection
        flatpickr("#flatpickr-datee", { monthSelectorType: 'static' });
        flatpickr("#flatpickr-date", { monthSelectorType: 'static' });

        $('#editForm').submit(function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Apakah Anda yakin ingin mengedit data?',
                text: "Tindakan ini tidak dapat dibatalkan!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
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
                    var formData = new FormData($(this)[0]);
                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: formData,
                        async: false,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses!',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 1700
                            }).then(() => {
                                window.location.href = "{{ route('datapembelian') }}";
                            });
                        },
                        error: function (xhr, status, error) {
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
