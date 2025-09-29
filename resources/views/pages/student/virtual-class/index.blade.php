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

    <!-- Student Virtual-class List -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg rounded-4 border-0">

                    {{-- Header --}}
                    <div
                        class="card-header pb-0 d-flex justify-content-between align-items-center bg-transparent border-0">
                        <h6 class="mb-0 text-dark fw-bold">Kelas Virtual</h6>
                    </div>

                    {{-- Body --}}
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            @if ($virtualClasses->isEmpty())
                                <div class="text-center py-5">
                                    <i class="bi bi-collection fa-2x mb-3 text-secondary"></i>
                                    <p class="mb-0 fw-bold">Belum ada kelas virtual</p>
                                    <small class="text-muted">Guru belum membuat kelas virtual apapun.</small>
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
                                                Kelas</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                                Mata Pelajaran</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                                Guru Mapel</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                                Link</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                                Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($virtualClasses as $virtualClass)
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <span class="text-xs font-weight-bold">{{ $loop->iteration }}</span>
                                                </td>
                                                <td class="align-middle text-start">
                                                    <span class="text-xs font-weight-bold">
                                                        {{ $virtualClass->classroom->grade_level }} -
                                                        {{ $virtualClass->classroom->class_name }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-xs font-weight-bold">
                                                        {{ $virtualClass->subject->subject_name }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-xs font-weight-bold text-secondary">
                                                        @if ($virtualClass->subject && $virtualClass->subject->teacher)
                                                            {{ $virtualClass->subject->teacher->first_name . ' ' . $virtualClass->subject->teacher->last_name . ', ' . $virtualClass->subject->teacher->degree }}
                                                        @else
                                                            -
                                                        @endif
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="{{ $virtualClass->virtual_class_link }}" target="_blank"
                                                        class="btn btn-sm badge bg-gradient-success text-white me-2"
                                                        title="Join Virtual Class">
                                                        Link
                                                    </a>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <button type="button"
                                                        class="btn btn-sm badge bg-gradient-info text-white me-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalDetailVirtualClass{{ $virtualClass->id }}">
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
    {{-- Detail Modal for Virtual Class (Elegant Version) --}}
    @foreach ($virtualClasses as $virtualClass)
        <div class="modal fade" id="modalDetailVirtualClass{{ $virtualClass->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content rounded-4 shadow-lg border-0 overflow-hidden">

                    {{-- Header --}}
                    <div class="modal-header text-white px-4 py-3"
                        style="background: linear-gradient(135deg, #4e73df, #6f42c1);">
                        <h6 class="modal-title fw-bold">
                            <i class="bi bi-person-video me-2"></i> Detail Kelas Virtual
                        </h6>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>

                    {{-- Body --}}
                    <div class="modal-body bg-light p-4">
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item d-flex align-items-center border-0 bg-transparent px-0 py-2">
                                <i class="bi bi-book me-3 text-primary"></i>
                                <div class="fw-bold me-2" style="width: 120px;">Mata Pelajaran:</div>
                                <span class="text-muted">{{ $virtualClass->subject->subject_name ?? '-' }}</span>
                            </li>
                            <li class="list-group-item d-flex align-items-center border-0 bg-transparent px-0 py-2">
                                <i class="bi bi-person-circle me-3 text-success"></i>
                                <div class="fw-bold me-2" style="width: 120px;">Guru Mapel:</div>
                                <span class="text-muted">
                                    @if ($virtualClass->subject && $virtualClass->subject->teacher)
                                        {{ $virtualClass->subject->teacher->first_name . ' ' . $virtualClass->subject->teacher->last_name . ', ' . $virtualClass->subject->teacher->degree }}
                                    @else
                                        -
                                    @endif
                                </span>
                            </li>
                            <li class="list-group-item d-flex align-items-center border-0 bg-transparent px-0 py-2">
                                <i class="bi bi-building me-3 text-info"></i>
                                <div class="fw-bold me-2" style="width: 120px;">Kelas:</div>
                                <span class="text-muted">
                                    {{ $virtualClass->classroom->grade_level ?? '-' }} -
                                    {{ $virtualClass->classroom->class_name ?? '-' }}
                                </span>
                            </li>
                            <li class="list-group-item d-flex align-items-center border-0 bg-transparent px-0 py-2">
                                <i class="bi bi-calendar-date me-3 text-warning"></i>
                                <div class="fw-bold me-2" style="width: 120px;">Tanggal:</div>
                                <span class="text-muted">
                                    {{ \Carbon\Carbon::parse($virtualClass->date)->translatedFormat('d F Y') }}
                                </span>
                            </li>
                            <li class="list-group-item d-flex align-items-center border-0 bg-transparent px-0 py-2">
                                <i class="bi bi-clock me-3 text-danger"></i>
                                <div class="fw-bold me-2" style="width: 120px;">Waktu:</div>
                                <span class="text-muted">
                                    {{ \Carbon\Carbon::parse($virtualClass->start_time)->format('H:i') }} -
                                    {{ \Carbon\Carbon::parse($virtualClass->end_time)->format('H:i') }} WIB
                                </span>
                            </li>
                        </ul>

                        <div class="bg-white rounded shadow-sm p-3 mb-3">
                            <div class="d-flex align-items-center mb-1">
                                <i class="bi bi-list-task me-2"></i>
                                <p class="fw-bold mb-0 text-sm">Agenda:</p>
                            </div>
                            <p class="mb-0 text-muted text-xs">{{ $virtualClass->agenda ?? '-' }}</p>
                        </div>

                        <div class="bg-white rounded shadow-sm p-3">
                            <div class="d-flex align-items-center mb-1">
                                <i class="bi bi-chat-left-text me-2"></i>
                                <p class="fw-bold mb-0 text-sm">Deskripsi:</p>
                            </div>
                            <p class="mb-0 text-muted text-xs">{{ $virtualClass->description ?? '-' }}</p>
                        </div>
                    </div>

                    {{-- Footer --}}
                    <div class="modal-footer bg-white d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary btn-sm rounded-pill me-2"
                            data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-1"></i> Tutup
                        </button>
                        <a href="{{ $virtualClass->virtual_class_link }}" target="_blank"
                            class="btn btn-primary btn-sm rounded-pill">
                            <i class="bi bi-link-45deg me-1"></i> Gabung Kelas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    </x-layout.nstudent>
    {{-- Ed Page: Student Virtual-class --}}
