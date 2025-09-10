{{-- Start Page: Teacher Create Matrials/Konten Belajar --}}
<x-layout.teacher>
    <x-partials.teacher.navbar :title="$title" />

    <!-- Administrator Profile Section -->
    <div class="card shadow-lg mx-4 card-profile-bottom">
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
                        <ul class="nav nav-pills nav-fill p-1 bg-gray-200" role="tablist">
                            <li class="nav-item">
                                <a class="btn bg-gradient-warning mb-0 px-0 py-1 d-flex align-items-center justify-content-center"
                                    href="{{ route('teacher.materials.index') }}">
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
    <!-- Administrator Profile Section -->

    <!-- Teacher Data Addition Form -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Formulir Input Data Kelas Virtual</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('teacher.materials.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="container">
                                <hr class="horizontal dark">

                                <!-- Kelas dan Mapel -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="classroom_id" class="form-control-label">Kelas <span
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
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="subject" class="form-control-label">Mapel <span
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
                                </div>

                                <!-- Judul dan Pengarang -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title" class="form-control-label">Judul Konten <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="title" name="title"
                                                value="{{ old('title') }}" placeholder="Masukkan Judul Konten"
                                                required>
                                            @error('title')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="author" class="form-control-label">Pengarang</label>
                                            <input class="form-control" type="text" id="author" name="author"
                                                value="{{ old('author') }}" placeholder="Masukkan Pengarang">
                                            @error('author')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Penerbit dan Link -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="publisher" class="form-control-label">Penerbit</label>
                                            <input class="form-control" type="text" id="publisher" name="publisher"
                                                value="{{ old('publisher') }}" placeholder="Masukkan Penerbit">
                                            @error('publisher')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="link" class="form-control-label">Link Video
                                                (YouTube)</label>
                                            <input class="form-control" type="url" id="link" name="link"
                                                value="{{ old('link') }}" placeholder="Masukkan Link Video">
                                            @error('link')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- File dan Cover Image -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="file" class="form-control-label">File (PDF, PPT, Word,
                                                Excel, dll.) <span class="text-danger">*</span></label>
                                            <input class="form-control" type="file" id="file" name="file"
                                                accept=".pdf,.ppt,.pptx,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png"
                                                required>
                                            @error('file')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cover_image" class="form-control-label">Cover Konten
                                                (Image)</label>
                                            <input class="form-control" type="file" id="image"
                                                name="cover_image" accept=".jpg,.jpeg,.png">
                                            @error('cover_image')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Deskripsi -->
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description" class="form-control-label">Deskripsi</label>
                                            <textarea class="form-control" id="description" name="description" placeholder="Masukkan Deskripsi">{{ old('description') }}</textarea>
                                            @error('description')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Tombol Submit -->
                                <div class="form-group text-end mt-4">
                                    <button type="submit" class="btn bg-gradient-info btn-round">Simpan</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-5">
                <div class="card card-profile">
                    <img src="{{ asset('../assets/dashboard/img/bg-profile.jpg') }}" alt="Image placeholder"
                        class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-4">
                            <div class="mt-n4 mt-lg-n6 mb-4">
                                <a href="javascript:;">
                                    <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('../assets/dashboard/img/team-2.jpg') }}"
                                        class="rounded-circle img-fluid border border-2 border-white mb-3"
                                        alt="Profile Picture" style="">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <div class="text-center h6 mt-2">
                            <div>
                                {{ $user->first_name }} {{ $user->last_name }}, {{ $user->rank }}
                            </div>
                            <div class="text-sm">
                                <span class="font-weight-light">
                                    @php
                                        $dateOfBirth = \Carbon\Carbon::parse($user->date_of_birth);
                                        $age = $dateOfBirth->age;
                                    @endphp
                                    ( {{ $age }} Tahun )</span>
                            </div>
                            <div class="text-sm mt-3">
                                <i class="bi bi-geo-alt-fill"></i> {{ $user->address }}, {{ $user->city }},
                                {{ $user->province }}, {{ $user->country }} ({{ $user->postal_code }})
                            </div>
                            <div class="mt-2">
                                <i class="bi bi-file-earmark-person-fill"></i>{{ $user->about }}
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column mx-4 mb-3">
                        <a href="mailto:{{ $user->email }}" class="btn btn-info mb-2 w-100">
                            <i class="bi bi-envelope-at-fill"></i> Email
                        </a>
                        <a href="https://api.whatsapp.com/send?phone={{ $user->phone_number }}"
                            class="btn btn-success w-100">
                            <i class="bi bi-whatsapp"></i> Whatsapp
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Teacher Data Addition Form -->

</x-layout.teacher>
{{-- End Page: Teacher Create Matrials/Konten Belajar --}}
