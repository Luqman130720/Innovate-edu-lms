{{-- Start Page: Teacher Create Assigments --}}
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

    <!-- Teacher Assignment Input Form -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-lg rounded-4 border-0">

                    <div class="card-header bg-white rounded-top-4 px-4 py-3 border-bottom-0">
                        <h4 class="fw-bold mb-0 text-dark">Formulir Input Data Tugas</h4>
                    </div>

                    <div class="card-body px-4 py-4" style="background-color: #ffffff;">
                        <form action="{{ route('teacher.assignments.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row g-4">

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="subject_id"
                                            class="form-label small text-uppercase fw-semibold text-muted">Mata
                                            Pelajaran <span class="text-danger">*</span></label>
                                        <select id="subject_id" name="subject_id"
                                            class="form-select form-select-lg form-control-custom bg-white border-0 shadow-sm rounded-3"
                                            required>
                                            <option value="" disabled selected>Pilih Mata Pelajaran</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->subject_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="title"
                                            class="form-label small text-uppercase fw-semibold text-muted">Judul
                                            Tugas <span class="text-danger">*</span></label>
                                        <input type="text" id="title" name="title"
                                            class="form-control form-control-lg form-control-custom bg-white border-0 shadow-sm rounded-3"
                                            placeholder="Masukkan Judul Tugas" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="classroom_id"
                                            class="form-label small text-uppercase fw-semibold text-muted">Kelas <span
                                                class="text-danger">*</span></label>
                                        <select id="classroom_id" name="classroom_id"
                                            class="form-select form-select-lg form-control-custom bg-white border-0 shadow-sm rounded-3"
                                            required>
                                            <option value="" disabled selected>Pilih Kelas</option>
                                            @foreach ($classrooms as $classroom)
                                                <option value="{{ $classroom->id }}">{{ $classroom->grade_level }} -
                                                    {{ $classroom->class_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="task_date"
                                            class="form-label small text-uppercase fw-semibold text-muted">Tanggal
                                            Pengerjaan <span class="text-danger">*</span></label>
                                        <input type="date" id="task_date" name="task_date"
                                            class="form-control form-control-lg form-control-custom bg-white border-0 shadow-sm rounded-3"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="task_time"
                                            class="form-label small text-uppercase fw-semibold text-muted">Waktu
                                            Pengerjaan <span class="text-danger">*</span></label>
                                        <input type="time" id="task_time" name="task_time"
                                            class="form-control form-control-lg form-control-custom bg-white border-0 shadow-sm rounded-3"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="file"
                                            class="form-label small text-uppercase fw-semibold text-muted">Unggah
                                            Soal <span class="text-danger">*</span></label>
                                        <input type="file" id="file" name="file"
                                            class="form-control form-control-lg form-control-custom bg-white border-0 shadow-sm rounded-3"
                                            accept=".pdf,.doc,.docx,.jpg,.png,.xlsx" required>
                                        <small class="text-secondary">Format: PDF, DOC, DOCX, JPG, PNG, XLSX</small>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-4 mt-2">
                                <h6 class="fw-bold text-dark mb-2">Atur Batas Waktu Pengumpulan</h6>
                                <div class="col-md-6">
                                    <label for="deadline_date"
                                        class="form-label small text-uppercase fw-semibold text-muted">Tanggal
                                        Pengumpulan <span class="text-danger">*</span></label>
                                    <input type="date" id="deadline_date" name="deadline_date"
                                        class="form-control form-control-lg form-control-custom bg-white border-0 shadow-sm rounded-3"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="deadline_time"
                                        class="form-label small text-uppercase fw-semibold text-muted">Waktu
                                        Pengumpulan <span class="text-danger">*</span></label>
                                    <input type="time" id="deadline_time" name="deadline_time"
                                        class="form-control form-control-lg form-control-custom bg-white border-0 shadow-sm rounded-3"
                                        required>
                                </div>
                            </div>

                            <div class="mt-4">
                                <label for="file_link"
                                    class="form-label small text-uppercase fw-semibold text-muted">Link File</label>
                                <input type="url" id="file_link" name="file_link"
                                    class="form-control form-control-lg form-control-custom bg-white border-0 shadow-sm rounded-3"
                                    placeholder="https://">
                            </div>

                            <div class="mt-3">
                                <label for="description"
                                    class="form-label small text-uppercase fw-semibold text-muted">Deskripsi</label>
                                <textarea id="description" name="description" rows="4"
                                    class="form-control form-control-lg form-control-custom bg-white border-0 shadow-sm rounded-3"
                                    placeholder="Masukkan Deskripsi Tugas"></textarea>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit"
                                    class="btn btn-sm bg-gradient-info text-white rounded-pill px-5 shadow fw-bold">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Teacher Assignment Input Form -->



</x-layout.teacher>
{{-- End Page: Teacher Create Assigments --}}
