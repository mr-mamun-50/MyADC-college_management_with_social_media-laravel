@extends('admin.layouts.app')
@section('title')
    {{ $teacher->name }}
@endsection
<?php $menu = 'Teachers';
$submenu = $teacher->department; ?>

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            @if ($teacher->photo)
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('images/teachers') . '/' . $teacher->photo }}" alt="profile picture">
                            @else
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('images/asset_img/user-icon.png') }}" alt="profile picture">
                            @endif
                        </div>

                        <h3 class="profile-username text-center">{{ $teacher->name }}</h3>
                        <p class="text-muted text-center"> {{ $teacher->position }}
                        </p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Index</b> <a class="float-right">{{ $teacher->index }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Department</b> <a class="float-right">{{ $teacher->department }}</a>
                            </li>
                            </li>
                            <li class="list-group-item">
                                <b>Subject</b> <a class="float-right">{{ $teacher->subject }}</a>
                            </li>
                        </ul>

                        <a href="{{ route('admin.teachers.idcard.generate', $teacher->id) }}"
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
                                        <b>Father's name</b> <a class="float-right">{{ $teacher->fathers_name }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Mother's name</b> <a class="float-right">{{ $teacher->mothers_name }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Gender</b> <a class="float-right">{{ $teacher->gender }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Date of birth</b> <a
                                            class="float-right">{{ date('d F, Y', strtotime($teacher->dob)) }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Present address</b> <a class="float-right">{{ $teacher->present_address }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Permanent address</b> <a
                                            class="float-right">{{ $teacher->permanent_address }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>NID</b> <a class="float-right">{{ $teacher->nid }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Phone</b> <a class="float-right">{{ $teacher->phone }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="float-right">{{ $teacher->email }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Salary</b> <a class="float-right">{{ $teacher->salary }}</a>
                                    </li>
                                </ul>

                                <div class="card">
                                    <div class="card-header attachment-block p-3">
                                        <b>Qualifications</b>
                                    </div>
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Educational Qualification</th>
                                                    <th>Certificate</th>
                                                    <th>CV</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $teacher->edu_qualification }}</td>
                                                    <td>
                                                        <a href="{{ asset('images/teachers/certificate') . '/' . $teacher->edu_certificate }}"
                                                            class="" target="blank">
                                                            <img class="img-fluid"
                                                                src="{{ asset('images/teachers/certificate' . '/' . $teacher->edu_certificate) }}"
                                                                alt="certificate" style="width: 100px"></a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ asset('images/teachers/cv') . '/' . $teacher->cv }}"
                                                            class="" target="blank">
                                                            <i class="bi bi-filetype-pdf text-danger"
                                                                style="font-size: 50px; font-weight:bolder"></i></a>
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
                                    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-outline-danger btn-sm py-1 mb-2 delete"><i
                                                class="bi bi-trash"></i> Delete</button>
                                    </form>
                                </div>

                                <form action="{{ route('teachers.update', $teacher->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="_method" value="put">

                                    <div class="form-group">
                                        <label for=" name">Name</label>
                                        <input class="form-control" type="text" name=" name"
                                            value="{{ $teacher->name }}">
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=" index">Teacher index</label>
                                            <input class="form-control" type="text" name="index"
                                                value="{{ $teacher->index }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="position">Position</label>
                                            <input class="form-control" type="text" name="position"
                                                value="{{ $teacher->position }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="department">Department</label>
                                            <select name="department" class="form-control" required>
                                                <option value="Science" @if ($teacher->department == 'Science') selected @endif>
                                                    Science</option>
                                                <option value="Humanities"
                                                    @if ($teacher->department == 'Humanities') selected @endif>Humanities</option>
                                                <option value="Business Studies"
                                                    @if ($teacher->department == 'Business Studies') selected @endif>Business Studies
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="subject">Subject</label>
                                            <input class="form-control" type="text" name="subject"
                                                value="{{ $teacher->subject }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=" fathers_name">Father's name</label>
                                            <input class="form-control" type="text" name=" fathers_name"
                                                value="{{ $teacher->fathers_name }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=" mothers_name">Mother's name</label>
                                            <input class="form-control" type="text" name=" mothers_name"
                                                value="{{ $teacher->mothers_name }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=" gender">Gender</label>
                                            <select name="gender" class="form-control" required>
                                                <option value="Male" @if ($teacher->gender == 'Male') selected @endif>
                                                    Male</option>
                                                <option value="Female" @if ($teacher->gender == 'Female') selected @endif>
                                                    Female</option>
                                                <option value="Other" @if ($teacher->gender == 'Other') selected @endif>
                                                    Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=" dob">Date of birth</label>
                                            <input class="form-control" type="date" name=" dob"
                                                value="{{ $teacher->dob }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=" photo">Photo <small>(.jpg/.jpeg/.png)</small></label>
                                            <input class="form-control p-1" type="file" name="photo">
                                            <input type="hidden" name="old_photo" value="{{ $teacher->photo }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="nid">NID</label>
                                            <input class="form-control" type="text" name="nid"
                                                value="{{ $teacher->nid }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=" phone">Phone</label>
                                            <input class="form-control" type="text" name=" phone"
                                                value="{{ $teacher->phone }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for=" email">Email</label>
                                            <input class="form-control" type="email" name=" email"
                                                value="{{ $teacher->email }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=" present_address">Present address</label>
                                            <input class="form-control" type="text" name=" present_address"
                                                value="{{ $teacher->present_address }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=" permanent_address">Permanent address</label>
                                            <input class="form-control" type="text" name=" permanent_address"
                                                value="{{ $teacher->permanent_address }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="edu_qualification">Educational qualification</label>
                                            <input class="form-control" type="text" name="edu_qualification"
                                                value="{{ $teacher->edu_qualification }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="salary">Salary</label>
                                            <input class="form-control" type="text" name="salary"
                                                value="{{ $teacher->salary }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="edu_certificate">Highest academic certificate
                                                <small>(.jpg/.jpeg/.png)</small></label>
                                            <input class="form-control p-1" type="file" name="edu_certificate">
                                            <input type="hidden" name="old_edu_certificate"
                                                value="{{ $teacher->edu_certificate }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="cv">CV <small>(.pdf)</small></label>
                                            <input class="form-control p-1" type="file" name="cv">
                                            <input type="hidden" name="old_cv" value="{{ $teacher->cv }}">
                                        </div>
                                    </div>

                                    <div class="text-right form-group">
                                        <button type="submit" class="btn  btn-primary">Update info</button>
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
