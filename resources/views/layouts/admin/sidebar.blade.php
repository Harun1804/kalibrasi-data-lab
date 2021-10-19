<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ auth()->user()->username }}
                            <span class="user-level">{{ ucfirst(auth()->user()->role) }}</span>
                        </span>
                    </a>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{ (Request::segment(2) == "dashboard") ? "active" : "" }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>
                
                <li class="nav-item {{ (Request::segment(2) == "users") ? "active" : "" }}">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>Users</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('admin.user.admin') }}">
                                    <span class="sub-item">Admin</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.user.staff') }}">
                                    <span class="sub-item">Pegawai</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                <li class="nav-item {{ (Request::segment(2) == "kalibrasi") ? "active" : "" }}">
                    <a data-toggle="collapse" href="#kalibrasi">
                        <i class="fas fa-layer-group"></i>
                        <p>Kalibrasi</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="kalibrasi">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('admin.kalibrasi.merk.alat') }}">
                                    <span class="sub-item">Merk Alat</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.kalibrasi.alat') }}">
                                    <span class="sub-item">Alat</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.kalibrasi.tempat.waktu') }}">
                                    <span class="sub-item">Tempat Waktu</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.kalibrasi.input') }}">
                                    <span class="sub-item">Input Data Kalibrasi</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                <li class="nav-item {{ (Request::segment(2) == "perusahaan") ? "active" : "" }}">
                    <a href="{{ route('admin.perusahaan') }}">
                        <i class="fas fa-home"></i>
                        <p>Kelola Perusahaan</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
