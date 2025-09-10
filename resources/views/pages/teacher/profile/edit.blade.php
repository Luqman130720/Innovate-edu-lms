{{-- Start Page: Teacher Edit Profile --}}
<x-layout.teacher>
    <x-partials.teacher.navbar :title="$title" />

    <!-- Administrator Profile Section -->
    <div class="card shadow-lg mx-4" style="margin-top: 10rem">
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
                        <ul class="nav nav-pills nav-fill p-1 bg-gray-300" role="tablist">
                            <li class="nav-item">
                                <a
                                    class="btn bg-gradient-info mb-0 px-0 py-1 d-flex align-items-center justify-content-center">
                                    <span class="ms-2">My Profile</span>
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
                    <div class="card-body">
                        <form action="{{ route('teacher.profile.update', $user->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nip" class="form-control-label">NIP (Nomor Induk
                                            Pegawai)</label>
                                        <input class="form-control" type="text" id="nip" name="nip"
                                            value="{{ old('nip', $user->nip) }}" placeholder="Masukkan NIP">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email" class="form-control-label">Alamat Email <span
                                                style="color: red;">*</span></label>
                                        <input class="form-control" type="email" id="email" name="email"
                                            value="{{ old('email', $user->email) }}" placeholder="Masukkan alamat email"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name" class="form-control-label">Nama Depan <span
                                                style="color: red;">*</span></label>
                                        <input class="form-control" type="text" id="first_name" name="first_name"
                                            value="{{ old('first_name', $user->first_name) }}"
                                            placeholder="Masukkan nama depan" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_name" class="form-control-label">Nama Belakang <span
                                                style="color: red;">*</span></label>
                                        <input class="form-control" type="text" id="last_name" name="last_name"
                                            value="{{ old('last_name', $user->last_name) }}"
                                            placeholder="Masukkan nama belakang" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="degree" class="form-control-label">Pangkat Jabatan <span
                                                style="color: red;">*</span></label>
                                        <input class="form-control" type="text" id="degree" name="degree"
                                            value="{{ old('degree', $user->degree) }}"
                                            placeholder="Masukkan Pangkat Jabatan" required>
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Informasi Kontak</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address" class="form-control-label">Alamat</label>
                                        <input class="form-control" type="text" id="address" name="address"
                                            value="{{ old('address', $user->address) }}"
                                            placeholder="Masukkan alamat lengkap">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="city" class="form-control-label">Kota</label>
                                        <input class="form-control" type="text" id="city" name="city"
                                            value="{{ old('city', $user->city) }}" placeholder="Masukkan nama kota">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="province" class="form-control-label">Provinsi</label>
                                        <input class="form-control" type="text" id="province" name="province"
                                            value="{{ old('province', $user->province) }}"
                                            placeholder="Masukkan nama provinsi">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="postal_code" class="form-control-label">Kode Pos</label>
                                        <input class="form-control" type="text" id="postal_code"
                                            name="postal_code" value="{{ old('postal_code', $user->postal_code) }}"
                                            placeholder="Masukkan kode pos">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country" class="form-control-label">Negara</label>
                                        <input class="form-control" type="text" id="country" name="country"
                                            value="{{ old('country', $user->country) }}"
                                            placeholder="Masukkan nama negara">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone_number" class="form-control-label">Nomor Telepon</label>
                                        <input class="form-control" type="text" id="phone_number"
                                            name="phone_number"
                                            value="{{ old('phone_number', $user->phone_number) }}"
                                            placeholder="Masukkan nomor telepon">
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Tentang Saya</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="about" class="form-control-label">Tentang Saya</label>
                                        <textarea class="form-control" id="about" name="about" rows="3"
                                            placeholder="Tuliskan tentang diri Anda">{{ old('about', $user->about) }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="place_of_birth" class="form-control-label">Tempat Lahir</label>
                                        <input class="form-control" type="text" id="place_of_birth"
                                            name="place_of_birth"
                                            value="{{ old('place_of_birth', $user->place_of_birth) }}"
                                            placeholder="Masukkan tempat lahir">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_of_birth" class="form-control-label">Tanggal Lahir</label>
                                        <input class="form-control" type="date" id="date_of_birth"
                                            name="date_of_birth"
                                            value="{{ old('date_of_birth', $user->date_of_birth) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender" class="form-control-label">Jenis Kelamin</label>
                                        <select class="form-control" id="gender" name="gender">
                                            <option value="" disabled>Pilih Jenis Kelamin</option>
                                            <option value="L"
                                                {{ old('gender', $user->gender) == 'L' ? 'selected' : '' }}>
                                                Laki-laki</option>
                                            <option value="P"
                                                {{ old('gender', $user->gender) == 'P' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="religion" class="form-control-label">Agama</label>
                                        <select class="form-control" id="religion" name="religion">
                                            <option value="" disabled>Pilih Agama</option>
                                            <option value="Islam"
                                                {{ old('religion', $user->religion) == 'Islam' ? 'selected' : '' }}>
                                                Islam</option>
                                            <option value="Kristen"
                                                {{ old('religion', $user->religion) == 'Kristen' ? 'selected' : '' }}>
                                                Kristen</option>
                                            <option value="Katolik"
                                                {{ old('religion', $user->religion) == 'Katolik' ? 'selected' : '' }}>
                                                Katolik</option>
                                            <option value="Hindu"
                                                {{ old('religion', $user->religion) == 'Hindu' ? 'selected' : '' }}>
                                                Hindu</option>
                                            <option value="Buddha"
                                                {{ old('religion', $user->religion) == 'Buddha' ? 'selected' : '' }}>
                                                Buddha</option>
                                            <option value="Konghucu"
                                                {{ old('religion', $user->religion) == 'Konghucu' ? 'selected' : '' }}>
                                                Konghucu</option>
                                            <option value="Lainnya"
                                                {{ old('religion', $user->religion) == 'Lainnya' ? 'selected' : '' }}>
                                                Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mt-lg-3 mb-4 text-center">
                                <a href="javascript:;" class="d-block">
                                    <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('../assets/dashboard/img/team-2.jpg') }}"
                                        class="rounded-circle img-fluid border border-2 border-white mb-3"
                                        alt="Profile Picture" style="width: 150px; height: 150px;"
                                        id="profilePicturePreview">
                                </a>

                                <div class="form-group">
                                    <label for="photo" class="form-control-label">Foto Profil</label>
                                    <input class="form-control" type="file" id="photo" name="profile_picture"
                                        accept="image/*"
                                        onchange="previewImage(event, 'profilePicturePreview', '{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('../assets/dashboard/img/team-2.jpg') }}')">
                                    <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah
                                        foto.</small>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password" class="form-control-label">Password</label> <span
                                        style="color: red;">*</span>
                                    <input class="form-control" type="password" id="password" name="password"
                                        placeholder="Masukkan password" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password_confirmation" class="form-control-label">Konfirmasi
                                        Password <span style="color: red;">*</span></label>
                                    <input class="form-control" type="password" id="password_confirmation"
                                        name="password_confirmation" placeholder="Konfirmasi password" required>
                                </div>
                            </div>



                            <div class="text-end">
                                <button type="submit" class="btn btn-round bg-gradient-info">Perbarui
                                    Data</button>
                                <a href="{{ route('operator.profile.edit') }}"
                                    class="btn btn-round bg-gradient-danger">Batal</a>
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
                                {{ $user->first_name }} {{ $user->last_name }}, {{ $user->degree }}
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
    <!-- Teacer Data Addition Form -->

    <!-- Alert Notification for Update User Success -->
    <script>
        window.onload = function() {
            @if (session('success'))
                var updateUserSuccessModal = new bootstrap.Modal(document.getElementById('updateUserSuccess'));
                updateUserSuccessModal.show();
            @endif
        };
    </script>

    <!-- Modal Notification for Updating User Success -->
    <div class="modal fade" id="updateUserSuccess" tabindex="-1" role="dialog"
        aria-labelledby="updateUserSuccessLabel" aria-hidden="true">
        <div class="modal-dialog modal-success modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="updateUserSuccessLabel">Sukses</h6>
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
    <!-- End of Modal Notification for Updating User Success -->


</x-layout.teacher>
{{-- End Page: Teacher Edit Profile --}}
