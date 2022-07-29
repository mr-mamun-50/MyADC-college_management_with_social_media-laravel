@extends('layouts.app')
@section('title')
    Teachers & Students info |
@endsection
@php
$menu = 't_s_info';
@endphp


@section('content')
    <div class="row">

        {{-- Left section started --}}
        <div class="col-lg-3 col-md-3 py-md-4 pt-4 scroll">

            <div class="card mb-4">
                <div class="card-body px-3">
                    <h4 class="card-title text-center">Teaches & Students</h4>
                    <hr>
                    <div class="list-group list-group-light" id="list-tab" role="tablist">

                        <a class="list-group-item list-group-item-action active px-3 border-0" id="list-teacher-list"
                            data-mdb-toggle="list" href="#list-teacher" role="tab"
                            aria-controls="list-teacher">Teachers</a>

                        <a class="list-group-item list-group-item-action px-3 border-0" id="list-student-list"
                            data-mdb-toggle="list" href="#list-student" role="tab"
                            aria-controls="list-student">Students</a>
                    </div>
                </div>
            </div>

            <div class="d-none d-lg-block">
                @include('layouts.includes.leftbar')
            </div>
        </div>
        {{-- Left section ended --}}


        {{-- Center section started --}}
        <div class="col-md-9 py-md-4 scroll justify-content-md-center d-md-flex">
            <div class="col-lg-11">

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-teacher" role="tabpanel"
                        aria-labelledby="list-teacher-list">

                        <div class="card">
                            <div class="card-header">
                                <h5>Teachers information</h5>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="tcr_info_table" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Department</th>
                                            <th>Subject</th>
                                            <th>Contact</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($teacher as $item)
                                            <tr>
                                                <th>{{ $item->name }}</th>
                                                <td>{{ $item->position }}</td>
                                                <td>{{ $item->department }}</td>
                                                <td>{{ $item->subject }}</td>
                                                <td class="d-flex justify-content-center">
                                                    <a class="btn btn-success px-1 py-0 mx-1 shadow-0"
                                                        href="tel:{{ $item->phone }}"><i class="fas fa-phone"></i></a>
                                                    <a class="btn btn-danger px-1 py-0 mx-1 shadow-0"
                                                        href="mailto:{{ $item->email }}"><i
                                                            class="fas fa-envelope"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>


                    <div class="tab-pane fade" id="list-student" role="tabpanel" aria-labelledby="list-student-list">

                        <div class="card">
                            <div class="card-header">
                                <h5>Students information</h5>
                            </div>
                            <div class="card-body">
                                <table id="st_info_table" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Session</th>
                                            <th>Student ID</th>
                                            <th>Department</th>
                                            <th>Mail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($student as $item)
                                            <tr>
                                                <th>{{ $item->name }}</th>
                                                <td>{{ $item->session }}</td>
                                                <td>{{ $item->st_id }}</td>
                                                <td>{{ $item->department }}</td>
                                                <td class="text-center"><a class="btn btn-danger px-1 py-0"
                                                        href="mailto:{{ $item->email }}"><i
                                                            class="fas fa-envelope"></i></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            {{-- Center section ended --}}


            {{-- Right section starts --}}
            {{-- <div class="col-lg-3 col-md-4 py-md-4 pt-4 scroll">

            @include('layouts.includes.rightbar')

            </div> --}}
            {{-- Right section ended --}}

        </div>
    @endsection
