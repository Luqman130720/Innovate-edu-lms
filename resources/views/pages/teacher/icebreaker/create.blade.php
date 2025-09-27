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
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card border-0 shadow-lg rounded-4 mb-4">

                    <div class="card-header bg-white rounded-top-4 px-4 py-3 border-bottom-0">
                        <h4 class="fw-bold mb-0 text-dark">Formulir Input Data Icebreaking</h4>
                    </div>

                    <div class="card-body p-4" style="background-color: #ffffff;">
                        <form action="{{ route('teacher.icebreaking.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="event_name"
                                            class="form-label small text-uppercase fw-semibold text-muted">Nama Event
                                            <span class="text-danger">*</span></label>
                                        <input type="text" id="event_name" name="event_name"
                                            class="form-control form-control-lg bg-white border-0 shadow-sm rounded-3 form-control-custom"
                                            value="{{ old('event_name') }}" placeholder="Masukkan Nama Event" required>
                                        @error('event_name')
                                            <small class="text-danger mt-1 d-block">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="platform"
                                            class="form-label small text-uppercase fw-semibold text-muted">Platform
                                            <span class="text-danger">*</span></label>
                                        <select id="platform" name="platform"
                                            class="form-select form-select-lg bg-white border-0 shadow-sm rounded-3 form-control-custom"
                                            required>
                                            <option value="" disabled selected>Pilih Platform</option>
                                            <option value="Quizizz"
                                                {{ old('platform') == 'Quizizz' ? 'selected' : '' }}>
                                                Quizizz</option>
                                            <option value="Kahoot" {{ old('platform') == 'Kahoot' ? 'selected' : '' }}>
                                                Kahoot</option>
                                            <option value="Socrative"
                                                {{ old('platform') == 'Socrative' ? 'selected' : '' }}>
                                                Socrative</option>
                                            <option value="Google Forms"
                                                {{ old('platform') == 'Google Forms' ? 'selected' : '' }}>Google Forms
                                            </option>
                                            <option value="Mentimeter"
                                                {{ old('platform') == 'Mentimeter' ? 'selected' : '' }}>Mentimeter
                                            </option>
                                            <option value="Poll Everywhere"
                                                {{ old('platform') == 'Poll Everywhere' ? 'selected' : '' }}>Poll
                                                Everywhere
                                            </option>
                                            <option value="Platform Lainya"
                                                {{ old('platform') == 'Platform Lainya' ? 'selected' : '' }}>Platform
                                                Lainya
                                            </option>
                                        </select>
                                        @error('platform')
                                            <small class="text-danger mt-1 d-block">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="game_link"
                                            class="form-label small text-uppercase fw-semibold text-muted">Link Game
                                            <span class="text-danger">*</span></label>
                                        <input type="url" id="game_link" name="game_link"
                                            class="form-control form-control-lg bg-white border-0 shadow-sm rounded-3 form-control-custom"
                                            value="{{ old('game_link') }}" placeholder="Masukkan Link Game" required>
                                        @error('game_link')
                                            <small class="text-danger mt-1 d-block">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="classroom_id"
                                            class="form-label small text-uppercase fw-semibold text-muted">Kelas <span
                                                class="text-danger">*</span></label>
                                        <select id="classroom_id" name="classroom_id"
                                            class="form-select form-select-lg bg-white border-0 shadow-sm rounded-3 form-control-custom"
                                            required>
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
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="subject_id"
                                            class="form-label small text-uppercase fw-semibold text-muted">Mapel <span
                                                class="text-danger">*</span></label>
                                        <select id="subject_id" name="subject_id"
                                            class="form-select form-select-lg bg-white border-0 shadow-sm rounded-3 form-control-custom"
                                            required>
                                            <option value="" disabled selected>Pilih Mapel</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}"
                                                    {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                                    {{ $subject->subject_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('subject_id')
                                            <small class="text-danger mt-1 d-block">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="date"
                                            class="form-label small text-uppercase fw-semibold text-muted">Tanggal <span
                                                class="text-danger">*</span></label>
                                        <input type="date" id="date" name="date"
                                            class="form-control form-control-lg bg-white border-0 shadow-sm rounded-3 form-control-custom"
                                            value="{{ old('date') }}" required>
                                        @error('date')
                                            <small class="text-danger mt-1 d-block">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="start_time"
                                            class="form-label small text-uppercase fw-semibold text-muted">Waktu Mulai
                                            <span class="text-danger">*</span></label>
                                        <input type="time" id="start_time" name="start_time"
                                            class="form-control form-control-lg bg-white border-0 shadow-sm rounded-3 form-control-custom"
                                            value="{{ old('start_time') }}" required>
                                        @error('start_time')
                                            <small class="text-danger mt-1 d-block">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="end_time"
                                            class="form-label small text-uppercase fw-semibold text-muted">Waktu
                                            Selesai <span class="text-danger">*</span></label>
                                        <input type="time" id="end_time" name="end_time"
                                            class="form-control form-control-lg bg-white border-0 shadow-sm rounded-3 form-control-custom"
                                            value="{{ old('end_time') }}" required>
                                        @error('end_time')
                                            <small class="text-danger mt-1 d-block">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row g-4 mt-3">
                                <div class="col-12">
                                    <label for="instructions"
                                        class="form-label small text-uppercase fw-semibold text-muted">Instruksi</label>
                                    <textarea id="instructions" name="instructions" rows="4"
                                        class="form-control form-control-lg bg-white border-0 shadow-sm rounded-3 form-control-custom"
                                        placeholder="Masukkan Instruksi">{{ old('instructions') }}</textarea>
                                    @error('instructions')
                                        <small class="text-danger mt-1 d-block">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit"
                                    class="btn btn-lg bg-gradient-info text-white rounded-pill px-5 shadow fw-bold">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Icebreaking Data Addition Form -->


</x-layout.teacher>
{{-- End Page: Teacher Index Ice Breaking --}}
