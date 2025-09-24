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
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Kelas Virtual</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            No.</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Kelas</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Mata Pelajaran</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Guru Mapel</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Link</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($virtualClasses as $virtualClass)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 ps-2">
                                                    {{ $loop->iteration }}
                                                </p>
                                            </td>

                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $virtualClass->classroom->grade_level }} -
                                                    {{ $virtualClass->classroom->class_name }}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $virtualClass->subject->subject_name }}
                                                </p>
                                            </td>

                                            <td class="text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    {{ $virtualClass->subject && $virtualClass->subject->teacher
                                                        ? $virtualClass->subject->teacher->first_name .
                                                            ' ' .
                                                            $virtualClass->subject->teacher->last_name .
                                                            ', ' .
                                                            $virtualClass->subject->teacher->rank
                                                        : '-' }}
                                                </span>

                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="{{ $virtualClass->virtual_class_link }}" target="_blank"
                                                    class="btn bg-gradient-primary btn-round text-light font-weight-bold text-xs ms-2"
                                                    data-toggle="tooltip" title="Join Virtual Class">
                                                    Link
                                                </a>
                                            </td>

                                            <td class="text-center">
                                                <button type="button"
                                                    class="btn bg-gradient-info btn-round text-light font-weight-bold text-xs ms-2"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalDetailVirtualClass{{ $virtualClass->id }}">
                                                    <i class="bi bi-info-circle"></i> Detail
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- Modal Detail Virtual Class -->
                                        <div class="modal fade" id="modalDetailVirtualClass{{ $virtualClass->id }}"
                                            tabindex="-1"
                                            aria-labelledby="modalDetailVirtualClassLabel{{ $virtualClass->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content border-0"
                                                    style="border-radius: 1.25rem; overflow: hidden; box-shadow: 0 8px 32px rgba(44, 62, 80, 0.15);">
                                                    <div class="modal-header px-4 py-3"
                                                        style="background: linear-gradient(90deg, #36d1c4 0%, #5b86e5 100%); color: #fff; border-bottom: none;">
                                                        <div class="d-flex align-items-center w-100">
                                                            <div class="flex-grow-1">
                                                                <h5 class="modal-title fw-bold"
                                                                    id="modalDetailVirtualClassLabel{{ $virtualClass->id }}">
                                                                    <i class="bi bi-camera-video-fill me-2"></i> Detail
                                                                    Kelas Virtual
                                                                </h5>
                                                            </div>
                                                            <button type="button" class="btn-close btn-close-white"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body px-4 py-4"
                                                        style="background: linear-gradient(120deg, #f8fafc 60%, #e0eafc 100%);">
                                                        <div class="mb-3 text-center">
                                                            <span
                                                                class="badge rounded-pill bg-gradient-info px-3 py-2 fs-6 mb-2">
                                                                {{ $virtualClass->classroom->grade_level }} -
                                                                {{ $virtualClass->classroom->class_name }}
                                                            </span>
                                                            <span
                                                                class="badge rounded-pill bg-gradient-primary px-3 py-2 fs-6 mb-2">
                                                                {{ $virtualClass->subject->subject_name }}
                                                            </span>
                                                        </div>
                                                        <ul class="list-unstyled mb-0" style="font-size: 1.05rem;">
                                                            <li class="mb-2"><strong>Guru Mapel:</strong>
                                                                <span class="text-dark">
                                                                    {{ $virtualClass->subject && $virtualClass->subject->teacher
                                                                        ? $virtualClass->subject->teacher->first_name .
                                                                            ' ' .
                                                                            $virtualClass->subject->teacher->last_name .
                                                                            ', ' .
                                                                            $virtualClass->subject->teacher->rank
                                                                        : '-' }}
                                                                </span>
                                                            </li>
                                                            <li class="mb-2"><strong>Agenda:</strong> <span
                                                                    class="text-dark">{{ $virtualClass->agenda }}</span>
                                                            </li>
                                                            <li class="mb-2"><strong>Tanggal:</strong>
                                                                <span
                                                                    class="text-dark">{{ \Carbon\Carbon::parse($virtualClass->date)->format('d-m-Y') }}</span>
                                                            </li>
                                                            <li class="mb-2"><strong>Jam Mulai:</strong> <span
                                                                    class="text-dark">{{ $virtualClass->start_time }}</span>
                                                            </li>
                                                            <li class="mb-2"><strong>Jam Selesai:</strong> <span
                                                                    class="text-dark">{{ $virtualClass->end_time }}</span>
                                                            </li>
                                                            <li class="mb-2"><strong>Link Virtual:</strong>
                                                                <div class="mb-3 text-center">
                                                                    <span
                                                                        class="badge rounded-pill bg-gradient-info text-xxs font-weight-bolder opacity-7 px-3 py-2 fs-6 mb-2">
                                                                        <a href="{{ $virtualClass->virtual_class_link }}"
                                                                            target="_blank" class="text-white"> <i
                                                                                class="bi bi-box-arrow-up-right me-2"></i>
                                                                            Join
                                                                            Virtual Class
                                                                        </a>
                                                                    </span>
                                                                </div>
                                                            </li>
                                                            <li class="mb-2"><strong>Deskripsi:</strong>
                                                                <span
                                                                    class="text-dark">{{ $virtualClass->description ?? '-' }}</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="modal-footer justify-content-center px-4 py-3"
                                                        style="background: linear-gradient(90deg, #36d1c4 0%, #5b86e5 100%); border-top: none;">
                                                        <button type="button"
                                                            class="btn btn-light rounded-pill px-4 fw-bold"
                                                            data-bs-dismiss="modal" style="color: #36d1c4;">
                                                            <i class="bi bi-x-circle"></i> Tutup
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal -->
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Student Virtual-class List -->


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
