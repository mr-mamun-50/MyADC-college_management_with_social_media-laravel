@extends('admin.layouts.app')
@section('title')
    {{ $student->name }}
@endsection
<?php $menu = 'Students';
$submenu = 'Profile'; ?>

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                src="{{ asset('public/images/students') . '/' . $student->photo }}" alt="profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ $student->name }}</h3>
                        <p class="text-muted text-center"><i class="bi bi-telephone"></i> <a
                                href="tel:{{ $student->phone }}">{{ $student->phone }}</a>
                        </p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>ID</b> <a class="float-right">{{ $student->st_id }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Class</b> <a class="float-right">{{ $student->c_class }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Group</b> <a class="float-right">{{ $student->department }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Session</b> <a class="float-right">{{ $student->session }}</a>
                            </li>
                        </ul>

                        <a href="{{ route('admin.students.idcard.generate', $student->id) }}"
                            class="btn btn-primary btn-block" target="blank"><i class="bi bi-person-badge"></i>
                            Generate ID Card</a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header attachment-block p-3">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#information" data-toggle="tab"><i
                                        class="bi bi-info-square"></i> Details</a></li>
                            <li class="nav-item"><a class="nav-link" href="#edit" data-toggle="tab"><i
                                        class="bi bi-pencil-square"></i> Edit</a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body pt-1">
                        <div class="tab-content">
                            <div class="active tab-pane" id="information">
                                <!-- Post -->
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item border-top-0">
                                        <b>Father's name</b> <a class="float-right">{{ $student->fathers_name }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Mother's name</b> <a class="float-right">{{ $student->mothers_name }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Gender</b> <a class="float-right">{{ $student->gender }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Date of birth</b> <a
                                            class="float-right">{{ date('d F, Y', strtotime($student->dob)) }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Present address</b> <a class="float-right">{{ $student->present_address }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Permanent address</b> <a
                                            class="float-right">{{ $student->permanent_address }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>NID / Birth certificate no.</b> <a
                                            class="float-right">{{ $student->birth_reg_nid }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="float-right">{{ $student->email }}</a>
                                    </li>
                                </ul>

                                <div class="card">
                                    <div class="card-header attachment-block p-3">
                                        <b>SSC information</b>
                                    </div>
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>GPA</th>
                                                    <th>Board</th>
                                                    <th>Group</th>
                                                    <th>Year</th>
                                                    <th>School</th>
                                                    <th>Evidence</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $student->ssc_res }}</td>
                                                    <td>{{ $student->ssc_board }}</td>
                                                    <td>{{ $student->ssc_dept }}</td>
                                                    <td>{{ $student->ssc_year }}</td>
                                                    <td>{{ $student->ssc_school }}</td>
                                                    <td>
                                                        <a href="{{ asset('public/images/testimonials/ssc') . '/' . $student->ssc_testimonial }}"
                                                            class="btn btn-sm btn-info" target="blank">Testimonial</a>
                                                        <a href="{{ asset('public/images/marksheets') . '/' . $student->ssc_marksheet }}"
                                                            class="btn btn-sm btn-info" target="blank">Marksheet</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="edit">

                                <div class="d-flex justify-content-end">
                                    <form action="{{ route('students.destroy', $student->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-outline-danger btn-sm py-1 mb-2 delete"><i
                                                class="bi bi-trash"></i> Delete</button>
                                    </form>
                                </div>

                                <form action="{{ route('students.update', $student->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="_method" value="put">

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=" st_id">Student ID</label>
                                            <input class="form-control @error('st_id') is-invalid @enderror" type="text"
                                                name=" st_id" value="{{ $student->st_id }}">
                                            @error('st_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for=" name">Name</label>
                                            <input class="form-control @error('name') is-invalid @enderror" type="text"
                                                name=" name" value="{{ $student->name }}">
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
                                            <input class="form-control @error('session') is-invalid @enderror"
                                                type="text" name=" session" value="{{ $student->session }}">
                                            @error('session')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for=" department">Department</label>
                                            <select name="department" class="form-control">
                                                <option value="Science" @if ($student->department == 'Science') selected @endif>
                                                    Science</option>
                                                <option value="Humanities"
                                                    @if ($student->department == 'Humanities') selected @endif>Humanities</option>
                                                <option value="Business" @if ($student->department == 'Business') selected @endif>
                                                    Business</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=" fathers_name">Father's name</label>
                                            <input class="form-control @error('fathers_name') is-invalid @enderror"
                                                type="text" name=" fathers_name"
                                                value="{{ $student->fathers_name }}">
                                            @error('fathers_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=" mothers_name">Mother's name</label>
                                            <input class="form-control @error('mothers_name') is-invalid @enderror"
                                                type="text" name=" mothers_name"
                                                value="{{ $student->mothers_name }}">
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
                                                <option value="XI" @if ($student->c_class == 'XI') selected @endif>XI
                                                </option>
                                                <option value="XII" @if ($student->c_class == 'XII') selected @endif>
                                                    XII
                                                </option>
                                                <option value="HSC_Examinee"
                                                    @if ($student->c_class == 'HSC_Examinee') selected @endif>HSC Examinee</option>
                                                <option value="Old_Student"
                                                    @if ($student->c_class == 'Old_Student') selected @endif>Old Student</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=" dob">Date of birth</label>
                                            <input class="form-control @error('dob') is-invalid @enderror" type="date"
                                                name=" dob" value="{{ $student->dob }}">
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
                                                <option value="Male" @if ($student->gender == 'Male') selected @endif>
                                                    Male
                                                </option>
                                                <option value="Female" @if ($student->gender == 'Female') selected @endif>
                                                    Female</option>
                                                <option value="Other" @if ($student->gender == 'Other') selected @endif>
                                                    Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=" phone">Phone</label>
                                            <input class="form-control @error('phone') is-invalid @enderror"
                                                type="text" name=" phone" value="{{ $student->phone }}">
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
                                            <input class="form-control @error('email') is-invalid @enderror"
                                                type="email" name=" email" value="{{ $student->email }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=" photo">Photo</label>
                                            <input class="form-control p-1" type="file" name="photo">
                                            <input type="hidden" name="old_photo" value="{{ $student->photo }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=" present_address">Present address</label>
                                            <input class="form-control @error('present_address') is-invalid @enderror"
                                                type="text" name=" present_address"
                                                value="{{ $student->present_address }}">
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
                                                value="{{ $student->permanent_address }}">
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
                                                type="text" name=" birth_reg_nid"
                                                value="{{ $student->birth_reg_nid }}">
                                            @error('birth_reg_nid')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=" ssc_res">SSC GPA</label>
                                            <input class="form-control @error('ssc_res') is-invalid @enderror"
                                                type="text" name=" ssc_res" value="{{ $student->ssc_res }}">
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
                                                <option value="Sylhet" @if ($student->ssc_board == 'Sylhet') selected @endif>
                                                    Sylhet</option>
                                                <option value="Dhaka" @if ($student->ssc_board == 'Dhaka') selected @endif>
                                                    Dhaka</option>
                                                <option value="Rajshahi"
                                                    @if ($student->ssc_board == 'Rajshahi') selected @endif>Rajshahi</option>
                                                <option value="Chittagong"
                                                    @if ($student->ssc_board == 'Chittagong') selected @endif>Chittagong</option>
                                                <option value="Comilla"
                                                    @if ($student->ssc_board == 'Comilla') selected @endif>
                                                    Comilla</option>
                                                <option value="Dinajpur"
                                                    @if ($student->ssc_board == 'Dinajpur') selected @endif>Dinajpur</option>
                                                <option value="Jessore"
                                                    @if ($student->ssc_board == 'Jessore') selected @endif>
                                                    Jessore</option>
                                                <option value="Barisal"
                                                    @if ($student->ssc_board == 'Barisal') selected @endif>
                                                    Barisal</option>
                                                <option value="Mymensingh"
                                                    @if ($student->ssc_board == 'Mymensingh') selected @endif>Mymensingh</option>
                                                <option value="Madrasah"
                                                    @if ($student->ssc_board == 'Madrasah') selected @endif>Madrasah</option>
                                                <option value="Technical"
                                                    @if ($student->ssc_board == 'Technical') selected @endif>Technical</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=" ssc_dept">SSC department</label>
                                            <select name="ssc_dept" class="form-control">
                                                <option value="Science"
                                                    @if ($student->ssc_dept == 'Science') selected @endif>
                                                    Science</option>
                                                <option value="Humanities"
                                                    @if ($student->ssc_dept == 'Humanities') selected @endif>Humanities</option>
                                                <option value="Business"
                                                    @if ($student->ssc_dept == 'Business') selected @endif>Business</option>
                                                <option value="Vocational"
                                                    @if ($student->ssc_dept == 'Vocational') selected @endif>Vocational</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=" ssc_school">SSC School</label>
                                            <input class="form-control @error('ssc_school') is-invalid @enderror"
                                                type="text" name=" ssc_school" value="{{ $student->ssc_school }}">
                                            @error('ssc_school')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=" ssc_year">SSC passing year</label>
                                            <input class="form-control @error('ssc_year') is-invalid @enderror"
                                                type="text" name="ssc_year" value="{{ $student->ssc_year }}">
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
                                            <input class="form-control p-1" type="file" name="ssc_testimonial">
                                            <input type="hidden" name="old_ssc_testimonial"
                                                value="{{ $student->ssc_testimonial }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="ssc_marksheet">SSC marksheet</label>
                                            <input class="form-control p-1" type="file" name="ssc_marksheet">
                                            <input type="hidden" name="old_ssc_marksheet"
                                                value="{{ $student->ssc_marksheet }}">
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end mt-2">
                                        <button type="submit" class="btn  btn-primary"><i
                                                class="bi bi-check2-square"></i>
                                            Update info</button>
                                    </div>
                                </form>

                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
