@include('layouts.includes.head')
@section('title')
    Admission form |
@endsection

<body>

    <div class="container">
        <div class="shadow-lg mb-5 bg-white rounded-5">

            <div class="mt-3 bg-grad-primary card-header d-flex justify-content-between p-0">
                <a class="btn text-white shadow-0" href="{{ url('/') }}"><img class=""
                        src="{{ asset('images/logos/icon.png') }}" alt="" style="width: 50px;"></a>
                <h4 class="mt-2 ml-3 text-white mt-4">Admission form</h4>
                <a class="btn text-white m-3 shadow-0" href="#"><i class="fas fa-info-circle fa-lg"></i></a>
            </div>

            <div class="card-body p-4">


                <form action="{{ route('student.admission.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="security_code">Security Code</label>
                                <input class="form-control" type="text" name="security_code"
                                    value="{{ $verify->security_code }}" readonly>
                            </div>

                            <div class="mb-3 col-md-8">
                                <label for=" name">Name</label>
                                <input class="form-control" type="text" name=" name" value="{{ $verify->name }}"
                                    readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for=" fathers_name">Father's name</label>
                                <input class="form-control @error('fathers_name') is-invalid @enderror" type="text"
                                    name="fathers_name" value="{{ old('fathers_name') }}">
                                @error('fathers_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for=" mothers_name">Mother's name</label>
                                <input class="form-control @error('mothers_name') is-invalid @enderror" type="text"
                                    name="mothers_name" value="{{ old('mothers_name') }}">
                                @error('mothers_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for=" dob">Date of birth</label>
                                <input class="form-control @error('dob') is-invalid @enderror" type="date"
                                    name="dob" value="{{ old('dob') }}">
                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for=" gender">Gender</label>
                                <select name="gender" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for=" phone">Phone</label>
                                <input class="form-control @error('phone') is-invalid @enderror" type="text"
                                    name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for=" mail">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email"
                                    name="email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for=" present_address">Present address</label>
                                <input class="form-control @error('present_address') is-invalid @enderror"
                                    type="text" name="present_address" value="{{ old('present_address') }}">
                                @error('present_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for=" permanent_address">Permanent address</label>
                                <input class="form-control @error('permanent_address') is-invalid @enderror"
                                    type="text" name=" permanent_address" value="{{ old(' permanent_address') }}">
                                @error('permanent_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for=" birth_reg_nid">NID / Birth certificate no.</label>
                                <input class="form-control @error('birth_reg_nid') is-invalid @enderror" type="text"
                                    name="birth_reg_nid" value="{{ old('birth_reg_nid') }}">
                                @error('birth_reg_nid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for=" ssc_year">SSC passing year</label>
                                <input class="form-control @error('ssc_year') is-invalid @enderror" type="text"
                                    name="ssc_year" value="{{ old('ssc_year') }}">
                                @error('ssc_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for=" ssc_res">SSC GPA</label>
                                <input class="form-control @error('ssc_res') is-invalid @enderror" type="text"
                                    name="ssc_res" value="{{ old('ssc_res') }}">
                                @error('ssc_res')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="ssc_board">SSC board</label>
                                <select name="ssc_board" class="form-control">
                                    <option value="Sylhet">Sylhet</option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Rajshahi">Rajshahi</option>
                                    <option value="Chittagong">Chittagong</option>
                                    <option value="Comilla">Comilla</option>
                                    <option value="Dinajpur">Dinajpur</option>
                                    <option value="Jessore">Jessore</option>
                                    <option value="Barisal">Barisal</option>
                                    <option value="Mymensingh">Mymensingh</option>
                                    <option value="Madrasah">Madrasah</option>
                                    <option value="Technical">Technical</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="ssc_dept">SSC Department</label>
                                <select name="ssc_dept" class="form-control">
                                    <option value="Science">Science</option>
                                    <option value="Humanities">Humanities</option>
                                    <option value="Business">Business</option>
                                    <option value="Vocational">Vocational</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="appl_dept">Applicable Department</label>
                                <select name="appl_dept" class="form-control">
                                    <option value="Science">Science</option>
                                    <option value="Humanities">Humanities</option>
                                    <option value="Business">Business</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="ssc_school">SSC School</label>
                                <input class="form-control @error('ssc_school') is-invalid @enderror" type="text"
                                    name="ssc_school" value="{{ old('ssc_school') }}">
                                @error('ssc_school')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="photo">Photo</label>
                                <input class="form-control p-1" type="file" name="photo">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="ssc_testimonial">SSC testimonial</label>
                                <input class="form-control p-1" type="file" name="ssc_testimonial">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for=" ssc_marksheet">SSC marksheet</label>
                                <input class="form-control p-1" type="file" name="ssc_marksheet">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="payment_transection">Rocket payment transection</label>
                                <input class="form-control" type="text" name="payment_transection"
                                    value="{{ $verify->payment_transection }}" readonly>
                            </div>
                        </div>

                    </div>
                    <div class="text-right modal-footer">
                        <button type="submit" class="btn-grad-primary" name="submit_admission">Submit
                            Application</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
