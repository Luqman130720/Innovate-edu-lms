{{-- Start Page: Teacher Index Assigments --}}
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

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg border-0 rounded-4">
                    <div
                        class="card-header bg-transparent border-0 pt-4 pb-2 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 text-dark fw-bold"><i class="bi bi-funnel-fill me-2"></i>Filter Tugas</h5>
                        <div class="d-flex gap-2">
                            <a href="{{ route('teacher.assignments.index') }}"
                                class="btn btn-outline-secondary btn-sm rounded-pill px-3 shadow-sm fw-bold">
                                <i class="bi bi-arrow-clockwise me-1"></i> Reset
                            </a>
                            <button type="submit" form="filterForm"
                                class="btn btn-primary btn-sm rounded-pill px-3 shadow-sm fw-bold">
                                <i class="bi bi-search me-1"></i> Cari
                            </button>
                        </div>
                    </div>

                    <div class="card-body px-4 py-3">
                        <form id="filterForm" method="GET" action="{{ route('teacher.assignments.index') }}">
                            <div class="row g-3 align-items-end">
                                <div class="col-lg-2 col-md-4 col-12">
                                    <label for="classroomSelect" class="form-label text-muted fw-semibold">Kelas</label>
                                    <select name="classroom_id" id="classroomSelect"
                                        class="form-select border-0 shadow-sm rounded-3">
                                        <option value="">Semua Kelas</option>
                                        @foreach ($classrooms as $classroom)
                                            <option value="{{ $classroom->id }}"
                                                {{ request('classroom_id') == $classroom->id ? 'selected' : '' }}>
                                                {{ $classroom->grade_level }} - {{ $classroom->class_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-2 col-md-4 col-12">
                                    <label for="subjectSelect" class="form-label text-muted fw-semibold">Mata
                                        Pelajaran</label>
                                    <select name="subject_id" id="subjectSelect"
                                        class="form-select border-0 shadow-sm rounded-3">
                                        <option value="">Semua Mapel</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}"
                                                {{ request('subject_id') == $subject->id ? 'selected' : '' }}>
                                                {{ $subject->subject_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-4 col-md-4 col-12">
                                    <label for="titleInput" class="form-label text-muted fw-semibold">Judul
                                        Tugas</label>
                                    <input type="text" name="title" id="titleInput"
                                        class="form-control border-0 shadow-sm rounded-3" placeholder="Cari judul..."
                                        value="{{ request('title') }}">
                                </div>

                                <div class="col-lg-2 col-md-6 col-12">
                                    <label for="deadlineStartInput" class="form-label text-muted fw-semibold">Deadline
                                        Dari</label>
                                    <input type="date" name="deadline_start" id="deadlineStartInput"
                                        class="form-control border-0 shadow-sm rounded-3"
                                        value="{{ request('deadline_start') }}">
                                </div>

                                <div class="col-lg-2 col-md-6 col-12">
                                    <label for="deadlineEndInput" class="form-label text-muted fw-semibold">Deadline
                                        Sampai</label>
                                    <input type="date" name="deadline_end" id="deadlineEndInput"
                                        class="form-control border-0 shadow-sm rounded-3"
                                        value="{{ request('deadline_end') }}">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function resetForm() {
            if (document.getElementById('resetToggle').checked) {
                window.location.href = "{{ route('teacher.assignments.index') }}";
            }
        }
    </script>



    <!-- Teacher Data Overview -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Data Guru</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            No.
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Kelas
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Mata Pelajaran
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Judul Tugas
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Pengumpulan
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assignments as $assignment)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 ps-2">
                                                    {{ $loop->iteration }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $assignment->classroom->grade_level }} -
                                                    {{ $assignment->classroom->class_name }}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $assignment->subject->subject_name }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $assignment->title }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $assignment->deadline_date }} {{ $assignment->deadline_time }}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="{{ route('teacher.assignments.show', $assignment->id) }}"
                                                    class="btn bg-gradient-primary btn-round text-light font-weight-bold text-xs ms-2"
                                                    data-toggle="tooltip" title="Detail Tugas">
                                                    Detail
                                                </a>
                                                <form
                                                    action="{{ route('teacher.assignments.destroy', $assignment->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn bg-gradient-danger btn-round text-light font-weight-bold text-xs ms-2"
                                                        data-toggle="tooltip" title="Hapus"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus tugas ini?');">
                                                        <i class="bi bi-trash3-fill"></i> Hapus
                                                    </button>
                                                </form>
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
{{-- End Page: Teacher Index Assigments --}}
