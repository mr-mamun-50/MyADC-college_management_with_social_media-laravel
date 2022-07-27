@extends('admin.layouts.app')
@section('title')
    Students
@endsection
<?php $menu = 'Students';
$submenu = 'XI'; ?>

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <b>students XI</b>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn  btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                        <i class="fas fa-plus"></i> Add student
                    </button>
                </div>
            </div>
            <div class="card-body table-responsive">

                <table class="table table-bordered table-striped" id="example1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Group</th>
                            <th>Parents name</th>
                            <th>Phone</th>
                            <th>Session</th>
                            <th>Exam</th>
                            <th>More</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($student as $item)
                            <tr>
                                <td>{{ $item->st_id }}</td>
                                <td>
                                    @if ($item->photo)
                                        <img class="img-fluid" src="{{ asset('images/students' . '/' . $item->photo) }}"
                                            alt="Photo" style="width: 80px">
                                    @else
                                        <img class="img-fluid" src="{{ asset('images/asset_img/user-icon.png') }}"
                                            alt="Photo" style="width: 80px">
                                    @endif
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->department }}</td>
                                <td>
                                    <div class="text-muted text-sm">Father: </div> {{ $item->fathers_name }}
                                    <div class="text-muted text-sm">Mother: </div> {{ $item->mothers_name }}
                                </td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->session }}</td>

                                <td class="text-center">

                                    @php
                                        $mt_mark = DB::table('model_test_exam')
                                            ->where('c_class', 'XI')
                                            ->where('st_id', $item->id)
                                            ->first();
                                        $hy_mark = DB::table('half_yearly_exam')
                                            ->where('c_class', 'XI')
                                            ->where('st_id', $item->id)
                                            ->first();
                                        $fnl_mark = DB::table('final_exam')
                                            ->where('c_class', 'XI')
                                            ->where('st_id', $item->id)
                                            ->first();

                                        $passStatus = 0;
                                        if ($mt_mark && $hy_mark && $fnl_mark) {
                                            if ($mt_mark->gpa >= 1 && $hy_mark->gpa >= 1 && $fnl_mark->gpa >= 1) {
                                                $passStatus = 'pass';
                                            }
                                        } elseif (!$mt_mark || !$hy_mark || !$fnl_mark) {
                                            $passStatus = 'pending';
                                        }
                                    @endphp

                                    @if ($passStatus == 'pass')
                                        <span class="badge badge-pill badge-success mt-1">Passed</span> <br>
                                    @elseif ($passStatus == 'pending')
                                        <span class="badge badge-pill badge-warning mt-1">Pending</span> <br>
                                    @else
                                        <span class="badge badge-pill badge-danger mt-1">Failed</span> <br>
                                    @endif

                                    <button type="button" class="btn btn-outline-primary btn-sm mt-2" data-toggle="modal"
                                        data-target="#{{ $item->department . $item->id . 'modal' }}">
                                        <i class="fas fa-hourglass-half"></i> Exam
                                    </button>


                                    @include('admin.students.exam_modals.science')
                                    @include('admin.students.exam_modals.humanities')
                                    @include('admin.students.exam_modals.business')
                                </td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('students.show', $item->id) }}"
                                            class="btn btn-info mr-1 px-1 py-0"><i class="bi bi-person"></i></a>

                                        <a href="tel:{{ $item->phone }}" class="btn btn-success mr-1 px-1 py-0"><i
                                                class="bi bi-telephone"></i></a>

                                        <a href="mailto:{{ $item->email }}" class="btn btn-danger px-1 py-0"
                                            target="blank"><i class="bi bi-envelope"></i></a>
                                    </div>

                                    <a href="{{ route('students.transfer-class', $item->id) }}"
                                        class="confirm btn btn-outline-primary btn-sm mt-2">
                                        Transfer <i class="far fa-arrow-alt-circle-right ml-1"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Modal for add student -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-default text-dark rounded">
                            <h5 class="modal-title" id="staticBackdropLabel">Create New student</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=" st_id">Student ID</label>
                                        <input class="form-control @error('st_id') is-invalid @enderror" type="text"
                                            name=" st_id" value="{{ old(' st_id') }}">
                                        @error('st_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for=" name">Name</label>
                                        <input class="form-control @error('name') is-invalid @enderror" type="text"
                                            name=" name" value="{{ old(' name') }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=" session">Session</label>
                                        <input class="form-control @error('session') is-invalid @enderror" type="text"
                                            name=" session" value="{{ old(' session') }}">
                                        @error('session')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for=" department">Department</label>
                                        <select name="department" class="form-control">
                                            <option value="Science">Science</option>
                                            <option value="Humanities">Humanities</option>
                                            <option value="Business">Business</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=" fathers_name">Father's name</label>
                                        <input class="form-control @error('fathers_name') is-invalid @enderror"
                                            type="text" name=" fathers_name" value="{{ old(' fathers_name') }}">
                                        @error('fathers_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for=" mothers_name">Mother's name</label>
                                        <input class="form-control @error('mothers_name') is-invalid @enderror"
                                            type="text" name=" mothers_name" value="{{ old(' mothers_name') }}">
                                        @error('mothers_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=" c_class">Current Class</label>
                                        <select name="c_class" class="form-control">
                                            <option value="XI">XI</option>
                                            <option value="XII">XII</option>
                                            <option value="HSC Examinee">HSC Examinee</option>
                                            <option value="Old Student">Old Student</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for=" dob">Date of birth</label>
                                        <input class="form-control @error('dob') is-invalid @enderror" type="date"
                                            name=" dob" value="{{ old(' dob') }}">
                                        @error('dob')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=" gender">Gender</label>
                                        <select name="gender" class="form-control">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for=" phone">Phone</label>
                                        <input class="form-control @error('phone') is-invalid @enderror" type="text"
                                            name=" phone" value="{{ old(' phone') }}">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=" email">Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror" type="email"
                                            name=" email" value="{{ old(' email') }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for=" photo">Photo</label>
                                        <input class="form-control p-1" type="file" name=" photo">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=" present_address">Present address</label>
                                        <input class="form-control @error('present_address') is-invalid @enderror"
                                            type="text" name=" present_address"
                                            value="{{ old(' present_address') }}">
                                        @error('present_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for=" permanent_address">Permanent address</label>
                                        <input class="form-control @error('permanent_address') is-invalid @enderror"
                                            type="text" name=" permanent_address"
                                            value="{{ old(' permanent_address') }}">
                                        @error('permanent_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=" birth_reg_nid">NID / Birth certificate no.</label>
                                        <input class="form-control @error('birth_reg_nid') is-invalid @enderror"
                                            type="text" name=" birth_reg_nid" value="{{ old(' birth_reg_nid') }}">
                                        @error('birth_reg_nid')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for=" ssc_res">SSC GPA</label>
                                        <input class="form-control @error('ssc_res') is-invalid @enderror" type="text"
                                            name=" ssc_res" value="{{ old(' ssc_res') }}">
                                        @error('ssc_res')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=" ssc_board">SSC board</label>
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
                                    <div class="form-group col-md-6">
                                        <label for=" ssc_dept">SSC department</label>
                                        <select name="ssc_dept" class="form-control">
                                            <option value="Science">Science</option>
                                            <option value="Humanities">Humanities</option>
                                            <option value="Business">Business</option>
                                            <option value="Vocational">Vocational</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=" ssc_school">SSC School</label>
                                        <input class="form-control @error('ssc_school') is-invalid @enderror"
                                            type="text" name=" ssc_school" value="{{ old(' ssc_school') }}">
                                        @error('ssc_school')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for=" ssc_year">SSC passing year</label>
                                        <input class="form-control @error('ssc_year') is-invalid @enderror"
                                            type="text" name=" ssc_year" value="{{ old(' ssc_year') }}">
                                        @error('ssc_year')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=" ssc_testimonial">SSC testimonial</label>
                                        <input class="form-control p-1" type="file" name=" ssc_testimonial">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for=" ssc_marksheet">SSC marksheet</label>
                                        <input class="form-control p-1" type="file" name=" ssc_marksheet">
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn">Reset</button>
                                <button type="submit" class="btn  btn-primary">Add student</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
