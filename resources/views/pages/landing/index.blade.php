<x-layout.landing>
    <main class="main">

        <x-partials.landing.hero></x-partials.landing.hero>

        <!-- Start - Modal Sign In Lms -->
        <div class="modal fade" id="loginLms" tabindex="-1" aria-labelledby="loginLmsLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Start - Features Section -->
                    <section id="#" class="features section">

                        <!-- Section Title -->
                        <div class="container section-title" data-aos="fade-up">
                            <h2>Login ke Lms</h2>
                        </div><!-- End Section Title -->

                        <div class="container">

                            <div class="d-flex justify-content-center">
                                <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">
                                    <li class="nav-item">
                                        <a class="nav-link active show" data-bs-toggle="tab"
                                            data-bs-target="#login-siswa">
                                            <h4>Untuk Siswa</h4>
                                        </a>
                                    </li><!-- End tab nav item -->

                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#login-guru">
                                            <h4>Untuk Guru</h4>
                                        </a>
                                    </li><!-- End tab nav item -->

                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#login-admin">
                                            <h4>Untuk Admin</h4>
                                        </a>
                                    </li><!-- End tab nav item -->
                                </ul>
                            </div>

                            <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                                <!-- Login Siswa -->
                                <div class="tab-pane show active" id="login-siswa">
                                    <form method="POST" action="{{ route('login.student.post') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="nisnSiswa" class="form-label">Nisn Siswa</label>
                                            <input type="text" name="nisn" class="form-control rounded-pill"
                                                id="nisnSiswa" placeholder="Nisn Siswa">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control rounded-pill"
                                                id="password" placeholder="Masukkan password" required
                                                autocomplete="current-password">
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100 rounded-pill">Login
                                            Siswa</button>
                                    </form>
                                </div>

                                <!-- End tab content item -->

                                <!-- Login Guru -->
                                <div class="tab-pane fade" id="login-guru">
                                    <form role="form" method="POST" action="{{ route('login.teacher.post') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="guruEmail" class="form-label">Email Guru</label>
                                            <input type="email" name="email" class="form-control rounded-pill"
                                                id="guruEmail" placeholder="nama@guru.com">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control rounded-pill"
                                                id="password" placeholder="Masukkan password" required
                                                autocomplete="current-password">
                                        </div>
                                        <button type="submit" class="btn btn-success w-100 rounded-pill">Login
                                            Guru</button>
                                    </form>
                                </div><!-- End tab content item -->

                                <!-- Login Admin -->
                                <div class="tab-pane fade" id="login-admin">
                                    <form role="form" method="POST" action="{{ route('login.operator.post') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="adminUsername" class="form-label">Email Admin</label>
                                            <input type="email" name="email" class="form-control rounded-pill"
                                                id="adminemail" placeholder="Email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="adminPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control rounded-pill"
                                                id="adminPassword" placeholder="Masukkan password"
                                                aria-label="password" autocomplete="current-password" required>
                                        </div>
                                        <button type="submit" class="btn btn-danger w-100 rounded-pill">Login
                                            Admin</button>
                                    </form>
                                </div><!-- End tab content item -->

                            </div>

                        </div>

                    </section>
                    <!-- End - Features Section -->

                </div>
            </div>
        </div>
        <!-- End - Modal Sign In Lms -->


        <!-- Start - About Section -->
        <section id="about" class="about section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4 align-items-center justify-content-between">

                    <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
                        <span class="about-meta">TENTANG KAMI</span>
                        <h2 class="about-title">Belajar Cerdas, Masa Depan Hebat</h2>
                        <p class="about-description">Innovate Edu hadir untuk membangun ekosistem pendidikan digital
                            yang lebih mudah, menyenangkan, dan terjangkau.
                            Bersama guru, siswa, dan admin — kami percaya setiap langkah kecil adalah awal dari
                            perubahan besar.</p>

                        <div class="row feature-list-wrapper">
                            <div class="col-md-6">
                                <ul class="feature-list">
                                    <li><i class="bi bi-check-circle-fill"></i> E-book interaktif</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Tugas otomatis & realtime</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Kelas virtual fleksibel</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="feature-list">
                                    <li><i class="bi bi-check-circle-fill"></i> Games edukatif</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Dashboard admin lengkap</li>
                                    <li><i class="bi bi-check-circle-fill"></i> Kolaborasi tanpa batas</li>
                                </ul>
                            </div>
                        </div>

                        <div class="info-wrapper">
                            <div class="row gy-4">
                                <div class="col-lg-5">
                                    <div class="profile d-flex align-items-center gap-3">
                                        <img src="assets/landing/img/avatar-1.webp" alt="CEO Profile"
                                            class="profile-image">
                                        <div>
                                            <h4 class="profile-name">Luqman F. Nadin</h4>
                                            <p class="profile-position">CEO &amp; Founder</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="contact-info d-flex align-items-center gap-2">
                                        <i class="bi bi-telephone-fill"></i>
                                        <div>
                                            <p class="contact-label">Hubungi kami kapan saja</p>
                                            <p class="contact-number">+62 877 7755 3390</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="image-wrapper">
                            <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                                <img src="assets/landing/img/about-5.webp" alt="Business Meeting"
                                    class="img-fluid main-image rounded-4">
                                <img src="assets/landing/img/about-2.webp" alt="Team Discussion"
                                    class="img-fluid small-image rounded-4">
                            </div>
                            <div class="experience-badge floating">
                                <h3>15+ <span>Tahun</span></h3>
                                <p>Pengalaman di bidang layanan pendidikan</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>
        <!-- End - About Section -->

        <!-- Start - Features Section -->
        <section id="features" class="features section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Fitur Unggulan</h2>
                <p>Semua yang Anda butuhkan untuk belajar dan mengajar dalam satu platform yang cerdas dan efisien.</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="d-flex justify-content-center">

                    <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">

                        <li class="nav-item">
                            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                                <h4>Untuk Guru</h4>
                            </a>
                        </li><!-- End tab nav item -->

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                                <h4>Untuk Siswa</h4>
                            </a><!-- End tab nav item -->

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                                <h4>Untuk Admin</h4>
                            </a>
                        </li><!-- End tab nav item -->

                    </ul>

                </div>

                <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                    <div class="tab-pane fade active show" id="features-tab-1">
                        <div class="row">
                            <div
                                class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                                <h3>Manajemen Kelas Tanpa Batas</h3>
                                <p class="fst-italic">
                                    Buat, atur, dan pantau pembelajaran dari satu dashboard yang efisien dan mudah
                                    digunakan.
                                </p>
                                <ul>
                                    <li><i class="bi bi-check2-all"></i> <span>Kelola kelas dan jadwal dengan
                                            fleksibel.</span></li>
                                    <li><i class="bi bi-check2-all"></i> <span>Bagikan materi dan e-book secara
                                            langsung.</span></li>
                                    <li><i class="bi bi-check2-all"></i> <span>Koreksi tugas otomatis dan pantau
                                            perkembangan siswa.</span></li>
                                </ul>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <img src="assets/landing/img/features-illustration-1.webp" alt=""
                                    class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End tab content item -->

                    <div class="tab-pane fade" id="features-tab-2">
                        <div class="row">
                            <div
                                class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                                <h3>Belajar Jadi Lebih Seru</h3>
                                <p class="fst-italic">
                                    Nikmati pengalaman belajar interaktif, fleksibel, dan menyenangkan kapan saja di
                                    mana saja.
                                </p>
                                <ul>
                                    <li><i class="bi bi-check2-all"></i> <span>Akses e-book dan materi kapan
                                            saja.</span></li>
                                    <li><i class="bi bi-check2-all"></i> <span>Kumpulkan tugas dan ikuti kuis secara
                                            online.</span></li>
                                    <li><i class="bi bi-check2-all"></i> <span>Kelas virtual dengan interaksi
                                            real-time.</span>
                                    </li>
                                    <li><i class="bi bi-check2-all"></i> <span> edukatif yang bikin belajar makin
                                            asyik.</span></li>
                                </ul>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <img src="assets/landing/img/features-illustration-2.webp" alt=""
                                    class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End tab content item -->

                    <div class="tab-pane fade" id="features-tab-3">
                        <div class="row">
                            <div
                                class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                                <h3>Kontrol Penuh di Tangan Anda</h3>
                                <ul>
                                    <li><i class="bi bi-check2-all"></i> <span>Kelola pengguna: guru, siswa, dan
                                            kelas.</span></li>
                                    <li><i class="bi bi-check2-all"></i> <span>Laporan lengkap dan real-time.</span>
                                    </li>
                                    <li><i class="bi bi-check2-all"></i> <span>Pengaturan sistem yang mudah dan
                                            aman.</span>
                                    </li>
                                </ul>
                                <p class="fst-italic">
                                    Inovasi bukan hanya untuk pengajar dan pelajar — admin pun berperan penting dalam
                                    membangun ekosistem digital yang efektif.
                                </p>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <img src="assets/landing/img/features-illustration-3.webp" alt=""
                                    class="img-fluid">
                            </div>
                        </div>
                    </div><!-- End tab content item -->

                </div>

            </div>

        </section>
        <!-- End - Features Section -->

        <!-- Start - Features Cards Section -->
        <section id="features-cards" class="features-cards section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                        <div class="feature-box orange">
                            <i class="bi bi-award"></i>
                            <h4>Pembelajaran Interaktif</h4>
                            <p>Belajar jadi lebih seru dengan e-book, kuis, dan games yang mendukung pemahaman siswa.
                            </p>
                        </div>
                    </div><!-- End Feature Borx-->

                    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="feature-box blue">
                            <i class="bi bi-patch-check"></i>
                            <h4>Penilaian Otomatis</h4>
                            <p>Kumpulkan tugas, koreksi otomatis, dan pantau perkembangan siswa secara real-time.</p>
                        </div>
                    </div><!-- End Feature Borx-->

                    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                        <div class="feature-box green">
                            <i class="bi bi-sunrise"></i>
                            <h4> Virtual Fleksibel</h4>
                            <p>Akses ruang kelas kapan saja dan di mana saja. Interaksi guru dan siswa jadi lebih mudah.
                            </p>
                        </div>
                    </div><!-- End Feature Borx-->

                    <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                        <div class="feature-box red">
                            <i class="bi bi-shield-check"></i>
                            <h4>Keamanan & Kendali</h4>
                            <p>Data pengguna aman, kontrol admin penuh. Sistem dirancang untuk stabil dan terstruktur.
                            </p>
                        </div>
                    </div><!-- End Feature Borx-->

                </div>

            </div>

        </section>
        <!-- End - Features Cards Section -->

        <!-- Start - Features 2 Section -->
        <section id="features-2" class="features-2 section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row align-items-center">

                    <div class="col-lg-4">

                        <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="200">
                            <div class="d-flex align-items-center justify-content-end gap-4">
                                <div class="feature-content">
                                    <h3>Bisa Diakses di Semua Perangkat</h3>
                                    <p>Belajar dan mengajar lebih fleksibel — cukup dari ponsel, tablet, atau laptop.
                                    </p>
                                </div>
                                <div class="feature-icon flex-shrink-0">
                                    <i class="bi bi-display"></i>
                                </div>
                            </div>
                        </div><!-- End .feature-item -->

                        <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="300">
                            <div class="d-flex align-items-center justify-content-end gap-4">
                                <div class="feature-content">
                                    <h3>Desain Ikon Ringan</h3>
                                    <p>Antarmuka modern dengan ikon sederhana, intuitif, dan cepat dimuat.</p>
                                </div>
                                <div class="feature-icon flex-shrink-0">
                                    <i class="bi bi-feather"></i>
                                </div>
                            </div>
                        </div><!-- End .feature-item -->

                        <div class="feature-item text-end" data-aos="fade-right" data-aos-delay="400">
                            <div class="d-flex align-items-center justify-content-end gap-4">
                                <div class="feature-content">
                                    <h3>Visual Tajam dan Jernih</h3>
                                    <p>Optimasi tampilan layar tinggi (Retina) untuk kenyamanan maksimal.</p>
                                </div>
                                <div class="feature-icon flex-shrink-0">
                                    <i class="bi bi-eye"></i>
                                </div>
                            </div>
                        </div><!-- End .feature-item -->

                    </div>

                    <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                        <div class="phone-mockup text-center">
                            <img src="assets/landing/img/phone-app-screen.webp" alt="Phone Mockup" class="img-fluid">
                        </div>
                    </div><!-- End Phone Mockup -->

                    <div class="col-lg-4">

                        <div class="feature-item mb-5" data-aos="fade-left" data-aos-delay="200">
                            <div class="d-flex align-items-center gap-4">
                                <div class="feature-icon flex-shrink-0">
                                    <i class="bi bi-code-square"></i>
                                </div>
                                <div class="feature-content">
                                    <h3>Kode Aman & Valid</h3>
                                    <p>Dikembangkan dengan standar W3C untuk menjamin kualitas dan keamanan.</p>
                                </div>
                            </div>
                        </div><!-- End .feature-item -->

                        <div class="feature-item mb-5" data-aos="fade-left" data-aos-delay="300">
                            <div class="d-flex align-items-center gap-4">
                                <div class="feature-icon flex-shrink-0">
                                    <i class="bi bi-phone"></i>
                                </div>
                                <div class="feature-content">
                                    <h3>Tampilan Responsif</h3>
                                    <p>Menyesuaikan dengan semua ukuran layar — tampilan tetap rapi dan profesional.</p>
                                </div>
                            </div>
                        </div><!-- End .feature-item -->

                        <div class="feature-item" data-aos="fade-left" data-aos-delay="400">
                            <div class="d-flex align-items-center gap-4">
                                <div class="feature-icon flex-shrink-0">
                                    <i class="bi bi-browser-chrome"></i>
                                </div>
                                <div class="feature-content">
                                    <h3>Kompatibel Semua Browser</h3>
                                    <p>Bisa diakses melalui Chrome, Firefox, Edge, Safari, dan lainnya tanpa masalah.
                                    </p>
                                </div>
                            </div>
                        </div><!-- End .feature-item -->

                    </div>
                </div>

            </div>

        </section>
        <!-- End - Features 2 Section -->

        <!-- Start - Call To Action Section -->
        <section id="call-to-action" class="call-to-action section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row content justify-content-center align-items-center position-relative">
                    <div class="col-lg-8 mx-auto text-center">
                        <h2 class="display-4 mb-4">Saatnya Melangkah Lebih Jauh!</h2>
                        <p class="mb-4">Bangun masa depan pendidikan bersama kami. Mulai sekarang dan jadilah bagian
                            dari perubahan.</p>
                        <a href="#" class="btn btn-cta">Mulai Sekarang</a>
                    </div>

                    <!-- Abstract Background Elements -->
                    <div class="shape shape-1">
                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M47.1,-57.1C59.9,-45.6,68.5,-28.9,71.4,-10.9C74.2,7.1,71.3,26.3,61.5,41.1C51.7,55.9,35,66.2,16.9,69.2C-1.3,72.2,-21,67.8,-36.9,57.9C-52.8,48,-64.9,32.6,-69.1,15.1C-73.3,-2.4,-69.5,-22,-59.4,-37.1C-49.3,-52.2,-32.8,-62.9,-15.7,-64.9C1.5,-67,34.3,-68.5,47.1,-57.1Z"
                                transform="translate(100 100)"></path>
                        </svg>
                    </div>

                    <div class="shape shape-2">
                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M41.3,-49.1C54.4,-39.3,66.6,-27.2,71.1,-12.1C75.6,3,72.4,20.9,63.3,34.4C54.2,47.9,39.2,56.9,23.2,62.3C7.1,67.7,-10,69.4,-24.8,64.1C-39.7,58.8,-52.3,46.5,-60.1,31.5C-67.9,16.4,-70.9,-1.4,-66.3,-16.6C-61.8,-31.8,-49.7,-44.3,-36.3,-54C-22.9,-63.7,-8.2,-70.6,3.6,-75.1C15.4,-79.6,28.2,-58.9,41.3,-49.1Z"
                                transform="translate(100 100)"></path>
                        </svg>
                    </div>

                    <!-- Dot Pattern Groups -->
                    <div class="dots dots-1">
                        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <pattern id="dot-pattern" x="0" y="0" width="20" height="20"
                                patternUnits="userSpaceOnUse">
                                <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                            </pattern>
                            <rect width="100" height="100" fill="url(#dot-pattern)"></rect>
                        </svg>
                    </div>

                    <div class="dots dots-2">
                        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <pattern id="dot-pattern-2" x="0" y="0" width="20" height="20"
                                patternUnits="userSpaceOnUse">
                                <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                            </pattern>
                            <rect width="100" height="100" fill="url(#dot-pattern-2)"></rect>
                        </svg>
                    </div>

                    <div class="shape shape-3">
                        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M43.3,-57.1C57.4,-46.5,71.1,-32.6,75.3,-16.2C79.5,0.2,74.2,19.1,65.1,35.3C56,51.5,43.1,65,27.4,71.7C11.7,78.4,-6.8,78.3,-23.9,72.4C-41,66.5,-56.7,54.8,-65.4,39.2C-74.1,23.6,-75.8,4,-71.7,-13.2C-67.6,-30.4,-57.7,-45.2,-44.3,-56.1C-30.9,-67,-15.5,-74,0.7,-74.9C16.8,-75.8,33.7,-70.7,43.3,-57.1Z"
                                transform="translate(100 100)"></path>
                        </svg>
                    </div>
                </div>

            </div>

        </section>
        <!-- End - Call To Action Section -->

        <!-- Start - Clients Section -->
        <section id="clients" class="clients section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><img src="assets/landing/img/clients/client-1.png"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="assets/landing/img/clients/client-2.png"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="assets/landing/img/clients/client-3.png"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="assets/landing/img/clients/client-4.png"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="assets/landing/img/clients/client-5.png"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="assets/landing/img/clients/client-6.png"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="assets/landing/img/clients/client-7.png"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="assets/landing/img/clients/client-8.png"
                                class="img-fluid" alt=""></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section>
        <!-- End - Clients Section -->

        <!-- Start - Testimonials Section -->
        <section id="testimonials" class="testimonials section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Testimoni</h2>
                <p>Pengalaman nyata dari mereka yang telah merasakan manfaat layanan kami.</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row g-5">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="testimonial-item">
                            <img src="assets/landing/img/testimonials/testimonials-1.jpg" class="testimonial-img"
                                alt="">
                            <h3>Saul Goodman</h3>
                            <h4>Ceo &amp; Founder</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Layanan ini benar-benar membantu kami berkembang lebih cepat. Tim yang responsif
                                    dan fitur yang sangat bermanfaat membuat semuanya terasa lebih mudah.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="testimonial-item">
                            <img src="assets/landing/img/testimonials/testimonials-2.jpg" class="testimonial-img"
                                alt="">
                            <h3>Sara Wilsson</h3>
                            <h4>Designer</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Antarmuka yang mudah digunakan dan fitur yang lengkap membuat pekerjaan saya jauh
                                    lebih efisien. Sangat direkomendasikan!</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="testimonial-item">
                            <img src="assets/landing/img/testimonials/testimonials-3.jpg" class="testimonial-img"
                                alt="">
                            <h3>Jena Karlis</h3>
                            <h4>Store Owner</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Saya sangat puas dengan hasil yang didapat. Tim mereka sangat profesional dan
                                    solusi yang ditawarkan sangat tepat sasaran.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="testimonial-item">
                            <img src="assets/landing/img/testimonials/testimonials-4.jpg" class="testimonial-img"
                                alt="">
                            <h3>Matt Brandon</h3>
                            <h4>Freelancer</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>Pengalaman yang luar biasa! Sangat mudah digunakan dan membuat pekerjaan saya
                                    lebih cepat dan terorganisir.</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div><!-- End testimonial item -->

                </div>

            </div>

        </section>
        <!-- End - Testimonials Section -->

        <!-- Start - Stats Section -->
        <section id="stats" class="stats section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Klien</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Proyek</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="1453"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Jam Dukungan</p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Anggota Tim</p>
                        </div>
                    </div><!-- End Stats Item -->

                </div>

            </div>

        </section>
        <!-- End - Stats Section -->

        <!-- Start - Services Section -->
        <section id="services" class="services section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Layanan</h2>
                <p>Kami menyediakan layanan terbaik untuk memenuhi kebutuhan Anda dengan kualitas terpercaya</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-4">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-card d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-activity"></i>
                            </div>
                            <div>
                                <h3>Layanan Konsultasi</h3>
                                <p>Kami menyediakan konsultasi mendalam untuk membantu Anda menemukan solusi terbaik
                                    tanpa kompromi.</p>
                                <a href="service-details.html" class="read-more">Selengkapnya <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- End Service Card -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-card d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-diagram-3"></i>
                            </div>
                            <div>
                                <h3>Perencanaan Strategis</h3>
                                <p>Kami membantu merancang strategi yang tepat dan efektif demi keberhasilan proyek
                                    Anda.</p>
                                <a href="service-details.html" class="read-more">Selengkapnya<i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- End Service Card -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-card d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-easel"></i>
                            </div>
                            <div>
                                <h3>Desain Kreatif</h3>
                                <p>Kami menghadirkan desain inovatif yang sesuai dengan kebutuhan dan identitas brand
                                    Anda.</p>
                                <a href="service-details.html" class="read-more">Selengkapnya<i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- End Service Card -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-card d-flex">
                            <div class="icon flex-shrink-0">
                                <i class="bi bi-clipboard-data"></i>
                            </div>
                            <div>
                                <h3>Analisis Data</h3>
                                <p>Kami melakukan analisis data yang akurat untuk mendukung pengambilan keputusan yang
                                    tepat.</p>
                                <a href="service-details.html" class="read-more">Read More <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- End Service Card -->

                </div>

            </div>

        </section>
        <!-- End - Services Section -->

        {{-- <!-- Start - Pricing Section -->
        <section id="pricing" class="pricing section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Harga</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-4 justify-content-center">

                    <!-- Basic Plan -->
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="pricing-card">
                            <h3>Paket Dasar</h3>
                            <div class="price">
                                <span class="currency">$</span>
                                <span class="amount">9.9</span>
                                <span class="period">/ month</span>
                            </div>
                            <p class="description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                accusantium doloremque laudantium totam.</p>

                            <h4>Featured Included:</h4>
                            <ul class="features-list">
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Duis aute irure dolor
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Excepteur sint occaecat
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Nemo enim ipsam voluptatem
                                </li>
                            </ul>

                            <a href="#" class="btn btn-primary">
                                Buy Now
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Standard Plan -->
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="pricing-card popular">
                            <div class="popular-badge">Most Popular</div>
                            <h3>Standard Plan</h3>
                            <div class="price">
                                <span class="currency">$</span>
                                <span class="amount">19.9</span>
                                <span class="period">/ month</span>
                            </div>
                            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui
                                blanditiis praesentium voluptatum.</p>

                            <h4>Featured Included:</h4>
                            <ul class="features-list">
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Lorem ipsum dolor sit amet
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Consectetur adipiscing elit
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Sed do eiusmod tempor
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Ut labore et dolore magna
                                </li>
                            </ul>

                            <a href="#" class="btn btn-light">
                                Buy Now
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Premium Plan -->
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="pricing-card">
                            <h3>Premium Plan</h3>
                            <div class="price">
                                <span class="currency">$</span>
                                <span class="amount">39.9</span>
                                <span class="period">/ month</span>
                            </div>
                            <p class="description">Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse
                                quam nihil molestiae.</p>

                            <h4>Featured Included:</h4>
                            <ul class="features-list">
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Temporibus autem quibusdam
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Saepe eveniet ut et voluptates
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Nam libero tempore soluta
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Cumque nihil impedit quo
                                </li>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    Maxime placeat facere possimus
                                </li>
                            </ul>

                            <a href="#" class="btn btn-primary">
                                Buy Now
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                </div>

            </div>

        </section>
        <!-- End - Pricing Section --> --}}

        <!-- Faq Section -->
        <section class="faq-9 faq section light-background" id="faq">

            <div class="container">
                <div class="row">

                    <div class="col-lg-5" data-aos="fade-up">
                        <h2 class="faq-title">Punya Pertanyaan? Cek FAQ Berikut</h2>
                        <p class="faq-description">Temukan jawaban atas pertanyaan umum seputar fitur dan layanan
                            platform belajar kami.</p>
                        <div class="faq-arrow d-none d-lg-block" data-aos="fade-up" data-aos-delay="200">
                            <svg class="faq-arrow" width="200" height="211" viewBox="0 0 200 211"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M198.804 194.488C189.279 189.596 179.529 185.52 169.407 182.07L169.384 182.049C169.227 181.994 169.07 181.939 168.912 181.884C166.669 181.139 165.906 184.546 167.669 185.615C174.053 189.473 182.761 191.837 189.146 195.695C156.603 195.912 119.781 196.591 91.266 179.049C62.5221 161.368 48.1094 130.695 56.934 98.891C84.5539 98.7247 112.556 84.0176 129.508 62.667C136.396 53.9724 146.193 35.1448 129.773 30.2717C114.292 25.6624 93.7109 41.8875 83.1971 51.3147C70.1109 63.039 59.63 78.433 54.2039 95.0087C52.1221 94.9842 50.0776 94.8683 48.0703 94.6608C30.1803 92.8027 11.2197 83.6338 5.44902 65.1074C-1.88449 41.5699 14.4994 19.0183 27.9202 1.56641C28.6411 0.625793 27.2862 -0.561638 26.5419 0.358501C13.4588 16.4098 -0.221091 34.5242 0.896608 56.5659C1.8218 74.6941 14.221 87.9401 30.4121 94.2058C37.7076 97.0203 45.3454 98.5003 53.0334 98.8449C47.8679 117.532 49.2961 137.487 60.7729 155.283C87.7615 197.081 139.616 201.147 184.786 201.155L174.332 206.827C172.119 208.033 174.345 211.287 176.537 210.105C182.06 207.125 187.582 204.122 193.084 201.144C193.346 201.147 195.161 199.887 195.423 199.868C197.08 198.548 193.084 201.144 195.528 199.81C196.688 199.192 197.846 198.552 199.006 197.935C200.397 197.167 200.007 195.087 198.804 194.488ZM60.8213 88.0427C67.6894 72.648 78.8538 59.1566 92.1207 49.0388C98.8475 43.9065 106.334 39.2953 114.188 36.1439C117.295 34.8947 120.798 33.6609 124.168 33.635C134.365 33.5511 136.354 42.9911 132.638 51.031C120.47 77.4222 86.8639 93.9837 58.0983 94.9666C58.8971 92.6666 59.783 90.3603 60.8213 88.0427Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                    </div>

                    <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">
                        <div class="faq-container">

                            <div class="faq-item faq-active">
                                <h3>Bagaimana cara guru membuat kelas virtual di platform ini?</h3>
                                <div class="faq-content">
                                    <p>Guru dapat membuat kelas virtual melalui dashboard dengan memilih menu “Buat
                                        Kelas”, mengisi detail kelas, dan mengundang siswa untuk bergabung menggunakan
                                        kode kelas.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3>Apakah siswa bisa mengakses e-book tanpa koneksi internet?</h3>
                                <div class="faq-content">
                                    <p>E-book dapat diunduh oleh siswa sehingga bisa diakses secara offline kapan saja
                                        tanpa memerlukan koneksi internet.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3>Bagaimana admin mengelola data pengguna dan laporan tugas?</h3>
                                <div class="faq-content">
                                    <p>Admin memiliki akses khusus untuk memantau dan mengelola data guru, siswa, serta
                                        laporan tugas melalui panel kontrol yang mudah digunakan.
                                    </p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3>Bisakah siswa mengumpulkan tugas langsung melalui platform?</h3>
                                <div class="faq-content">
                                    <p>Siswa dapat mengupload tugas dalam berbagai format langsung pada halaman tugas
                                        yang disediakan oleh guru di platform.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3>Apakah tersedia fitur game edukasi untuk memperkuat pembelajaran?</h3>
                                <div class="faq-content">
                                    <p>Ya, platform menyediakan berbagai game edukasi interaktif yang dirancang untuk
                                        meningkatkan pemahaman materi dan keterlibatan siswa secara menyenangkan.
                                    </p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3>Bagaimana cara bergabung menjadi siswa di kelas yang sudah dibuat?</h3>
                                <div class="faq-content">
                                    <p>Siswa dapat bergabung dengan memasukkan kode kelas yang diberikan oleh guru pada
                                        halaman “Gabung Kelas” di dashboard siswa.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                        </div>
                    </div>

                </div>
            </div>
        </section><!-- /Faq Section -->

        <!-- Start - Call To Action 2 Section -->
        <section id="call-to-action-2" class="call-to-action-2 section dark-background">

            <div class="container">
                <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-xl-10">
                        <div class="text-center">
                            <h3>Siap Belajar Lebih Mudah dan Menyenangkan?</h3>
                            <p>Gabung sekarang dan rasakan kemudahan belajar melalui kelas virtual interaktif, akses
                                e-book digital, tugas otomatis, serta game edukatif yang membuat belajar jadi seru!
                                Cocok untuk siswa, guru, dan admin sekolah.</p>
                            <a class="cta-btn" href="#">Mulai Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- End - Call To Action 2 Section -->

        <!-- Start - Contact Section -->
        <section id="contact" class="contact section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Kontak Kami</h2>
                <p>Jika Anda memiliki pertanyaan atau ingin bekerja sama, jangan ragu untuk menghubungi kami.</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-4 g-lg-5">
                    <div class="col-lg-5">
                        <div class="info-box" data-aos="fade-up" data-aos-delay="200">
                            <h3>Informasi Kontak</h3>
                            <p>Tim kami siap membantu Anda terkait kebutuhan platform pendidikan, e-learning, atau
                                dukungan teknis.</p>

                            <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                                <div class="icon-box">
                                    <i class="bi bi-geo-alt"></i>
                                </div>
                                <div class="content">
                                    <h4>Alamat Kami</h4>
                                    <p>Jl. Randusari Timur, Gg. Mawar I, No. 33</p>
                                    <p>Randusari, Kec. Pagerbarang, Kab. Tegal (52462)</p>
                                </div>
                            </div>

                            <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                                <div class="icon-box">
                                    <i class="bi bi-telephone"></i>
                                </div>
                                <div class="content">
                                    <h4>Nomor Telepon</h4>
                                    <p>+62 877 7755 3390</p>
                                    <p>+62 877 7755 3390</p>
                                </div>
                            </div>

                            <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                                <div class="icon-box">
                                    <i class="bi bi-envelope"></i>
                                </div>
                                <div class="content">
                                    <h4>Email</h4>
                                    <p>info@innovate-edu.com</p>
                                    <p>l.fnadhien@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
                            <h3>Hubungi Kami</h3>
                            <p>Isi formulir di bawah ini untuk mengirim pesan langsung ke tim kami.</p>

                            <form action="forms/contact.php" method="post" class="php-email-form"
                                data-aos="fade-up" data-aos-delay="200">
                                <div class="row gy-4">

                                    <div class="col-md-6">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Nama Anda" required="">
                                    </div>

                                    <div class="col-md-6 ">
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Email Anda" required="">
                                    </div>

                                    <div class="col-12">
                                        <input type="text" class="form-control" name="subject"
                                            placeholder="Subjek" required="">
                                    </div>

                                    <div class="col-12">
                                        <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                                    </div>

                                    <div class="col-12 text-center">
                                        <div class="loading">Memproses...</div>
                                        <div class="error-message"></div>
                                        <div class="sent-message">Pesan Anda berhasil dikirim. Terima kasih!</div>

                                        <button type="submit" class="btn">Kirim Pesan</button>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>

                </div>

            </div>

        </section>
        <!-- End - Contact Section -->

    </main>

    <!-- ================== MODALS ================== -->

    <!-- Password Success Modal -->
    <div class="modal fade" id="passwordSuccess" tabindex="-1" aria-labelledby="passwordSuccessLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow-sm border-0">
                <div class="modal-header bg-gradient-success text-white">
                    <h6 class="modal-title fw-bold" id="passwordSuccessLabel">Sukses</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body text-center py-4">
                    <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
                    <h5 class="fw-bold text-success mt-3">Password berhasil diperbarui!</h5>
                    <p class="text-muted mb-0">{{ session('success') }}</p>
                </div>
                <div class="modal-footer justify-content-center border-0 pb-4">
                    <button type="button" class="btn btn-success rounded-pill px-5 shadow-sm"
                        data-bs-dismiss="modal">Ok, Mengerti</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Success Modal -->
    <div class="modal fade" id="logoutSuccessModal" tabindex="-1" aria-labelledby="logoutSuccessLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow-sm border-0">
                <div class="modal-header bg-gradient-success text-white">
                    <h6 class="modal-title fw-bold" id="logoutSuccessLabel">Berhasil Logout</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body text-center py-4">
                    <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
                    <h5 class="fw-bold text-success mt-3">Sampai jumpa!</h5>
                    <p class="text-muted mb-0">{{ session('status') }}</p>
                </div>
                <div class="modal-footer justify-content-center border-0 pb-4">
                    <button type="button" class="btn btn-success rounded-pill px-5 shadow-sm"
                        data-bs-dismiss="modal">Ok, Mengerti</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ================== SCRIPT ================== -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const modalsMap = {
                'success': 'passwordSuccess',
                'logout_success': 'logoutSuccessModal'
            };

            @foreach (['success', 'logout_success'] as $key)
                @if (session($key))
                    var modalId = modalsMap['{{ $key }}'];
                    var modal = new bootstrap.Modal(document.getElementById(modalId));
                    modal.show();
                @endif
            @endforeach
        });
    </script>




</x-layout.landing>
