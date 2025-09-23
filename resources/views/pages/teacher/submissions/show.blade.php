{{-- Start Page: Teacher Show Submissions --}}
<x-layout.teacher>
    <x-partials.teacher.navbar :title="$title" />
    <!-- Administrator Profile Section -->
    <div class="card shadow-lg mx-4" style="margin-top: 10rem">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ $user->profile_picture ? Storage::url($user->profile_picture) : asset('assets/dashboard/img/team-1.jpg') }}"
                            alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ $user->first_name }} {{ $user->last_name }}
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
                                <a href="{{ route('teacher.assignments.create') }}"
                                    class="btn bg-gradient-info mb-0 px-0 py-1 d-flex align-items-center justify-content-center">
                                    <i class="ni ni-fat-add"></i>
                                    <span class="ms-2">Tambah Tugas</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- Administrator Profile Section -->

    <!-- Teacher Data Overview -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>{{ $assignment->title }} - {{ $assignment->subject->subject_name }}</h6>
                        <p>Kelas: {{ $assignment->classroom->grade_level }} {{ $assignment->classroom->class_name }}</p>
                        <p>Deadline: {{ $assignment->deadline_date }} {{ $assignment->deadline_time }}</p>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Siswa</th>
                                        <th>Status Tugas</th>
                                        <th>Status Penilaian</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        @php $submission = $submissions->get($student->id); @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $student->full_name }}</td>
                                            <td>
                                                @if ($submission)
                                                    <span class="badge bg-success">Sudah Mengumpulkan</span>
                                                @else
                                                    <span class="badge bg-danger">Belum Mengumpulkan</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($submission && $submission->score !== null)
                                                    <span class="badge bg-primary">Sudah Dinilai</span>
                                                @else
                                                    <span class="badge bg-warning">Belum Dinilai</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($submission)
                                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#submissionModal{{ $submission->id }}">
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
    <!-- Teacher Data Overview -->

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
                                    <textarea name="feedback" id="feedback{{ $submission->id }}" class="form-control rounded-3 shadow-sm" rows="3">{{ $submission->feedback }}</textarea>
                                </div>

                                {{-- Footer --}}
                                <div class="modal-footer d-flex justify-content-between align-items-center"
                                    style="background: linear-gradient(135deg, #f39c12, #d35400);
                                       border-top: 1px solid rgba(255,255,255,0.2);
                                       border-bottom-left-radius: 1rem;
                                       border-bottom-right-radius: 1rem;">
                                    <button type="button" class="btn btn-light shadow-sm" data-bs-dismiss="modal">
                                        <i class="fas fa-times me-1"></i> Tutup
                                    </button>
                                    <button type="submit" class="btn text-white px-4 py-2 shadow-sm"
                                        style="background: linear-gradient(135deg, #1cc88a, #20c997); border-radius: .75rem;">
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
