@extends('admin.layouts.app')
@section('title')
    Admission
@endsection
<?php $menu = 'Admission';
$submenu = 'Manage_admission'; ?>

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <b>Manage admission</b>
                    <!-- Button trigger modal -->
                    {{-- <button type="button" class="btn  btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                        <i class="fas fa-plus"></i> Add student
                    </button> --}}
                </div>
            </div>
            <div class="card-body table-responsive">

                <table class="table table-bordered table-striped" id="example1">
                    <thead>
                        <tr>
                            <th>Security code</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>SSC Group</th>
                            <th>Applied Group</th>
                            <th>SSC GPA</th>
                            <th>SSC School</th>
                            <th>More</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($student as $item)
                            <tr>
                                <td>{{ $item->security_code }}</td>
                                <td><img class="img-fluid" src="{{ asset('images/students' . '/' . $item->photo) }}"
                                        alt="Photo" style="width: 80px"></td>

                                <td>{{ $item->name }}</td>
                                <td>{{ $item->ssc_dept }}</td>
                                <td>{{ $item->appl_dept }}</td>
                                <td>{{ $item->ssc_res }}</td>
                                <td>{{ $item->ssc_school }}</td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('admission.show', $item->id) }}"
                                            class="btn btn-info mr-1 px-1 py-0"><i class="bi bi-person"></i></a>

                                        <a href="tel:{{ $item->phone }}" class="btn btn-success mr-1 px-1 py-0"><i
                                                class="bi bi-telephone"></i></a>

                                        <a href="mailto:{{ $item->email }}" class="btn btn-danger px-1 py-0"
                                            target="blank"><i class="bi bi-envelope"></i></a>
                                    </div>
                                    <a href="{{ route('admin.admission.confirmation', $item->id) }}"
                                        class="confirm btn btn-outline-primary btn-sm mt-2"><i class="fas fa-user-plus"></i>
                                        Confirm</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>
@endsection
