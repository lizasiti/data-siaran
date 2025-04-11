<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radio Republik Indonesia - Portal Siaran</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #d50000;
            --secondary-color: #b71c1c;
            --accent-color: #f44336;
            --dark-color: #263238;
            --light-color: #f5f5f5;
            --white: #ffffff;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: var(--light-color);
        }
        
        header {
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            z-index: 100;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }
        
        .logo {
            display: flex;
            align-items: center;
        }
        
        .logo img {
            height: 50px;
            margin-right: 10px;
        }
        
        .logo-text {
            font-weight: bold;
            font-size: 1.2rem;
            color: var(--dark-color);
        }
        
        .nav-links {
            display: flex;
            list-style: none;
        }
        
        .nav-links li {
            margin-left: 25px;
        }
        
        .nav-links a {
            text-decoration: none;
            color: var(--dark-color);
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .nav-links a:hover {
            color: var(--primary-color);
        }
        
        .auth-buttons .btn {
            padding: 8px 20px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .btn-outline {
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
            margin-right: 10px;
        }
        
        .btn-outline:hover {
            background-color: var(--primary-color);
            color: var(--white);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            color: var(--white);
            border: 1px solid var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                       url('/api/placeholder/1200/600') no-repeat center center/cover;
            height: 80vh;
            display: flex;
            align-items: center;
            color: var(--white);
            padding-top: 80px;
        }
        
        .hero-content {
            max-width: 650px;
        }
        
        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            font-weight: bold;
        }
        
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        
        .hero-buttons .btn {
            padding: 12px 30px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            display: inline-block;
            margin-right: 15px;
            margin-bottom: 15px;
        }
        
        .featured-programs {
            padding: 80px 0;
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .section-header h2 {
            font-size: 2.2rem;
            color: var(--dark-color);
            margin-bottom: 20px;
        }
        
        .section-header p {
            color: #666;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.6;
        }
        
        .program-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
        }
        
        .program-card {
            background-color: var(--white);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        
        .program-card:hover {
            transform: translateY(-5px);
        }
        
        .program-img {
            height: 180px;
            background-color: #ddd;
            position: relative;
        }
        
        .program-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: var(--primary-color);
            color: var(--white);
            padding: 5px 10px;
            border-radius: 3px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .program-content {
            padding: 20px;
        }
        
        .program-content h3 {
            margin-bottom: 10px;
            font-size: 1.2rem;
            color: var(--dark-color);
        }
        
        .program-content p {
            color: #666;
            margin-bottom: 15px;
            line-height: 1.5;
            font-size: 0.9rem;
        }
        
        .program-meta {
            display: flex;
            justify-content: space-between;
            font-size: 0.85rem;
            color: #888;
        }
        
        .program-meta span {
            display: flex;
            align-items: center;
        }
        
        .program-meta i {
            margin-right: 5px;
        }
        
        .cta-section {
            background-color: var(--primary-color);
            color: var(--white);
            padding: 80px 0;
            text-align: center;
        }
        
        .cta-content {
            max-width: 700px;
            margin: 0 auto;
        }
        
        .cta-content h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        
        .cta-content p {
            margin-bottom: 30px;
            font-size: 1.1rem;
            line-height: 1.6;
        }
        
        .btn-white {
            background-color: var(--white);
            color: var(--primary-color);
            padding: 12px 30px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            display: inline-block;
        }
        
        .btn-white:hover {
            background-color: rgba(255, 255, 255, 0.9);
            transform: translateY(-3px);
        }
        
        footer {
            background-color: var(--dark-color);
            color: #ccc;
            padding: 60px 0 30px;
        }
        
        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }
        
        .footer-column h3 {
            color: var(--white);
            margin-bottom: 20px;
            font-size: 1.2rem;
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 10px;
        }
        
        .footer-links a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-links a:hover {
            color: var(--white);
        }
        
        .social-links {
            display: flex;
            margin-top: 15px;
        }
        
        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--white);
            border-radius: 50%;
            margin-right: 10px;
            transition: background-color 0.3s;
        }
        
        .social-links a:hover {
            background-color: var(--primary-color);
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
            text-align: center;
            font-size: 0.9rem;
        }
        
        @media (max-width: 992px) {
            .hero h1 {
                font-size: 2.5rem;
            }
        }
        
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .hero {
                height: 70vh;
            }
            
            .hero h1 {
                font-size: 2rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .hero-buttons .btn {
                padding: 10px 20px;
            }
        }
        
        @media (max-width: 576px) {
            .logo-text {
                display: none;
            }
            
            .featured-programs {
                padding: 50px 0;
            }
            
            .section-header h2 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <nav class="navbar">
                <div class="logo">
                    <img src="img/rpro2.jpg" alt="Logo RRI">
                    <div class="logo-text">
                        <div>Radio Republik Indonesia</div>
                        <div style="font-size: 0.8rem; color: #777;">Sekali di Udara, Tetap di Udara</div>
                    </div>
                </div>
                
                <ul class="nav-links">
                    <li><a href="{{ route('landing.page') }}">Beranda</a></li>
                    <li><a href="{{ route('jadwal-siaran.landing') }}">Jadwal Siaran</a></li>
                </ul>
                
                <div class="auth-buttons">
                    <a href="/loginn" class="btn btn-outline">Masuk</a>
                    <a href="register" class="btn btn-primary">Daftar</a>
                </div>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Kelola Program Siaran RRI dengan Mudah</h1>
                <p>Platform manajemen program siaran Radio Republik Indonesia yang memudahkan pengelolaan konten, jadwal, dan distribusi program radio Anda.</p>
                <div class="hero-buttons">
                    <a href="#" class="btn btn-primary">Masuk ke Dashboard</a>
                    <a href="#" class="btn btn-outline" style="background-color: transparent; color: white;">Pelajari Lebih Lanjut</a>
                </div>
            </div>
        </div>
    </section>

    <section class="featured-programs">
        <div class="container">
            <div class="section-header">
                <h2>Program Unggulan RRI</h2>
                <p>Temukan program siaran terbaik dari Radio Republik Indonesia yang menginformasi, mengedukasi, dan menghibur seluruh masyarakat Indonesia.</p>
            </div>
            
            <div class="program-grid">
                <div class="program-card">
                    <div class="program-img" style="background: url('/api/placeholder/300/180') no-repeat center/cover;">
                        <div class="program-badge">BERITA</div>
                    </div>
                    <div class="program-content">
                        <h3>Indonesia Pagi Ini</h3>
                        <p>Program berita pagi yang menyajikan informasi terkini dan terpercaya untuk memulai hari Anda.</p>
                        <div class="program-meta">
                            <span><i class="far fa-clock"></i> 06:00 - 08:00 WIB</span>
                            <span><i class="fas fa-broadcast-tower"></i> PRO 1</span>
                        </div>
                    </div>
                </div>
                
                <div class="program-card">
                    <div class="program-img" style="background: url('/api/placeholder/300/180') no-repeat center/cover;">
                        <div class="program-badge">TALKSHOW</div>
                    </div>
                    <div class="program-content">
                        <h3>Dialog Indonesia</h3>
                        <p>Perbincangan mendalam tentang berbagai isu terkini yang relevan bagi masyarakat Indonesia.</p>
                        <div class="program-meta">
                            <span><i class="far fa-clock"></i> 19:00 - 20:30 WIB</span>
                            <span><i class="fas fa-broadcast-tower"></i> PRO 3</span>
                        </div>
                    </div>
                </div>
                
                <div class="program-card">
                    <div class="program-img" style="background: url('/api/placeholder/300/180') no-repeat center/cover;">
                        <div class="program-badge">BUDAYA</div>
                    </div>
                    <div class="program-content">
                        <h3>Pusaka Nusantara</h3>
                        <p>Mengeksplorasi kekayaan budaya dan tradisi dari berbagai daerah di Indonesia.</p>
                        <div class="program-meta">
                            <span><i class="far fa-clock"></i> 15:00 - 16:30 WIB</span>
                            <span><i class="fas fa-broadcast-tower"></i> PRO 4</span>
                        </div>
                    </div>
                </div>
                
                <div class="program-card">
                    <div class="program-img" style="background: url('/api/placeholder/300/180') no-repeat center/cover;">
                        <div class="program-badge">MUSIK</div>
                    </div>
                    <div class="program-content">
                        <h3>Bintang Radio</h3>
                        <p>Program musik yang menampilkan talenta-talenta terbaik dari seluruh Indonesia.</p>
                        <div class="program-meta">
                            <span><i class="far fa-clock"></i> 20:00 - 22:00 WIB</span>
                            <span><i class="fas fa-broadcast-tower"></i> PRO 2</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Kelola Program Siaran dengan Efisien</h2>
                <p>Akses dashboard manajemen program siaran RRI untuk mengelola jadwal, konten, dan distribusi program radio secara efisien dan profesional.</p>
                <a href="#" class="btn-white">Masuk Sekarang</a>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-column">
                    <h3>Radio Republik Indonesia</h3>
                    <p>Stasiun radio tertua dan terluas di Indonesia yang menyiarkan program informatif, edukatif, dan menghibur.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <!-- <div class="footer-column">
                    <h3>Program</h3>
                    <ul class="footer-links">
                        <li><a href="#">Program Berita</a></li>
                        <li><a href="#">Program Pendidikan</a></li>
                        <li><a href="#">Program Budaya</a></li>
                        <li><a href="#">Program Musik</a></li>
                        <li><a href="#">Program Dakwah</a></li>
                    </ul>
                </div> -->
                
                <div class="footer-column">
                    <h3>Layanan</h3>
                    <ul class="footer-links">
                        <li><a href="#">Jadwal Siaran</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Informasi</h3>
                    <ul class="footer-links">
                        <li><a href="#">Tentang RRI</a></li>
                        <li><a href="#">Karir</a></li>
                        <li><a href="#">Kerjasama</a></li>
                        <li><a href="#">Kontak Kami</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 Radio Republik Indonesia. Hak Cipta Dilindungi Undang-Undang.</p>
            </div>
        </div>
    </footer>
</body>
</html>