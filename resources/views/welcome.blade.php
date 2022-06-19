@include('layouts.includes.head')

<body class="bg-login">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center pt-5">
                        <div class="col-lg-5 col-md-7 mt-5">

                            {{-- <div class="text-center mb-3">
                                <img class="py-2" style="width: 40%;"
                                    src="{{ asset('public/images/logos/logo_white.png') }}" alt="MyADC">
                            </div> --}}

                            <div class="card shadow-lg">
                                <div class="card-header text-center">
                                    <img class="py-2" style="width: 35%;"
                                        src="{{ asset('public/images/logos/logo.png') }}" alt="MyADC">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="text-muted">Welcome to</h5>
                                    <h4>Al-Emdad Degree College</h4>

                                    <h5 class="mt-4">Log in as-</h5>
                                    <a class="btn-grad-primary l-icon mx-1" href=""><i
                                            class="fas fa-users d-block"></i>
                                        Student</a>
                                    <a class="btn-grad-primary l-icon mx-1" href=""><i
                                            class="fas fa-chalkboard-teacher d-block"></i> Teacher</a>
                                    <hr>
                                    <h5 class="mt-4">Not a student?</h5>
                                    <a class="btn-grad-secondary" href="{{ route('admission.procedure') }}"><i
                                            class="fas fa-user-plus"></i> Admission</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>


        <footer class="py-4 bg-dark fixed-bottom">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small text-white">
                    <div class="text-muted">Copyright &copy; MyADC 2022</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                        &middot;
                        <a href="https://github.com/mr-mamun-50" target="blank">Developer's Info</a>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    @include('layouts.includes.scripts')
</body>

</html>
