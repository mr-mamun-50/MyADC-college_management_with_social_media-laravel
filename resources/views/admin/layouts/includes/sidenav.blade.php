<aside class="main-sidebar elevation-2 sidebar-light-warning">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link navbar-navy">
        <img src="{{ asset('images/logos/icon.png') }}" alt="MyADC" class="brand-image">
        <span class="brand-text font-weight-light text-white">MyADC</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist') }}/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
            </div>
        </div> --}}

        <!-- SidebarSearch Form -->
        <div class="form-inline mt-2">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link @if ($menu == 'Dashboard') active @endif">
                        <i class="nav-icon bi bi-speedometer2"></i>
                        <p> Dashboard </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('notice.index') }}"
                        class="nav-link @if ($menu == 'Notice') active @endif">
                        <i class="nav-icon bi bi-app-indicator"></i>
                        <p> Notices </p>
                    </a>
                </li>

                <li class="nav-item @if ($menu == 'Routine') menu-open @endif">
                    <a href="#" class="nav-link @if ($menu == 'Routine') active @endif">
                        <i class="nav-icon bi bi-calendar-week"></i>
                        <p> Routines <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('routines_xi.index') }}"
                                class="nav-link @if ($submenu == 'Routine_xi') active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>XI</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('routines_xii.index') }}"
                                class="nav-link @if ($submenu == 'Routine_xii') active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>XII</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item @if ($menu == 'Students') menu-open @endif">
                    <a href="#" class="nav-link @if ($menu == 'Students') active @endif">
                        <i class="nav-icon bi bi-people"></i>
                        <p> Students <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('all_students.index') }}"
                                class="nav-link @if ($submenu == 'All_students') active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All students</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('routines_xi.index') }}"
                                class="nav-link @if ($submenu == 'Students_xi') active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>XI</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('routines_xii.index') }}"
                                class="nav-link @if ($submenu == 'Students_xii') active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>XII</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('routines_xii.index') }}"
                                class="nav-link @if ($submenu == 'Students_HSC') active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>HSC examinee</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('routines_xii.index') }}"
                                class="nav-link @if ($submenu == 'Students_old') active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Old students</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">EXAMPLES</li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Calendar
                            <span class="badge badge-warning right">2</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/gallery.html" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Gallery
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
