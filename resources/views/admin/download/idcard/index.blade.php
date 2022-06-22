@extends('admin.layouts.app')
@section('title')
    ID Card
@endsection
<?php $menu = 'Download';
$submenu = 'ID_Card'; ?>

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <b>ID Card form</b>

                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.students.idcard.download', 1) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="full name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Studend ID</label>
                                <input type="text" class="form-control" name="s_id" id="s_id"
                                    placeholder="student id (e.g. 2017-0038)">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Session</label>
                                <input type="text" class="form-control" name="session" id="session"
                                    placeholder="session (e.g. 2017-2018)">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Group</label>
                                <select name="group" id="" class="form-control">
                                    <option disabled selected>choose group</option>
                                    <option value="Science">Science</option>
                                    <option value="Humanities">Humanities</option>
                                    <option value="Business">Business</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone"
                                    placeholder="valid contact number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Photo</label>
                                <input type="file" class="form-control p-1" name="photo" id="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">Generate ID Card</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
@endsection
