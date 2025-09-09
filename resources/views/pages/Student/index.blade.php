{{-- Start Page: Student Index --}}
<x-layout.admin>

    <!-- Administrator Profile Section -->
    <div class="card shadow-lg mx-4 card-profile-bottom">
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
                        <ul class="nav nav-pills nav-fill p-1 bg-gray-300" role="tablist">
                            <li class="nav-item">
                                <a class="btn bg-gradient-info mb-0 px-0 py-1 d-flex align-items-center justify-content-center"
                                    data-bs-toggle="modal" data-bs-target="#addStudentModal">
                                    <i class="ni ni-fat-add"></i>
                                    <span class="ms-2">Tambah Siswa</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- Administrator Profile Section -->

    <!-- Teacher Data Overview -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Data Siawa</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            No.</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            NIS</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama Lengkap</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Kelas</th> <!-- Kolom Kelas -->
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No Hp</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Alamat</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 ps-2">{{ $loop->iteration }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $student->nis ? $student->nis : '-' }}</p>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('storage/' . $student->profile_picture) }}"
                                                            class="avatar avatar-sm me-3" alt="user">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $student->full_name }}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{ $student->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    {{ $student->classroom ? $student->classroom->class_name : '-' }}
                                                    <!-- Menampilkan Nama Kelas -->
                                                </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $student->phone_number }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $student->address }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="{{ route('operator.students.show', $student->id) }}"
                                                    class="btn btn-round bg-gradient-info text-light font-weight-bold text-xs">
                                                    <i class="bi bi-eye"></i> Lihat
                                                </a>
                                                <a href="{{ route('operator.students.edit', $student->id) }}"
                                                    class="btn btn-round bg-gradient-warning text-light font-weight-bold text-xs ms-2">
                                                    <i class="bi bi-pencil-fill"></i> Edit
                                                </a>
                                                <form action="{{ route('operator.students.destroy', $student->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-round bg-gradient-danger text-light font-weight-bold text-xs ms-2"
                                                        data-toggle="tooltip" title="Delete"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus {{ $student->full_name }}?');">
                                                        <i class="bi bi-trash3-fill"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @include('administrator.Components.Footer') --}}
    </div>
    <!-- Teacher Data Overview -->

    <!-- Student Data Import Modal -->
    <div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="uploadDataModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="font-weight-bolder text-info text-gradient" id="uploadDataModalLabel">Tambah Data Siswa
                    </h3>
                </div>
                <div class="modal-body">
                    <div class="card-body mx-3">
                        <div class="mb-2">
                            <a href="{{ route('operator.students.create') }}"
                                class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0 d-flex align-items-center justify-content-center">
                                <i class="ni ni-fat-add" style="font-size: 30px; margin-right: 10px;"></i>
                                <span>Tambah Data Siswa</span>
                            </a>
                            <div class="mt-2">
                                <small class="text-muted">Masukkan data siswa secara manual</small>
                            </div>
                        </div>
                        <div class="mb-2">
                            <form action="{{ route('operator.students.import') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <button type="button"
                                    class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0 d-flex align-items-center justify-content-center"
                                    data-bs-toggle="collapse" data-bs-target="#uploadSection" aria-expanded="false"
                                    aria-controls="uploadSection">
                                    <i class="ni ni-cloud-upload-96" style="font-size: 30px; margin-right: 10px;"></i>
                                    <span>Import Data Siswa</span>
                                </button>
                                <div class="mt-2">
                                    <small class="text-muted">Upload data siswa dengan file excel</small>
                                </div>
                                <div class="collapse mt-4" id="uploadSection">
                                    <input type="file" name="file" class="form-control mt-2" required>
                                    <div class="text-muted mt-2 mb-4">Unggah file Excel (.xlsx) yang berisi data siswa.
                                    </div>
                                    <button type="submit"
                                        class="btn btn-round bg-gradient-warning btn-lg w-100 mt-4 mb-0 d-flex align-items-center justify-content-center">
                                        <i class="ni ni-cloud-upload-96"
                                            style="font-size: 30px; margin-right: 10px;"></i>
                                        <span>Unggah Berkas</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Student Data Import Modal -->

    <!-- Alert Notification for Add Student Success -->
    <script>
        window.onload = function() {
            @if (session('success'))
                var addStudentSuccessModal = new bootstrap.Modal(document.getElementById('addStudentSuccessModal'));
                addStudentSuccessModal.show();
            @endif
        };
    </script>

    <!-- Modal Notification for Adding Student Success -->
    <div class="modal fade" id="addStudentSuccessModal" tabindex="-1" role="dialog"
        aria-labelledby="addStudentSuccessModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-success modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="addStudentSuccessModalLabel">Sukses</h6>
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
    <!-- End of Modal Notification for Adding Student Success -->


</x-layout.admin>
{{-- End Page: Student Index --}}
