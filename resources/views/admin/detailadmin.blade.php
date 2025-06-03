@extends('layout.body')
@section('konten')

<link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/sweetalert2/sweetalert2.css" />
<script src="{{asset('assetsadmin')}}/vendor/libs/sweetalert2/sweetalert2.js"></script>

    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/css/pages/page-profile.css" />
              <!-- Header -->
              <div class="row">
                <div class="col-12">
                  <div class="card mb-4">
                    <div class="user-profile-header-banner">
                      <img src="{{$main->gambar}}" alt="Banner image" class="rounded-top" />
                    </div>
                    <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                      <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img
                          src="{{$main->gambar}}"
                          alt="user image"
                          class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" />
                      </div>
                      <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div
                          class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                          <div class="user-profile-info">
                            <h4>{{$main->nama}}</h4>
                            <ul
                              class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                              <li class="list-inline-item"><i class="ti ti-color-swatch"></i>Level: {{$main->status}}</li>
                              <li class="list-inline-item"><i class="ti ti-map-pin"></i> {{$main->alamat}}</li>
                              <li class="list-inline-item"><i class="ti ti-calendar"></i> Joined {{$main->tanggal_create}}</li>
                            </ul>
                          </div>
                         <!-- Tombol Setting Akun dengan SweetAlert2 -->
<a href="javascript:void(0);" class="btn btn-primary" onclick="showErrorAlert()">
  <i class="ti ti-user-check me-1"></i>Setting Akun
</a>

<!-- Skrip SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function showErrorAlert() {
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Maaf, fitur ini sedang dalam perbaikan!',
    confirmButtonText: 'OK',
    customClass: {
      confirmButton: 'btn btn-primary'
    }
  });
}
</script>
                          
                          {{-- /edit/admin/{{$main->username}} --}}
                         
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Header -->

<div class="card mb-4">
                    <h3 class="card-header">Detail Admin</h3>
                    <!-- Account -->

                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" onsubmit="return false">
                      <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Username</label>
                            <input
                              class="form-control"
                              type="text"
                              name="user"
                              value="{{$main->username}}" readonly
                              placeholder="" required
                              autofocus />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input
                              class="form-control"
                              type="email"
                              value="{{$main->email}}" readonly
                              name="email"
                              placeholder="john.doe@example.com" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">No HP</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text">ID (+62)</span>
                              <input
                                type="number"
                                value="{{$main->nohp}}" readonly
                                name="nohp"
                                class="form-control"
                                placeholder="" />
                            </div>
                          </div>
                        </div>
                        <div class="mt-2">
                          <!-- <button type="submit" class="btn btn-primary me-2">Save changes</button>
                          <button type="reset" class="btn btn-label-secondary">Cancel</button> -->
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
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

                  @endsection