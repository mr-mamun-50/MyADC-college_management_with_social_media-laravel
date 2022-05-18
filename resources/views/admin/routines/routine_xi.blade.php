@extends('admin.layouts.app')
@section('title')
    Routines
@endsection
<?php $menu = 'Routine';
$submenu = 'Routine_xi'; ?>

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <b>Routine XI</b>

                    <nav>
                        <div class="nav nav-pills" id="nav-tab" role="tablist">
                            <a class="nav-link active py-1" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                                aria-controls="nav-home" aria-selected="true">Science</a>
                            <a class="nav-link py-1" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                                aria-controls="nav-profile" aria-selected="false">Humanities</a>
                            <a class="nav-link py-1" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                                aria-controls="nav-contact" aria-selected="false">Business</a>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="card-body">

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        @include('admin.routines.tables.sc_xi')</div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        @include('admin.routines.tables.hum_xi')</div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        @include('admin.routines.tables.bus_xi')</div>
                </div>

            </div>

        </div>
    </div>
@endsection
