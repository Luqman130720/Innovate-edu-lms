{{-- Start - Main Layout Teacher  --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon dan Ikon Apple -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/dashboard/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/dashboard/img/favicon.png') }}">

    <!-- Judul Halaman -->
    <title>DiscovalLMS</title>

    <!-- Google Fonts -->
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700') }}" rel="stylesheet" />

    <!-- Nucleo Icons (Untuk ikon khusus di tema) -->
    <link href="{{ asset('assets/dashboard/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/dashboard/css/nucleo-svg.css') }}" rel="stylesheet" />

    <!-- Font Awesome Icons (Versi 6.5.1) -->
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css') }}">

    <!-- CSS Utama: Argon Dashboard -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link id="pagestyle" href="{{ asset('assets/dashboard/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />

    <!-- Bootstrap Icons (Jika diperlukan, dari CDN) -->
    <link rel="stylesheet"
        href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css') }}">
</head>


<body class="g-sidenav-show bg-gray-100">
    <div class="position-absolute w-100 min-height-300 top-0"
        style="background-image: url('{{ asset('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg') }}'); background-position-y: 50%;">
        <span class="mask bg-primary opacity-6"></span>
    </div>
    <!-- Modal Logout Confirmation -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-gradient-warning text-white">
                    <h6 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <i class="ni ni-user-run text-warning ni-3x mb-3"></i>
                    <h5>Anda yakin ingin logout?</h5>
                    <p class="text-muted">Sesi Anda akan diakhiri dan perlu login kembali.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="logout-form" action="{{ route('login.logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal Logout Confirmation -->


    <x-partials.teacher.sidebar></x-partials.teacher.sidebar>
    {{-- <div class="main-content position-relative max-height-vh-100 h-100"> --}}
    <div class="main-content d-flex flex-column min-vh-100">
        <!-- Konten utama -->
        <div class="flex-grow-1">
            {{ $slot }}
        </div>

        <!-- Footer tetap di bawah -->
        <x-partials.teacher.footer></x-partials.teacher.footer>
    </div>

    <x-partials.teacher.panel></x-partials.teacher.panel>



    <!--   Core JS Files   -->
    <script src="{{ asset('assets/dashboard/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/plugins/smooth-scrollbar.min.js') }}"></script>
    {{-- <script>
        document.addEventListener('wheel', function(e) {}, {
            passive: true
        });
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script> --}}
    <!-- Github buttons -->
    <script async defer src="{{ asset('https://buttons.github.io/buttons.js') }}"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('assets/dashboard/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
    <script src="{{ asset('assets/dashboard/js/previewImage.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/plugins/chartjs.min.js') }}"></script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#5e72e4",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')

</body>

</html>
{{-- End - Main Layout Teacher  --}}
