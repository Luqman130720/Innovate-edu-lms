{{-- Start - Partial Student Sidebar --}}
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
            target="_blank">
            <img src="{{ asset('../assets/dashboard/img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Discoval - LMS</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link " href="{{ route('operator.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Material Pages</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#userManagementDropdown"
                    aria-expanded="false" aria-controls="userManagementDropdown">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-hat-3 text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Ruang Belajar</span>
                </a>
                <div class="collapse" id="userManagementDropdown">
                    <ul class="nav flex-column ms-4">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student.materials.studentMaterialsIndex') }}">
                                <span class="nav-link-text">Materi Belajar</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#classDataDropdown"
                    aria-expanded="false" aria-controls="classDataDropdown">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-credit-card text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Tugas</span>
                </a>
                <div class="collapse" id="classDataDropdown">
                    <ul class="nav flex-column ms-4">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student.assignments.studentAssignmentsIndex') }}">
                                <span class="nav-link-text">Tugas Sekolah</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#subjectDataDropdown"
                    aria-expanded="false" aria-controls="subjectDataDropdown">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-collection text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Kelas Virtual</span>
                </a>
                <div class="collapse" id="subjectDataDropdown">
                    <ul class="nav flex-column ms-4">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('student.virtual-class.studentVirtualClassIndex') }}">
                                <span class="nav-link-text">Kelas Virtual</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('operator.profile.edit') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
        <div class="card card-plain shadow-none" id="sidenavCard">
            <img class="w-50 mx-auto" src="{{ asset('../assets/dashboard/img/illustrations/icon-documentation.svg') }}"
                alt="sidebar_illustration">
            <div class="card-body text-center p-3 w-100 pt-0">
                <div class="docs-info">
                    <h6 class="mb-0">Need help?</h6>
                    <p class="text-xs font-weight-bold mb-0">Please check our docs</p>
                </div>
            </div>
        </div>
        <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard" target="_blank"
            class="btn btn-dark btn-sm w-100 mb-3">Documentation</a>
        <form action="{{ route('login.logout') }}" method="POST" class="d-inline"
            onsubmit="return confirm('Are you sure you want to logout?');">
            @csrf
            <button type="submit" class="btn bg-gradient-warning btn-round btn-sm mb-0 w-100">Logout</button>
        </form>

    </div>
</aside>
{{-- End - Partial Student Sidebar --}}
