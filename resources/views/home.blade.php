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
    {{-- whats on your mind --}}
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

    <!-- Create post Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-plus-circle"></i> Create Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">
                        <!-- Message input -->
                        <div class="form-outline mb-4">
                            <textarea class="form-control" id="form4Example3" rows="4" name="post_text"></textarea>
                            <label class="form-label" for="form4Example3">Whats on your mind,
                                {{ Auth::user()->name }}?</label>
                        </div>
                        <div class="input-group ">
                            <span class="input-group-text"><i class="bi bi-image text-success"></i></span>
                            <input type="file" class="form-control" name="image" id="image" />
                        </div>
                        <div class="text-center my-2">or,</div>
                        <div class="input-group ">
                            <span class="input-group-text"><i class="fas fa-video text-danger"></i></span>
                            <input type="file" class="form-control" name="video" id="video" />
                        </div>

                        <select class="form-select form-select-sm mt-3 w-25" name="visibility">
                            <option value="1">&#127758; Public</option>
                            <option value="0">&#128274; Only me</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary bg-gradient btn-block ">Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- view posts --}}
    @foreach ($posts as $item)
        @php
            $like = DB::table('post_likes')
                ->where('post_id', $item->id)
                ->get();
            $liker_user = DB::table('post_likes')
                ->where('post_id', $item->id)
                ->where('user_id', Auth::user()->id)
                ->first();
            $comments = DB::table('post_comments')
                ->leftjoin('users', 'post_comments.user_id', '=', 'users.id')
                ->select('post_comments.*', 'users.name', 'users.user_image')
                ->where('post_id', $item->id)
                ->orderBy('id', 'desc')
                ->get();
        @endphp

        <div class="card my-4" id="{{ 'post' . $item->id }}">
            <div class="card-header d-flex">
                <img src="@if ($item->user_image) {{ asset('public/images/users') . '/' . $item->user_image }} @else {{ asset('public/images/asset_img/user-icon.png') }} @endif"
                    alt="" class="rounded-circle" style="width: 50px; height:50px">
                <div class="ms-3">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-subtitle mb-2 text-muted ">{{ date('d F, Y | h:i A', strtotime($item->post_date)) }}
                    </p>
                </div>
            </div>

            <div class="card-body py-3">
                <p class="card-text">{{ $item->post_text }}</p>
            </div>
            @if ($item->image)
                <a data-bs-toggle="modal" data-bs-target="{{ '#postImg' . $item->id }}">
                    <img src="{{ asset('public/images/posts/image') . '/' . $item->image }}" class="post_img"
                        alt="image">
                </a>

                <!-- Modal for image view -->
                <div class="modal fade" id="{{ 'postImg' . $item->id }}" tabindex="-1"
                    aria-labelledby="{{ 'postImg' . $item->id . 'Label' }}" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="text-center">
                                <img src="{{ asset('public/images/posts/image') . '/' . $item->image }}"
                                    class="img-fluid" alt="image">
                            </div>
                        </div>
                    </div>
                </div>
            @elseif ($item->video)
                <video controls class="img-fluid w-100"
                    src="{{ asset('public/images/posts/video') . '/' . $item->video }}" alt="video">
                </video>
            @endif

            {{-- like, comment, share section --}}
            <div class="card-footer d-flex justify-content-around p-1">
                {{-- Like --}}
                <div class="w-100">
                    @if ($liker_user != null)
                        @if (Auth::user()->id == $liker_user->user_id)
                            <form action="{{ route('like.destroy', $liker_user->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-link w-100 text-dark px-0">
                                    <i class="fas fa-thumbs-up text-primary"></i>
                                    {{ '(' . $like->count() . ')' }}</button>
                            </form>
                        @endif
                    @else
                        <form action="{{ route('like.store') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $item->id }}" name="post_id">
                            <button type="submit" class="btn btn-link w-100 text-dark px-0"><i
                                    class="far fa-thumbs-up"></i>
                                {{ '(' . $like->count() . ')' }}
                            </button>
                        </form>
                    @endif
                </div>

                {{-- Comment --}}
                <div class="vr"></div>
                <a class="btn btn-link w-100 text-dark px-0" data-bs-toggle="modal"
                    data-bs-target="{{ '#postCmnt' . $item->id }}"><i class="far fa-comment"></i>
                    {{ '(' . $comments->count() . ')' }}</a>

                <!-- Modal for comment view -->
                <div class="modal fade" id="{{ 'postCmnt' . $item->id }}" tabindex="-1"
                    aria-labelledby="{{ 'postCmnt' . $item->id . 'Label' }}" aria-hidden="true"
                    data-bs-backdrop="static" data-bs-keyboard="false">
                    <div class="modal-dialog  modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Comments</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="myDataTable table table- table-sm" style="width:100%">
                                    <thead>
                                        <tr>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($comments as $cmnt)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="">
                                                            <img src="@if ($cmnt->user_image) {{ asset('public/images/users') . '/' . $cmnt->user_image }} @else {{ asset('public/images/asset_img/user-icon.png') }} @endif"
                                                                alt="" class="rounded-circle"
                                                                style="width: 50px; height:50px">
                                                        </div>
                                                        <div class="ms-3">
                                                            <h6 class="mt-2">{{ $cmnt->name }}</h6>
                                                            <p>{{ $cmnt->comment }}</p>
                                                        </div>
                                                        @if (Auth::user()->id == $cmnt->user_id)
                                                            <div class="ms-auto">
                                                                <form action="{{ route('comment.destroy', $cmnt->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <button type="submit"
                                                                        class="delete btn btn-link text-danger"><i
                                                                            class="fas fa-trash-alt"></i></button>
                                                                </form>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- post comment form --}}
                                <div class="card-footer d-flex p-2 pt-3 px-4">
                                    <img src="@if (Auth::user()->user_image) {{ asset('public/images/users') . '/' . Auth::user()->user_image }} @else {{ asset('public/images/asset_img/user-icon.png') }} @endif"
                                        alt="" class="rounded-circle" style="width: 40px; height: 40px">
                                    <div class="ms-3 w-100">
                                        <form action="{{ route('comment.store') }}" method="post">
                                            @csrf
                                            <div class="d-flex">
                                                <input type="hidden" name="post_id" value="{{ $item->id }}">

                                                <input type="text"
                                                    class="form-control btn-rounded @error('comment') is-invalid @enderror"
                                                    name="comment" placeholder="Write a comment...">
                                                @error('comment')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                                <button type="submit" class="btn btn-link ms- p-2"><i
                                                        class="fas fa-paper-plane fa-lg"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- Share --}}
                <div class="vr"></div>
                <a href="" class="btn btn-link w-100 text-dark px-0"><i class="fas fa-share-alt"></i> </a>
            </div>

            {{-- post comment form --}}
            <div class="card-footer d-flex p-2 px-4">
                <img src="@if (Auth::user()->user_image) {{ asset('public/images/users') . '/' . Auth::user()->user_image }} @else {{ asset('public/images/asset_img/user-icon.png') }} @endif"
                    alt="" class="rounded-circle" style="width: 40px; height: 40px">
                <div class="ms-3 w-100">
                    <form action="{{ route('comment.store') }}" method="post">
                        @csrf
                        <div class="d-flex">
                            <input type="hidden" name="post_id" value="{{ $item->id }}">

                            <input type="text" class="form-control btn-rounded @error('comment') is-invalid @enderror"
                                name="comment" placeholder="Write a comment...">
                            @error('comment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <button type="submit" class="btn btn-link ms- p-2"><i
                                    class="fas fa-paper-plane fa-lg"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
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
