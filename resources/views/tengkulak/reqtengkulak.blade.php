@extends('tengkulak.linkaset')
@section('kontentengkulak')

<?php
$query = DB::select("SELECT * FROM permintaan_stok ORDER BY id_stok DESC LIMIT 1");
$lastCode = "STK0000";

if ($query) {
    $lastCode = $query[0]->id_stok;
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

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('assetsadmin/vendor/libs/animate-css/animate.css') }}" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" />
<link rel="stylesheet" href="{{ asset('assetsadmin/vendor/libs/sweetalert2/sweetalert2.css') }}" />
<link rel="stylesheet" href="{{ asset('assetsadmin/vendor/libs/flatpickr/flatpickr.css') }}" />

<!-- Custom CSS -->
<style>
    .card {
        margin: 0px auto;
        max-width: 100%;
    }
    .card-header {
        padding: 1rem;
        /* background-color: #1a2330; */
        color: #fff;
    }
    .table-responsive {
        padding: 0 5px; /* Jarak kiri dan kanan */
    }
    .ssedtt:hover { background-color: #53B956; color: #eaeaea; }
    .ssedtvt:hover { background-color: #EAE041; color: #fff; }
    .ssdelee:hover { background-color: #DE3163; color: #eaeaea; }
    .dt-buttons { display: none; }
    div.dataTables_length { float: left; }
    div.dataTables_filter { float: right; }
    div.dataTables_info { float: left; }
    div.dataTables_paginate { float: right; }
</style>

<!-- Scripts -->
<script src="{{ asset('assetsadmin/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assetsadmin/vendor/libs/popper/popper.js') }}"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="{{ asset('assetsadmin/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
<script src="{{ asset('assetsadmin/vendor/libs/flatpickr/flatpickr.js') }}"></script>

<!-- Success Alert -->
<div class="alert alert-success" role="alert" style="display: none; margin: 10px;">
    Data Permintaan Jamur Telah Ditambahkan!
</div>
<script>
    $(document).ready(function() {
        var urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('alert') === 'success') {
            $('.alert').fadeIn().delay(5000).fadeOut();
        }
    });
</script>

<div class="card p-2">
    <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-center">
        <h2 class="mb-0">Data Permintaan Jamur</h2>
        <div class="d-flex align-items-center mt-2 mt-md-0">
            <div class="btn btn-label-primary dropdown-toggle me-2" data-bs-toggle="dropdown">
                <i class="ti ti-file-export me-sm-1"></i> <span class="d-none d-sm-inline-block">Export</span>
            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
                <i class="ti ti-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Tambah Data</span>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item ssedtt" href="javascript:void(0);" id="csvTable">
                    <i class="ti ti-file-spreadsheet me-1"></i>Excel
                </a>
                <a class="dropdown-item ssedtvt" href="javascript:void(0);" id="excelTable">
                    <i class="ti ti-file-text me-1"></i>CSV
                </a>
                <a class="dropdown-item ssdelee" href="javascript:void(0);" id="pdfTable">
                    <i class="ti ti-file-description me-1"></i>Pdf
                </a>
                <a class="dropdown-item ssdelee" href="javascript:void(0);" id="copyTable">
                    <i class="ti ti-copy me-1"></i>Copy
                </a>
                <a class="dropdown-item ssdelee" href="javascript:void(0);" id="printTable">
                    <i class="ti ti-printer me-1"></i>Print
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="table-user" class="table table-hover display">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Jumlah (KG)</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if(count($permintaan) > 0)
                        @foreach($permintaan as $p)
                            <tr>
                                <td>{{ $p->id_stok }}</td>
                                <td class="p-3">{{ $p->username ?? 'N/A' }}</td>
                                <td>{{ $p->jumlah_stok }}</td>
                                <td>
                                    @if($p->status_permintaan == 'Selesai')
                                        <span class="badge bg-success">Selesai</span>
                                    @elseif($p->status_permintaan == 'Ditolak')
                                        <span class="badge bg-danger">Ditolak</span>
                                    @elseif($p->status_permintaan == 'Pending')
                                        <span class="badge bg-warning">Pending</span>
                                    @else
                                        <span class="badge bg-primary">Masih Tersedia</span>
                                    @endif
                                </td>
                                <td>{{ $p->tanggal_permintaan }}</td>
                                <td></td> <!-- Kolom Aksi dikosongkan, akan diisi oleh DataTables -->
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
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
                    <input type="text" value="{{ $newCode }}" hidden id="id_stok" name="id_stok" />

                    <!-- Username -->
                    <div class="row">
                        <div class="col mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" value="{{ session('username') }}" readonly required class="form-control" placeholder="namakamu12" />
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

                    <!-- Tanggal Dibutuhkan -->
                    <div class="row">
                        <div class="col mb-3">
                            <label for="dibutuhkan" class="form-label">Butuh Berapa Lama</label>
                            <input type="text" placeholder="YYYY-MM-DD" name="dibutuhkan" id="flatpickr-date" class="form-control" />
                            @error('dibutuhkan')
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

                    <!-- Tanggal (otomatis) -->
                    <input type="datetime-local" hidden id="tgl" name="tgl" />
                    <script>
                        function setDateTime() {
                            var now = new Date();
                            var year = now.getFullYear();
                            var month = (now.getMonth() + 1).toString().padStart(2, '0');
                            var day = now.getDate().toString().padStart(2, '0');
                            var hours = now.getHours().toString().padStart(2, '0');
                            var minutes = now.getMinutes().toString().padStart(2, '0');
                            document.getElementById('tgl').value = `${year}-${month}-${day}T${hours}:${minutes}`;
                        }
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


                   @if(count($permintaan) > 0)
                   @foreach($permintaan as $p)
                  <div class="modal fade" id="largeModal{{$p->id_stok}}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h3 class="modal-title" id="exampleModalLabel3">Detail Permintaan Stok</h3>
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

                      </a>
                  </div>
                          <div class="row">
                            <div class="col mb-3">
                              <label for="nameLarge" class="form-label">ID Permintaan</label>
                              <input type="text" readonly class="form-control" placeholder="" value="{{$p->id_stok}}" />
                            </div>
                          </div>
                          <div class="row g-2 mb-3">
                            <div class="col mb-0">
                              <label for="dobLarge" class="form-label">Username</label>
                              <input type="text" readonly class="form-control" placeholder="" value="{{$p->username}}" />
                            </div>
                            <div class="col mb-0">
                              <label for="emailLarge" class="form-label">Permintaan Stok</label>
                              <input type="email" value="{{$p->jumlah_stok}} KG" readonly class="form-control" placeholder="" />
                            </div>
                          </div>

                          <div class="row g-2 mb-3">
                          {{-- <div class="col mb-0">
                              <label for="emailLarge" class="form-label">Nomor Hp</label>
                              <input type="number" value="62{{$p->nohp}}" readonly class="form-control" placeholder="" />
                            </div> --}}
                            <div class="col mb-0">
                              <label for="emailLarge" class="form-label">Alamat Permintaan</label>
                              <input type="text" value="{{$p->alamat_permintaan}}" readonly class="form-control" placeholder="" />
                            </div>

                            </div>
                           
                            <div class="row g-2 mb-3">
                            <div class="col mb-0">
                              <label for="emailLarge" class="form-label">Status Pembayaran</label>
                              <input type="text" value="{{$p->status_permintaan}}" readonly class="form-control" placeholder="" />
                            </div>
                            <div class="col mb-0">
                              <label for="emailLarge" class="form-label">Tanggal Permintaan</label>
                              <input type="text" class="form-control" value="{{$p->tanggal_permintaan}} " readonly placeholder="" />
                            </div>
                            </div>


                            <div class="row g-2 mb-3">
                             <div class="col mb-0">
                              <label for="emailLarge" class="form-label">Berakhir Permintaan</label>
                              <input type="text" class="form-control" value="{{$p->dibutuhkan}}" readonly placeholder="" />
                            </div>
                            <div class="col mb-0">
                              <label for="emailLarge" class="form-label">Pengambil Stok</label>
                              <input type="text" value="{{$p->user}}" readonly class="form-control" placeholder="" />
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
                @endforeach
 @endif
    {{-- <a class="btn btn-warning me-3" href="/permintaan/jamur/edit/${row.id_stok}">
                            <i class="ti ti-pencil me-1"></i>
                         </a>  --}}

<!-- DataTables Initialization -->
<script>
$(document).ready(function() {
    // Initialize Flatpickr
    flatpickr("#flatpickr-date", { dateFormat: "Y-m-d", monthSelectorType: 'static' });

    // Initialize DataTables
    var table = $('#table-user').DataTable({
        "language": {
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            "paginate": {
                "previous": "Sebelumnya",
                "next": "Selanjutnya"
            },
            "emptyTable": "Tidak ada data yang tersedia"
        },
        "lengthMenu": [10, 25, 50],
        dom: '<"top"Blfr>t<"bottom"ip>',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        "columnDefs": [
            { "targets": 0, "data": "id_stok", "searchable": true, "orderable": true, "render": function(data) { return data || ''; } },
            { "targets": 1, "data": "username", "searchable": true, "orderable": true, "render": function(data) { return data || 'N/A'; } },
            { "targets": 2, "data": "jumlah_stok", "searchable": true, "orderable": true, "render": function(data) { return data ? data + ' KG' : ''; } },
            { "targets": 3, "data": "status_permintaan", "searchable": true, "orderable": true, "render": function(data) {
                // Konfigurasi status dan kelas badge
                const statusConfig = {
                    'Selesai': 'success',
                    'Ditolak': 'danger',
                    'Pending': 'warning',
                    'Masih Tersedia': 'primary'
                };
                // Tentukan kelas badge dan teks status
                const badgeClass = statusConfig[data] || 'secondary';
                const statusText = data || 'Tidak Diketahui';
                return `<span class="">${statusText}</span>`;
            }},
            { "targets": 4, "data": "tanggal_permintaan", "searchable": true, "orderable": true, "render": function(data) { return data || ''; } },
            { "targets": 5, "data": null, "searchable": false, "orderable": false, "render": function(data, type, row) {
                if (!row.id_stok) return ''; // Jika tidak ada data, jangan render tombol
                return `
                    <div class="d-flex">
                        <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#largeModal${row.id_stok}">
                            <i class="ti ti-list-details me-1"></i>
                        </button>
                        <a class="btn btn-danger hapusdataa me-3" href="javascript:void(0);" 
                           data-user="${row.id_stok}" 
                           data-nama="${row.username}">
                            <i class="ti ti-trash me-1"></i>
                        </a>
                    </div>
                `;
            }}
        ],
        "drawCallback": function(settings) {
            // Re-attach event listeners after DataTables redraw
            $('.hapusdataa').off('click').on('click', function() {
                var user = $(this).data('user');
                var nama = $(this).data('nama');

                Swal.fire({
                    title: `Apakah Anda yakin ingin menghapus data id ${user} dengan jumlah ${nama} KG?`,
                    text: "Tindakan ini tidak dapat dibatalkan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus Data!',
                    cancelButtonText: 'Tidak',
                    customClass: {
                        confirmButton: 'btn btn-primary me-3',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'DELETE',
                            url: '/permintaan/jamur/hapus-data/' + user,
                            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Sukses!',
                                    text: response.message,
                                    showConfirmButton: false,
                                    timer: 1800
                                }).then(() => {
                                    window.location.href = "{{ route('permintaanjamur') }}";
                                });
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: xhr.responseJSON?.message || 'Terjadi kesalahan!',
                                    showConfirmButton: false,
                                    timer: 2500
                                });
                            }
                        });
                    }
                });
            });
        }
    });

    // Hide default DataTables buttons
    $('.dt-button').remove();

    // Map dropdown menu clicks to DataTables buttons
    $("#copyTable").on('click', function() { table.button('0').trigger(); });
    $("#csvTable").on('click', function() { table.button('1').trigger(); });
    $("#excelTable").on('click', function() { table.button('2').trigger(); });
    $("#pdfTable").on('click', function() { table.button('3').trigger(); });
    $("#printTable").on('click', function() { table.button('4').trigger(); });
});
</script>

@endsection