<x-layout.student>

    <x-partials.student.navbar :title="$title" />

    <!-- Student Profile Section -->
    <div class="card shadow-lg mx-4 card-profile-bottom" style="margin-top: 180px">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ Storage::url($user->profile_picture) }}" alt="profile_image"
                            class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ $user->full_name }}
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
                                <a class="btn bg-gradient-warning mb-0 px-0 py-1 d-flex align-items-center justify-content-center"
                                    href="{{ route('student.materials.studentMaterialsIndex') }}">
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

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="">
                <div class="card shadow-lg border-0 overflow-hidden">
                    <div class="row g-0">
                        <!-- Cover Image (Kiri) -->
                        <div class="col-md-5 d-flex align-items-center justify-content-center bg-light">
                            <img src="{{ Str::startsWith($material->cover_image, 'assets/') ? asset($material->cover_image) : Storage::url($material->cover_image) }}"
                                class="img-fluid rounded-start" alt="Sampul Materi"
                                style="width:100%; height:100%; object-fit:cover; object-position:center; border-radius:0.5rem;">
                        </div>
                        <!-- Informasi E-Book (Kanan) -->
                        <div class="col-md-7">
                            <div class="card-body h-100 d-flex flex-column justify-content-between">
                                <div>
                                    <h3 class="card-title mb-2 text-gradient text-warning">{{ $material->title }}</h3>
                                    <div class="mb-3">
                                        <span class="badge bg-gradient-info me-2">
                                            {{ $material->subject->subject_name ?? '-' }}
                                        </span>
                                        <span class="badge bg-gradient-primary">
                                            {{ $material->classroom->grade_level ?? '-' }} -
                                            {{ $material->classroom->class_name ?? '-' }}
                                        </span>
                                    </div>
                                    <ul class="list-unstyled mb-3">
                                        <li><strong>Penulis:</strong> {{ $material->author ?? '-' }}</li>
                                        <li><strong>Penerbit:</strong> {{ $material->publisher ?? '-' }}</li>
                                        <li><strong>Guru Pembuat:</strong>
                                            {{ $material->teacher
                                                ? $material->teacher->first_name .
                                                    ' ' .
                                                    ($material->teacher->last_name ?? '') .
                                                    ', ' .
                                                    ($material->teacher->degree ?? '')
                                                : '-' }}
                                        </li>
                                    </ul>
                                    <div class="mb-3">
                                        <strong>Deskripsi:</strong>
                                        <p class="text-muted mt-1">
                                            {{ $material->description ?? 'Tidak ada deskripsi.' }}</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center gap-3 mt-4">
                                    @if ($material->file)
                                        <a href="{{ asset('storage/' . $material->file) }}" target="_blank"
                                            class="btn btn-sm bg-gradient-primary text-light" style="min-width: 120px;"
                                            download>
                                            <i class="bi bi-file-earmark-arrow-down"></i> Unduh File
                                        </a>
                                    @else
                                        <button class="btn btn-sm btn-outline-secondary" style="min-width: 120px;"
                                            disabled>
                                            <i class="bi bi-file-earmark-x"></i> File Tidak Tersedia
                                        </button>
                                    @endif
                                    @if ($material->link)
                                        <a href="{{ $material->link }}" target="_blank"
                                            class="btn btn-sm bg-gradient-info text-light" style="min-width: 120px;"
                                            data-bs-toggle="tooltip" title="Link Virtual Class">
                                            <i class="bi bi-link-45deg"></i> Link Virtual
                                        </a>
                                    @else
                                        <button class="btn btn-sm btn-outline-secondary" style="min-width: 120px;"
                                            disabled>
                                            <i class="bi bi-link-45deg"></i> Link Tidak Tersedia
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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

</x-layout.student>
