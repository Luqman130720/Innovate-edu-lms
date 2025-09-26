{{-- Start Page: Student Materials / e-book --}}
<x-layout.student>

    <x-partials.student.navbar :title="$title" />

    <!-- Administrator Profile Section -->
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
    <!-- Administrator Profile Section -->

    <div class="container-fluid py-4">
        <div class="row">
            @foreach ($materials as $material)
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card h-100 shadow-sm border-0 position-relative overflow-hidden">
                        <div class="position-relative">
                            <img src="{{ Str::startsWith($material->cover_image, 'cover_images/') ? Storage::url($material->cover_image) : asset('storage/cover_images/default.jpg') }}"
                                class="card-img-top rounded-top" alt="Sampul Materi"
                                style="height: 200px; object-fit: cover;">
                            <a href="{{ route('student.materials.studentMaterialsShow', $material->id) }}"
                                class="btn btn-sm bg-gradient-warning text-dark d-flex align-items-center justify-content-center shadow position-absolute"
                                style="top: 12px; right: 12px; z-index: 2; border-radius: 50px; min-width: 110px; height: 36px; padding: 0 10px; font-size: 0.85rem;"
                                data-bs-toggle="tooltip" data-bs-placement="left" title="E-Book Info">
                                <i class="bi bi-eye me-1"></i> e-book info
                            </a>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-2">{{ $material->title }}</h5>
                            <p class="mb-1 text-muted"><strong>Mata Pelajaran:</strong>
                                {{ $material->subject->subject_name }}</p>
                            <!-- Tombol File dan Link simetris di tengah -->
                            <div class="d-flex justify-content-center gap-2 mt-3">
                                @if ($material->file)
                                    <a href="{{ asset('storage/' . $material->file) }}" target="_blank"
                                        class="btn btn-sm bg-gradient-primary text-light" style="min-width: 110px;"
                                        download>
                                        <i class="bi bi-file-earmark-arrow-down"></i> File
                                    </a>
                                @else
                                    <button class="btn btn-sm btn-outline-secondary" style="min-width: 110px;" disabled>
                                        <i class="bi bi-file-earmark-x"></i> File
                                    </button>
                                @endif
                                @if ($material->link)
                                    <a href="{{ $material->link }}" target="_blank"
                                        class="btn btn-sm bg-gradient-info text-light" style="min-width: 110px;"
                                        data-toggle="tooltip" title="Link Virtual Class">
                                        <i class="bi bi-link-45deg"></i> Link
                                    </a>
                                @else
                                    <button class="btn btn-sm btn-outline-secondary" style="min-width: 110px;" disabled>
                                        <i class="bi bi-link-45deg"></i> Link
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
{{-- End Page: Student Materials / e-book --}}
