@extends('admin.layouts.app')
@section('title')
    Admission security code
@endsection
<?php $menu = 'Admission';
$submenu = 'Security_code'; ?>

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <b><i class="bi bi-shield-shaded"></i> Manage admission security code</b>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn  btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                        <i class="fas fa-plus"></i> Enter security code
                    </button>
                </div>
            </div>
            <div class="card-body table-responsive">

                <table class="table table-bordered table-striped" id="example1">
                    <thead>
                        <tr>
                            <th>SSC roll</th>
                            <th>SSC reg.</th>
                            <th>Name</th>
                            <th>Security code</th>
                            <th>Transection ID</th>
                            <th>Admission status</th>
                            <th>More</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->ssc_roll }}</td>
                                <td>{{ $item->ssc_reg }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->security_code }}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    {{ $item->payment_transection }}
                                    <button type="button" class="btn text-primary" data-toggle="modal"
                                        data-target="{{ '#update_trsc' . $item->id }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                </td>
                                <td class="text-center">
                                    @php
                                        $admCheck = DB::table('new_admitted_students')
                                            ->where('security_code', $item->security_code)
                                            ->first();
                                    @endphp
                                    @if ($admCheck)
                                        <i class="fas fa-check-circle fa-lg text-success"></i>
                                    @else
                                        <i class="fas fa-times-circle fa-lg text-danger"></i>
                                    @endif
                                </td>

                                <td class="d-flex justify-content-center">
                                    <form action="{{ route('security_code.destroy', $item->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger delete px-1 py-0"><i
                                                class="bi bi-trash"></i></button>
                                    </form>
                                </td>

                                <!-- Modal for Update Transaction -->
                                <div class="modal fade" id="{{ 'update_trsc' . $item->id }}" data-backdrop="static"
                                    data-keyboard="false" tabindex="-1"
                                    aria-labelledby="{{ 'update_trsc' . $item->id . 'Label' }}" aria-hidden="true">

                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-default text-dark rounded">
                                                <h5 class="modal-title" id="{{ 'update_trsc' . $item->id . 'Label' }}">
                                                    {{ $item->name }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form action="{{ route('security_code.update', $item->id) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="put">
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <label for="payment_transection">Rocket Transaction no.</label>
                                                        <input
                                                            class="form-control @error('payment_transection') is-invalid @enderror"
                                                            type="text" name="payment_transection"
                                                            value="{{ $item->payment_transection }}">
                                                        @error('payment_transection')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn  btn-primary">Update
                                                        Transaction</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Modal for add sec. code -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-default text-dark rounded">
                            <h5 class="modal-title" id="staticBackdropLabel">Add security info</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="{{ route('security_code.store') }}" method="post">
                            @csrf
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                        name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="ssc_roll">SSC roll</label>
                                        <input class="form-control @error('ssc_roll') is-invalid @enderror" type="text"
                                            name="ssc_roll" value="{{ old('ssc_roll') }}">
                                        @error('ssc_roll')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="ssc_reg">SSC reg. no</label>
                                        <input class="form-control @error('ssc_reg') is-invalid @enderror" type="text"
                                            name="ssc_reg" value="{{ old('ssc_reg') }}">
                                        @error('ssc_reg')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="security_code">Security code</label>
                                    <input class="form-control @error('security_code') is-invalid @enderror"
                                        type="text" name="security_code" value="{{ old('security_code') }}">
                                    @error('security_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn">Reset</button>
                                <button type="submit" class="btn  btn-primary">Submit Entry</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
