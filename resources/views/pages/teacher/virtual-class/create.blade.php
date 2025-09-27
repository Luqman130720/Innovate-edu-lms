{{-- Start Page: Teacher Create Virtual Class --}}
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

    <!-- Teacher Data Addition Form -->
    <div class="container-fluid py-4">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-header bg-white py-4 px-4">
                <h4 class="fw-bold text-dark mb-0">Formulir Input Data Kelas Virtual</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('teacher.virtual-class.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-4">
                        <div class="col-md-4">
                            <label for="classroom_id" class="form-label text-muted fw-semibold">Kelas <span
                                    class="text-danger">*</span></label>
                            <select class="form-select form-control-lg rounded-3 border-0 shadow-sm" id="classroom_id"
                                name="classroom_id" required>
                                <option value="" disabled selected>Pilih Kelas</option>
                                @foreach ($classrooms as $classroom)
                                    <option value="{{ $classroom->id }}"
                                        {{ old('classroom_id') == $classroom->id ? 'selected' : '' }}>
                                        {{ $classroom->grade_level }} - {{ $classroom->class_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('classroom_id')
                                <small class="text-danger mt-1 d-block">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="subject" class="form-label text-muted fw-semibold">Mapel <span
                                    class="text-danger">*</span></label>
                            <select class="form-select form-control-lg rounded-3 border-0 shadow-sm" id="subject"
                                name="subject" required>
                                <option value="" disabled selected>Pilih Mapel</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}"
                                        {{ old('subject') == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->subject_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('subject')
                                <small class="text-danger mt-1 d-block">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="agenda" class="form-label text-muted fw-semibold">Agenda <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg rounded-3 border-0 shadow-sm"
                                id="agenda" name="agenda" placeholder="Masukkan Agenda" value="{{ old('agenda') }}"
                                required>
                            @error('agenda')
                                <small class="text-danger mt-1 d-block">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="date" class="form-label text-muted fw-semibold">Tanggal <span
                                    class="text-danger">*</span></label>
                            <input type="date" class="form-control form-control-lg rounded-3 border-0 shadow-sm"
                                id="date" name="date" value="{{ old('date') }}" required>
                            @error('date')
                                <small class="text-danger mt-1 d-block">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="start_time" class="form-label text-muted fw-semibold">Waktu Mulai <span
                                    class="text-danger">*</span></label>
                            <div class="input-group">
                                <span
                                    class="input-group-text bg-white rounded-start-3 border-0 shadow-sm text-primary"><i
                                        class="bi bi-clock"></i></span>
                                <input type="time"
                                    class="form-control form-control-lg rounded-end-3 border-0 shadow-sm"
                                    id="start_time" name="start_time" value="{{ old('start_time') }}" required>
                            </div>
                            @error('start_time')
                                <small class="text-danger mt-1 d-block">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="end_time" class="form-label text-muted fw-semibold">Waktu Selesai <span
                                    class="text-danger">*</span></label>
                            <div class="input-group">
                                <span
                                    class="input-group-text bg-white rounded-start-3 border-0 shadow-sm text-primary"><i
                                        class="bi bi-clock-history"></i></span>
                                <input type="time"
                                    class="form-control form-control-lg rounded-end-3 border-0 shadow-sm" id="end_time"
                                    name="end_time" value="{{ old('end_time') }}" required>
                            </div>
                            @error('end_time')
                                <small class="text-danger mt-1 d-block">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="virtual_class_link" class="form-label text-muted fw-semibold">Link Kelas
                                Virtual <span class="text-danger">*</span></label>
                            <input type="url" class="form-control form-control-lg rounded-3 border-0 shadow-sm"
                                id="virtual_class_link" name="virtual_class_link"
                                placeholder="Masukkan Link Kelas Virtual" value="{{ old('virtual_class_link') }}"
                                required>
                            @error('virtual_class_link')
                                <small class="text-danger mt-1 d-block">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="description" class="form-label text-muted fw-semibold">Deskripsi</label>
                            <textarea class="form-control rounded-3 border-0 shadow-sm" id="description" name="description" rows="4"
                                placeholder="Masukkan Deskripsi">{{ old('description') }}</textarea>
                            @error('description')
                                <small class="text-danger mt-1 d-block">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="text-end mt-4">
                        <button type="submit"
                            class="btn bg-gradient-info text-white rounded-pill px-4 shadow-sm fw-bold">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Teacher Data Addition Form -->


</x-layout.teacher>
{{-- End Page: Teacher Create Virtual Class --}}
