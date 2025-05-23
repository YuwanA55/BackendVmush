<?php
$query = DB::select("SELECT * FROM penyewaan");
$lastCode = "SW0000";

if ($query) {
    $lastCode = $query[count($query) - 1]->id_sewa;
}

$lastNumber = (int)substr($lastCode, 2);
$newNumber = $lastNumber + 1;

if ($newNumber < 10) {
    $newCode = "SW000" . $newNumber;
} elseif ($newNumber < 100) {
    $newCode = "SW00" . $newNumber;
} else {
    $newCode = "SW0" . $newNumber;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <div class="card shadow-sm border-top-primary">
            <div class="card-body p-4">
                <form method="POST" action="/pembayaran/tagihandata/{{session('username')}}/save-data" enctype="multipart/form-data">
                    @csrf
                    <!-- Customer Info Section -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="d-flex align-items-center mb-3">
                                <div class="customer-avatar me-3">
                                    <img src="{{session('gambar')}}" alt="Customer Avatar" class="img-fluid rounded-circle" style="width: 100px; height: 100px;">

                                </div>
                                <div>
                                    <div class="h5">{{session('nama')}}</div>
                                    <div class="text-muted">Billing Address</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Info Section -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h5><i class="fas fa-credit-card"></i> Payment Details</h5>
                            <div class="mb-2">
                                <div><i class="fas fa-user"></i> Nama Rekening: {{$mainbank->nama}}</div>
                                <div><i class="fas fa-university"></i> Bank: {{$mainbank->bank}}</div>
                                <div><i class="fas fa-credit-card"></i> No Rekening: {{$mainbank->norek}}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Payment Section -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h5><i class="fas fa-money-bill-wave"></i> Total Pembayaran</h5>
                            <div class="fs-3 text-primary fw-bold">Rp{{$main->harga}},000</div>
                        </div>
                    </div>

                    <!-- Payment Instructions -->
                    <div class="alert alert-info mb-4">
                        *Silakan transfer total pembayaran ke rekening yang telah disediakan. Kemudian, unggah bukti pembayaran Anda di sini untuk menyelesaikan pesanan Anda. Tunggu proses konfirmasi pembayaran dari admin vmush.
                    </div>

                    <!-- Description Field -->
                    <div class="mb-4">
                        <label for="description" class="form-label">Tambahkan Deskripsi Nama Pengirim<span class="text-danger">*</span></label>
                        <textarea id="description" name="keterangan" class="form-control" rows="5" placeholder="Tulis deskripsi"></textarea>
                    </div>

                    <!-- File Upload Section -->
                    <div class="mb-4">
                        <label class="form-label">Unggah Bukti Pembayaran<span class="text-danger">*</span></label>
                        <div class="file-input-container mb-3">
                            <label for="file-upload" class="btn btn-success w-100 py-2">
                                <i class="fas fa-upload"></i> Upload Gambar
                                <input type="file" required name="upload" id="file-upload" accept="image/*" class="file-input" onchange="previewImage(event)">
                            </label>
                        </div>
                        <div class="preview-container text-center" id="preview-container">
                            <img id="preview-image" src="" alt="Image Preview" style="display: none;" class="img-fluid rounded">
                        </div>
                    </div>

                    <input type="text" value="{{ $newCode }}" hidden name="id_sewa" />
                    <input type="text" value="{{$main->id_paket}}" hidden name="id_paket" />
                    <input type="datetime-local" id="tgl" hidden name="tgl" />
                    <input type="text" value="{{session('username')}}" hidden name="username" />
                    
                  

                    <!-- Submit Button -->
                    <button type="submit" name="submit" class="btn btn-primary w-100 py-2">Bayar Sekarang</button>
                </form>
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

            <!-- Footer Section -->
            <div class="card-footer text-center py-4 mt-4 border-top">
                <div>&copy; 2025 Vmush. All rights reserved.</div>
                <div class="d-flex justify-content-center align-items-center mt-2">
                    <i class="fas fa-server"></i> <span class="ms-2">Vmush</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const previewContainer = document.getElementById('preview-container');
            const previewImage = document.getElementById('preview-image');
            
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewImage.style.display = 'block'; // Show the image after selection
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
