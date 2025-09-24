{{-- Start Page: Student Virtual-class --}}
<x-layout.student>

    <x-partials.student.navbar :title="$title" />

    <!-- Administrator Profile Section -->
    <div class="card shadow-lg mx-4 card-profile-bottom" style="margin-top: 180px">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ Storage::url($user->profile_picture) }}" alt="profile_image"
                            class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ $user->full_name }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ $user->email }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1 bg-gray-300" role="tablist">
                            <li class="nav-item">
                                <a class="btn bg-gradient-warning mb-0 px-0 py-1 d-flex align-items-center justify-content-center"
                                    href="{{ route('student.index') }}">
                                    <i class="ni ni-bold-left"></i>
                                    <span class="ms-2">Kembali</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </div><!-- Administrator Profile Section -->

    <!-- Icebreaking Data Overview -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Icebreaking Zone</h6>
                    </div>
                    <div class="card-body px-2 pt-0 pb-4">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            No.</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Nama Event</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Platform</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Mata Pelajaran</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Link</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($icebreakings as $icebreaking)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 ps-2">{{ $loop->iteration }}</p>
                                            </td>

                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $icebreaking->event_name }}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $icebreaking->platform }}
                                                </p>
                                            </td>

                                            <td class="text-center">
                                                <p class="text-secondary text-xs font-weight-bold">
                                                    {{ $icebreaking->subject ? $icebreaking->subject->subject_name : '-' }}
                                                </p>
                                            </td>

                                            <td class="align-middle text-center">
                                                <a href="{{ $icebreaking->game_link }}" target="_blank"
                                                    class="btn bg-gradient-primary btn-round text-light font-weight-bold text-xs ms-2"
                                                    data-toggle="tooltip" title="Join Game">
                                                    Link
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Icebreaking Data Overview -->


    <!-- Alert Notification for Add Class Success -->
    <script>
        window.onload = function() {
            @if (session('success'))
                var virtualClassSuccessModal = new bootstrap.Modal(document.getElementById('virtualClassSuccess'));
                virtualClassSuccessModal.show();
            @endif
        };
    </script>

    <div class="modal fade" id="virtualClassSuccess" tabindex="-1" role="dialog"
        aria-labelledby="virtualClassSuccessLabel" aria-hidden="true">
        <div class="modal-dialog modal-success modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="virtualClassSuccessLabel">Sukses</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="py-3 text-center">
                        <i class="ni ni-check-bold text-success ni-3x"></i>
                        <h4 class="text-gradient text-success mt-4">Berhasil!</h4>
                        <p>{{ session('success') }}</p> <!-- Menampilkan pesan sukses dari session -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-round bg-gradient-info" data-bs-dismiss="modal">Ok,
                        Mengerti</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal Notification for Adding Class Success -->

    </x-layout.nstudent>
    {{-- Ed Page: Student Virtual-class --}}
