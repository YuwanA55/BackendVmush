<!DOCTYPE html>
<html lang="id">
<head>
    <link href="{{ asset('images/logo.png') }}" rel="icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vmush - Sistem IoT Penyiraman Otomatis untuk Pertanian</title>
    <style>
        :root {
            --primary: #2d9f60;
            --secondary: #e8f5ef;
            --text: #333333;
            --light-text: #666666;
            --white: #ffffff;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            color: var(--text);
            line-height: 1.6;
            background-color: #ffffff;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header */
        header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 20px;
    background-color: #ffffff;
    position: fixed;
    width: 100%;
    top: 0;
    left: 0;
    z-index: 1000; /* Pastikan berada di atas elemen lain */
    /* box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); Tambahkan bayangan agar terlihat lebih jelas */
}
        
        .logo {
            font-weight: bold;
            font-size: 24px;
            color: var(--primary);
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav ul li {
            margin-left: 30px;
        }
        
        nav ul li a {
            text-decoration: none;
            color: var(--text);
            font-weight: 500;
        }
        
        /* Hero Section */
        .hero {
            display: flex;
            align-items: center;
            padding: 60px 0;
            background-color: #f0fffa;
        }
        
        .hero-content {
            flex: 1;
        }
        
        .hero-content h1 {
            font-size: 32px;
            color: var(--primary);
            margin-bottom: 20px;
        }
        
        .hero-content p {
            margin-bottom: 30px;
            font-size: 16px;
        }
        
        .hero-image {
            flex: 1;
            text-align: center;
        }
        
        .btn {
            display: inline-block;
            background-color: var(--primary);
            color: var(--white);
            padding: 12px 24px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(45, 159, 96, 0.2);
        }
        
        /* Features */
        .features {
            background-color: var(--secondary);
            padding: 60px 0;
            text-align: center;
        }
        
        .features-grid {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }
        
        .feature-item {
            flex: 1;
            margin: 0 15px;
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
        
        .pricing-grid {
            display: flex;
            justify-content: space-between;
            margin: 40px 0;
        }
        
        .pricing-card {
            flex: 1;
            margin: 0 15px;
            border-radius: 10px;
            border: 1px solid #e0e0e0;
            padding: 30px;
            transition: all 0.3s ease;
        }
        
        .pricing-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .pricing-header {
            margin-bottom: 20px;
        }
        
        .pricing-header h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        .price {
            font-size: 36px;
            font-weight: bold;
            color: var(--primary);
            margin-bottom: 20px;
        }
        
        .pricing-features {
            list-style: none;
            margin-bottom: 30px;
        }
        
        .pricing-features li {
            margin-bottom: 10px;
            color: var(--light-text);
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
        
        .testimonial-grid {
            display: flex;
            justify-content: space-between;
        }
        
        .testimonial-card {
            flex: 1;
            margin: 0 15px;
            padding: 20px;
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
        }
        
        /* About Us */
        .about {
            padding: 60px 0;
            background-color: #f0fffa;
        }
        
        .about .container {
            display: flex;
            align-items: center;
        }
        
        .about-image {
            flex: 1;
            padding-right: 30px;
        }
        
        .about-image img {
            max-width: 100%;
            border-radius: 5px;
        }
        
        .about-content {
            flex: 1;
        }
        
        .about-content h2 {
            color: var(--primary);
            margin-bottom: 20px;
            font-size: 28px;
        }
        
        .about-content p {
            margin-bottom: 15px;
            line-height: 1.7;
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
        
        /* Footer */
        footer {
            background-color: var(--primary);
            color: var(--white);
            padding: 50px 0 20px;
        }
        
        .footer-content {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        
        .footer-column {
            flex: 1;
            margin-right: 30px;
        }
        
        .footer-column h3 {
            margin-bottom: 20px;
            font-size: 20px;
        }
        
        .footer-column ul {
            list-style: none;
        }
        
        .footer-column ul li {
            margin-bottom: 10px;
        }
        
        .footer-column ul li a {
            color: var(--white);
            text-decoration: none;
            opacity: 0.8;
            transition: all 0.3s ease;
        }
        
        .footer-column ul li a:hover {
            opacity: 1;
        }
        
        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            font-size: 14px;
            opacity: 0.8;
        }

        .dropdown {
        position: relative;
        display: inline-block;
    }
    .dropbtn {
        text-decoration: none;
        color: var(--text);
        font-weight: 500;
        padding: 10px;
    }
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: var(--white);
        min-width: 160px;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
        z-index: 1;
    }
    .dropdown-content a {
        color: var(--text);
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }
    .dropdown-content a:hover {
        background-color: var(--secondary);
    }
    .dropdown:hover .dropdown-content {
        display: block;
    }

    </style>
</head>
<body>
    <!-- Header -->
    <div class="container">
        <header>
            <div class="logo">
            <img src="images/val2.png" alt="Vmush Logo" style="width: 100px; height: auto;">
            </div>
            <nav>
                
                <ul>
        <li><a href="#home">Beranda</a></li>
        <li><a href="#features">Fitur</a></li>
        <li><a href="#pricing">Harga</a></li>
        <li><a href="#pricing">Tentang Kami</a></li>
        <li class="dropdown">
            <a href="#about" class="dropbtn">Layanan ▼</a>
            <div class="dropdown-content">
                <a href="#team">monitoring System</a>
                <a href="#vision">Market</a>
            </div>
        </li>
    </ul> 

            </nav>
        </header>
    </div>

    <!-- Hero Section -->
    <section id="home" class="hero">
    <div class="container" style="display: flex; align-items: center; justify-content: space-between;">
        <div class="hero-content" style="flex: 1;">
            <h1>Sistem IoT Penyiraman Otomatis untuk Pertanian</h1>
            <p>Vmush menawarkan solusi irigasi otomatis dengan teknologi IoT untuk pertanian yang lebih efisien dan hasil panen yang melimpah.</p>
            <a href="https://wa.link/b66myh" class="btn">Mulai Sekarang</a>
        </div>
        <div class="hero-image" style="flex: 1; text-align: right;">
            <img src="{{ asset('images/logo.png') }}" alt="ByteSoil Mascot" style="max-width: 80%;">
        </div>
    </div>
</section>


    <!-- Features -->
    <section id="features" class="features">
        <div class="container">
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">💧</div>
                    <h3>Hemat Air</h3>
                    <p>Mengoptimalkan penggunaan air berdasarkan kebutuhan tanaman</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">📱</div>
                    <h3>Kontrol via Aplikasi</h3>
                    <p>Pantau dan atur sistem irigasi dari smartphone Anda kapan saja</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">📊</div>
                    <h3>Laporan Data</h3>
                    <p>Lacak dan analisis penggunaan air untuk mengoptimalkan proses</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing -->
    <section id="pricing" class="pricing">
        <div class="container">
            <h2>Pilih Paket yang Sesuai</h2>
            <div class="pricing-grid">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Paket Rakyat</h3>
                        <div class="price">Rp 199K</div>
                    </div>
                    <ul class="pricing-features">
                        <li>1 Sensor Kelembaban</li>
                        <li>Kontrol basic via App </li>
                        <li>Support 8/5</li>
                    </ul>
                    <a href="#" class="btn">Beli Sekarang</a>
                </div>
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Paket Raden</h3>
                        <div class="price">Rp 399K</div>
                    </div>
                    <ul class="pricing-features">
                        <li>3 Sensor Kelembaban</li>
                        <li>Kontrol premium via App</li>
                        <li>Support 24/7</li>
                        <li>Analisis fata basic</li>
                    </ul>
                    <a href="#" class="btn">Beli Sekarang</a>
                </div>
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>Paket Sultan</h3>
                        <div class="price">Rp 599K</div>
                    </div>
                    <ul class="pricing-features">
                        <li>5 Sensor Kelembaban</li>
                        <li>Kontrol ultimate via App</li>
                        <li>Support 24/7</li>
                        <li>Analisis data advanced</li>
                        <li>Konsultasi Expert</li>
                    </ul>
                    <a href="#" class="btn">Beli Sekarang</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section id="testimonials" class="testimonials">
        <div class="container">
            <h2>Testimoni Pengguna</h2>
            <div class="testimonial-grid">
                <div class="testimonial-card">
                    <div class="testimonial-author">
                        <div class="author-image">
                            <img src="/api/placeholder/50/50" alt="User Avatar">
                        </div>
                        <div class="author-info">
                            <h4>Ahmad Budiman</h4>
                            <p>Petani Sayuran, Bandung</p>
                        </div>
                    </div>
                    <p>"Vmush membantu saya menghemat hingga 30% penggunaan air, dan hasil panen juga meningkat!"</p>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-author">
                        <div class="author-image">
                            <img src="{{ asset('images/logo2.png') }}" alt="ByteSoil Mascot" style="max-width: 100%; border-radius: 5px;">
                        </div>
                        <div class="author-info">
                            <h4>Dewi Santoso</h4>
                            <p>Pengusaha Pertanian, Surabaya</p>
                        </div>
                    </div>
                    <p>"Kemudahan monitoring dari jarak jauh membuat manajemen lahan pertanian saya jauh lebih efisien."</p>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-author">
                        <div class="author-image">
                            <img src="/api/placeholder/50/50" alt="User Avatar">
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
    </section>

    <!-- About Us -->
    <section id="about" class="about">
        <div class="container">
            <div class="about-image">
            <img src="{{ asset('images/logo2.png') }}" alt="ByteSoil Mascot">
            </div>
            <div class="about-content">
                <h2>Tentang Kami</h2>
                <p>Vmush adalah startup teknologi pertanian yang berfokus pada pengembangan solusi irigasi cerdas berbasis Internet of Things (IoT). Misi kami adalah membantu petani meningkatkan produktivitas pertanian dengan teknologi yang terjangkau.</p>
                <p>Tim kami terdiri dari ahli teknologi dan pertanian yang berkomitmen untuk menciptakan solusi berkelanjutan bagi masa depan pertanian Indonesia.</p>
                <a href="#contact" class="btn">Pelajari Lebih Lanjut</a>
                <div class="social-icons">
                    <a href="#" class="social-icon">f</a>
                    <a href="#" class="social-icon">in</a>
                    <a href="https://www.instagram.com/p/DGnnmxbzEKe/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==" class="social-icon">ig</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>Vmush</h3>
                    <p>Solusi irigasi cerdas untuk pertanian modern</p>
                </div>
                <div class="footer-column">
                    <h3>Menu</h3>
                    <ul>
                        <li><a href="#home">Beranda</a></li>
                        <li><a href="#features">Fitur</a></li>
                        <li><a href="#pricing">Harga</a></li>
                        <li><a href="#about">Tentang</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Kontak</h3>
                    <ul>
                        <li>info@Vmush.com</li>
                        <li>+62 821-2345-6789</li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                © 2025 Vmush.com. All rights reserved.
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for navbar links
        document.querySelectorAll('nav a, footer a').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 70, // Offset for header height
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>