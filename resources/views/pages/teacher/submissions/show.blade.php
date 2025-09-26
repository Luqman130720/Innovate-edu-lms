{{-- Start Page: Teacher Show Submissions --}}
<x-layout.teacher>
    <x-partials.teacher.navbar :title="$title" />

    <!-- Teacher Profile Section -->
    <div class="card shadow-lg mx-4" style="margin-top: 10rem">
        <div class="card-body p-3">
            <div class="row gx-4 align-items-center">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ $user->profile_picture ? Storage::url($user->profile_picture) : asset('assets/dashboard/img/team-1.jpg') }}"
                            alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ $user->first_name }} {{ $user->last_name }}, {{ $user->degree }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ $user->email }}
                        </p>
                    </div>
                </div>

                <div class="col-lg-auto col-md-auto my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="d-flex justify-content-end align-items-center gap-2">
                        <div class="card p-2 shadow-sm text-center bg-gradient-info text-white rounded-3">
                            <h6 class="mb-0 fw-bold text-white">{{ $totalSubjects }}</h6>
                            <p class="text-sm text-white mb-0">Mata Pelajaran</p>
                        </div>
                        <div class="card p-2 shadow-sm text-center bg-gradient-success text-white rounded-3">
                            <h6 class="mb-0 fw-bold text-white">{{ $totalClassrooms }}</h6>
                            <p class="text-sm text-white mb-0">Kelas</p>
                        </div>
                        <div class="card p-2 shadow-sm text-center bg-gradient-primary text-white rounded-3">
                            <h6 class="mb-0 fw-bold text-white">{{ $totalAssignments }}</h6>
                            <p class="text-sm text-white mb-0">Total Tugas</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Teacher Profile Section -->

    <!-- Tugas Data Overview -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-3 d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column">
                            <h6 class="mb-2 text-sm font-weight-bolder text-uppercase">
                                Detail Tugas
                            </h6>
                            <div class="d-flex flex-column text-xs">
                                <div class="d-flex align-items-baseline mb-1">
                                    <span style="min-width: 110px; font-weight: 500;">Judul Tugas</span>
                                    <span class="ms-2">:</span>
                                    <span class="ms-2 text-muted">{{ $assignment->title }}</span>
                                </div>
                                <div class="d-flex align-items-baseline mb-1">
                                    <span style="min-width: 110px; font-weight: 500;">Mata Pelajaran</span>
                                    <span class="ms-2">:</span>
                                    <span class="ms-2 text-muted">{{ $assignment->subject->subject_name }}</span>
                                </div>
                                <div class="d-flex align-items-baseline mb-1">
                                    <span style="min-width: 110px; font-weight: 500;">Kelas</span>
                                    <span class="ms-2">:</span>
                                    <span class="ms-2 text-muted">{{ $assignment->classroom->grade_level }}
                                        {{ $assignment->classroom->class_name }}</span>
                                </div>
                                <div class="d-flex align-items-baseline mb-1">
                                    <span style="min-width: 110px; font-weight: 500;">Deadline</span>
                                    <span class="ms-2">:</span>
                                    <span
                                        class="ms-2 text-muted">{{ \Carbon\Carbon::parse($assignment->deadline_date)->format('d F Y') }}
                                        {{ \Carbon\Carbon::parse($assignment->deadline_time)->format('H:i') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="ms-auto">
                            <button class="btn btn-sm badge bg-gradient-info text-white me-2">
                                <i class="fa-solid fa-file-excel me-1"></i>
                                Download Nilai
                            </button>
                        </div>
                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No.</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Nama Siswa</th>
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
                                    @foreach ($students as $student)
                                        @php $submission = $submissions->get($student->id); @endphp
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 ps-3">{{ $loop->iteration }}
                                                </p>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <p class="mb-0 text-sm">{{ $student->full_name }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if ($submission)
                                                    <span class="badge badge-sm bg-gradient-success">Sudah
                                                        Mengumpulkan</span>
                                                @else
                                                    <span class="badge badge-sm bg-gradient-danger">Belum
                                                        Mengumpulkan</span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if ($submission && $submission->score !== null)
                                                    <span class="badge badge-sm bg-gradient-primary">Sudah
                                                        Dinilai</span>
                                                @else
                                                    <span class="badge badge-sm bg-gradient-warning">Belum
                                                        Dinilai</span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                @if ($submission)
                                                    <button class="btn btn-link text-info text-gradient px-3 mb-0"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#submissionModal{{ $submission->id }}">
                                                        <i class="fa-solid fa-circle-info text-sm me-1"></i>
                                                        Info
                                                    </button>
                                                @endif
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
    <!-- End of Tugas Data Overview -->

    <!-- Modal for Each Student Submission Detail -->
    @foreach ($students as $student)
        @php $submission = $submissions->get($student->id); @endphp
        @if ($submission)
            <div class="modal fade" id="submissionModal{{ $submission->id }}" tabindex="-1"
                aria-labelledby="submissionModalLabel{{ $submission->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content rounded-4 shadow-lg border-0 overflow-hidden">

                        {{-- Header --}}
                        <div class="modal-header text-white"
                            style="background: linear-gradient(135deg, #dfc04e, #f20000);">
                            <h5 class="modal-title d-flex align-items-center">
                                <i class="fas fa-user-graduate me-2"></i>
                                Detail Tugas - {{ $student->full_name }}
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        {{-- Body --}}
                        <div class="modal-body bg-light">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="p-3 bg-white rounded shadow-sm">
                                        <i class="fas fa-user text-primary me-2"></i>
                                        <strong>Nama:</strong> {{ $student->full_name }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 bg-white rounded shadow-sm">
                                        <i class="fas fa-file-alt text-success me-2"></i>
                                        <strong>File Tugas:</strong>
                                        <a href="{{ asset('storage/' . $submission->file) }}" target="_blank"
                                            class="ms-2">
                                            @php
                                                $ext = pathinfo($submission->file, PATHINFO_EXTENSION);
                                                $icons = [
                                                    'pdf' => 'fas fa-file-pdf text-danger',
                                                    'doc' => 'fas fa-file-word text-primary',
                                                    'docx' => 'fas fa-file-word text-primary',
                                                    'xls' => 'fas fa-file-excel text-success',
                                                    'xlsx' => 'fas fa-file-excel text-success',
                                                    'png' => 'fas fa-file-image text-info',
                                                    'jpg' => 'fas fa-file-image text-info',
                                                    'jpeg' => 'fas fa-file-image text-info',
                                                ];
                                            @endphp
                                            <i class="{{ $icons[$ext] ?? 'fas fa-file text-secondary' }}"></i>
                                            Lihat File
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <form action="{{ route('teacher.submissions.updateScore', $submission->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="score{{ $submission->id }}" class="form-label">
                                        <i class="fas fa-star text-warning me-1"></i> Nilai
                                    </label>
                                    <input type="number" name="score" id="score{{ $submission->id }}"
                                        class="form-control rounded-3 shadow-sm" value="{{ $submission->score }}">
                                </div>

                                <div class="mb-3">
                                    <label for="feedback{{ $submission->id }}" class="form-label">
                                        <i class="fas fa-comment-dots text-info me-1"></i> Feedback
                                    </label>
                                    <textarea name="feedback" id="feedback{{ $submission->id }}" class="form-control rounded-3 shadow-sm"
                                        rows="3">{{ $submission->feedback }}</textarea>
                                </div>

                                {{-- Footer --}}
                                <div
                                    class="modal-footer d-flex justify-content-end align-items-center bg-light border-0 pt-3 pb-3 px-4">
                                    <button type="submit"
                                        class="btn btn-sm bg-gradient-success text-white rounded-pill px-4 py-2 shadow-sm">
                                        <i class="fas fa-save me-1"></i> Simpan Penilaian
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @endif
    @endforeach
    <!-- End of Modal for Each Student Submission Detail -->



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

</x-layout.teacher>
{{-- End Page: Teacher Show Submissions --}}
