{{-- Start Page: Student Assignment --}}
<x-layout.student>

    <x-partials.student.navbar :title="$title" />

    <!-- Student Profile Section -->
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
    </div>
    <!-- Student Profile Section -->

    <!-- Start: Student Data Evaluations -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg rounded-4 border-0">

                    {{-- Header --}}
                    <div
                        class="card-header pb-0 d-flex justify-content-between align-items-center bg-transparent border-0">
                        <h6 class="mb-0 text-dark fw-bold">
                            <i class="bi bi-journal-text me-2"></i> {{ $title ?? 'Daftar Penilaian' }}
                        </h6>
                    </div>

                    {{-- Body --}}
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            No</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-start">
                                            Mapel</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-start">
                                            Tugas</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Status Tugas</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Status Penilaian</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($submissions as $submission)
                                        <tr>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $loop->iteration }}</p>
                                            </td>
                                            <td class="text-start">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $submission->assignment->subject->subject_name ?? '-' }}</p>
                                            </td>
                                            <td class="text-start">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $submission->assignment->title ?? 'Tugas' }}</p>
                                            </td>
                                            <td class="text-center">
                                                @if (!empty($submission->submitted_at))
                                                    <span class="badge rounded-pill bg-gradient-success px-3 py-2">
                                                        <i class="bi bi-check-circle me-1"></i> Sudah
                                                    </span>
                                                @else
                                                    <span class="badge rounded-pill bg-gradient-danger px-3 py-2">
                                                        <i class="bi bi-x-circle me-1"></i> Belum
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($submission->score !== null)
                                                    <span class="badge rounded-pill bg-gradient-primary px-3 py-2">
                                                        <i class="bi bi-star-fill me-1"></i> Sudah Dinilai
                                                    </span>
                                                @else
                                                    <span
                                                        class="badge rounded-pill bg-gradient-warning text-dark px-3 py-2">
                                                        <i class="bi bi-hourglass-split me-1"></i> Menunggu Dinilai
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="#"
                                                    class="btn btn-sm badge bg-gradient-info text-white me-2"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#submissionModal{{ $submission->id }}">
                                                    <i class="bi bi-eye me-1"></i> Info
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-5">
                                                <div class="text-muted">
                                                    <i class="bi bi-inbox fa-2x mb-3 text-secondary"></i>
                                                    <p class="mb-0 fw-bold">Belum ada data penilaian</p>
                                                    <small class="text-muted">Guru belum memberikan penilaian
                                                        apapun.</small>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End: Student Data Evaluations -->


    {{-- Detail Modal --}}
    @foreach ($submissions as $submission)
        <div class="modal fade" id="submissionModal{{ $submission->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content rounded-4 shadow-lg border-0 overflow-hidden">

                    {{-- Header --}}
                    <div class="modal-header text-white" style="background: linear-gradient(135deg, #4e73df, #6f42c1);">
                        <h5 class="modal-title fw-bold">
                            <i class="bi bi-journal-text me-2"></i> Detail Tugas —
                            {{ $submission->assignment->title ?? 'Tugas' }}
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>

                    {{-- Body --}}
                    <div class="modal-body bg-light">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="p-3 bg-white rounded shadow-sm">
                                    <strong>Nama Siswa:</strong>
                                    <p class="mb-0">{{ $user->full_name }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-white rounded shadow-sm">
                                    <strong>Mata Pelajaran:</strong>
                                    <p class="mb-0">{{ $submission->assignment->subject->subject_name ?? '-' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-white rounded shadow-sm">
                                    <strong>Kelas:</strong>
                                    <p class="mb-0">
                                        {{ $submission->assignment->classroom->grade_level ?? '-' }} -
                                        {{ $submission->assignment->classroom->class_name ?? '-' }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-white rounded shadow-sm">
                                    <strong>Nilai:</strong>
                                    <p class="mb-0">{{ $submission->score ?? '-' }}</p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="p-3 bg-white rounded shadow-sm">
                                    <strong>Feedback:</strong>
                                    <p class="mb-0">{{ $submission->feedback ?? '-' }}</p>
                                </div>
                            </div>
                            @if ($submission->file)
                                <div class="col-12">
                                    <a href="{{ asset('storage/' . $submission->file) }}" target="_blank"
                                        class="btn btn-outline-primary w-100 rounded-pill">
                                        <i class="bi bi-file-earmark-arrow-down me-1"></i> Lihat File
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Footer --}}
                    <div class="modal-footer bg-white">
                        <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-1"></i> Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- End of Detail Modal --}}

    <!-- End of Student Data Evaluations -->




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
    {{-- Ed Page: Student Assignment --}}
