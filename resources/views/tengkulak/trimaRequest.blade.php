@extends('layoutUser.body')
@section('konten')

    <style>
        /* Hover effect for the card */
        .request-card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .request-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Focus effect for select */
        select:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(34, 197, 94, 0.4);
        }
    </style>


<div class="mb-3"></div>
    <!-- Main content -->
   
        <div class="d-flex justify-content-between mb-4">
            <div class="d-flex align-items-center">
                <h4 class=""> Permintaan Stok</h4>
            </div>
            <div class="d-flex gap-3">
                <input type="text" placeholder="Cari permintaan stok..." class="form-control">
                <select class="form-select">
                    <option>Semua Lokasi</option>
                    <option>Bondowoso</option>
                    <option>Jember</option>
                </select>
                <select class="form-select">
                    <option>Urutkan</option>
                    <option>Terbaru</option>
                    <option>Jumlah Stok</option>
                </select>
            </div>
        </div>

        <!-- Request Cards -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <!-- Request 1 -->
            <div class="col">
                <div class="card request-card h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex align-items-center mb-4">
                            <img src="https://randomuser.me/api/portraits/women/1.jpg" alt="avatar" class="rounded-circle" style="width: 48px; height: 48px;">
                            <div class="ms-3">
                                <p class="h6 mb-0">Sarah Putri</p>
                                <p class="text-muted small">5 menit yang lalu</p>
                            </div>
                        </div>
                        <div class="mb-4">
                            <p><strong>Permintaan:</strong> 50 kg</p>
                            <p><strong>Alamat:</strong> Pasar Induk, Bondowoso</p>
                            <p><strong>Dibutuhkan:</strong> Besok</p>
                        </div>
                        <a href="/dashboard/user/permintaanstok/detail" class="btn btn-success w-100">Ambil Stok</a>
                    </div>
                </div>
            </div>

            <!-- Request 2 -->
            <div class="col">
                <div class="card request-card h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex align-items-center mb-4">
                            <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="avatar" class="rounded-circle" style="width: 48px; height: 48px;">
                            <div class="ms-3">
                                <p class="h6 mb-0">Budi Santoso</p>
                                <p class="text-muted small">15 menit yang lalu</p>
                            </div>
                        </div>
                        <div class="mb-4">
                            <p><strong>Permintaan:</strong> 30 kg</p>
                            <p><strong>Alamat:</strong> Jl. Kalimantan, Jember</p>
                            <p><strong>Dibutuhkan:</strong> Hari Ini</p>
                        </div>
                        <a href="/dashboard/user/permintaanstok/detail" class="btn btn-success w-100">Ambil Stok</a>
                    </div>
                </div>
            </div>

            <!-- Request 3 -->
            <div class="col">
                <div class="card request-card h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex align-items-center mb-4">
                            <img src="https://randomuser.me/api/portraits/women/2.jpg" alt="avatar" class="rounded-circle" style="width: 48px; height: 48px;">
                            <div class="ms-3">
                                <p class="h6 mb-0">Linda Wijaya</p>
                                <p class="text-muted small">30 menit yang lalu</p>
                            </div>
                        </div>
                        <div class="mb-4">
                            <p><strong>Permintaan:</strong> 75 kg</p>
                            <p><strong>Alamat:</strong> Kademangan, Bondowoso</p>
                            <p><strong>Dibutuhkan:</strong> 2 Hari</p>
                        </div>
                        <a href="/dashboard/user/permintaanstok/detail" class="btn btn-success w-100">Ambil Stok</a>
                    </div>
                </div>
            </div>
        </div>
    



    @endsection
