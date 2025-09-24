{{-- Start Page: Student Update Prodile --}}
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

    <!-- Student Profile Edit Form -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form id="studentProfileForm" action="{{ route('student.profile.update', $student->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <!-- NIS -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nis" class="form-control-label">NIS</label>
                                        <input class="form-control" type="text" id="nis" name="nis"
                                            value="{{ old('nis', $student->nis) }}" placeholder="Masukkan NIS" readonly>
                                    </div>
                                </div>

                                <!-- NISN -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nisn" class="form-control-label">NISN</label>
                                        <input class="form-control" type="text" id="nisn" name="nisn"
                                            value="{{ old('nisn', $student->nisn) }}" placeholder="Masukkan NISN"
                                            readonly>
                                    </div>
                                </div>

                                <!-- Nama Lengkap -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="full_name" class="form-control-label">Nama Lengkap <span
                                                style="color:red">*</span></label>
                                        <input class="form-control" type="text" id="full_name" name="full_name"
                                            value="{{ old('full_name', $student->full_name) }}"
                                            placeholder="Masukkan Nama Lengkap" required>
                                    </div>
                                </div>

                                <!-- Kelas -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="classroom_id" class="form-control-label">Kelas</label>
                                        <!-- tampilkan nama kelas -->
                                        <input type="text" class="form-control"
                                            value="{{ $student->classroom ? $student->classroom->grade_level . ' ' . $student->classroom->class_name : '-' }}"
                                            readonly>
                                        <!-- tetap kirim classroom_id ke backend -->
                                        <input type="hidden" name="classroom_id" value="{{ $student->classroom_id }}">
                                    </div>
                                </div>

                            </div>

                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Data Pribadi</p>
                            <div class="row">
                                <!-- Tempat Lahir -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="place_of_birth" class="form-control-label">Tempat Lahir</label>
                                        <input class="form-control" type="text" id="place_of_birth"
                                            name="place_of_birth"
                                            value="{{ old('place_of_birth', $student->place_of_birth) }}"
                                            placeholder="Masukkan Tempat Lahir">
                                    </div>
                                </div>

                                <!-- Tanggal Lahir -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_of_birth" class="form-control-label">Tanggal Lahir</label>
                                        <input class="form-control" type="date" id="date_of_birth"
                                            name="date_of_birth"
                                            value="{{ old('date_of_birth', $student->date_of_birth) }}">
                                    </div>
                                </div>

                                <!-- Jenis Kelamin -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender" class="form-control-label">Jenis Kelamin</label>
                                        <select class="form-control" id="gender" name="gender">
                                            <option value="">-- Pilih --</option>
                                            <option value="L"
                                                {{ old('gender', $student->gender) == 'L' ? 'selected' : '' }}>
                                                Laki-laki</option>
                                            <option value="P"
                                                {{ old('gender', $student->gender) == 'P' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Agama -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="religion" class="form-control-label">Agama</label>
                                        <input class="form-control" type="text" id="religion" name="religion"
                                            value="{{ old('religion', $student->religion) }}"
                                            placeholder="Masukkan Agama">
                                    </div>
                                </div>
                            </div>

                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Kontak</p>
                            <div class="row">
                                <!-- Alamat -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address" class="form-control-label">Alamat</label>
                                        <textarea class="form-control" id="address" name="address" rows="2" placeholder="Masukkan alamat">{{ old('address', $student->address) }}</textarea>
                                    </div>
                                </div>

                                <!-- Kota -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="city" class="form-control-label">Kota</label>
                                        <input class="form-control" type="text" id="city" name="city"
                                            value="{{ old('city', $student->city) }}" placeholder="Masukkan Kota">
                                    </div>
                                </div>

                                <!-- Provinsi -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="province" class="form-control-label">Provinsi</label>
                                        <input class="form-control" type="text" id="province" name="province"
                                            value="{{ old('province', $student->province) }}"
                                            placeholder="Masukkan Provinsi">
                                    </div>
                                </div>

                                <!-- Kode Pos -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="postal_code" class="form-control-label">Kode Pos</label>
                                        <input class="form-control" type="text" id="postal_code"
                                            name="postal_code"
                                            value="{{ old('postal_code', $student->postal_code) }}"
                                            placeholder="Masukkan Kode Pos">
                                    </div>
                                </div>

                                <!-- Negara -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country" class="form-control-label">Negara</label>
                                        <input class="form-control" type="text" id="country" name="country"
                                            value="{{ old('country', $student->country) }}"
                                            placeholder="Masukkan Negara">
                                    </div>
                                </div>

                                <!-- Nomor Telepon -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone_number" class="form-control-label">Nomor Telepon</label>
                                        <input class="form-control" type="text" id="phone_number"
                                            name="phone_number"
                                            value="{{ old('phone_number', $student->phone_number) }}"
                                            placeholder="Masukkan Nomor Telepon">
                                    </div>
                                </div>

                                <!-- Kontak Darurat -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="emergency_contact" class="form-control-label">Kontak
                                            Darurat</label>
                                        <input class="form-control" type="text" id="emergency_contact"
                                            name="emergency_contact"
                                            value="{{ old('emergency_contact', $student->emergency_contact) }}"
                                            placeholder="Masukkan Nomor Kontak Darurat">
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="form-control-label">Email</label>
                                        <input class="form-control" type="email" id="email" name="email"
                                            value="{{ old('email', $student->email) }}" placeholder="Masukkan Email">
                                    </div>
                                </div>
                            </div>

                            <hr class="horizontal dark">
                            <div class="row">
                                <label for="email" class="form-control-label">Foto Profil</label>
                                <!-- Foto Profil -->
                                <div class="col-md-12 text-center">
                                    <a href="javascript:;" class="d-block">
                                        <img src="{{ $student->profile_picture ? asset('storage/' . $student->profile_picture) : asset('../assets/dashboard/img/team-2.jpg') }}"
                                            class="rounded-circle img-fluid border border-2 border-white mb-3"
                                            alt="Profile Picture" style="width: 150px; height: 150px;"
                                            id="profilePicturePreview">
                                    </a>
                                    <div class="form-group">
                                        <label for="profile_picture" class="form-control-label">Foto Profil</label>
                                        <input class="form-control" type="file" id="profile_picture"
                                            name="profile_picture" accept="image/*"
                                            onchange="previewImage(event, 'profilePicturePreview', '{{ $student->profile_picture ? asset('storage/' . $student->profile_picture) : asset('../assets/dashboard/img/team-2.jpg') }}')">
                                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah
                                            foto.</small>
                                    </div>
                                </div>
                            </div>


                            <!-- Hidden confirm password -->
                            <input type="hidden" name="confirm_password" id="confirm_password_hidden">

                            <div class="text-end mt-3">
                                <button type="button" class="btn btn-round bg-gradient-info"
                                    id="btnShowConfirmModal">
                                    Perbarui Data
                                </button>
                                <a href="{{ route('student.profile.edit') }}"
                                    class="btn btn-round bg-gradient-danger">Batal</a>
                            </div>

                        </form>

                        <!-- Modal Konfirmasi Password -->
                        <div class="modal fade" id="confirmPasswordModal" tabindex="-1"
                            aria-labelledby="confirmPasswordModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmPasswordModalLabel">Konfirmasi Password
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Masukkan password Anda untuk konfirmasi pembaruan profil.</p>
                                        <input type="password" id="confirmPasswordInput" class="form-control"
                                            placeholder="Masukkan password Anda">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-primary"
                                            id="btnConfirmSubmit">Konfirmasi</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <!-- Card Samping Profil -->
            <div class="col-lg-4 col-md-5">
                <div class="card card-profile">
                    <img src="{{ asset('../assets/dashboard/img/bg-profile.jpg') }}" alt="Background"
                        class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-4">
                            <div class="mt-n4 mt-lg-n6 mb-4">
                                <a href="javascript:;">
                                    <img src="{{ $student->profile_picture ? asset('storage/' . $student->profile_picture) : asset('../assets/dashboard/img/team-2.jpg') }}"
                                        class="rounded-circle img-fluid border border-2 border-white mb-3"
                                        alt="Profile Picture">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="text-center h6 mt-2">
                            <div>{{ $student->full_name }}</div>
                            <div class="text-sm mt-3">
                                <i class="bi bi-geo-alt-fill"></i> {{ $student->address }}, {{ $student->city }},
                                {{ $student->province }}, {{ $student->country }} ({{ $student->postal_code }})
                            </div>
                            <div class="text-sm mt-2">
                                <i class="bi bi-telephone-fill"></i> {{ $student->phone_number }}
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column mx-4 mb-3">
                        <a href="mailto:{{ $student->email }}" class="btn btn-info mb-2 w-100">
                            <i class="bi bi-envelope-at-fill"></i> Email
                        </a>
                        <a href="https://api.whatsapp.com/send?phone={{ $student->phone_number }}"
                            class="btn btn-success w-100">
                            <i class="bi bi-whatsapp"></i> Whatsapp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Student Profile Edit Form -->



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

    </x-layout.nstudent>
    {{-- Ed Page: Student Upadte Profile --}}
