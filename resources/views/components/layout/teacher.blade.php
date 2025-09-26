{{-- Start - Main Layout Teacher  --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/dashboard/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/dashboard/img/favicon.png') }}">
    <title>DiscovalLMS</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="{{ asset('assets/dashboard/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/dashboard/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link id="pagestyle" href="{{ asset('assets/dashboard/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
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
    <script src="{{ asset('assets/dashboard/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script async defer src="{{ asset('https://buttons.github.io/buttons.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script src="{{ asset('assets/dashboard/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
    <script src="{{ asset('assets/dashboard/js/plugins/chartjs.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/cropingLandscape.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
{{-- End - Main Layout Teacher  --}}
