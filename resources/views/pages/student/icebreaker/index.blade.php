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
                <div class="card shadow-lg rounded-4 border-0">
                    <div
                        class="card-header pb-0 d-flex justify-content-between align-items-center bg-transparent border-0">
                        <h6 class="mb-0 text-dark fw-bold">Icebreaking Zone</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            @if ($icebreakings->isEmpty())
                                <div class="text-center py-5">
                                    <i class="bi bi-collection fa-2x mb-3 text-secondary"></i>
                                    <p class="mb-0 fw-bold">Belum ada icebreaking</p>
                                    <small class="text-muted">Guru belum membuat event icebreaking apapun.</small>
                                </div>
                            @else
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                                No.</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-start">
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
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($icebreakings as $icebreaking)
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <span class="text-xs font-weight-bold">{{ $loop->iteration }}</span>
                                                </td>
                                                <td class="align-middle text-start">
                                                    <span
                                                        class="text-xs font-weight-bold">{{ $icebreaking->event_name }}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-xs font-weight-bold">{{ $icebreaking->platform }}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">
                                                        {{ $icebreaking->subject ? $icebreaking->subject->subject_name : '-' }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="{{ $icebreaking->game_link }}" target="_blank"
                                                        class="btn btn-sm badge bg-gradient-success text-white me-2"
                                                        title="Join Game">
                                                        Link
                                                    </a>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <button type="button"
                                                        class="btn btn-sm badge bg-gradient-info text-white me-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalDetailIcebreaking{{ $icebreaking->id }}">
                                                        <i class="bi bi-info-circle me-1"></i> Detail
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Icebreaking Data Overview -->

    {{-- Detail Modal for Icebreaking (Modern & Compact) --}}
    @foreach ($icebreakings as $icebreaking)
        <div class="modal fade" id="modalDetailIcebreaking{{ $icebreaking->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content rounded-4 shadow-xl border-0 overflow-hidden">

                    {{-- Header - Gradient and Modern --}}
                    <div class="modal-header text-white px-4 py-3 border-0"
                        style="background: linear-gradient(135deg, #4e73df, #6f42c1);">
                        <h6 class="modal-title fw-bold">
                            <i class="bi bi-controller me-2"></i> Detail Icebreaking
                        </h6>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>

                    {{-- Body - Core Information List --}}
                    <div class="modal-body bg-light p-4">
                        <h5 class="text-center text-dark fw-bolder mb-3">{{ $icebreaking->event_name }}</h5>

                        {{-- Data Detail List (Symmetrical) --}}
                        <ul class="list-group list-group-flush mb-4 bg-white rounded-3 shadow-sm p-2">
                            <li class="list-group-item d-flex align-items-center border-0 bg-transparent px-0 py-2">
                                <i class="bi bi-easel me-3 text-primary"></i>
                                <div class="fw-bold me-2" style="width: 120px;">Mata Pelajaran:</div>
                                <span class="text-muted">{{ $icebreaking->subject->subject_name ?? '-' }}</span>
                            </li>
                            <li class="list-group-item d-flex align-items-center border-0 bg-transparent px-0 py-2">
                                <i class="bi bi-building me-3 text-success"></i>
                                <div class="fw-bold me-2" style="width: 120px;">Kelas:</div>
                                <span class="text-muted">
                                    {{ $icebreaking->classroom->grade_level ?? '-' }} -
                                    {{ $icebreaking->classroom->class_name ?? '-' }}
                                </span>
                            </li>
                            <li class="list-group-item d-flex align-items-center border-0 bg-transparent px-0 py-2">
                                <i class="bi bi-joystick me-3 text-info"></i>
                                <div class="fw-bold me-2" style="width: 120px;">Platform:</div>
                                <span class="text-muted">{{ $icebreaking->platform }}</span>
                            </li>
                            <li class="list-group-item d-flex align-items-center border-0 bg-transparent px-0 py-2">
                                <i class="bi bi-calendar-date me-3 text-warning"></i>
                                <div class="fw-bold me-2" style="width: 120px;">Tanggal:</div>
                                <span class="text-muted">
                                    {{ \Carbon\Carbon::parse($icebreaking->date)->translatedFormat('d F Y') }}
                                </span>
                            </li>
                            <li class="list-group-item d-flex align-items-center border-0 bg-transparent px-0 py-2">
                                <i class="bi bi-clock me-3 text-danger"></i>
                                <div class="fw-bold me-2" style="width: 120px;">Waktu:</div>
                                <span class="text-muted">
                                    {{ \Carbon\Carbon::parse($icebreaking->start_time)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($icebreaking->end_time)->format('H:i') }} WIB
                                </span>
                            </li>
                        </ul>

                        {{-- Instructions/Detail Box --}}
                        <div class="bg-white rounded shadow-sm p-3 border-start border-5 border-info">
                            <div class="d-flex align-items-center mb-1">
                                <i class="bi bi-info-circle-fill me-2 text-info"></i>
                                <p class="fw-bold mb-0 text-sm text-info">Instruksi Bermain:</p>
                            </div>
                            <p class="mb-0 text-muted text-xs ps-4" style="white-space: pre-wrap;">
                                {{ $icebreaking->instructions ?? 'Tidak ada instruksi khusus dari guru.' }}</p>
                        </div>
                    </div>

                    {{-- Footer - Buttons Side-by-Side (Bottom Right) --}}
                    <div class="modal-footer bg-white d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary btn-sm rounded-pill px-4"
                            data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-1"></i> Tutup
                        </button>
                        <a href="{{ $icebreaking->game_link }}" target="_blank"
                            class="btn btn-primary btn-sm rounded-pill px-4">
                            <i class="bi bi-controller me-1"></i> Mulai Bermain
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- End Detail Modal for Icebreaking (Modern & Compact) --}}

    </x-layout.nstudent>
    {{-- Ed Page: Student Virtual-class --}}
