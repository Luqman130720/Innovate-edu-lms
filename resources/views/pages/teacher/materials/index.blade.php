{{-- Start Page: Teacher Index Matrials/Konten Belajar --}}
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

    <!-- E-book -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg rounded-4">
                    <div
                        class="card-header pb-0 d-flex justify-content-between align-items-center bg-transparent border-0">
                        <h6 class="mb-0 text-dark fw-bold">Daftar Materi</h6>
                        <a href="{{ route('teacher.materials.create') }}"
                            class="btn btn-sm bg-gradient-success text-white rounded-pill px-3 shadow-sm fw-bold">
                            <i class="fa-solid fa-plus me-1"></i> Tambah Materi
                        </a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No.
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Kelas
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Mata Pelajaran
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Judul Materi
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Link & File
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($materials as $material)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0 ps-2">{{ $loop->iteration }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $material->classroom->grade_level }} -
                                                    {{ $material->classroom->class_name }}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $material->subject->subject_name }}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $material->title }}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                @if ($material->file || $material->link)
                                                    @if ($material->file)
                                                        <a href="{{ asset('storage/' . $material->file) }}"
                                                            target="_blank"
                                                            class="btn btn-sm badge bg-gradient-primary text-white me-2"
                                                            download>
                                                            <i class="fa-solid fa-download me-1"></i> Unduh File
                                                        </a>
                                                    @endif
                                                    @if ($material->link)
                                                        <a href="{{ $material->link }}" target="_blank"
                                                            class="btn btn-sm badge bg-gradient-info text-white me-2"
                                                            title="Link Virtual Class">
                                                            <i class="fa-solid fa-link me-1"></i> Link
                                                        </a>
                                                    @endif
                                                @else
                                                    <p class="text-xs font-weight-bold text-secondary mb-0">-</p>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="#"
                                                    class="btn btn-sm badge bg-gradient-warning text-white me-2"
                                                    title="Edit">
                                                    <i class="fa-solid fa-pen-to-square me-1"></i> Edit
                                                </a>
                                                <form action="{{ route('teacher.materials.destroy', $material->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm badge bg-gradient-danger text-white"
                                                        title="Hapus"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus materi?');">
                                                        <i class="fa-solid fa-trash-can me-1"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-4">
                                                <p class="text-sm text-secondary mb-0">Belum ada materi
                                                    yang tersedia.</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of E-book -->


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

</x-layout.teacher>
{{-- End Page: Teacher Index Matrials/Konten Belajar --}}
