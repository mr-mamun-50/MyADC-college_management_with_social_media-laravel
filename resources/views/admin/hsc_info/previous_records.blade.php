@extends('admin.layouts.app')
@section('title')
    HSC Information
@endsection
<?php $menu = 'HSC_exam';
$submenu = 'Previous_records'; ?>

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <b>HSC Examinee</b>
                </div>
            </div>
            <div class="card-body table-responsive">

                <table class="table table-bordered table-striped" id="example1">
                    <thead>
                        <tr>
                            <th>HSC Roll</th>
                            <th>HSC Reg.</th>
                            <th>Name</th>
                            <th>Student ID</th>
                            <th>Result</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $item)
                            <tr>
                                <td>{{ $item->hsc_roll }}</td>
                                <td>{{ $item->hsc_reg }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->st_id }}</td>
                                <td>
                                    GPA: <b>{{ $item->result }}</b> <br>
                                    Grade: <b>
                                        @if ($item->result == 5)
                                            A+
                                        @elseif ($item->result >= 4)
                                            A
                                        @elseif ($item->result >= 3.5)
                                            A-
                                        @elseif ($item->result >= 3)
                                            B
                                        @elseif ($item->result >= 2)
                                            C
                                        @elseif ($item->result >= 1)
                                            D
                                        @elseif ($item->result == '0')
                                            F
                                        @endif
                                    </b>
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#{{ 'addResult' . $item->id }}"><i class="fas fa-edit"></i>
                                        Update</button>
                                </td>
                            </tr>


                            <!-- Update hsc result Modal -->
                            <div class="modal fade" id="{{ 'addResult' . $item->id }}" data-backdrop="static"
                                data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Update HSC Information</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('hsc.update', $item->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="put">

                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="">GPA of Result <small class="text-muted">(If failed
                                                            put '0')</small></label>
                                                    <input type="text" class="form-control" name="result"
                                                        value="{{ $item->result }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">HSC Year</label>
                                                    <select name="year" class="form-control">
                                                        <option value="{{ date('Y') - 2 }}"
                                                            @if ($item->year == date('Y') - 2) selected @endif>
                                                            {{ date('Y') - 2 }}</option>
                                                        <option value="{{ date('Y') - 1 }}"
                                                            @if ($item->year == date('Y') - 1) selected @endif>
                                                            {{ date('Y') - 1 }}</option>
                                                        <option value="{{ date('Y') }}"
                                                            @if ($item->year == date('Y')) selected @endif>
                                                            {{ date('Y') }}</option>
                                                        <option value="{{ date('Y') + 1 }}"
                                                            @if ($item->year == date('Y') + 1) selected @endif>
                                                            {{ date('Y') + 1 }}</option>
                                                        <option value="{{ date('Y') + 2 }}"
                                                            @if ($item->year == date('Y') + 2) selected @endif>
                                                            {{ date('Y') + 2 }}</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="">HSC Roll</label>
                                                    <input type="text" class="form-control" name="hsc_roll"
                                                        value="{{ $item->hsc_roll }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="">HSC Reg.</label>
                                                    <input type="text" class="form-control" name="hsc_reg"
                                                        value="{{ $item->hsc_reg }}">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Update Info</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>




        </div>
    </div>
@endsection
