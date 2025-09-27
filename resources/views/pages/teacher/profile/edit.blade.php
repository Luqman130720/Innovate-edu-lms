{{-- Start Page: Teacher Edit Profile --}}
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

    <!-- Teacher Data Update Form -->
    <div class="container-fluid py-4">
        <div class="row">
            <!-- Form -->
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-header bg-white border-0 rounded-top-4">
                        <h5 class="mb-0 fw-bold">Perbarui Data Guru</h5>
                        <small class="text-muted">Lengkapi informasi berikut untuk memperbarui data profil Anda</small>
                    </div>
                    <div class="card-body">
                        <form id="teacherProfileForm" action="{{ route('teacher.profile.update', $user->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Identitas -->
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="nip" class="form-label fw-semibold">NIP</label>
                                    <input type="text" class="form-control rounded-4 shadow-sm" id="nip"
                                        name="nip" value="{{ old('nip', $user->nip) }}" placeholder="Masukkan NIP">
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-semibold">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" class="form-control rounded-4 shadow-sm" id="email"
                                        name="email" value="{{ old('email', $user->email) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="first_name" class="form-label fw-semibold">Nama Depan <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control rounded-4 shadow-sm" id="first_name"
                                        name="first_name" value="{{ old('first_name', $user->first_name) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name" class="form-label fw-semibold">Nama Belakang <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control rounded-4 shadow-sm" id="last_name"
                                        name="last_name" value="{{ old('last_name', $user->last_name) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="degree" class="form-label fw-semibold">Pangkat Jabatan <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control rounded-4 shadow-sm" id="degree"
                                        name="degree" value="{{ old('degree', $user->degree) }}" required>
                                </div>
                            </div>

                            <hr class="my-4">

                            <!-- Kontak -->
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="address" class="form-label fw-semibold">Alamat</label>
                                    <input type="text" class="form-control rounded-4 shadow-sm" id="address"
                                        name="address" value="{{ old('address', $user->address) }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="city" class="form-label fw-semibold">Kota</label>
                                    <input type="text" class="form-control rounded-4 shadow-sm" id="city"
                                        name="city" value="{{ old('city', $user->city) }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="province" class="form-label fw-semibold">Provinsi</label>
                                    <input type="text" class="form-control rounded-4 shadow-sm" id="province"
                                        name="province" value="{{ old('province', $user->province) }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="postal_code" class="form-label fw-semibold">Kode Pos</label>
                                    <input type="text" class="form-control rounded-4 shadow-sm" id="postal_code"
                                        name="postal_code" value="{{ old('postal_code', $user->postal_code) }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="country" class="form-label fw-semibold">Negara</label>
                                    <input type="text" class="form-control rounded-4 shadow-sm" id="country"
                                        name="country" value="{{ old('country', $user->country) }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="phone_number" class="form-label fw-semibold">Nomor Telepon</label>
                                    <input type="text" class="form-control rounded-4 shadow-sm" id="phone_number"
                                        name="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
                                </div>
                            </div>

                            <hr class="my-4">

                            <!-- Foto Profil -->
                            <div class="text-center mb-4">
                                <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('../assets/dashboard/img/team-2.jpg') }}"
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

                            <!-- Tombol Update -->
                            <div class="text-end mt-4">
                                <button type="button" class="btn btn-info rounded-pill px-5 shadow-sm"
                                    data-bs-toggle="modal" data-bs-target="#confirmPasswordModal">
                                    Perbarui Data
                                </button>
                                <a href="{{ route('teacher.profile.edit', $user->id) }}"
                                    class="btn btn-outline-secondary rounded-pill px-5 shadow-sm">Batal</a>
                            </div>

                            <!-- Modal Konfirmasi Password -->
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

            <!-- Sidebar Profil -->
            <div class="col-lg-4 col-md-5 mt-4 mt-md-0">
                <div class="card border-0 rounded-4 overflow-hidden shadow-sm">
                    <img src="{{ asset('../assets/dashboard/img/bg-profile.jpg') }}" class="card-img-top"
                        alt="Background">
                    <div class="card-body text-center">
                        <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('../assets/dashboard/img/team-2.jpg') }}"
                            class="rounded-circle border shadow-sm mb-3"
                            style="width: 120px; height: 120px; object-fit: cover;">
                        <h5 class="mb-0 fw-bold">{{ $user->first_name }} {{ $user->last_name }}</h5>
                        <p class="text-muted mb-1">{{ $user->degree }}</p>
                        <small class="text-secondary">
                            @php
                                $dateOfBirth = \Carbon\Carbon::parse($user->date_of_birth);
                                $age = $dateOfBirth->age;
                            @endphp
                            ({{ $age }} Tahun)
                        </small>
                        <div class="mt-3 text-muted small">
                            <i class="bi bi-geo-alt-fill me-1"></i>{{ $user->address }}, {{ $user->city }},
                            {{ $user->province }}, {{ $user->country }} ({{ $user->postal_code }})
                        </div>
                        <div class="mt-2 text-muted small">
                            <i class="bi bi-file-earmark-person-fill me-1"></i>{{ $user->about }}
                        </div>
                    </div>
                    <div class="d-flex flex-column p-3 border-top">
                        <a href="mailto:{{ $user->email }}" class="btn btn-outline-info mb-2 rounded-pill">
                            <i class="bi bi-envelope-at-fill me-2"></i> Email
                        </a>
                        <a href="https://api.whatsapp.com/send?phone={{ $user->phone_number }}"
                            class="btn btn-outline-success rounded-pill">
                            <i class="bi bi-whatsapp me-2"></i> Whatsapp
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal Success -->
    <div class="modal fade" id="updateUserSuccess" tabindex="-1" aria-labelledby="updateUserSuccessLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow-sm border-0">
                <div class="modal-header bg-gradient-success text-white">
                    <h6 class="modal-title fw-bold" id="updateUserSuccessLabel">Sukses</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center py-4">
                    <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
                    <h5 class="fw-bold text-success mt-3">Berhasil!</h5>
                    <p class="text-muted mb-0">{{ session('success') }}</p>
                </div>
                <div class="modal-footer justify-content-center border-0 pb-4">
                    <button type="button" class="btn btn-success rounded-pill px-5 shadow-sm"
                        data-bs-dismiss="modal">Ok, Mengerti</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Tampilkan modal sukses jika ada session
        window.onload = function() {
            @if (session('success'))
                var updateUserSuccessModal = new bootstrap.Modal(document.getElementById('updateUserSuccess'));
                updateUserSuccessModal.show();
            @endif
        };
    </script>

</x-layout.teacher>
{{-- End Page: Teacher Edit Profile --}}
