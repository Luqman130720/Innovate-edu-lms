{{-- Start Page: Admin Index Subject --}}
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
                        <ul class="nav nav-pills nav-fill p-1 bg-gray-300" role="tablist">
                            <li class="nav-item">
                                <a class="btn bg-gradient-info mb-0 px-0 py-1 d-flex align-items-center justify-content-center"
                                    data-bs-toggle="modal" data-bs-target="#addLearnModulesModal">
                                    <i class="ni ni-fat-add"></i>
                                    <span class="ms-2">Tambah Mapel</span>
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
                        <h6>Data Mata Pelajaran</h6>
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
                                            Kode Mata Pelajaran</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nama Mata Pelajaran</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Kelas</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Guru Pengampu</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subjects as $subject)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 ps-2">{{ $loop->iteration }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $subject->subject_code }}
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $subject->subject_name }}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    {{ $subject->classroom ? $subject->classroom->grade_level . ' - ' . $subject->classroom->class_name : '-' }}
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    {{ $subject->teacher ? $subject->teacher->first_name . ' ' . $subject->teacher->last_name . ', ' . $subject->teacher->rank : '-' }}
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <form action="{{ route('operator.subjects.destroy', $subject->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn bg-gradient-danger btn-round text-light font-weight-bold text-xs ms-2"
                                                        data-toggle="tooltip" title="Delete"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus mata pelajaran {{ $subject->subject_name }}?');">
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
    </div>
    <!-- Teacher Data Overview -->

    <!-- Learn Modules Data Add Modal -->
    <div class="modal fade" id="addLearnModulesModal" tabindex="-1" role="dialog"
        aria-labelledby="uploadDataModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="font-weight-bolder text-info text-gradient" id="uploadDataModalLabel">Tambah
                        Data Mapel
                    </h3>
                </div>
                <div class="modal-body">
                    <div class="card-body mx-3">
                        <div class="mb-2">
                            <a href="{{ route('operator.subjects.create') }}"
                                class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0 d-flex align-items-center justify-content-center">
                                <i class="ni ni-fat-add" style="font-size: 30px; margin-right: 10px;"></i>
                                <span>Tambah Data Mapel</span>
                            </a>
                            <div class="mt-2">
                                <small class="text-muted">Masukkan data Mapel secara manual</small>
                            </div>
                        </div>
                        <div class="mb-2">
                            <form action="{{ route('operator.subjects.import') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <button type="button"
                                    class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0 d-flex align-items-center justify-content-center"
                                    data-bs-toggle="collapse" data-bs-target="#uploadSection" aria-expanded="false"
                                    aria-controls="uploadSection">
                                    <i class="ni ni-cloud-upload-96" style="font-size: 30px; margin-right: 10px;"></i>
                                    <span>Import Data Mapel</span>
                                </button>
                                <div class="mt-2">
                                    <small class="text-muted">Upload data mapel dengan file excel</small>
                                </div>
                                <div class="collapse mt-4" id="uploadSection">
                                    <input type="file" name="file" class="form-control mt-2" required>
                                    <div class="text-muted mt-2 mb-4">Unggah file Excel (.xlsx) yang berisi data mapel.
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
    <!-- Learn Modules Data Add Modal -->

    <!-- Alert Notification for Add Class Success -->
    <script>
        window.onload = function() {
            @if (session('success'))
                var addClassSuccessModal = new bootstrap.Modal(document.getElementById('addClassSuccess'));
                addClassSuccessModal.show();
            @endif
        };
    </script>

    <div class="modal fade" id="addClassSuccess" tabindex="-1" role="dialog" aria-labelledby="addClassSuccessLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-success modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="addClassSuccessLabel">Sukses</h6>
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

</x-layout.admin>
{{-- End Page: Admin Index Subject --}}
