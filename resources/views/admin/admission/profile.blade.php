@extends('admin.layouts.app')
@section('title')
    {{ $student->name }}
@endsection
<?php $menu = 'Admission';
$submenu = 'Manage_admission'; ?>

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                src="{{ asset('images/students') . '/' . $student->photo }}" alt="profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ $student->name }}</h3>
                        <p class="text-muted text-center"><i class="bi bi-telephone"></i> <a
                                href="tel:{{ $student->phone }}">{{ $student->phone }}</a>
                        </p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Security code</b> <a class="float-right">{{ $student->security_code }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Admission date</b> <a
                                    class="float-right">{{ date('d F, Y', strtotime($student->admission_date)) }} </a>
                            </li>
                            <li class="list-group-item">
                                <b>Payment transaction</b> <a class="float-right">{{ $student->payment_transection }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Applied Group</b> <a class="float-right">{{ $student->appl_dept }}</a>
                            </li>
                        </ul>

                        <a href="mailto:{{ $student->email }}" class="btn btn-primary btn-block" target="blank"><i
                                class="bi bi-envelope"></i> <b>Send Mail</b></a>
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
                                        <b>Date of birth</b> <a class="float-right">{{ $student->dob }}</a>
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
                                                        <a href="{{ asset('images/testimonials/ssc') . '/' . $student->ssc_testimonial }}"
                                                            class="btn btn-sm btn-info" target="blank">Testimonial</a>
                                                        <a href="{{ asset('images/marksheets') . '/' . $student->ssc_marksheet }}"
                                                            class="btn btn-sm btn-info" target="blank">Marksheet</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="text-center mt-4">
                                    <a href="{{ route('admin.admission.confirmation', $student->id) }}"
                                        class="btn btn-outline-primary btn-block confirm"><i
                                            class="fas fa-user-plus mr-1"></i>
                                        Confirm Admission</a>
                                </div>
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
