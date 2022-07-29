<aside class="main-sidebar elevation-2 sidebar-primary bg-white">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link navbar-primary">
        <img src="{{ asset('images/logos/icon.png') }}" alt="MyADC" class="brand-image">
        <span class="brand-text font-weight-ligh text-white">MyADC</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- SidebarSearch Form -->
        <div class="form-inline mt-2">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2 pb-5">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-header">core</li>

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link @if ($menu == 'Dashboard') active @endif">
                        <i class="nav-icon fas fa-chart-area"></i>
                        <p> Dashboard </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('notice.index') }}"
                        class="nav-link @if ($menu == 'Notice') active @endif">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p> Notices </p>
                    </a>
                </li>

                <li class="nav-item @if ($menu == 'Routine') menu-open @endif">
                    <a href="#" class="nav-link @if ($menu == 'Routine') active @endif">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p> Routines <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('routines_xi.index') }}"
                                class="nav-link @if ($submenu == 'Routine_xi') active @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>XI</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('routines_xii.index') }}"
                                class="nav-link @if ($submenu == 'Routine_xii') active @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>XII</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item @if ($menu == 'Students') menu-open @endif">
                    <a href="#" class="nav-link @if ($menu == 'Students') active @endif">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p> Students <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('students.index') }}"
                                class="nav-link @if ($submenu == 'Students') active @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>All students</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('students_xi.index') }}"
                                class="nav-link @if ($submenu == 'XI') active @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>XI</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('students_xii.index') }}"
                                class="nav-link @if ($submenu == 'XII') active @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>XII</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('hsc_examinee.index') }}"
                                class="nav-link @if ($submenu == 'HSC_Examinee') active @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>HSC examinee</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('students_old.index') }}"
                                class="nav-link @if ($submenu == 'Old_Student') active @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Old students</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item @if ($menu == 'HSC_exam') menu-open @endif">
                    <a href="#" class="nav-link @if ($menu == 'HSC_exam') active @endif">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p> HSC Exam <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('hsc.index') }}"
                                class="nav-link @if ($submenu == 'Current_year') active @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Current year</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('hsc.previous') }}"
                                class="nav-link @if ($submenu == 'Previous_records') active @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Previous records</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item @if ($menu == 'Teachers') menu-open @endif">
                    <a href="#" class="nav-link @if ($menu == 'Teachers') active @endif">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i>
                        <p> Teachers <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('teachers.index') }}"
                                class="nav-link @if ($submenu == 'All_Teachers') active @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>All teachers</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('students_xi.index') }}"
                                class="nav-link @if ($submenu == 'Students_xi') active @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Administrators</p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('admin.teachers-science') }}"
                                class="nav-link @if ($submenu == 'Science') active @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Science</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.teachers-humanities') }}"
                                class="nav-link @if ($submenu == 'Humanities') active @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Humanities</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.teachers-business') }}"
                                class="nav-link @if ($submenu == 'Business') active @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Business</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item @if ($menu == 'Admission') menu-open @endif">
                    <a href="#" class="nav-link @if ($menu == 'Admission') active @endif">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p> Admission <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admission.index') }}"
                                class="nav-link @if ($submenu == 'Manage_admission') active @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Manage admission</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('security_code.index') }}"
                                class="nav-link @if ($submenu == 'Security_code') active @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Security code</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">others</li>

                <li class="nav-item @if ($menu == 'Download') menu-open @endif">
                    <a href="#" class="nav-link @if ($menu == 'Download') active @endif">
                        <i class="nav-icon fas fa-cloud-download-alt"></i>
                        <p> Download <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.download.testimonial') }}"
                                class="nav-link @if ($submenu == 'Testimonial') active @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Testimonial</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.download.tc') }}"
                                class="nav-link @if ($submenu == 'Transfer_Certificate') active @endif">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Transfer Certificate</p>
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
