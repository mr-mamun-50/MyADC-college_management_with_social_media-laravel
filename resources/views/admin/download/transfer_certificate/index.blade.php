@extends('admin.layouts.app')
@section('title')
    Transfer Certificate
@endsection
<?php $menu = 'Download';
$submenu = 'Transfer_Certificate'; ?>

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <b>Transfer Certificate form</b>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.download.tc.generate') }}" method="post" target="blank">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Group</label>
                                <select name="group" id="" class="form-control" required>
                                    <option disabled selected>choose group</option>
                                    <option value="Science">Science</option>
                                    <option value="Humanities">Humanities</option>
                                    <option value="Business Studies">Business Studies</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Father's name</label>
                                <input type="text" class="form-control" name="fathers_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Mother's name</label>
                                <input type="text" class="form-control" name="mothers_name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Passed class</label>
                                <input type="text" class="form-control p-1" name="class" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Roll</label>
                                <input type="text" class="form-control" name="roll" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Session</label>
                                <input type="text" class="form-control" name="session" placeholder="e.g. 2017-2018"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Dues clear month</label>
                                <input type="text" class="form-control p-1" name="due" required
                                    placeholder="e.g. June-2017">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Date of issue</label>
                                <input type="date" class="form-control p-1" name="date" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">Generate TC</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
@endsection
