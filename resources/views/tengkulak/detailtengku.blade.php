@extends('layoutUser.body')
@section('konten')

<script src="https://unpkg.com/@phosphor-icons/web"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\PermintaanStok;

Carbon::setLocale('id');

// Initialize variables
$permintaanStokModel = null;
$isUserFilled = false;
$userWhoTookRequest = null;
$idStok = null;
$loggedInUser = null;
$statusPermintaan = 'Status Tidak Tersedia';
$jumlahStok = 0;
$tanggalPermintaanFormatted = 'N/A';
$batasWaktuFormatted = 'N/A';
$pemintaUsername = 'N/A';
$alamatPermintaan = 'N/A';
$nohpPeminta = null;
$catatan = 'Membutuhkan jamur tiram segar untuk restoran. Pengiriman diharapkan bisa dilakukan secara bertahap sesuai kesepakatan. Kualitas harus grade A untuk penggunaan restaurant';
$isRequestCompleted = false;

// Check if $main exists and has id_stok
if (isset($main) && property_exists($main, 'id_stok') && $main->id_stok) {
    $idStok = $main->id_stok;
    $permintaanStokModel = PermintaanStok::find($idStok);

    if ($permintaanStokModel) {
        // Check if user field is filled
        if (!empty($permintaanStokModel->user) && trim($permintaanStokModel->user) !== '') {
            $isUserFilled = true;
            $userWhoTookRequest = $permintaanStokModel->user;
        }
        $statusPermintaan = $permintaanStokModel->status_permintaan ?? $statusPermintaan;
        $jumlahStok = $permintaanStokModel->jumlah_stok ?? $jumlahStok;
        $pemintaUsername = $permintaanStokModel->username ?? $pemintaUsername;
        $alamatPermintaan = $permintaanStokModel->alamat_permintaan ?? $alamatPermintaan;
        $catatan = $permintaanStokModel->catatan ?? $catatan;
        $nohpPeminta = property_exists($main, 'nohp') ? $main->nohp : $nohpPeminta;

        // Format tanggal_permintaan
        if (!empty($permintaanStokModel->tanggal_permintaan)) {
            try {
                $tanggalPermintaanFormatted = Carbon::parse($permintaanStokModel->tanggal_permintaan)
                    ->isoFormat('D MMMM YYYY, HH:mm [WIB]');
            } catch (\Exception $e) {
                \Log::error("Error parsing 'tanggal_permintaan': " . $e->getMessage());
                $tanggalPermintaanFormatted = 'Format tanggal salah';
            }
        }

        // Format batas_waktu (dibutuhkan)
        if (!empty($permintaanStokModel->dibutuhkan)) {
            try {
                $tanggalDibutuhkan = Carbon::parse($permintaanStokModel->dibutuhkan)->endOfDay();
                $sekarang = Carbon::now();

                if ($tanggalDibutuhkan->isPast()) {
                    $batasWaktuFormatted = '<span class="text-danger fw-normal">Sudah Lewat (' . $tanggalDibutuhkan->isoFormat('D MMM YYYY') . ')</span>';
                } elseif ($tanggalDibutuhkan->isToday()) {
                    $batasWaktuFormatted = '<span class="text-warning">Hari Ini</span>';
                } elseif ($tanggalDibutuhkan->isTomorrow()) {
                    $batasWaktuFormatted = '<span class="text-info">Besok</span>';
                } else {
                    $selisih = $sekarang->diffForHumans($tanggalDibutuhkan, [
                        'parts' => 2,
                        'syntax' => Carbon::DIFF_ABSOLUTE
                    ]);
                    $batasWaktuFormatted = $selisih . ' lagi';
                }
            } catch (\Exception $e) {
                \Log::error("Error parsing 'dibutuhkan': " . $e->getMessage());
                $batasWaktuFormatted = 'Format tanggal salah';
            }
        } else {
            $batasWaktuFormatted = 'Tidak ditentukan';
        }
    } else {
        // Fallback to $main if model not found
        $statusPermintaan = property_exists($main, 'status_permintaan') ? $main->status_permintaan : $statusPermintaan;
        $jumlahStok = property_exists($main, 'jumlah_stok') ? $main->jumlah_stok : $jumlahStok;
        $pemintaUsername = property_exists($main, 'username') ? $main->username : $pemintaUsername;
        $alamatPermintaan = property_exists($main, 'alamat_permintaan') ? $main->alamat_permintaan : $alamatPermintaan;
        $nohpPeminta = property_exists($main, 'nohp') ? $main->nohp : $nohpPeminta;
        $catatan = property_exists($main, 'catatan') ? $main->catatan : $catatan;

        // Format tanggal_permintaan from $main
        if (property_exists($main, 'tanggal_permintaan') && !empty($main->tanggal_permintaan)) {
            try {
                $tanggalPermintaanFormatted = Carbon::parse($main->tanggal_permintaan)->isoFormat('D MMMM YYYY, HH:mm [WIB]');
            } catch (\Exception $e) {
                \Log::error("Error parsing 'tanggal_permintaan' from main: " . $e->getMessage());
                $tanggalPermintaanFormatted = 'Format tanggal salah';
            }
        }

        // Format batas_waktu (dibutuhkan) from $main
        if (property_exists($main, 'dibutuhkan') && !empty($main->dibutuhkan)) {
            try {
                $tanggalDibutuhkan = Carbon::parse($main->dibutuhkan)->endOfDay();
                $sekarang = Carbon::now();

                if ($tanggalDibutuhkan->isPast()) {
                    $batasWaktuFormatted = '<span class="text-danger fw-normal">Sudah Lewat (' . $tanggalDibutuhkan->isoFormat('D MMM YYYY') . ')</span>';
                } elseif ($tanggalDibutuhkan->isToday()) {
                    $batasWaktuFormatted = '<span class="text-warning">Hari Ini</span>';
                } elseif ($tanggalDibutuhkan->isTomorrow()) {
                    $batasWaktuFormatted = '<span class="text-info">Besok</span>';
                } else {
                    $selisih = $sekarang->diffForHumans($tanggalDibutuhkan, [
                        'parts' => 2,
                        'syntax' => Carbon::DIFF_ABSOLUTE
                    ]);
                    $batasWaktuFormatted = $selisih . ' lagi';
                }
            } catch (\Exception $e) {
                \Log::error("Error parsing 'dibutuhkan' from main: " . $e->getMessage());
                $batasWaktuFormatted = 'Format tanggal salah';
            }
        } else {
            $batasWaktuFormatted = 'Tidak ditentukan';
        }
    }

    // Check if request is completed
    if (strtolower($statusPermintaan) === 'selesai') {
        $isRequestCompleted = true;
    }
}

