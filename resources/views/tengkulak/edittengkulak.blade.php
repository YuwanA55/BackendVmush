@extends('tengkulak.linkaset')
@section('kontentengkulak')

<div class="mt-3"></div>

                  <div class="card " id="largeModal{{$main->id_stok}}" tabindex="-1" aria-hidden="true">
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
                        <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center mb-3 gap-4">

                  </div>
                          <div class="row">
                            <div class="col mb-3">
                              <label for="nameLarge" class="form-label">ID Permintaan</label>
                              <input type="text" readonly class="form-control" placeholder="" value="{{$main->id_stok}}" />
                            </div>
                          </div>
                          <div class="row g-2 mb-3">
                            <div class="col mb-0">
                              <label for="dobLarge" class="form-label">Username</label>
                              <input type="text" readonly class="form-control" placeholder="" value="{{$main->username}}" />
                            </div>
                            <div class="col mb-0">
                              <label for="emailLarge" class="form-label">Permintaan Stok</label>
                              <input type="email" value="{{$main->jumlah_stok}} KG" readonly class="form-control" placeholder="" />
                            </div>
                          </div>

                          <div class="row g-2 mb-3">
                          {{-- <div class="col mb-0">
                              <label for="emailLarge" class="form-label">Nomor Hp</label>
                              <input type="number" value="62{{$main->nohp}}" readonly class="form-control" placeholder="" />
                            </div> --}}
                            <div class="col mb-0">
                              <label for="emailLarge" class="form-label">Alamat Permintaan</label>
                              <input type="text" value="{{$main->alamat_permintaan}}" readonly class="form-control" placeholder="" />
                            </div>

                            </div>
                           
                            <div class="row g-2 mb-3">
                            <div class="col mb-0">
                              <label for="emailLarge" class="form-label">Status Pembayaran</label>
                              <input type="text" value="{{$main->status_permintaan}}" readonly class="form-control" placeholder="" />
                            </div>
                            <div class="col mb-0">
                              <label for="emailLarge" class="form-label">Tanggal Permintaan</label>
                              <input type="text" class="form-control" value="{{$main->tanggal_permintaan}} " readonly placeholder="" />
                            </div>
                            </div>


                            <div class="row g-2 mb-3">
                             <div class="col mb-0">
                              <label for="emailLarge" class="form-label">Berakhir Permintaan</label>
                              <input type="text" class="form-control" value="{{$main->dibutuhkan}}" readonly placeholder="" />
                            </div>
                            <div class="col mb-0">
                              <label for="emailLarge" class="form-label">Pengambil Stok</label>
                              <input type="text" value="{{$main->user}}" readonly class="form-control" placeholder="" />
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


@endsection