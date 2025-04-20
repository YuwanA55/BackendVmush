@extends('layout.body')
@section('konten')


<link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/css/pages/cards-advance.css" />
<link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/apex-charts/apex-charts.css" />


<div class="row">
                <!-- Website Analytics -->


                <?php $jmlh_akun = 0 ?>
                @foreach ($t_akun as $item)
                    <?php $jmlh_akun = $jmlh_akun + 1 ?>
                @endforeach
            
            
                <?php $jmlh_firebase = 0 ?>
                @foreach ($t_firebase as $item)
                    <?php $jmlh_firebase = $jmlh_firebase + 1 ?>
                @endforeach

                <?php $jmlh_Pembelian = 0 ?>
                @foreach ($t_Pembelian as $item)
                    <?php $jmlh_Pembelian = $jmlh_Pembelian + 1 ?>
                @endforeach


<!-- Subscriber Gained -->
<div class="col-lg-3 col-sm-6 mb-4">
                  <div class="card">
                    <div class="card-body pb-0">
                      <div class="card-icon mb-2">
                        <div class="d-flex">
                           <span class="badge me-3 bg-label-primary rounded-pill p-3">
                          <i class="ti ti-users ti-sm"></i>
                        </span>
                        <h3 class="card-title mb-0 mt-2">
                            {{$jmlh_akun}}
                        </h3>
                        </div>

                      </div>
                      <h5 >Total Akun User</h5>
                    </div>
                    <div id="subscriberGained"></div>
                  </div>
                </div>

                <!-- Quarterly Sales -->
                <div class="col-lg-3 col-sm-6 mb-4">
                  <div class="card">
                    <div class="card-body pb-0">
                      <div class="card-icon mb-2">
                        <div class="d-flex">
                          <span class="badge me-3 bg-label-danger rounded-pill p-3">
                            <i class="ti ti-user ti-sm"></i>
                          </span>
                          <h3 class="card-title mb-0 mt-2">
                            {{-- {{$jmlh_kopi}} --}} 99999
                        </h3>
                        </div>
                      </div>
                      <h5>Total Mitra</h5>
                    </div>
                    <div id="quarterlySales"></div>
                  </div>
                </div>

                <!-- Order Received -->
                <div class="col-lg-3 col-sm-6 mb-4">
                  <div class="card">
                    <div class="card-body pb-0">
                      <div class="card-icon mb-2">
                        <div class="d-flex">
                          <span class="badge me-3 bg-label-warning rounded-pill p-3">
                            <i class="ti ti-shopping-cart ti-sm"></i>
                          </span>
                          <h3 class="card-title mb-0 mt-2">
                            {{$jmlh_Pembelian}}
                        </h3>
                        </div>
                      </div>
                      <h5>Total Pembelian</h5>
                    </div>
                    <div id="orderReceived"></div>
                  </div>
                </div>

                <!-- Revenue Generated -->
                <div class="col-lg-3 col-sm-6 mb-4">
                  <div class="card">
                    <div class="card-body pb-0">
                      <div class="card-icon mb-2">
                        <div class="d-flex">
                          <span class="badge me-3 bg-label-success rounded-pill p-3">
                            <i class="ti ti-link ti-sm"></i>
                          </span>
                          <h3 class="card-title mb-0 mt-2">
                            {{$jmlh_firebase}}
                        </h3>
                        </div>
                      </div>
                      <h5 >Total Link Firebase</h5>
                    </div>
                    <div id="revenueGenerated"></div>
                  </div>
                </div>

                                  <!-- View sales -->
                                  <div class="col-lg-12">
                                    <div class="card">
                                      <div class="d-flex align-items-center justify-conten-center row">
                                        <div class="col-7">
                                          <div class="card-body text-nowrap">
                                            <h5 class="card-title mb-3 mt-2">Vmush 🎉</h5>
                                            <!-- <p class="mb-2">Best seller of the month</p> -->
                                            <h4 class="text-primary mb-4">"Mempermudah petani Jamur Tiram adalah urusan kami"</h4>
                                            <a href="https://sip-kopi.gitbook.io/sip-kopi/" class="btn btn-primary">Selengkapnya</a>
                                          </div>
                                        </div>
                                        <div class="col-5 text-center text-sm-left">
                                          {{-- <div class="card-body pb-0 px-0 px-md-4"> --}}
                                            <img 
                                              src="{{asset('assetsadmin')}}/img/vmush120.png"
                                              alt="view sales" />
                                          {{-- </div> --}}
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- View sales -->

</div>

    <!-- Vendors JS -->
    <script src="{{asset('assetsadmin')}}/vendor/libs/apex-charts/apexcharts.js"></script>
   
    <!-- Page CSS -->
<script src="{{asset('assetsadmin')}}/js/cards-statistics.js"></script>



@endsection