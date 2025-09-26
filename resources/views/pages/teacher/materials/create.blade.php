{{-- Start Page: Teacher Create Matrials/Konten Belajar --}}
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
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-lg rounded-4 mb-4">
                    <div class="card-header pb-0 bg-transparent border-0">
                        <h6 class="mb-0 text-dark fw-bold">Formulir Input Data Materi</h6>
                    </div>
                    <div class="card-body">
                        <form id="materialForm" action="{{ route('teacher.materials.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="classroom_id" class="form-label">Kelas <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control" id="classroom_id" name="classroom_id" required>
                                                <option value="" disabled selected>Pilih Kelas</option>
                                                @foreach ($classrooms as $classroom)
                                                    <option value="{{ $classroom->id }}"
                                                        {{ old('classroom_id') == $classroom->id ? 'selected' : '' }}>
                                                        {{ $classroom->grade_level }} - {{ $classroom->class_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('classroom_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="subject" class="form-label">Mapel <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control" id="subject" name="subject_id" required>
                                                <option value="" disabled selected>Pilih Mapel</option>
                                                @foreach ($subjects as $subject)
                                                    <option value="{{ $subject->id }}"
                                                        {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                                        {{ $subject->subject_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('subject_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="title" class="form-label">Judul Konten <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="title" name="title"
                                                value="{{ old('title') }}" placeholder="Masukkan Judul Konten"
                                                required>
                                            @error('title')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="author" class="form-label">Pengarang</label>
                                            <input class="form-control" type="text" id="author" name="author"
                                                value="{{ old('author') }}" placeholder="Masukkan Pengarang">
                                            @error('author')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="publisher" class="form-label">Penerbit</label>
                                            <input class="form-control" type="text" id="publisher" name="publisher"
                                                value="{{ old('publisher') }}" placeholder="Masukkan Penerbit">
                                            @error('publisher')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="link" class="form-label">Link Video (YouTube)</label>
                                            <input class="form-control" type="url" id="link" name="link"
                                                value="{{ old('link') }}" placeholder="Masukkan Link Video">
                                            @error('link')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="description" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" id="description" name="description" placeholder="Masukkan Deskripsi">{{ old('description') }}</textarea>
                                            @error('description')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 d-flex flex-column justify-content-start align-items-center">
                                    <div class="text-center p-3 w-100">
                                        <label class="form-label d-block text-start">Cover Konten (Preview)</label>
                                        <img id="cover-preview"
                                            src="{{ asset('assets/dashboard/img/bg-profile.jpg') }}"
                                            alt="Cover Preview" class="img-fluid rounded-3 shadow-sm mb-3"
                                            style="width: 100%; max-height: 250px; object-fit: cover;">
                                    </div>
                                    <div class="w-100">
                                        <div class="col-md-12 mb-3">
                                            <label for="cover_image_input" class="form-label">Upload Cover</label>
                                            <input class="form-control" type="file" id="cover_image_input"
                                                name="cover_image_input" accept=".jpg,.jpeg,.png">
                                            <small class="text-secondary">Ukuran maks. 5MB. Format: JPG, PNG.</small>
                                            @error('cover_image')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            <input type="hidden" id="cover_image" name="cover_image">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="file" class="form-label">File Materi <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="file" id="file" name="file"
                                                accept=".pdf,.ppt,.pptx,.doc,.docx,.xls,.xlsx" required>
                                            <small class="text-secondary">Ukuran maks. 10MB. Format: PDF, PPT, DOC,
                                                XLS, XLSX.</small>
                                            @error('file')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit"
                                    class="btn bg-gradient-info text-white rounded-pill px-4 shadow-sm fw-bold">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="cropModal" tabindex="-1" aria-labelledby="cropModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cropModalLabel">Potong Gambar Cover</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <img id="imageToCrop" src="" alt="Gambar untuk dipotong" style="max-width: 100%;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="cropButton">Potong & Gunakan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Teacher Data Addition Form -->

</x-layout.teacher>
{{-- End Page: Teacher Create Matrials/Konten Belajar --}}
