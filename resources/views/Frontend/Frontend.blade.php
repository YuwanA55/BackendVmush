<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vmush - Sistem IoT Penyiraman Otomatis untuk Pertanian</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2d9f60;
            --secondary: #e8f5ef;
            --text: #333333;
            --light-text: #666666;
            --white: #ffffff;
        }
        
        body {
            color: var(--text);
            line-height: 1.6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-top: 76px; /* For fixed navbar */
        }
        
        /* Header */
        .navbar {
            background-color: var(--white);
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 24px;
            color: var(--primary) !important;
        }

        .nav-link {
            color: var(--text) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            margin: 0 0.25rem;
        }

        .nav-link:hover {
            color: var(--primary) !important;
        }
        
        /* Hero Section */
        .hero {
            background-color: #f0fffa;
            padding: 60px 0;
        }
        
        .hero h1 {
            font-size: 32px;
            color: var(--primary);
            margin-bottom: 20px;
        }
        
        /* Market Section */
        .market {
            background-color: var(--white);
            padding: 60px 0;
        }
        
        .market h2 {
            color: var(--primary);
            margin-bottom: 30px;
        }
        
        .market-card {
            background-color: var(--white);
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            height: 100%;
            transition: transform 0.3s ease;
        }
        
        .market-card:hover {
            transform: translateY(-5px);
        }
        
        .market-stat {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .market-stat-value {
            font-size: 28px;
            font-weight: bold;
            color: var(--primary);
            margin-bottom: 5px;
            display: block;
        }
        
        .market-stat-label {
            color: var(--light-text);
            font-size: 14px;
        }
        
        /* Features */
        .features {
            background-color: var(--secondary);
            padding: 60px 0;
            text-align: center;
        }
        
        .feature-item {
            margin-bottom: 30px;
        }
        
        .feature-icon {
            font-size: 36px;
            color: var(--primary);
            margin-bottom: 20px;
        }
        
        /* Pricing */
        .pricing {
            padding: 80px 0;
            text-align: center;
        }
        
        .pricing h2 {
            margin-bottom: 50px;
            font-size: 32px;
        }
        
        .card {
            height: 100%;
            transition: all 0.3s ease;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
        }
        
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .card-header {
            background-color: var(--white);
            border-bottom: 1px solid #e0e0e0;
            padding: 20px;
        }
        
        .card-title {
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        .price {
            font-size: 36px;
            font-weight: bold;
            color: var(--primary);
            margin-bottom: 20px;
        }
        
        .card-body {
            padding: 30px;
        }
        
        .list-group-item {
            border: none;
            color: var(--light-text);
            padding: 10px 0;
        }
        
        /* Testimonials */
        .testimonials {
            background-color: var(--secondary);
            padding: 60px 0;
            text-align: center;
        }
        
        .testimonials h2 {
            margin-bottom: 50px;
            font-size: 32px;
        }
        
        .testimonial-card {
            background-color: var(--white);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            height: 100%;
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .author-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 15px;
        }
        
        .author-info h4 {
            font-size: 18px;
            margin-bottom: 5px;
        }
        
        .author-info p {
            font-size: 14px;
            color: var(--light-text);
            margin-bottom: 0;
        }
        
        /* About Us */
        .about {
            padding: 60px 0;
            background-color: #f0fffa;
        }
        
        .about h2 {
            color: var(--primary);
            margin-bottom: 20px;
            font-size: 28px;
        }
        
        .social-icons {
            display: flex;
            margin-top: 20px;
        }
        
        .social-icon {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary);
            margin-right: 10px;
            color: var(--white);
            text-decoration: none;
        }
        
        .social-icon:hover {
            background-color: #248a50;
            color: var(--white);
        }
        
        /* Footer */
        footer {
            background-color: var(--primary);
            color: var(--white);
            padding: 50px 0 20px;
        }
        
        footer h3 {
            margin-bottom: 20px;
            font-size: 20px;
        }
        
        footer ul {
            list-style: none;
            padding-left: 0;
        }
        
        footer ul li {
            margin-bottom: 10px;
        }
        
        footer ul li a {
            color: var(--white);
            text-decoration: none;
            opacity: 0.8;
            transition: all 0.3s ease;
        }
        
        footer ul li a:hover {
            opacity: 1;
            color: var(--white);
        }
        
        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            font-size: 14px;
            opacity: 0.8;
        }
        
        /* Custom Buttons */
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            padding: 12px 24px;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: #248a50;
            border-color: #248a50;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(45, 159, 96, 0.2);
        }

        /* Market metrics */
        .market-metric {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }
        
        .market-metric .label {
            font-size: 14px;
            color: var(--light-text);
        }
        
        .market-metric .value {
            font-size: 20px;
            font-weight: bold;
            color: var(--primary);
        }
        
        .badge-custom {
            background-color: #e8f5ef;
            color: var(--primary);
            padding: 5px 10px;
            border-radius: 4px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#home">
                <img src="images/val2.png" alt="Vmush Logo" style="width: 100px; height: auto;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#market">Pasar Jamur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pricing">Harga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang Kami</a>
                    </li>
                 <!-- Sebelumnya: <li class="nav-item dropdown"> ... </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="#market">Market</a>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-primary" onclick="location.href='#monitoring'">Login</button>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1>Sistem IoT Penyiraman Otomatis untuk Pertanian</h1>
                    <p>Kelola budidaya jamur tiram Anda dengan lebih mudah, cepat, dan efisien melalui sistem permintaan stok, monitoring, dan penyewaan alat berbasis aplikasi mobile dan website. Dengan teknologi ini, Anda dapat memantau kondisi suhu, kelembaban, serta ketersediaan stok secara real-time, langsung dari genggaman tangan.</p>
                    <a href="#pricing" class="btn btn-primary mt-3">Pilih Paket</a>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="images/logo.png" alt="Vmush Mascot" class="img-fluid" style="max-width: 80%;">
                </div>
            </div>
        </div>
    </section>

    <!-- Market Section -->
    <section id="market" class="market">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h2>Mushroom Market</h2>
                    <p>Pembaruan langsung yang terhubung dengan pembeli dan pasar lokal - permintaan pasar secara langsung untuk produk jamur Anda.</p>
                    <a href="#" class="btn btn-primary mt-2">Kunjungi <i class="fas fa-arrow-right ms-2"></i></a>
                </div>
                <div class="col-md-6">
                    <div class="card market-card">
                        <h5 class="mb-4">Market Overview <span class="badge badge-custom float-end">Live Updates</span></h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="market-metric">
                                    <div class="label">Permintaan Pasar</div>
                                    <div class="value text-success">Tinggi</div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="market-metric">
                                    <div class="label">Pembeli Aktif</div>
                                    <div class="value">50</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="market-metric">
                                    <div class="label">Rata-rata harga/kg</div>
                                    <div class="value">Rp. 16.500</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section id="features" class="features">
        <div class="container">
            <h2 class="mb-5">Fitur Utama</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-item">
                        <div class="feature-icon">💧</div>
                        <h3>Hemat Air</h3>
                        <p>Mengoptimalkan penggunaan air berdasarkan kebutuhan tanaman</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-item">
                        <div class="feature-icon">📱</div>
                        <h3>Kontrol via Aplikasi</h3>
                        <p>Pantau dan atur sistem irigasi dari smartphone Anda kapan saja</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-item">
                        <div class="feature-icon">📊</div>
                        <h3>Laporan Data</h3>
                        <p>Lacak dan analisis penggunaan air untuk mengoptimalkan proses</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing -->
    <section id="pricing" class="pricing">
    <div class="container">
        <h2>Pilih Paket yang Sesuai</h2>
        <div class="row">
            <!-- Paket Rakyat -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h3 class="card-title">Paket Rakyat</h3>
                        <div class="price">Rp 199K</div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <ul class="list-group list-group-flush mb-4">
                            <li class="list-group-item">1 Sensor Kelembaban</li>
                            <li class="list-group-item">Kontrol basic via App</li>
                            <li class="list-group-item">Support 8/5</li>
                        </ul>
                        <div class="mt-auto text-center">
                            <a href="/pembayaran" class="btn btn-success rounded-pill px-4 w-100">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Paket Raden -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h3 class="card-title">Paket Raden</h3>
                        <div class="price">Rp 399K</div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <ul class="list-group list-group-flush mb-4">
                            <li class="list-group-item">3 Sensor Kelembaban</li>
                            <li class="list-group-item">Kontrol premium via App</li>
                            <li class="list-group-item">Support 24/7</li>
                            <li class="list-group-item">Analisis data basic</li>
                        </ul>
                        <div class="mt-auto text-center">
                            <a href="/pembayaran" class="btn btn-success rounded-pill px-4 w-100">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Paket Sultan -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h3 class="card-title">Paket Sultan</h3>
                        <div class="price">Rp 599K</div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <ul class="list-group list-group-flush mb-4">
                            <li class="list-group-item">5 Sensor Kelembaban</li>
                            <li class="list-group-item">Kontrol ultimate via App</li>
                            <li class="list-group-item">Support 24/7</li>
                            <li class="list-group-item">Analisis data advanced</li>
                            <li class="list-group-item">Konsultasi Expert</li>
                        </ul>
                        <div class="mt-auto text-center">
                            <a href="/pembayaran" class="btn btn-success rounded-pill px-4 w-100">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Testimonials -->
    <section id="testimonials" class="testimonials">
        <div class="container">
            <h2>Testimoni Pengguna</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="testimonial-card">
                        <div class="testimonial-author">
                            <div class="author-image">
                                <img src="/api/placeholder/50/50" alt="User Avatar" class="img-fluid">
                            </div>
                            <div class="author-info">
                                <h4>Ahmad Budiman</h4>
                                <p>Petani Sayuran, Bandung</p>
                            </div>
                        </div>
                        <p>"Vmush membantu saya menghemat hingga 30% penggunaan air, dan hasil panen juga meningkat!"</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="testimonial-card">
                        <div class="testimonial-author">
                            <div class="author-image">
                                <img src="/api/placeholder/50/50" alt="User Avatar" class="img-fluid">
                            </div>
                            <div class="author-info">
                                <h4>Dewi Santoso</h4>
                                <p>Pengusaha Pertanian, Surabaya</p>
                            </div>
                        </div>
                        <p>"Kemudahan monitoring dari jarak jauh membuat manajemen lahan pertanian saya jauh lebih efisien."</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="testimonial-card">
                        <div class="testimonial-author">
                            <div class="author-image">
                                <img src="/api/placeholder/50/50" alt="User Avatar" class="img-fluid">
                            </div>
                            <div class="author-info">
                                <h4>Budi Hartono</h4>
                                <p>Petani Buah, Malang</p>
                            </div>
                        </div>
                        <p>"Data yang disediakan sangat membantu dalam mengambil keputusan untuk pertanian berbasis data."</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us -->
    <section id="about" class="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="images/logo2.png" alt="Vmush Team" class="img-fluid rounded">
                </div>
                <div class="col-lg-6">
                    <h2>Tentang Kami</h2>
                    <p>Vmush adalah startup teknologi pertanian yang berfokus pada pengembangan solusi irigasi cerdas berbasis Internet of Things (IoT). Misi kami adalah membantu petani meningkatkan produktivitas pertanian dengan teknologi yang terjangkau.</p>
                    <p>Tim kami terdiri dari ahli teknologi dan pertanian yang berkomitmen untuk menciptakan solusi berkelanjutan bagi masa depan pertanian Indonesia.</p>
                    <a href="#contact" class="btn btn-primary mt-3">Pelajari Lebih Lanjut</a>
                    <div class="social-icons mt-4">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://www.instagram.com/p/DGnnmxbzEKe/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==" class="social-icon"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h3>Vmush</h3>
                    <p>Solusi irigasi cerdas untuk pertanian modern</p>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h3>Menu</h3>
                    <ul>
                        <li><a href="#home">Beranda</a></li>
                        <li><a href="#market">Pasar Jamur</a></li>
                        <li><a href="#features">Fitur</a></li>
                        <li><a href="#pricing">Harga</a></li>
                        <li><a href="#about">Tentang</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Kontak</h3>
                    <ul>
                        <li>info@Vmush.com</li>
                        <li>+62 821-2345-6789</li>
                    </ul>
                </div>
            </div>
            <div class="copyright mt-4">
                © 2025 Vmush.com. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Smooth scrolling for navbar links
        document.querySelectorAll('nav a, footer a').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href.startsWith('#') && href !== '#') {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 76, // Offset for header height
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });
    </script>
</body>
</html>