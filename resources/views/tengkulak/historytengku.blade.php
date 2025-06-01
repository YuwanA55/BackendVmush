@extends('layoutUser.body')
@section('konten')

<h4>History Pengambilan Stok</h4>

        <!-- Request Cards -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

            <br>
 @if(count($permintaanhistory) > 0)
                @foreach($permintaanhistory as $p)
            <!-- Request 1 -->
            <div class="col">
                <div class="card request-card h-100 {{ $p->id_stok }}">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="d-flex align-items-center mb-4">
                            <img src="{{ $p->gambar }}" alt="avatar" class="rounded-circle" style="width: 48px; height: 48px;">
                            <div class="ms-3">
                                <p class="h6 mb-0">{{ $p->nama }}</p>
                                <p class="text-muted small">5 menit yang lalu</p>
                            </div>
                        </div>
                        <div class="mb-4">
                            <p><strong>Permintaan:</strong> {{ $p->jumlah_stok }} kg</p>
                            <p><strong>Alamat:</strong> {{ $p->alamat_permintaan }}</p>
                            <p><strong>Dibutuhkan:</strong> {{ $p->dibutuhkan }}</p>
                            <p><strong>Status Permintaan:</strong> <label for="">  
                                @if($p->status_permintaan == 'Selesai')
    <span class="badge bg-success">Selesai</span>
  @elseif($p->status_permintaan == 'Ditolak')
    <span class="badge bg-danger">Ditolak</span>
  @else
    <span class="badge bg-primary">Pending</span>
  @endif
</label></p>
                        <hr>
                        <a href="/dashboard/user/pengambilanstok/detail/{{ $p->id_stok }}" class="btn btn-info w-100">Detail Permintaan</a>
                        </div>

                    </div>
                </div>
            </div>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center"></td>
                </tr>
            @endif
        </div>





@endsection