{{-- Start Page: Teacher Create Ice Breaking --}}
<x-layout.teacher>
    <x-partials.teacher.navbar :title="$title" />

    <!-- Administrator Profile Section -->
    <div class="card shadow-lg mx-4" style="margin-top: 10rem">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ $user->profile_picture ? Storage::url($user->profile_picture) : asset('assets/img/team-1.jpg') }}"
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
                                    href="{{ route('teacher.virtual-class.index') }}">
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

    <!-- Icebreaking Data Addition Form -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Formulir Input Data Icebreaking</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('teacher.icebreaking.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="container">
                                <hr class="horizontal dark">
                                <div class="row mb-3">
                                    <!-- Nama Event -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="event_name" class="form-control-label">Nama Event <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="event_name" name="event_name"
                                                value="{{ old('event_name') }}" placeholder="Masukkan Nama Event"
                                                required>
                                            @error('event_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Platform -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="platform" class="form-control-label">Platform <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control" id="platform" name="platform" required>
                                                <option value="" disabled selected>Pilih Platform</option>
                                                <!-- Daftar platform kuis -->
                                                <option value="Quizizz"
                                                    {{ old('platform') == 'Quizizz' ? 'selected' : '' }}>Quizizz
                                                </option>
                                                <option value="Kahoot"
                                                    {{ old('platform') == 'Kahoot' ? 'selected' : '' }}>Kahoot</option>
                                                <option value="Socrative"
                                                    {{ old('platform') == 'Socrative' ? 'selected' : '' }}>Socrative
                                                </option>
                                                <option value="Google Forms"
                                                    {{ old('platform') == 'Google Forms' ? 'selected' : '' }}>Google
                                                    Forms</option>
                                                <option value="Mentimeter"
                                                    {{ old('platform') == 'Mentimeter' ? 'selected' : '' }}>Mentimeter
                                                </option>
                                                <option value="Poll Everywhere"
                                                    {{ old('platform') == 'Poll Everywhere' ? 'selected' : '' }}>Poll
                                                    Everywhere</option>
                                                <option value="Poll Everywhere"
                                                    {{ old('platform') == 'Platform Lainya' ? 'selected' : '' }}>
                                                    Platform Lainya</option>

                                            </select>
                                            @error('platform')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <!-- Link Game -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="game_link" class="form-control-label">Link Game <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="url" id="game_link" name="game_link"
                                                value="{{ old('game_link') }}" placeholder="Masukkan Link Game"
                                                required>
                                            @error('game_link')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Instruksi -->
                                    <div class="">
                                        <div class="form-group">
                                            <label for="instructions" class="form-control-label">Instruksi</label>
                                            <textarea class="form-control" id="instructions" name="instructions" placeholder="Masukkan Instruksi">{{ old('instructions') }}</textarea>
                                            @error('instructions')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <!-- Kelas -->
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

                                    <!-- Mapel -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="subject_id" class="form-control-label">Mapel <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control" id="subject_id" name="subject_id" required>
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

                                <div class="row mb-3">
                                    <!-- Tanggal -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date" class="form-control-label">Tanggal <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="date" id="date" name="date"
                                                value="{{ old('date') }}" required>
                                            @error('date')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Waktu Mulai -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="start_time" class="form-control-label">Waktu Mulai <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="time" id="start_time"
                                                name="start_time" value="{{ old('start_time') }}" required>
                                            @error('start_time')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <!-- Waktu Selesai -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="end_time" class="form-control-label">Waktu Selesai <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="time" id="end_time"
                                                name="end_time" value="{{ old('end_time') }}" required>
                                            @error('end_time')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group text-end mt-4">
                                    <button type="submit" class="btn bg-gradient-info btn-round">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-5">
                <!-- Profile Card Section -->
                <!-- This section remains unchanged, as it's about the teacher's profile -->
            </div>
        </div>
    </div>
    <!-- Icebreaking Data Addition Form -->


</x-layout.teacher>
{{-- End Page: Teacher Index Ice Breaking --}}
