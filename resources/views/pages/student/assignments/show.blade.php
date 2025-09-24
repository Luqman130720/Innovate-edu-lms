{{-- Start Page: Student Assignment --}}
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
                                    href="{{ route('student.assignments.studentAssignmentsIndex') }}">
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

    <!-- Student Assignment List -->
    <div class="card shadow-lg mx-4" style="margin-top: 1rem">
        <!-- Header -->
        <div class="card-header bg-gradient-info text-white py-3">
            <h5 class="mb-0 fw-bold">
                <i class="bi bi-journal-text me-2"></i> {{ $assignment->title }}
            </h5>
        </div>

        <!-- Body -->
        <div class="card-body p-4">
            <!-- Detail Info -->
            <div class="mb-4">
                <div class="row mb-2">
                    <div class="col-4 col-md-3 fw-bold">Mata Pelajaran</div>
                    <div class="col-8 col-md-9 text-secondary">: {{ $assignment->subject->subject_name }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-4 col-md-3 fw-bold">Kelas</div>
                    <div class="col-8 col-md-9 text-secondary">: {{ $assignment->classroom->grade_level }} -
                        {{ $assignment->classroom->class_name }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-4 col-md-3 fw-bold">Tanggal Pengerjaan</div>
                    <div class="col-8 col-md-9 text-secondary">:
                        {{ \Carbon\Carbon::parse($assignment->task_date)->translatedFormat('d F Y') }}
                        {{ $assignment->task_time }}
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-4 col-md-3 fw-bold text-warning">Deadline</div>
                    <div class="col-8 col-md-9">
                        : <span class="badge bg-warning">
                            {{ \Carbon\Carbon::parse($assignment->deadline_date)->translatedFormat('d F Y') }}
                            {{ $assignment->deadline_time }}
                        </span>
                    </div>
                </div>
            </div>


            <!-- Deskripsi -->
            @if ($assignment->description)
                <div class="mb-4">
                    <h6 class="fw-bold text-dark">Deskripsi</h6>
                    <p class="text-muted">{{ $assignment->description }}</p>
                </div>
            @endif

            <!-- Berkas -->
            <div class="mb-4">
                <h6 class="fw-bold text-dark">Berkas Soal</h6>
                @if ($assignment->file)
                    <a href="{{ asset('storage/' . $assignment->file) }}" target="_blank"
                        class="btn btn-sm btn-outline-primary me-2">
                        <i class="bi bi-file-earmark-arrow-down"></i> Unduh File
                    </a>
                @endif
                @if ($assignment->file_link)
                    <a href="{{ $assignment->file_link }}" target="_blank" class="btn btn-sm btn-outline-info">
                        <i class="bi bi-link-45deg"></i> Lihat Link
                    </a>
                @endif
            </div>

            <!-- Tombol Aksi -->
            <div class="text-end">
                <button type="button" class="btn btn-warning rounded-pill text-white" data-bs-toggle="modal"
                    data-bs-target="#submitAssignmentModal">
                    <i class="bi bi-send-fill me-1"></i> Kirim Tugas
                </button>
            </div>

        </div>
    </div>
    <!-- Student Assignment List -->



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

    <!-- Start Modal: Student Add Assignment -->
    <div class="modal fade" id="submitAssignmentModal" tabindex="-1" aria-labelledby="submitAssignmentLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="submitAssignmentLabel">Kirim Tugas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>

                <form action="{{ route('student.assignments.submit', $assignment->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- Body -->
                    <div class="modal-body">

                        <!-- Informasi Detail Tugas -->
                        <div class="mb-4 p-3 rounded bg-light">
                            <h6 class="fw-bold text-dark mb-3">
                                <i class="bi bi-info-circle me-1"></i> Detail Tugas
                            </h6>
                            <div class="row mb-2">
                                <div class="col-4 col-md-3 fw-bold">Mata Pelajaran</div>
                                <div class="col-8 col-md-9 text-secondary">: {{ $assignment->subject->subject_name }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4 col-md-3 fw-bold">Tema Tugas</div>
                                <div class="col-8 col-md-9 text-secondary">: {{ $assignment->title }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4 col-md-3 fw-bold">Kelas</div>
                                <div class="col-8 col-md-9 text-secondary">: {{ $assignment->classroom->grade_level }}
                                    -
                                    {{ $assignment->classroom->class_name }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-4 col-md-3 fw-bold text-warning">Deadline</div>
                                <div class="col-8 col-md-9">
                                    : <span class="badge bg-warning text-dark">
                                        {{ \Carbon\Carbon::parse($assignment->deadline_date)->translatedFormat('d F Y') }}
                                        {{ $assignment->deadline_time }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Form Upload File -->
                        <div class="mb-3">
                            <label for="assignment_file" class="form-label">Upload File Tugas</label>
                            <input class="form-control" type="file" id="assignment_file" name="assignment_file"
                                accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.jpg,.jpeg,.png" required>
                            <small class="text-muted">Format: PDF, DOC, XLS, PPT, JPG, PNG. Maks 10MB</small>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning text-white">
                            <i class="bi bi-upload me-1"></i> Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal: Student Add Assignment -->

    </x-layout.nstudent>
    {{-- Ed Page: Student Assignment --}}
