{{-- Start Page: Admin Create Subject --}}
<x-layout.admin>

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
                                    href="{{ route('operator.classroom.index') }}">
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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Formulir Input Data Kelas</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('operator.subjects.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Kode Mata Pelajaran -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subject_code" class="form-control-label">Kode Mata Pelajaran <span
                                                style="color: red;">*</span></label>
                                        <input class="form-control" type="text" id="subject_code" name="subject_code"
                                            value="{{ old('subject_code') }}" placeholder="Masukkan Kode Mata Pelajaran"
                                            required>
                                        @error('subject_code')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Nama Mata Pelajaran -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subject_name" class="form-control-label">Nama Mata Pelajaran <span
                                                style="color: red;">*</span></label>
                                        <input class="form-control" type="text" id="subject_name" name="subject_name"
                                            value="{{ old('subject_name') }}" placeholder="Masukkan Nama Mata Pelajaran"
                                            required>
                                        @error('subject_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Kelas -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="class_id" class="form-control-label">Kelas <span
                                                style="color: red;">*</span></label>
                                        <select class="form-control" id="class_id" name="class_id" required>
                                            <option value="">Pilih Kelas</option>
                                            @foreach ($classrooms as $classroom)
                                                <option value="{{ $classroom->id }}">
                                                    {{ $classroom->class_name }} ({{ $classroom->class_code }})
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('class_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Wali Kelas -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="teacher_id" class="form-control-label">Guru <span
                                                style="color: red;">*</span></label>
                                        <select class="form-control" id="teacher_id" name="teacher_id" required>
                                            <option value="">Pilih Guru</option>
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}">
                                                    {{ $teacher->first_name }} {{ $teacher->last_name }},
                                                    {{ $teacher->rank }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('teacher_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-end mt-4">
                                <button type="submit" class="btn bg-gradient-info btn-round">Simpan</button>
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
                                    <img src="{{ asset('../assets/dashboard/img/team-2.jpg') }}"
                                        class="rounded-circle img-fluid border border-2 border-white mb-3"
                                        alt="Profile Picture" style="">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <div class="text-center h6 mt-2">
                            <div>
                                Luqman Fattah Nadin
                            </div>
                            <div class="text-sm">
                                <span class="font-weight-light">
                                    ( 24 Tahun )</span>
                            </div>
                            <div class="text-sm mt-3">
                                <i class="bi bi-geo-alt-fill"></i> Randusari Rt 005 Rw 006, Tegal, Jawa Tengah,
                                Indonesia (52462)
                            </div>
                            <div class="mt-2 text-sm font-weight-light">
                                <i class="bi bi-file-earmark-person-fill"></i> Saya Adalah seorang Web Developer
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column mx-4 mb-3">
                        <a href="mailto:l.f.nadhien@gmail.com" class="btn btn-info mb-2 w-100">
                            <i class="bi bi-envelope-at-fill"></i> Email
                        </a>
                        <a href="https://api.whatsapp.com/send?phone=087777553390" class="btn btn-success w-100">
                            <i class="bi bi-whatsapp"></i> Whatsapp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Teacher Data Addition Form -->

</x-layout.admin>
{{-- End Page: Admin Create Subject --}}
