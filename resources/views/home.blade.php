@extends('layouts.app')
@section('title')
    Home
@endsection
@php
$menu = 'Home';
@endphp



@section('left_content')
    <div class="card text-start">
        <div class="card-body">
            <h4 class="card-title text-center">Admission</h4>
            <hr>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, beatae.</p>

            <a href="{{ route('admission.procedure') }}" class="btn btn-primary bg-gradient btn-block">Admission
                Procedure</a>
        </div>
    </div>
@endsection

@section('center_content')
    <div class="card text-start">
        <div class="card-body p-3">

            <div class="d-flex">
                <img src="@if (Auth::user()->user_image) {{ asset('public/images/users') . '/' . Auth::user()->user_image }} @else {{ asset('public/images/asset_img/user-icon.png') }} @endif"
                    alt="" class="rounded-circle" style="width: 50px">
                <div class="w-100 ms-2"><a data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                        class="btn btn-light btn-block shadow-0 btn-rounded text-start d-flex align-items-center post_btn">
                        Whats on your mind, {{ Auth::user()->name }}?</a></div>
            </div>
            <hr>
            <div class="d-flex justify-content-around">
                <a data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                    class="btn btn-link text-dark w-50 shadow-0 py-1"><i class="fas fa-image text-success"></i> Photo</a>
                <a data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                    class="btn btn-link text-dark w-50 shadow-0 py-1"><i class="fas fa-video text-danger"></i> Video</a>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>


    <div class="card my-4">
        <img src="https://www.paymentsjournal.com/wp-content/uploads/2019/11/904-scaled.jpg" class="card-img-top"
            alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <h6 class="card-subtitle mb-2 text-muted ">Card subtitle</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
            b5
        </div>
    </div>
@endsection

@section('right_content')
    <div class="card text-start">
        <div class="card-body">
            <h4 class="card-title">Title</h4>
            <p class="card-text">Body</p>
        </div>
    </div>
@endsection




{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
