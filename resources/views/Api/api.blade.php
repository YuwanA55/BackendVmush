<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="{{asset('assetsadmin')}}/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Resource Api</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assetsadmin')}}/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/swiper/swiper.css" />
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/datatables-fixedcolumns-bs5/fixedcolumns.bootstrap5.css" />
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/libs/datatables-fixedheader-bs5/fixedheader.bootstrap5.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{asset('assetsadmin')}}/vendor/css/pages/cards-advance.css" />
    <!-- Helpers -->
    <script src="{{asset('assetsadmin')}}/vendor/js/helpers.js"></script>


    <script src="{{asset('assetsadmin')}}/vendor/js/template-customizer.js"></script>
    <script src="{{asset('assetsadmin')}}/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->


            <!-- / Menu -->

            <!-- Layout container -->

            <!-- Navbar -->


            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper container">
                <!-- Content -->

                <div class="mt-5 mb-5">
                    <h1 class="text-center mb-5">Resource API VMUSH ( Real-Time )</h1>

                    <!-- <div class="card mb-4">
            <div class="list-group">
              <a href="javascript:void(0);" class="list-group-item list-group-item-action active"
                >Kurang --</a
              >
              <a href="javascript:void(0);" class="list-group-item list-group-item-action"
                >Post Gambar</a
              >
              <a href="javascript:void(0);" class="list-group-item list-group-item-action "
                >Generete QR</a
              >
             <a href="javascript:void(0);" class="list-group-item list-group-item-action"
                >Bonbon toffee muffin</a
              >
              <a href="javascript:void(0);" class="list-group-item list-group-item-action"
                >Dragée tootsie roll</a
              >
            </div>
          
          </div> -->

                    <br>

                    <!-- Basic Bootstrap Table -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="d-flex">
                                <h3 class="">API User</h3>
                            </div>
                            {{-- <a href="/metadata/user" class="btn text-end btn-info">Meta Data</a> --}}
                            <button type="button" class="btn text-end btn-info" data-bs-toggle="modal" data-bs-target="#modaluser">
                                Meta Data User
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modaluser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        {{--
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div> --}}
                                        <div class="modal-body">
                                            {{-- <pre class='prettyprint lang-html'>
    {
      "user": "{data}",
      "nama": "{data}",
      "email": "{data}",
      "nohp": "{data}",
      "pass": "{data}",
      "lokasi": "{data}",
      "level": "{data}",
      "tanggal_create": "{data(date-time)}",
      "gambar": "{data}"
    }
          </pre> --}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            {{--
                                            <button type="button" class="btn btn-primary">Save changes</button> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>


                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Method</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td>1</td>
                                        <td>Get ALL</td>
                                        <td>http://127.0.0.1:8000/api/akun/user/tampil</td>
                                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>Get By ID</td>
                                        <td>http://127.0.0.1:8000/api/akun/user/tampil/{username}</td>
                                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>Get By Email</td>
                                        <td>http://127.0.0.1:8000/api/akun/user/tampil/email/{email}</td>
                                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                                    </tr>

                                    <tr>
                                        <td>4</td>
                                        <td>Post</td>
                                        <td>http://127.0.0.1:8000/api/akun/user/tambah-akun</td>
                                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                                    </tr>

                                    <tr>
                                        <td>5</td>
                                        <td>Put</td>
                                        <td>http://127.0.0.1:8000/api/akun/user/edit-akun/{username}</td>
                                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                                    </tr>

                                    <tr>
                                        <td>6</td>
                                        <td>Delete</td>
                                        <td>http://127.0.0.1:8000/api/akun/user/hapus-akun/{username}</td>
                                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/ Basic Bootstrap Table -->


                    <br>
                    <!-- Basic Bootstrap Table -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="d-flex">
                                <h3 class="">API Link Firebase</h3>
                            </div>

                            <button type="button" class="btn text-end btn-info" data-bs-toggle="modal" data-bs-target="#modallahan">
                                Meta Data Link Firebase
                            </button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="modallahan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <pre class='prettyprint lang-html'>
    {
      {{-- "kode_lahan": "{datakode}",
      "user": "{data}",
      "varietas_pohon": "{data}",
      "total_bibit": {data},
      "luas_lahan": {data},
      "tanggal": "{date}",
      "ketinggian_tanam": {data},
      "lokasi_lahan": "{data}",
      "longtitude": "{data}",
      "latitude": "{data}" --}}
    },
                                </pre>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        {{--
                                        <button type="button" class="btn btn-primary">Save changes</button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Method</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td>1</td>
                                        <td>Get ALL</td>
                                        <td>http://127.0.0.1:8000/api/Data/Link-Firebase/tampil</td>
                                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>Get By Username</td>
                                        <td>http://127.0.0.1:8000/api/Data/Link-Firebase/tampil/{username}</td>
                                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>Post (Tambah Data)</td>
                                        <td>http://127.0.0.1:8000/api/Data/Link-Firebase/tambah-Data</td>
                                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                                    </tr>

                                    <tr>
                                        <td>5</td>
                                        <td>Edit</td>
                                        <td>http://127.0.0.1:8000/api/Data/Link-Firebase/edit-Data/{id}</td>
                                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                                    </tr>

                                    <tr>
                                        <td>6</td>
                                        <td>Delete</td>
                                        <td>http://127.0.0.1:8000/api/Data/Link-Firebase/hapus-Data/{id}</td>
                                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/ Basic Bootstrap Table -->


                    <br>
                    <!-- Basic Bootstrap Table -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="d-flex">
                                <h3 class="">API Paket</h3>
                            </div>

                            <button type="button" class="btn text-end btn-info" data-bs-toggle="modal" data-bs-target="#modalpere">
                                Meta Data Paket
                            </button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="modalpere" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <pre class='prettyprint lang-html'>
    {{-- {
      "kode_peremajaan": "{kode}",
      "kode_lahan": "{kode}",
      "perlakuan": "{data}",
      "tanggal": "{date}",
      "kebutuhan": {data},
      "pupuk": "NPK {data}"
    }, --}}
                                </pre>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        {{--
                                        <button type="button" class="btn btn-primary">Save changes</button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Method</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td>1</td>
                                        <td>Get ALL</td>
                                        <td>http://127.0.0.1:8000/api/Data/Paket/tampil</td>
                                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>Get By Kode Id</td>
                                        <td>http://127.0.0.1:8000/api/Data/Paket/tampil/{id}</td>
                                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/ Basic Bootstrap Table -->


                    <br>
                    <!-- Basic Bootstrap Table -->
                    <div class="card mb-3">
                      <div class="card-header">
                          <div class="d-flex">
                              <h3 class="">API Pembelian</h3>
                          </div>

                          <button type="button" class="btn text-end btn-info" data-bs-toggle="modal" data-bs-target="#modalkopi">
                              Meta Data Pembelian
                          </button>
                      </div>
                      <!-- Modal -->
                      <div class="modal fade" id="modalkopi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-body">
                                      <pre class='prettyprint lang-html'>
    {{-- {
      "kode_kopi": "{kode}",
      "kode_peremajaan": "{kode_pere}",
      "varietas_kopi": "{data}",
      "metode_pengolahan": "{data}",
      "tgl_roasting": "{date}",
      "tgl_panen": "{date}",
      "tgl_exp": "{date}",
      "berat": {data},
      "link": "{link/kode}",
      "deskripsi": "{data}",
      "stok": {data},
      "gambar1": "{data}",
      "gambarqr": "{data}"
    } --}}
                              </pre>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                      {{--
                                      <button type="button" class="btn btn-primary">Save changes</button> --}}
                                  </div>
                              </div>
                          </div>
                      </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Method</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td>1</td>
                                        <td>Get ALL</td>
                                        <td>http://127.0.0.1:8000/api/Data/Pembelian/Paket/tampil</td>
                                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                                    </tr>

                                    <tr>
                                      <td>2</td>
                                      <td>Get by Kode</td>
                                      <td>http://127.0.0.1:8000/api/Data/Pembelian/Paket/tampil/id/{id}</td>
                                      <td><span class="badge bg-label-primary me-1">Active</span></td>
                                  </tr>
                                

                                    <tr>
                                        <td>3</td>
                                        <td>Get By username.</td>
                                        <td>http://127.0.0.1:8000/api/Data/Pembelian/Paket/tampil/{username}</td>
                                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                                    </tr>

                                    <tr>
                                        <td>4</td>
                                        <td>Post</td>
                                        <td>http://127.0.0.1:8000/api/Data/Pembelian/Paket/tambah-Data</td>
                                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                                    </tr>

                                    <tr>
                                      <td>5</td>
                                      <td>Put</td>
                                      <td>http://127.0.0.1:8000/api/Data/Pembelian/Paket/edit-Data/{id}</td>
                                      <td><span class="badge bg-label-primary me-1">Active</span></td>
                                  </tr>

                                    <tr>
                                      <td>6</td>
                                      <td>Delete</td>
                                      <td>http://127.0.0.1:8000/api/Data/Pembelian/Paket/hapus-Data/{id}</td>
                                      <td><span class="badge bg-label-primary me-1">Active</span></td>
                                  </tr>

                                  {{-- <tr>
                                    <td>7</td>
                                    <td>Get</td>
                                    <td>http://127.0.0.1:8000/api/Data/Paket/tampil/{id}</td>
                                    <td><span class="badge bg-label-primary me-1">Active</span></td>
                                </tr> --}}

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/ Basic Bootstrap Table -->

<br>
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="d-flex">
                                <h3 class="">API Harga Kopi</h3>
                            </div>
  
                            <button type="button" class="btn text-end btn-info" data-bs-toggle="modal" data-bs-target="#modalhargakopi">
                                Meta Data Harga Kopi
                            </button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="modalhargakopi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <pre class='prettyprint lang-html'>
      {
        "id": "{kode}",
        "nama_varietas": "{kode_pere}",
        "harga": "{data}",
        "sumber": "{data}",
      }
                                </pre>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        {{--
                                        <button type="button" class="btn btn-primary">Save changes</button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                          <div class="table-responsive text-nowrap">
                              <table class="table">
                                  <thead>
                                      <tr>
                                          <th>No</th>
                                          <th>Method</th>
                                          <th>Link</th>
                                          <th>Status</th>
                                      </tr>
                                  </thead>
                                  <tbody class="table-border-bottom-0">
                                      {{-- <tr>
                                          <td>1</td>
                                          <td>Get ALL</td>
                                          <td>https://dev.sipkopi.com/api/hargakopi/tampil</td>
                                          <td><span class="badge bg-label-primary me-1">Active</span></td>
                                      </tr>
  
                                      <tr>
                                        <td>2</td>
                                        <td>Get by Kode</td>
                                        <td>https://dev.sipkopi.com/api/hargakopi/{id}</td>
                                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                                    </tr> --}}
                                  
                                  </tbody>
                              </table>
                          </div>
                      </div>

                    <br>
                    <!-- Basic Bootstrap Table -->
                    <div class="card mb-3">
                        <h3 class="card-header">API Artikel</h3>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Method</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    {{-- <tr>
                                        <td>1</td>
                                        <td>Get ALL</td>
                                        <td> https://dev.sipkopi.com/api/artikel/artikel.php</td>
                                        <td><span class="badge bg-label-danger me-1">Off</span></td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>Get By Kode K.</td>
                                        <td>Segera Siap!</td>
                                        <td><span class="badge bg-label-warning me-1">Pending</span></td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>Post</td>
                                        <td>Segera Siap!</td>
                                        <td><span class="badge bg-label-warning me-1">Pending</span></td>
                                    </tr> --}}

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/ Basic Bootstrap Table -->



                    <br>
                    <!-- Basic Bootstrap Table -->
                    <div class="card mb-3">
                        <h3 class="card-header">API Produk</h3>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Method</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    {{-- <tr>
                                        <td>1</td>
                                        <td>Get ALL</td>
                                        <td>Segera Siap!</td>
                                        <td><span class="badge bg-label-warning me-1">Pending</span></td>
                                    </tr> --}}

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/ Basic Bootstrap Table -->

                </div>




            </div>

        </div>
        <!-- / Content -->
        <br>

        <!-- Footer -->


        <br>
        <br>
        <br>


        <style>
            /* Basic styling for prettyprint */
            .prettyprint {
            font-family: "Menlo", "Monaco", "Consolas", monospace !important;
            background: rgb(197, 107, 218);
            background-color:#081226;
            color: #fff;
            border-radius: 10px;
            border: none !important;
            padding: 20px !important;
            font-size: 16px;
            white-space: pre-wrap;
            /* css-3 */
            white-space: -moz-pre-wrap;
            /* Mozilla, since 1999 */
            white-space: -pre-wrap;
            /* Opera 4-6 */
            white-space: -o-pre-wrap;
            /* Opera 7 */
            word-wrap: break-word;
            /* Internet Explorer 5.5+ */
            }
            
            /* Adds linenums to each line listed when .linenums class used */
            li.L0, li.L1, li.L2, li.L3, li.L4, li.L5, li.L6, li.L7, li.L8, li.L9 {
            list-style-type: decimal;
            }
            
            /* Adds individual lines to prettyprint */
            ol.linenums {
            counter-reset: linenumber;
            }
            
            /* Adds single increments and disables the background for alternating line numbers */
            ol.linenums li {
            list-style-type: none;
            counter-increment: linenumber;
            background: transparent !important;
            }
            
            ol.linenums li:before {
            content: counter(linenumber);
            float: left;
            margin-left: -4em;
            text-align: right;
            width: 3em;
            }
        </style>

        <!-- / Footer -->

        <div class="content-backdrop fade"></div>

        <!-- Content wrapper -->

        <!-- / Layout page -->


        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>

    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('assetsadmin')}}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/libs/popper/popper.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/js/bootstrap.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/libs/node-waves/node-waves.js"></script>

    <script src="{{asset('assetsadmin')}}/vendor/libs/hammer/hammer.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/libs/i18n/i18n.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="{{asset('assetsadmin')}}/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <script src="{{asset('assetsadmin')}}/vendor/libs/swiper/swiper.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

    <!-- Main JS -->

    <script src="{{asset('assetsadmin')}}/js/main.js"></script>
    <!-- Page JS -->

</body>

</html>