@include('layouts.includes.head')
@section('title')
    Admission procedures |
@endsection

<body>

    <div class="container">
        <div class="shadow-lg bg-white mb-5 rounded-5">

            <div class="mt-3 bg-grad-primary card-header d-flex justify-content-between p-0">
                <a class="btn text-white shadow-0" href="{{ url('/') }}"><img class=""
                        src="{{ asset('images/logos/icon.png') }}" alt="" style="width: 50px;"></a>
                <h4 class="mt-2 ml-3 text-white mt-4">Admission Procedure</h4>
                <a class="btn text-white m-3 shadow-0" href="#"><i class="fas fa-info-circle fa-lg"></i></a>
            </div>

            <div class="card-body px-3 px-lg-5 py-5">

                <h4>Required documents</h4>
                <hr>

                <p>
                    Dolor amet gubergren diam diam ut ipsum stet invidunt stet, eirmod no sit et erat ut, voluptua
                    eirmod sed sadipscing labore dolore justo consetetur, sed kasd voluptua aliquyam ea sanctus,
                    aliquyam vero diam dolores duo labore, sed eirmod eos dolor eirmod eirmod, ut eirmod dolor sea
                    sadipscing dolores nonumy sit.
                    Accusam amet et elitr aliquyam lorem takimata duo aliquyam. Est erat et ipsum sit eos. Nonumy dolor
                    sadipscing gubergren takimata sadipscing. Et ut at ipsum nonumy sea dolor vero accusam sadipscing.
                    Dolor invidunt est voluptua takimata takimata dolores ipsum amet. Justo aliquyam aliquyam est dolor
                    amet dolor sed. Et sit sit justo lorem et ea, elitr sit ut elitr lorem.
                </p><br>

                <h4>Payment system</h4>
                <hr>

                <p>
                    Vero amet dolor dolore ut rebum at. Sea justo elitr sed eos nonumy duo eos dolores consetetur.
                    Takimata dolore at ipsum ut ipsum et erat, nonumy ut sit lorem stet accusam lorem justo et. Sit sed
                    labore ut eos, lorem rebum invidunt sadipscing rebum et et, nonumy kasd accusam et.
                    Tempor aliquyam justo justo nonumy erat. Gubergren elitr vero amet et at lorem et sed. Sit dolores
                    magna eirmod clita.
                </p><br>


                <h4>College policy</h4>
                <hr>

                <p>
                    Takimata diam kasd lorem sit ipsum labore lorem takimata. Elitr et dolor ipsum sea kasd eirmod. Amet
                    eirmod voluptua lorem at et et no, et labore ipsum vero sadipscing. Ipsum justo duo sit accusam
                    voluptua et et lorem. Stet erat clita amet magna et sed ipsum elitr, eos lorem sit dolore dolore
                    diam. Duo vero erat erat eirmod eos, at clita eos eirmod sadipscing. Ipsum labore accusam gubergren
                    labore gubergren. Ipsum dolor amet sit eos labore voluptua, magna takimata ipsum amet sanctus est.
                    Erat nonumy dolor ipsum et, sadipscing erat dolore diam dolor justo. Et justo sit eos at. Diam.
                </p><br>



                <div class="text-center">
                    <button type="button" class="btn-grad-secondary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal"><i class="fas fa-user-plus"></i>
                        Admission
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Verify yourself</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('student.admission.verify') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="" for="secCode">Admission security code</label>
                                        <input class="form-control @error('security_code') is-invalid @enderror"
                                            name="security_code" type="text">
                                        @error('security_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="" for="secCode">Rocket transaction ID</label>
                                        <input class="form-control @error('payment_transection') is-invalid @enderror"
                                            name="payment_transection" type="text">
                                        @error('payment_transection')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                                    <button name="v_check" class="btn-grad-primary" type="submit">Submit</button>
                                </div>
                        </div>
                    </div>
                </div>


                @include('layouts.includes.scripts')

            </div>
        </div>
    </div>
</body>
