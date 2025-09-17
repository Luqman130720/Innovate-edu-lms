{{-- Start - Main Layout Student  --}}
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Nucleo Icons (Untuk ikon khusus di tema) -->
    <link href="{{ asset('assets/dashboard/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/dashboard/css/nucleo-svg.css') }}" rel="stylesheet" />

    <!-- Nucleo Icons (Untuk ikon khusus di tema) -->
    <!-- Font Awesome Icons (Versi 6.5.1) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- CSS Utama: Argon Dashboard -->
    <link id="pagestyle" href="{{ asset('assets/dashboard/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />

    <!-- Bootstrap Icons (Jika diperlukan, dari CDN) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>


<body class="g-sidenav-show bg-gray-100">
    <div class="position-absolute w-100 min-height-300 top-0"
        style="background-image: url('{{ asset('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg') }}'); background-position-y: 50%;">
        <span class="mask bg-primary opacity-6"></span>
    </div>

    <x-partials.student.sidebar></x-partials.student.sidebar>
    <div class="main-content position-relative max-height-vh-100 h-100">
        <div>
            {{ $slot }}
            <x-partials.student.footer></x-partials.student.footer>
        </div>
    </div>

    <x-partials.student.panel></x-partials.student.panel>



    <!--   Core JS Files   -->
    <script src="{{ asset('assets/dashboard/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <!-- Hapus asset untuk GitHub Buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- Profile Confirm -->
    <script src="{{ asset('assets/dashboard/js/profile-confirm.js') }}"></script>

    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/dashboard/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
    <script src="{{ asset('assets/dashboard/js/previewImage.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/plugins/chartjs.min.js') }}"></script>

    <!-- Script Chart.js -->
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

</body>

</html>
{{-- End - Main Layout Student  --}}
