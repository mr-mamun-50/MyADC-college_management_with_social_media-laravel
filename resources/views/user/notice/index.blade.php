@extends('layouts.app')
@section('title')
    Notice |
@endsection
@php
$menu = 'Notice';
$rightbarImage = 'notice.png';
@endphp

@section('content')
    <div class="row">

        {{-- Left section started --}}
        <div class="d-none d-lg-block col-lg-3 py-md-4 scroll">

            @include('layouts.includes.leftbar')
        </div>
        {{-- Left section ended --}}


        {{-- Center section started --}}
        <div class="col-lg-6 col-md-8 py-md-4 pt-4 scroll justify-content-center d-flex">
            <div class="col-lg-11">

                @foreach ($notice as $item)
                    <div class="card mb-4 border">
                        <div class="card-header py-3 bg-light">
                            <h5 class="card-title mt-1"><i class="bi bi-app-indicator"></i> {{ $item->subject }}</h5>
                        </div>
                        <div class="card-body row">
                            <div class="notice col border-end">
                                <h6>Notice by:</h6>
                                <p class="mb-0"> {{ $item->author }}</p>
                                <p class="text-muted"> {{ $item->author_designation }}</p>
                            </div>
                            <div class="Date col">
                                <h6>Date:</h6>
                                <p class="mb-0"> {{ date('d F, Y | h:i A', strtotime($item->post_date)) }}</p>
                            </div>
                        </div>
                        <div class="card-footer text-center  py-3">
                            {{-- <div class="btn-grad-primary"><i class="far fa-eye"></i> View</div> --}}
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-info btn-rounded bg-gradient "
                                data-bs-toggle="modal" data-bs-target="{{ '#staticBackdrop' . $item->id }}">
                                <i class="fas fa-eye"></i> View Notice
                            </button>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="{{ 'staticBackdrop' . $item->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1"
                        aria-labelledby="{{ 'staticBackdrop' . $item->id . 'Label' }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-info-circle"></i>
                                        Notice
                                        Details
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="p-3 p-lg-4 bg-light">
                                        <div class="container">
                                            <h1 class="display-5 text-primary">{{ $item->subject }}</h1>
                                            <hr class="my-2">
                                            <p class="text-justify">@php
                                                echo $item->description;
                                            @endphp
                                            <div class="text-end mt-5">
                                                <b>{{ $item->author }}</b> <br>
                                                {{ $item->author_designation }}
                                            </div>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger bg-gradient btn-sm"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- pagination --}}
                {{ $notice->links('pagination::bootstrap-5') }}
            </div>
        </div>
        {{-- Center section ended --}}


        {{-- Right section starts --}}
        <div class="col-lg-3 col-md-4 py-md-4 pt-4 scroll">

            @include('layouts.includes.rightbar')

        </div>
        {{-- Right section ended --}}

    </div>
@endsection