// Get logged-in user
if (session()->has('username')) {
    $loggedInUser = session('username');
} elseif (Auth::check()) {
    $loggedInUser = Auth::user()->name;
}
?>

<div class="">
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <h2 class="card-title">Permintaan Stok Jamur Tiram</h2>
                    @if($isRequestCompleted)
                        <span class="badge bg-success fs-6">{{ $statusPermintaan }}</span>
                    @elseif(in_array(strtolower($statusPermintaan), ['Pending', 'diambil']))
                        <span class="badge bg-warning fs-6">{{ $statusPermintaan }}</span>
                    @else
                        <span class="badge bg-primary fs-6">{{ $statusPermintaan }}</span>
                    @endif
                </div>
                <div class="text-muted">ID: #{{ $idStok ?? 'N/A' }}</div>
            </div>

            <div class="row g-4">
                {{-- Detail Kiri --}}
                <div class="col-md-6">
                    <div class="d-flex align-items-start mb-3">
                        <div class="bg-light rounded-circle p-2 me-3"><i class="ph ph-scales fs-4 text-success"></i></div>
                        <div>
                            <div class="text-muted">Jumlah yang Diminta</div>
                            <div class="fw-bold">{{ $jumlahStok }} kg</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-start mb-3">
                        <div class="bg-light rounded-circle p-2 me-3"><i class="ph ph-calendar fs-4 text-success"></i></div>
                        <div>
                            <div class="text-muted">Tanggal Permintaan</div>
                            <div class="fw-bold">{!! $tanggalPermintaanFormatted !!}</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-start mb-3">
                        <div class="bg-light rounded-circle p-2 me-3"><i class="ph ph-clock fs-4 text-success"></i></div>
                        <div>
                            <div class="text-muted">Batas Waktu</div>
                            <div class="fw-bold">{!! $batasWaktuFormatted !!}</div>
                        </div>
                    </div>
                </div>
                {{-- Detail Kanan --}}
                <div class="col-md-6">
                    <div class="d-flex align-items-start mb-3">
                        <div class="bg-light rounded-circle p-2 me-3"><i class="ph ph-user-circle fs-4 text-success"></i></div>
                        <div>
                            <div class="text-muted">Peminta</div>
                            <div class="fw-bold">{{ $pemintaUsername }}</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-start mb-3">
                        <div class="bg-light rounded-circle p-2 me-3"><i class="ph ph-map-pin fs-4 text-success"></i></div>
                        <div>
                            <div class="text-muted">Alamat Pengiriman</div>
                            <div class="fw-bold">{{ $alamatPermintaan }}</div>
                        </div>
                    </div>
                    @if($nohpPeminta)
                    <div class="d-flex align-items-start mb-3">
                        <div class="bg-light rounded-circle p-2 me-3"><i class="ph ph-phone fs-4 text-success"></i></div>
                        <div>
                            <div class="text-muted">Nomor Telepon Peminta</div>
                            <div class="fw-bold">
                                <a href="https://api.whatsapp.com/send?phone={{ str_starts_with($nohpPeminta, '0') ? '62'.substr($nohpPeminta, 1) : $nohpPeminta }}&text=Halo%20{{ urlencode($pemintaUsername) }}" target="_blank">
                                    +62 {{ $nohpPeminta }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="card-title">Catatan Tambahan</h4>
                    <h6 class="card-text">{{ $catatan }}</h6>
                </div>
            </div>

            <div class="d-flex flex-column gap-2 mt-4">
                @if (!$isUserFilled && $idStok && $loggedInUser && !$isRequestCompleted)
                    <button id="take-request-btn" class="btn btn-primary fs-5 p-3 w-100" onclick="takeRequest('{{ $idStok }}', '{{ $loggedInUser }}')">
                        <i class="ph ph-bookmark-simple me-2"></i>Ambil Permintaan
                    </button>
                @endif

                @if ($isUserFilled && $nohpPeminta && !$isRequestCompleted)
                    <a id="chat-btn" href="https://api.whatsapp.com/send?phone={{ str_starts_with($nohpPeminta, '0') ? '62'.substr($nohpPeminta, 1) : $nohpPeminta }}&text=Halo%20{{ urlencode($pemintaUsername) }}%2C%20saya%20{{ urlencode($userWhoTookRequest) }}%20yang%20mengambil%20permintaan%20stok%20ID%3A%20%23{{ $idStok }}.%20Bisakah%20kita%20koordinasi%20pengambilan%20stok%3F" target="_blank" class="btn fs-5 btn-success p-3 w-100">
                        <i class="ph ph-chat-centered-text me-2"></i>Chat Peminta (Diambil oleh: {{ $userWhoTookRequest }})
                    </a>
                @elseif ($isUserFilled && !$nohpPeminta && !$isRequestCompleted)
                    <div class="alert alert-warning py-2">
                        Permintaan ini telah diambil oleh: <strong>{{ $userWhoTookRequest }}</strong>, tetapi nomor telepon peminta tidak tersedia untuk chat.
                    </div>
                @endif
                
                
                @if ($isUserFilled && $loggedInUser && $userWhoTookRequest === $loggedInUser && !$isRequestCompleted)
                    <button id="complete-request-btn" class="btn mt-2 btn-info fs-5 p-3 w-100" onclick="markRequestAsCompleted('{{ $idStok }}')">
                        <i class="ph ph-seal-check me-2"></i> Tandai Permintaan Selesai
                    </button>
                @endif

                @if ($isUserFilled && $loggedInUser && $userWhoTookRequest === $loggedInUser && !$isRequestCompleted)
                    <button id="complete-request-btn" class="btn mt-2 btn-danger fs-5 p-3 w-100" onclick="markRequestAsCompletedELETED('{{ $idStok }}')">
                        <i class="ph ph-seal-check me-2"></i> Batalkan Permintaan
                    </button>
                @endif

                @if ($isUserFilled && $loggedInUser && $userWhoTookRequest !== $loggedInUser && !$isRequestCompleted)
                    <div class="alert alert-info py-2 mt-2">
                        Permintaan ini sudah diambil oleh: <strong>{{ $userWhoTookRequest }}</strong>.
                    </div>
                @endif

                @if (!$isUserFilled && $idStok && !$loggedInUser && !$isRequestCompleted)
                    <div class="alert alert-warning py-2 mt-2">
                        Anda harus <a href="{{ route('login') }}">login</a> terlebih dahulu untuk mengambil permintaan ini.
                    </div>
                @endif
                
                @if($isRequestCompleted)
                    <div class="alert alert-secondary text-center py-3" role="alert">
                        <i class="ph ph-check-circle fs-3 me-2 align-middle"></i>
                        Permintaan ini telah <strong>Selesai</strong>.
                        @if($userWhoTookRequest)
                            <br><small class="d-block mt-1">Ditangani oleh: {{ $userWhoTookRequest }}</small>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
function takeRequest(idStok, username) {
    console.log('Attempting to take request for id_stok:', idStok, 'by user:', username);

    if (!username) {
        Swal.fire({ icon: 'error', title: 'Gagal!', text: 'Username tidak ditemukan. Pastikan Anda sudah login.', confirmButtonColor: '#1ca17d' });
        return;
    }
    if (!idStok) {
        Swal.fire({ icon: 'error', title: 'Gagal!', text: 'ID Stok tidak valid.', confirmButtonColor: '#1ca17d' });
        return;
    }

    Swal.fire({
        title: 'Ambil Permintaan?',
        html: ``,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Ya, Ambil',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#1ca17d',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({ title: 'Memproses...', text: 'Mohon tunggu sebentar.', allowOutsideClick: false, didOpen: () => { Swal.showLoading() } });

            fetch('{{ route("user.permintaanstok") }}', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: JSON.stringify({ id_stok: idStok, user: username })
            })
            .then(response => {
                const contentType = response.headers.get("content-type");
                if (!response.ok) {
                    if (contentType && contentType.includes("application/json")) {
                        return response.json().then(errData => { throw { status: response.status, data: errData }; });
                    }
                    return response.text().then(textData => { throw { status: response.status, data: { message: `Server error: ${response.status}` }, responseText: textData }; });
                }
                if (contentType && contentType.includes("application/json")) { return response.json(); }
                return response.text().then(textData => {
                    console.warn("Successful response but not JSON:", textData);
                    return { success: true, message: "Operation successful, but server response was not in expected format." };
                });
            })
            .then(data => {
                if (data.success) {
                    Swal.fire({ icon: 'success', title: 'Berhasil!', text: data.message || 'Permintaan stok berhasil diambil.', showConfirmButton: false, timer: 2000, timerProgressBar: true })
                        .then(() => { window.location.reload(); });
                } else {
                    Swal.fire({ icon: 'error', title: 'Gagal!', text: data.message || 'Terjadi kesalahan saat mengambil permintaan.', confirmButtonColor: '#1ca17d' });
                }
            })
            .catch(error => {
                console.error('AJAX Error (Take Request):', error);
                let errorMessage = 'Terjadi kesalahan saat menghubungi server.';
                if (error.status) {
                    if (error.status === 401) errorMessage = 'Otentikasi gagal. Silakan login ulang.';
                    else if (error.status === 403) errorMessage = 'Anda tidak memiliki izin untuk melakukan aksi ini.';
                    else if (error.status === 404) errorMessage = 'Endpoint tidak ditemukan. Hubungi administrator.';
                    else if (error.status === 419) errorMessage = 'Sesi Anda telah berakhir. Silakan muat ulang halaman dan coba lagi.';
                    else if (error.data && error.data.message) errorMessage = error.data.message;
                    else if (error.responseText) errorMessage = `Terjadi kesalahan pada server. (Detail: ${error.responseText.substring(0,100)}...)`;
                    else errorMessage = `Permintaan gagal: Status ${error.status}.`;
                } else if (error.message) errorMessage = error.message;
                Swal.fire({ icon: 'error', title: 'Error!', html: errorMessage, confirmButtonColor: '#1ca17d' });
            });
        }
    });
}

