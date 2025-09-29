{{-- Start Page: Student Update Profile --}}
<x-layout.student>

    <x-partials.student.navbar :title="$title" />

    <!-- Student Profile Section -->
    <div class="card shadow-lg mx-4 card-profile-bottom" style="margin-top: 180px">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ Storage::url($student->profile_picture) }}" alt="profile_image"
                            class="w-100 border-radius-lg shadow-sm">
                    </div>

                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ $student->full_name }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ $student->email }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1 bg-gray-300" role="tablist">
                            <li class="nav-item">
                                <a class="btn bg-gradient-warning mb-0 px-0 py-1 d-flex align-items-center justify-content-center"
                                    href="{{ route('student.index') }}">
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
    <!-- Student Profile Section -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-header bg-white border-0 rounded-top-4">
                        <h5 class="mb-0 fw-bold">Perbarui Data Siswa</h5>
                        <small class="text-muted">Lengkapi informasi berikut untuk memperbarui data profil Anda</small>
                    </div>
                    <div class="card-body">
                        <form id="studentProfileForm" action="{{ route('student.profile.update', $student->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="nis" class="form-label fw-semibold">NIS</label>
                                    <input type="text" class="form-control rounded-4 shadow-sm" id="nis"
                                        name="nis" value="{{ old('nis', $student->nis) }}"
                                        placeholder="Masukkan NIS" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="nisn" class="form-label fw-semibold">NISN</label>
                                    <input type="text" class="form-control rounded-4 shadow-sm" id="nisn"
                                        name="nisn" value="{{ old('nisn', $student->nisn) }}"
                                        placeholder="Masukkan NISN" readonly>
                                </div>
                                <div class="col-md-12">
                                    <label for="full_name" class="form-label fw-semibold">Nama Lengkap <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control rounded-4 shadow-sm" id="full_name"
                                        name="full_name" value="{{ old('full_name', $student->full_name) }}" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="classroom_id" class="form-label fw-semibold">Kelas</label>
                                    <input type="text" class="form-control rounded-4 shadow-sm"
                                        value="{{ $student->classroom ? $student->classroom->grade_level . ' ' . $student->classroom->class_name : '-' }}"
                                        readonly>
                                    <input type="hidden" name="classroom_id" value="{{ $student->classroom_id }}">
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="place_of_birth" class="form-label fw-semibold">Tempat Lahir</label>
                                    <input type="text" class="form-control rounded-4 shadow-sm" id="place_of_birth"
                                        name="place_of_birth"
                                        value="{{ old('place_of_birth', $student->place_of_birth) }}"
                                        placeholder="Masukkan Tempat Lahir">
                                </div>
                                <div class="col-md-6">
                                    <label for="date_of_birth" class="form-label fw-semibold">Tanggal Lahir</label>
                                    <input type="date" class="form-control rounded-4 shadow-sm" id="date_of_birth"
                                        name="date_of_birth"
                                        value="{{ old('date_of_birth', $student->date_of_birth) }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="gender" class="form-label fw-semibold">Jenis Kelamin</label>
                                    <select class="form-select rounded-4 shadow-sm" id="gender" name="gender">
                                        <option value="">-- Pilih --</option>
                                        <option value="L"
                                            {{ old('gender', $student->gender) == 'L' ? 'selected' : '' }}>Laki-laki
                                        </option>
                                        <option value="P"
                                            {{ old('gender', $student->gender) == 'P' ? 'selected' : '' }}>Perempuan
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="religion" class="form-label fw-semibold">Agama</label>
                                    <input type="text" class="form-control rounded-4 shadow-sm" id="religion"
                                        name="religion" value="{{ old('religion', $student->religion) }}"
                                        placeholder="Masukkan Agama">
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="address" class="form-label fw-semibold">Alamat</label>
                                    <textarea class="form-control rounded-4 shadow-sm" id="address" name="address" rows="2"
                                        placeholder="Masukkan alamat">{{ old('address', $student->address) }}</textarea>
                                </div>
                                <div class="col-md-4">
                                    <label for="city" class="form-label fw-semibold">Kota</label>
                                    <input type="text" class="form-control rounded-4 shadow-sm" id="city"
                                        name="city" value="{{ old('city', $student->city) }}"
                                        placeholder="Masukkan Kota">
                                </div>
                                <div class="col-md-4">
                                    <label for="province" class="form-label fw-semibold">Provinsi</label>
                                    <input type="text" class="form-control rounded-4 shadow-sm" id="province"
                                        name="province" value="{{ old('province', $student->province) }}"
                                        placeholder="Masukkan Provinsi">
                                </div>
                                <div class="col-md-4">
                                    <label for="postal_code" class="form-label fw-semibold">Kode Pos</label>
                                    <input type="text" class="form-control rounded-4 shadow-sm" id="postal_code"
                                        name="postal_code" value="{{ old('postal_code', $student->postal_code) }}"
                                        placeholder="Masukkan Kode Pos">
                                </div>
                                <div class="col-md-6">
                                    <label for="country" class="form-label fw-semibold">Negara</label>
                                    <input type="text" class="form-control rounded-4 shadow-sm" id="country"
                                        name="country" value="{{ old('country', $student->country) }}"
                                        placeholder="Masukkan Negara">
                                </div>
                                <div class="col-md-6">
                                    <label for="phone_number" class="form-label fw-semibold">Nomor Telepon</label>
                                    <input type="text" class="form-control rounded-4 shadow-sm" id="phone_number"
                                        name="phone_number" value="{{ old('phone_number', $student->phone_number) }}"
                                        placeholder="Masukkan Nomor Telepon">
                                </div>
                                <div class="col-md-6">
                                    <label for="emergency_contact" class="form-label fw-semibold">Kontak
                                        Darurat</label>
                                    <input type="text" class="form-control rounded-4 shadow-sm"
                                        id="emergency_contact" name="emergency_contact"
                                        value="{{ old('emergency_contact', $student->emergency_contact) }}"
                                        placeholder="Masukkan Nomor Kontak Darurat">
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-semibold">Email</label>
                                    <input type="email" class="form-control rounded-4 shadow-sm" id="email"
                                        name="email" value="{{ old('email', $student->email) }}"
                                        placeholder="Masukkan Email">
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="text-center mb-4">
                                <img src="{{ $student->profile_picture ? asset('storage/' . $student->profile_picture) : asset('assets/dashboard/img/team-2.jpg') }}"
                                    class="rounded-circle border shadow-sm mb-3"
                                    style="width: 140px; height: 140px; object-fit: cover;"
                                    id="profilePicturePreview">
                                <div class="mb-3">
                                    <label for="photo" class="form-label fw-semibold">Foto Profil</label>
                                    <input type="file" class="form-control rounded-4 shadow-sm" id="photo"
                                        name="profile_picture" accept="image/*"
                                        onchange="previewImage(event, 'profilePicturePreview')">
                                    <small class="text-muted">Kosongkan jika tidak ingin mengubah foto.</small>
                                </div>
                            </div>

                            <div class="text-end mt-4">
                                <button type="button" class="btn btn-info rounded-pill px-5 shadow-sm"
                                    data-bs-toggle="modal" data-bs-target="#confirmPasswordModal">
                                    Perbarui Data
                                </button>
                                <a href="{{ route('student.profile.edit') }}"
                                    class="btn btn-outline-secondary rounded-pill px-5 shadow-sm">Batal</a>
                            </div>

                            <div class="modal fade" id="confirmPasswordModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content rounded-4 shadow-sm border-0">
                                        <div class="modal-header bg-gradient-primary text-white">
                                            <h6 class="modal-title fw-bold">Konfirmasi Password</h6>
                                            <button type="button" class="btn-close btn-close-white"
                                                data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body text-center p-4">
                                            <i class="ni ni-lock-circle-open text-primary"
                                                style="font-size: 3.5rem;"></i>
                                            <h5 class="mt-3 fw-semibold">Masukkan Password Anda</h5>
                                            <input type="password" name="confirm_password"
                                                class="form-control mt-3 text-center rounded-4 shadow-sm"
                                                placeholder="Password" required>
                                            @error('confirm_password')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="modal-footer justify-content-center border-0 pb-4">
                                            <button type="submit"
                                                class="btn btn-primary rounded-pill px-4 shadow-sm">Konfirmasi</button>
                                            <button type="button" class="btn btn-outline-secondary rounded-pill px-4"
                                                data-bs-dismiss="modal">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-5 mt-4 mt-md-0">
                <div class="card border-0 rounded-4 overflow-hidden shadow-sm">
                    <img src="{{ asset('assets/dashboard/img/bg-profile.jpg') }}" class="card-img-top"
                        alt="Background">
                    <div class="card-body text-center">
                        <img src="{{ $student->profile_picture ? asset('storage/' . $student->profile_picture) : asset('assets/dashboard/img/team-2.jpg') }}"
                            class="rounded-circle border shadow-sm mb-3"
                            style="width: 120px; height: 120px; object-fit: cover;">
                        <h5 class="mb-0 fw-bold">{{ $student->full_name }}</h5>
                        <p class="text-muted mb-1">{{ $student->classroom->grade_level ?? '-' }}
                            {{ $student->classroom->class_name ?? '-' }}</p>
                        <small class="text-secondary">
                            @php
                                $dateOfBirth = \Carbon\Carbon::parse($student->date_of_birth);
                                $age = $dateOfBirth->age;
                            @endphp
                            ({{ $age }} Tahun)
                        </small>
                        <div class="mt-3 text-muted small">
                            <i class="bi bi-geo-alt-fill me-1"></i>{{ $student->address }}, {{ $student->city }},
                            {{ $student->province }}, {{ $student->country }} ({{ $student->postal_code }})
                        </div>
                    </div>
                    <div class="d-flex flex-column p-3 border-top">
                        <a href="mailto:{{ $student->email }}" class="btn btn-outline-info mb-2 rounded-pill">
                            <i class="bi bi-envelope-at-fill me-2"></i> Email
                        </a>
                        <a href="https://api.whatsapp.com/send?phone={{ $student->phone_number }}"
                            class="btn btn-outline-success rounded-pill">
                            <i class="bi bi-whatsapp me-2"></i> Whatsapp
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layout.student>
{{-- End Page: Student Update Profile --}}
