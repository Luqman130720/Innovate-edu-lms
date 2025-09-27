{{-- Start Page: Teacher Index Ice Breaking --}}
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

    <!-- Icebreaking Data Overview -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg rounded-4 border-0">

                    <div
                        class="card-header pb-0 d-flex justify-content-between align-items-center bg-transparent border-0">
                        <h6 class="mb-0 text-dark fw-bold">Daftar Icebreaking</h6>
                        <a href="{{ route('teacher.icebreaking.create') }}"
                            class="btn btn-sm bg-gradient-success text-white rounded-pill px-3 shadow-sm fw-bold">
                            <i class="fa-solid fa-plus me-1"></i> Tambah Event
                        </a>
                    </div>

                    <div class="card-body px-4 pt-0 pb-4">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3 py-3">
                                            No.</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 py-3">
                                            Nama Event</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center py-3">
                                            Platform</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 py-3">
                                            Mata Pelajaran</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 py-3">
                                            Link Game</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 py-3">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($icebreakings as $icebreaking)
                                        <tr class="border-top">
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0 ps-3">{{ $loop->iteration }}</p>
                                            </td>

                                            <td>
                                                <p class="text-sm font-weight-bold mb-0 text-dark">
                                                    {{ $icebreaking->event_name }}
                                                </p>
                                            </td>

                                            <td class="align-middle text-center">
                                                <span class="badge bg-gradient-info text-uppercase fw-bold shadow-sm">
                                                    {{ $icebreaking->platform }}
                                                </span>
                                            </td>

                                            <td class="text-center">
                                                <p class="text-secondary text-sm font-weight-normal mb-0">
                                                    {{ $icebreaking->subject ? $icebreaking->subject->subject_name : '-' }}
                                                </p>
                                            </td>

                                            <td class="align-middle text-center">
                                                <a href="{{ $icebreaking->game_link }}" target="_blank"
                                                    class="btn btn-sm badge bg-gradient-info text-white me-2"
                                                    title="Link Game">
                                                    <i class="fa-solid fa-link me-1"></i> Link
                                                </a>
                                            </td>

                                            <td class="align-middle text-center">
                                                <form
                                                    action="{{ route('teacher.icebreaking.destroy', $icebreaking->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm badge bg-gradient-danger text-white me-2"
                                                        title="Hapus Event"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus event {{ $icebreaking->event_name }}?');">
                                                        <i class="fa-solid fa-trash-can me-1"></i> Hapus
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
    <!-- Icebreaking Data Overview -->


    <!-- Alert Notification for Add Class Success -->
    <script>
        window.onload = function() {
            @if (session('success'))
                var IceBreakingSuccessModal = new bootstrap.Modal(document.getElementById('IceBreakingSuccess'));
                IceBreakingSuccessModal.show();
            @endif
        };
    </script>

    <div class="modal fade" id="IceBreakingSuccess" tabindex="-1" role="dialog"
        aria-labelledby="IceBreakingSuccessLabel" aria-hidden="true">
        <div class="modal-dialog modal-success modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="IceBreakingSuccessLabel">Sukses</h6>
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
{{-- End Page: Teacher Index Ice Breaking --}}