function markRequestAsCompleted(idStok) {
    Swal.fire({
        title: 'Selesaikan Permintaan Ini?',
        html: ``,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Selesaikan',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#198754',
        cancelButtonColor: '#d33'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({ title: 'Memproses...', text: 'Mohon tunggu sebentar.', allowOutsideClick: false, didOpen: () => { Swal.showLoading() } });

            fetch('{{ route("user.permintaanstok.complete") }}', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: JSON.stringify({ id_stok: idStok })
            })
            .then(response => {
                const contentType = response.headers.get("content-type");
                if (!response.ok) {
                    if (contentType && contentType.includes("application/json")) {
                        return response.json().then(errData => { throw { status: response.status, data: errData }; });
                    }
                    return response.text().then(textData => { throw { status: response.status, data: { message: `Server error: ${response.status}` }, responseText: textData }; });
                }
                if (contentType && contentType.includes("application/json")) { return response.json(); }
                return response.text().then(textData => {
                    console.warn("Successful response but not JSON:", textData);
                    return { success: true, message: "Operation successful, but server response was not in expected format." };
                });
            })
            .then(data => {
                if (data.success) {
                    Swal.fire({ icon: 'success', title: 'Berhasil!', text: data.message || 'Permintaan stok berhasil ditandai selesai.', showConfirmButton: false, timer: 2000, timerProgressBar: true })
                        .then(() => { window.location.reload(); });
                } else {
                    Swal.fire({ icon: 'error', title: 'Gagal!', text: data.message || 'Gagal menandai permintaan selesai.', confirmButtonColor: '#1ca17d' });
                }
            })
            .catch(error => {
                console.error('AJAX Error (Complete Request):', error);
                let errorMessage = 'Terjadi kesalahan saat menghubungi server.';
                if (error.status) {
                    if (error.status === 401) errorMessage = 'Otentikasi gagal. Silakan login ulang.';
                    else if (error.status === 403) errorMessage = 'Anda tidak memiliki izin untuk melakukan aksi ini.';
                    else if (error.status === 404) errorMessage = 'Endpoint tidak ditemukan. Hubungi administrator.';
                    else if (error.status === 419) errorMessage = 'Sesi Anda telah berakhir. Silakan muat ulang halaman dan coba lagi.';
                    else if (error.data && error.data.message) errorMessage = error.data.message;
                    else if (error.responseText) errorMessage = `Terjadi kesalahan pada server. (Detail: ${error.responseText.substring(0,100)}...)`;
                    else errorMessage = `Permintaan gagal: Status ${error.status}.`;
                } else if (error.message) errorMessage = error.message;
                Swal.fire({ icon: 'error', title: 'Error!', html: errorMessage, confirmButtonColor: '#1ca17d' });
            });
        }
    });
}




