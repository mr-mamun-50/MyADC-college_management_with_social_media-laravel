@extends('layouts.app')
@section('title')
    Videos
@endsection
@php
$menu = 'videos';
@endphp

@section('content')
    <div class="row">

        {{-- Left section started --}}
        <div class="d-none d-lg-block col-lg-3 py-md-4 scroll">
            <div class="card text-start">
                <div class="card-body">
                    <h4 class="card-title text-center">Admission</h4>
                    <hr>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, beatae.</p>

                    <a href="{{ route('admission.procedure') }}" class="btn btn-primary bg-gradient btn-block">Admission
                        Procedure</a>
                </div>
            </div>

            {{-- Left side list --}}
            <div class="list-group list-group-light my-4">
                <a href="{{ route('notice.view') }}" class="list-group-item list-group-item-action px-3 border-0">
                    <i class="bi bi-megaphone-fill fa-lg text-primary me-3"></i> Official notices</a>

                <a href="#" class="list-group-item list-group-item-action px-3 border-0">
                    <i class="fas fa-clock fa-lg text-info me-3"></i> Class routines</a>

                <a href="{{ route('videos') }}" class="list-group-item list-group-item-action px-3 border-0">
                    <i class="fas fa-video fa-lg text-danger me-3"></i> Videos</a>

                <a href="#" class="list-group-item list-group-item-action px-3 border-0">
                    <i class="fas fa-chalkboard-teacher fa-lg text-success me-3"></i>Teachers information</a>

                <a href="#" class="list-group-item list-group-item-action px-3 border-0">
                    <i class="fas fa-user-friends fa-lg text-warning me-3"></i> Student information</a>
            </div>
        </div>
        {{-- Left section ended --}}


        {{-- Center section started --}}
        <div class="col-lg-6 col-md-8 py-md-4 pt-4 scroll">

            @foreach ($videos as $item)
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



                <div class="card mb-4 border">


                    <div class="card-body">
                        {{-- <video class="w-100" src="{{ asset('images/posts/video' . '/' . $item->video) }}"></video> --}}

                        <div class="d-flex">
                            <div class="" style="width: 40%">
                                <video class="w-100"
                                    src="{{ asset('images/posts/video' . '/' . $item->video) }}"></video>
                            </div>
                            <div class="ms-3" style="width: 60%">

                                <small class="mb-3 text-muted justify-content-end d-flex">
                                    <i>({{ date('d F, Y | h:i A', strtotime($item->post_date)) }})</i>
                                </small>



                                {{ $item->post_text }}

                                <div class="d-flex justify-content-end mt-4">

                                    {{-- Like --}}
                                    <div class="">
                                        @if ($liker_user != null)
                                            @if (Auth::user()->id == $liker_user->user_id)
                                                <form action="{{ route('like.destroy', $liker_user->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-link text-dark p-1">
                                                        <i class="fas fa-thumbs-up text-primary"></i>
                                                        {{ '(' . $like->count() . ')' }}</button>
                                                </form>
                                            @endif
                                        @else
                                            <form action="{{ route('like.store') }}" method="post">
                                                @csrf
                                                <input type="hidden" value="{{ $item->id }}" name="post_id">
                                                <button type="submit" class="btn btn-link text-dark p-1"><i
                                                        class="far fa-thumbs-up"></i>
                                                    {{ '(' . $like->count() . ')' }}
                                                </button>
                                            </form>
                                        @endif
                                    </div>

                                    {{-- Comment --}}
                                    <a class="btn btn-link text-dark p-1 ms-3" data-bs-toggle="modal"
                                        data-bs-target="{{ '#postCmnt' . $item->id }}"><i class="far fa-comment"></i>
                                        {{ '(' . $comments->count() . ')' }}</a>

                                    {{-- View --}}
                                    <button class="btn btn-primary bg-gradient btn-sm py-1 ms-3" data-bs-toggle="modal"
                                        data-bs-target="{{ '#postImg' . $item->id }}"><i class="fas fa-eye"></i>
                                        View video</button>
                                </div>
                            </div>
                        </div>


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
                                                        <td class="p-0 px-md-3">
                                                            <div class="d-flex align-items-center">
                                                                <a href="{{ route('user.profile', $cmnt->user_id) }}">
                                                                    <img src="@if ($cmnt->user_image) {{ asset('images/users') . '/' . $cmnt->user_image }} @else {{ asset('images/asset_img/user-icon.png') }} @endif"
                                                                        alt="" class="rounded-circle"
                                                                        style="width: 40px; height:40px">
                                                                </a>
                                                                <div class="ms-3">
                                                                    <div class="d-flex mt-3">
                                                                        <a
                                                                            href="{{ route('user.profile', $cmnt->user_id) }}">
                                                                            <h6 class="">
                                                                                {{ $cmnt->name }}</h6>
                                                                        </a>
                                                                        <small class="text-muted ms-2">
                                                                            <i>({{ date('d F, y | h:i A', strtotime($cmnt->c_date)) }})</i>
                                                                        </small>
                                                                    </div>
                                                                    <p>{{ $cmnt->comment }}</p>
                                                                </div>

                                                                @if (Auth::user()->id == $cmnt->user_id)
                                                                    <div class="ms-auto text-end">
                                                                        <form
                                                                            action="{{ route('comment.destroy', $cmnt->id) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <input type="hidden" name="_method"
                                                                                value="DELETE">
                                                                            <button type="submit"
                                                                                class="delete btn btn-link text-danger p-0"><i
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
                                            <img src="@if (Auth::user()->user_image) {{ asset('images/users') . '/' . Auth::user()->user_image }} @else {{ asset('images/asset_img/user-icon.png') }} @endif"
                                                alt="" class="rounded-circle" style="width: 40px; height: 40px">
                                            <div class="ms-3 w-100">
                                                <form action="{{ route('comment.store') }}" method="post">
                                                    @csrf
                                                    <div class="d-flex">
                                                        <input type="hidden" name="post_id"
                                                            value="{{ $item->id }}">

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


                        <!-- Modal for video view -->
                        <div class="modal fade" id="{{ 'postImg' . $item->id }}" tabindex="-1"
                            aria-labelledby="{{ 'postImg' . $item->id . 'Label' }}" aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        {{-- heading options --}}
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('user.profile', $item->user_id) }}">
                                                <img src="@if ($item->user_image) {{ asset('images/users') . '/' . $item->user_image }} @else {{ asset('images/asset_img/user-icon.png') }} @endif"
                                                    alt="" class="rounded-circle"
                                                    style="width: 50px; height:50px">
                                            </a>

                                            <div class="ms-3">
                                                <a href="{{ route('user.profile', $item->user_id) }}">
                                                    <h5 class="card-title text-dark">{{ $item->name }}</h5>
                                                </a>
                                                @if ($item->visibility == 1)
                                                    <span class="badge rounded-pill badge-success">&#127758;
                                                        Public</span>
                                                @else
                                                    <span class="badge rounded-pill badge-warning">&#128274;
                                                        Only me</span>
                                                @endif
                                                <small class="card-subtitle mb-2 text-muted">
                                                    {{ date('d F, Y | h:i A', strtotime($item->post_date)) }}
                                                </small>
                                            </div>
                                        </div>


                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <video controls
                                        src="{{ asset('images/posts/video' . '/' . $item->video) }}"></video>



                                    <div class="modal-body">
                                        <h4>Description</h4>

                                        {{ $item->post_text }}

                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            @endforeach

            {{-- pagination --}}
            {{ $videos->links('pagination::bootstrap-5') }}
        </div>
        {{-- Center section ended --}}


        {{-- Right section starts --}}
        <div class="col-lg-3 col-md-4 py-md-4 pt-4 scroll">

            <div class="card text-start">
                <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Body</p>
                </div>
            </div>
        </div>
        {{-- Right section ended --}}

    </div>
@endsection
