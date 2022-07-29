@extends('layouts.app')
@section('title')
    Routine |
@endsection
@php
$menu = 'Routine';
@endphp


@section('content')
    <div class="row">

        {{-- Left section started --}}
        <div class="col-lg-3 col-md-3 py-md-4 pt-4 scroll">

            <div class="card mb-4">
                <div class="card-body px-3">
                    <h4 class="card-title text-center">Routines</h4>
                    <hr>
                    <div class="list-group list-group-light" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active px-3 border-0" id="list-xi-list"
                            data-mdb-toggle="list" href="#list-xi" role="tab" aria-controls="list-xi">Class XI</a>
                        <a class="list-group-item list-group-item-action px-3 border-0" id="list-xii-list"
                            data-mdb-toggle="list" href="#list-xii" role="tab" aria-controls="list-xii">Class XII</a>
                    </div>
                </div>
            </div>

            <div class="d-none d-lg-block">
                @include('layouts.includes.leftbar')
            </div>
        </div>
        {{-- Left section ended --}}


        {{-- Center section started --}}
        <div class="col-lg-9 col-md-9 py-md-4 scroll justify-content-md-center d-md-flex">
            <div class="col-lg-11">

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-xi" role="tabpanel" aria-labelledby="list-xi-list">

                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center py-0">

                                <b><i class="fas fa-clock"></i> Routine XI</b>

                                <!-- Tabs navs -->
                                <ul class="nav nav-tabs mt-2" id="xi" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="xi-tab-1" data-mdb-toggle="tab" href="#xi-tabs-1"
                                            role="tab" aria-controls="xi-tabs-1" aria-selected="true">Science</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="xi-tab-2" data-mdb-toggle="tab" href="#xi-tabs-2"
                                            role="tab" aria-controls="xi-tabs-2" aria-selected="false">Humanities</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="xi-tab-3" data-mdb-toggle="tab" href="#xi-tabs-3"
                                            role="tab" aria-controls="xi-tabs-3" aria-selected="false">Business</a>
                                    </li>
                                </ul>
                                <!-- Tabs navs -->

                            </div>
                            <div class="card-body">
                                <!-- Tabs content -->
                                <div class="tab-content" id="xi-content">
                                    <div class="tab-pane fade show active" id="xi-tabs-1" role="tabpanel"
                                        aria-labelledby="xi-tab-1">
                                        @include('user.routine.tables.sc_xi')
                                    </div>
                                    <div class="tab-pane fade" id="xi-tabs-2" role="tabpanel" aria-labelledby="xi-tab-2">
                                        @include('user.routine.tables.hum_xi')
                                    </div>
                                    <div class="tab-pane fade" id="xi-tabs-3" role="tabpanel" aria-labelledby="xi-tab-3">
                                        @include('user.routine.tables.bus_xi')
                                    </div>
                                </div>
                                <!-- Tabs content -->
                            </div>
                        </div>

                    </div>


                    <div class="tab-pane fade" id="list-xii" role="tabpanel" aria-labelledby="list-xii-list">

                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center py-0">

                                <b><i class="fas fa-clock"></i> Routine XII</b>

                                <!-- Tabs navs -->
                                <ul class="nav nav-tabs mt-2" id="xii" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="xii-tab-1" data-mdb-toggle="tab" href="#xii-tabs-1"
                                            role="tab" aria-controls="xii-tabs-1" aria-selected="true">Science</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="xii-tab-2" data-mdb-toggle="tab" href="#xii-tabs-2"
                                            role="tab" aria-controls="xii-tabs-2"
                                            aria-selected="false">Humanities</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="xii-tab-3" data-mdb-toggle="tab" href="#xii-tabs-3"
                                            role="tab" aria-controls="xii-tabs-3" aria-selected="false">Business</a>
                                    </li>
                                </ul>
                                <!-- Tabs navs -->

                            </div>
                            <div class="card-body">
                                <!-- Tabs content -->
                                <div class="tab-content" id="xii-content">
                                    <div class="tab-pane fade show active" id="xii-tabs-1" role="tabpanel"
                                        aria-labelledby="xii-tab-1">
                                        @include('user.routine.tables.sc_xii')
                                    </div>
                                    <div class="tab-pane fade" id="xii-tabs-2" role="tabpanel"
                                        aria-labelledby="xii-tab-2">
                                        @include('user.routine.tables.hum_xii')
                                    </div>
                                    <div class="tab-pane fade" id="xii-tabs-3" role="tabpanel"
                                        aria-labelledby="xii-tab-3">
                                        @include('user.routine.tables.bus_xii')
                                    </div>
                                </div>
                                <!-- Tabs content -->
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
