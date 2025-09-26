{{-- Start Page: Teacher Index Submissions --}}
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

    <!-- Filter Section -->
    <div class="container-fluid py-4 mb-4 pb-0">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg border-0 rounded-4">
                    <div
                        class="card-header bg-transparent border-0 pt-4 pb-2 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 text-dark fw-bold">
                            <i class="fa-solid fa-filter me-2"></i>Filter Tugas
                        </h5>
                        <div class="d-flex gap-2">
                            <a href="{{ route('teacher.submissions.index') }}"
                                class="btn btn-sm bg-gradient-secondary text-white rounded-pill px-3 shadow-sm fw-bold">
                                <i class="fa-solid fa-arrows-rotate me-1"></i> Reset
                            </a>
                            <button type="submit" form="filterForm"
                                class="btn btn-sm bg-gradient-primary text-white rounded-pill px-3 shadow-sm fw-bold">
                                <i class="fa-solid fa-magnifying-glass me-1"></i> Cari
                            </button>
                        </div>
                    </div>

                    <div class="card-body px-4 py-3">
                        <form id="filterForm" method="GET" action="{{ route('teacher.submissions.index') }}">
                            <div class="row g-3">
                                <div class="col-lg-3 col-md-4 col-12">
                                    <label for="subjectSelect" class="form-label text-muted fw-semibold">Mata
                                        Pelajaran</label>
                                    <select name="subject_id" id="subjectSelect"
                                        class="form-select border-0 shadow-sm rounded-3">
                                        <option value="">Semua Mata Pelajaran</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}"
                                                {{ request('subject_id') == $subject->id ? 'selected' : '' }}>
                                                {{ $subject->subject_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-4 col-md-8 col-12">
                                    <label for="assignmentTitleInput" class="form-label text-muted fw-semibold">Judul
                                        Tugas</label>
                                    <input type="text" name="assignment_title" id="assignmentTitleInput"
                                        class="form-control border-0 shadow-sm rounded-3"
                                        placeholder="Cari judul tugas..." value="{{ request('assignment_title') }}">
                                </div>

                                <div class="col-lg-3 col-md-6 col-12">
                                    <label for="classroomSelect" class="form-label text-muted fw-semibold">Kelas</label>
                                    <select name="classroom_id" id="classroomSelect"
                                        class="form-select border-0 shadow-sm rounded-3">
                                        <option value="">Semua Kelas</option>
                                        @foreach ($classrooms as $classroom)
                                            <option value="{{ $classroom->id }}"
                                                {{ request('classroom_id') == $classroom->id ? 'selected' : '' }}>
                                                {{ $classroom->grade_level }} {{ $classroom->class_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-2 col-md-6 col-12">
                                    <label for="collectionStatus" class="form-label text-muted fw-semibold">Status
                                        Pengumpulan</label>
                                    <select name="collection_status" id="collectionStatus"
                                        class="form-select border-0 shadow-sm rounded-3">
                                        <option value="">Semua Status</option>
                                        <option value="completed"
                                            {{ request('collection_status') == 'completed' ? 'selected' : '' }}>Selesai
                                            (100% Terkumpul)</option>
                                        <option value="in_progress"
                                            {{ request('collection_status') == 'in_progress' ? 'selected' : '' }}>
                                            Berjalan (< 100% Terkumpul)</option>
                                        <option value="not_started"
                                            {{ request('collection_status') == 'not_started' ? 'selected' : '' }}>Belum
                                            Dimulai (0% Terkumpul)</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Filter Section -->

    <!-- Submissions Data Overview -->
    <div class="container-fluid py-4 pt-0">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 text-sm font-weight-bolder text-uppercase">Daftar Tugas yang Tersedia</h6>
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
                                            Mata Pelajaran</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Judul Tugas</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Kelas</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Status Tugas</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assignments as $assignment)
                                        @php
                                            // Asumsi $assignment sudah dimuat dengan submissions dan classroom
                                            $submitted_count = $assignment->submissions->count();
                                            $total_students = $assignment->classroom->students->count();
                                            $percentage =
                                                $total_students > 0 ? ($submitted_count / $total_students) * 100 : 0;
                                            $progress_color = $percentage == 100 ? 'success' : 'warning';
                                        @endphp
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 ps-3">{{ $loop->iteration }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $assignment->subject->subject_name }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $assignment->title }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $assignment->classroom->grade_level }}
                                                    {{ $assignment->classroom->class_name }}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <div class="progress me-2" style="width: 100px;">
                                                        <div class="progress-bar bg-gradient-{{ $progress_color }}"
                                                            role="progressbar" style="width: {{ $percentage }}%"
                                                            aria-valuenow="{{ $percentage }}" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                    <span class="text-xs text-muted">{{ round($percentage) }}%</span>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="{{ route('teacher.assignments.showSubmissions', $assignment->id) }}"
                                                    class="btn btn-sm badge bg-gradient-info text-white me-2">
                                                    <i class="fa-solid fa-circle-info me-1"></i>
                                                    Detail
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
    <!-- Submissions Data Overview -->

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
{{-- End Page: Teacher Index Submissions --}}
