@include('layoutUser.head')
<body>
    <!-- Layout wrapper -->
    
            <!-- Navbar -->
            @include('tengkulak.navbartengku')
            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-fluid flex-grow-1 container-p-y">
                    <div class="row">
                        <div class="col-12">
                            <!-- Kontent -->
                            @yield('kontentengkulak')
                        </div>
                    </div>
                </div>
                <!-- / Content -->

                <!-- Footer -->

                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- / Content wrapper -->
      
    <!-- / Layout wrapper -->

    <style>
        .footer-link {
            cursor: pointer;
        }
        /* Menambahkan padding untuk mencegah konten menabrak navbar */
        .content-wrapper {
            padding-top: 70px; /* Sesuaikan dengan tinggi navbar */
            min-height: calc(100vh - 70px); /* Mengatur tinggi minimum agar footer tetap di bawah */
            padding-bottom: 60px; /* Ruang untuk footer */
        }
        /* Memastikan footer tetap di bawah */
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #f8f9fa; /* Warna default footer */
            padding: 10px 0;
            z-index: 1000;
        }
        /* Menghapus margin dan padding berlebih */
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .container-p-y {
            padding-top: 1.5rem !important;
            padding-bottom: 1.5rem !important;
        }
        /* Memastikan navbar rata penuh */
        .navbar {
            width: 100%;
            margin: 0;
            padding: 0 0; /* Hapus padding kiri-kanan untuk lebar penuh */
        }
        .layout-container {
            width: 100%;
            max-width: none; /* Menghapus batasan lebar */
            padding: 0; /* Menghapus padding bawaan */
        }
        /* Memastikan konten tidak tertutup footer */
        .content-wrapper > .container-fluid {
            flex: 1 0 auto;
        }
    </style>

    <script>
        function showAlert() {
            Swal.fire({
                title: 'Fitur Segera Hadir!',
                text: '',
                icon: 'error',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'btn btn-primary me-2',
                },
                buttonsStyling: false
            });
        }
    </script>

    <!-- Core JS -->
    <script src="{{asset('assetsadmin')}}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/libs/popper/popper.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/js/bootstrap.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/libs/node-waves/node-waves.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/libs/hammer/hammer.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/libs/i18n/i18n.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/js/menu.js"></script>

    <!-- Vendors JS -->
    <script src="{{asset('assetsadmin')}}/vendor/libs/swiper/swiper.js"></script>
    <script src="{{asset('assetsadmin')}}/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

    <!-- Main JS -->
    <script src="{{asset('assetsadmin')}}/js/main.js"></script>
</body>
</html>