function markRequestAsCompletedELETED(idStok) {
    Swal.fire({
        title: 'Selesaikan Permintaan Ini?',
        html: `Anda akan membatalkan permintaan?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Batalkan',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#198754',
        cancelButtonColor: '#d33'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({ title: 'Memproses...', text: 'Mohon tunggu sebentar.', allowOutsideClick: false, didOpen: () => { Swal.showLoading() } });

            fetch('{{ route("user.permintaanstok.delete") }}', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: JSON.stringify({ id_stok: idStok })
            })
            .then(response => {
                const contentType = response.headers.get("content-type");
                if (!response.ok) {
                    if (contentType && contentType.includes("application/json")) {
                        return response.json().then(errData => { throw { status: response.status, data: errData }; });
                    }
                    return response.text().then(textData => { throw { status: response.status, data: { message: `Server error: ${response.status}` }, responseText: textData }; });
                }
                if (contentType && contentType.includes("application/json")) { return response.json(); }
                return response.text().then(textData => {
                    console.warn("Successful response but not JSON:", textData);
                    return { success: true, message: "Operation successful, but server response was not in expected format." };
                });
            })
            .then(data => {
                if (data.success) {
                    Swal.fire({ icon: 'success', title: 'Berhasil!', text: data.message || 'Permintaan stok Dibatalkan.', showConfirmButton: false, timer: 2000, timerProgressBar: true })
                        window.location.href = "{{ route('stokpermintaan') }}";
                } else {
                    Swal.fire({ icon: 'error', title: 'Gagal!', text: data.message || 'Gagal menandai permintaan selesai.', confirmButtonColor: '#1ca17d' });
                }
            })
            .catch(error => {
                console.error('AJAX Error (Complete Request):', error);
                let errorMessage = 'Terjadi kesalahan saat menghubungi server.';
                if (error.status) {
                    if (error.status === 401) errorMessage = 'Otentikasi gagal. Silakan login ulang.';
                    else if (error.status === 403) errorMessage = 'Anda tidak memiliki izin untuk melakukan aksi ini.';
                    else if (error.status === 404) errorMessage = 'Endpoint tidak ditemukan. Hubungi administrator.';
                    else if (error.status === 419) errorMessage = 'Sesi Anda telah berakhir. Silakan muat ulang halaman dan coba lagi.';
                    else if (error.data && error.data.message) errorMessage = error.data.message;
                    else if (error.responseText) errorMessage = `Terjadi kesalahan pada server. (Detail: ${error.responseText.substring(0,100)}...)`;
                    else errorMessage = `Permintaan gagal: Status ${error.status}.`;
                } else if (error.message) errorMessage = error.message;
                Swal.fire({ icon: 'error', title: 'Error!', html: errorMessage, confirmButtonColor: '#1ca17d' });
            });
        }
    });
}
</script>

<style>
.bg-light {
    background-color: #f8f9fa !important;
}
.fs-4 {
    font-size: 1.5rem !important;
}
.fs-3 {
    font-size: 2rem !important;
}
.fs-5 {
    font-size: 1.1rem !important;
}
.fs-6 {
    font-size: 0.9rem !important;
}
.alert.py-2 {
    padding-top: 0.5rem !important;
    padding-bottom: 0.5rem !important;
}
.alert.py-3 {
    padding-top: 1rem !important;
    padding-bottom: 1rem !important;
}
#take-request-btn, #chat-btn, #complete-request-btn {
    width: 100%;
}
</style>
@endsection