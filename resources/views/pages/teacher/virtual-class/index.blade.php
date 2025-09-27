{{-- Start Page: Teacher Index Virtual Class --}}
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
                        <h5 class="mb-1">{{ $user->first_name }} {{ $user->last_name }}, {{ $user->degree }}</h5>
                        <p class="mb-0 font-weight-bold text-sm">{{ $user->email }}</p>
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

    <!-- Virtual Class List -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg rounded-4">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center bg-transparent border-0">
                        <h6 class="mb-0 text-dark fw-bold">Kelas Virtual</h6>
                        <a href="{{ route('teacher.virtual-class.create') }}"
                            class="btn btn-sm bg-gradient-success text-white rounded-pill px-3 shadow-sm fw-bold">
                            <i class="fa-solid fa-plus me-1"></i> Tambah Kelas
                        </a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-4">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kelas</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Mata Pelajaran</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Guru Mapel</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Link</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($virtualClasses as $virtualClass)
                                        <tr>
                                            <td><p class="text-xs font-weight-bold mb-0 ps-2">{{ $loop->iteration }}</p></td>
                                            <td><p class="text-xs font-weight-bold mb-0">{{ $virtualClass->classroom->grade_level }} - {{ $virtualClass->classroom->class_name }}</p></td>
                                            <td class="text-center"><p class="text-xs font-weight-bold mb-0">{{ optional($virtualClass->subject)->subject_name }}</p></td>
                                            <td class="text-center">
                                                <p class="text-xs text-secondary font-weight-bold mb-0">
                                                    @if (optional($virtualClass->subject)->teacher)
                                                        {{ $virtualClass->subject->teacher->first_name . ' ' . $virtualClass->subject->teacher->last_name . ', ' . $virtualClass->subject->teacher->rank }}
                                                    @else
                                                        -
                                                    @endif
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ $virtualClass->virtual_class_link }}" target="_blank"
                                                    class="btn btn-sm badge bg-gradient-primary text-white me-2">
                                                    <i class="fa-solid fa-link me-1"></i> Link
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <!-- Trigger Delete Modal -->
                                                <button type="button"
                                                    class="btn btn-sm badge bg-gradient-danger text-white"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteVirtualClassModal{{ $virtualClass->id }}">
                                                    <i class="fa-solid fa-trash-can me-1"></i> Hapus
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Modal Delete -->
                                        <div class="modal fade" id="deleteVirtualClassModal{{ $virtualClass->id }}" tabindex="-1"
                                            aria-labelledby="deleteVirtualClassLabel{{ $virtualClass->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content border-0 shadow-lg rounded-4">
                                                    <div class="modal-header bg-gradient-danger text-white">
                                                        <h6 class="modal-title fw-bold" id="deleteVirtualClassLabel{{ $virtualClass->id }}">
                                                            Hapus Kelas Virtual
                                                        </h6>
                                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body text-center p-4">
                                                        <i class="ni ni-fat-remove text-danger" style="font-size: 4rem;"></i>
                                                        <h5 class="mt-3">Yakin ingin menghapus?</h5>
                                                        <p class="text-muted">Kelas virtual <strong>{{ $virtualClass->classroom->grade_level }} - {{ $virtualClass->classroom->class_name }}</strong> akan dihapus.</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-center border-0 pb-4">
                                                        <button type="button" class="btn btn-light shadow-sm px-4 rounded-pill" data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('teacher.virtual-class.destroy', $virtualClass->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn bg-gradient-danger text-white px-4 rounded-pill shadow-sm">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Delete -->
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-4">
                                                <i class="fa-solid fa-video text-secondary mb-2" style="font-size: 2rem;"></i>
                                                <p class="text-sm text-secondary mb-0">Belum ada kelas virtual yang tersedia.</p>
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

    <!-- Modal Success -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <div class="modal-header bg-gradient-success text-white">
                    <h6 class="modal-title fw-bold" id="successModalLabel">Sukses</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center p-4">
                    <i class="ni ni-check-bold text-success" style="font-size: 4rem;"></i>
                    <h5 class="mt-3 text-gradient text-success">Berhasil!</h5>
                    <p class="text-muted mb-0">{{ session('success') }}</p>
                </div>
                <div class="modal-footer justify-content-center border-0 pb-4">
                    <button type="button" class="btn bg-gradient-success text-white px-4 rounded-pill shadow-sm"
                        data-bs-dismiss="modal">Oke, Mengerti</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Success -->

    <!-- Auto Show Success Modal -->
    <script>
        window.onload = function() {
            @if (session('success'))
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            @endif
        };
    </script>

</x-layout.teacher>
{{-- End Page: Teacher Index Virtual Class --}}
