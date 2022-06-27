<nav class="navbar navbar-expand-lg navbar-light nav-gradient">

    <div class="container-fluid justify-content-between row-lg">
        <!-- Left elements -->
        <div class="d-flex col-lg-4">
            <!-- Brand -->
            <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('public/images/logos/logo.png') }}" height="30" alt="MyADC Logo" loading="lazy"
                    style="margin-top: 2px;" />
            </a>

            <!-- Search form -->
            <form class="input-group w-auto my-auto d-none d-sm-flex">
                <input autocomplete="off" type="search" class="form-control rounded" placeholder="Search"
                    style="min-width: 125px;" />
                <span class="input-group-text border-0 d-none d-lg-flex"><i class="fas fa-search"></i></span>
            </form>
        </div>
        <!-- Left elements -->

        <!-- Center elements -->
        <ul class="navbar-nav flex-row d-flex justify-content-center col-lg-4">
            <li class="nav-item me-3 active">
                <a class="nav-link active" href="#">
                    <span><i class="fas fa-home fa-lg"></i></span>
                </a>
            </li>

            <li class="nav-item me-3">
                <a class="nav-link" href="#">
                    <span><i class="fas fa-flag fa-lg"></i></span>
                </a>
            </li>

            <li class="nav-item me-3">
                <a class="nav-link" href="#">
                    <span><i class="fas fa-video fa-lg"></i></span>
                </a>
            </li>

            <li class="nav-item me-3">
                <a class="nav-link" href="#">
                    <span><i class="fas fa-shopping-bag fa-lg"></i></span>
                </a>
            </li>

            <li class="nav-item me-3">
                <a class="nav-link" href="#">
                    <span><i class="fas fa-users fa-lg"></i></span>
                </a>
            </li>
        </ul>
        <!-- Center elements -->


        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>


        <!-- Right elements -->
        <ul class="navbar-nav flex-row justify-content-center justify-content-lg-end collapse navbar-collapse col-lg-4"
            id="navbarTogglerDemo02">

            <li class="nav-item dropdown me-3">
                <a class="nav-link d-sm-flex align-items-sm-center shadow rounded dropdown-toggle hidden-arrow"
                    href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown"
                    aria-expanded="false">
                    <img src="{{ asset('public/images/asset_img/user-icon.png') }}" class="rounded-circle"
                        height="22" alt="Black and White Portrait of a Man" loading="lazy" />
                    <strong class="d-none d-sm-block ms-1"
                        style="width: 100px; white-space:nowrap; overflow: hidden; text-overflow: ellipsis;">{{ Auth::user()->name }}</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="#">Profile</a>
                    </li>
                    <li>
                        <a class="logout dropdown-item p-0">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" name="logoutform">
                                @csrf

                                <button class="logout btn bg-transparent shadow-0 px-3 py-2" type="submit">
                                    Log out</button>
                            </form>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item me-3">
                <a class="nav-link" href="#">
                    <span><i class="fas fa-plus-circle fa-lg"></i></span>
                </a>
            </li>

            <li class="nav-item dropdown me-3">
                <a class="nav-link dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
                    role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-comments fa-lg"></i>

                    <span class="badge rounded-pill badge-notification bg-danger">6</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="#">Some news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Another news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown me-3">
                <a class="nav-link dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
                    role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bell fa-lg"></i>
                    <span class="badge rounded-pill badge-notification bg-danger">12</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="#">Some news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Another news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown me-3">
                <a class="nav-link dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
                    role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-chevron-circle-down fa-lg"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <a class="dropdown-item" href="#">Some news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Another news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Right elements -->
    </div>
</nav>
