@extends('layouts.app')
@section('title')
    Home |
@endsection
@php
$menu = 'Home';
$rightbarImage = 'study_chat.png';
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
            <div class="col-lg-11 pb-4">
                {{-- whats on your mind --}}
                <div class="card text-start">
                    <div class="card-body p-3">

                        <div class="d-flex">
                            <img src="@if (Auth::user()->user_image) {{ asset('images/users') . '/' . Auth::user()->user_image }} @else {{ asset('images/asset_img/user-icon.png') }} @endif"
                                alt="" class="rounded-circle" style="width: 50px">
                            <div class="w-100 ms-2"><a data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                    class="btn btn-light btn-block shadow-0 btn-rounded text-start d-flex align-items-center post_btn">
                                    Whats on your mind, {{ Auth::user()->name }}?</a></div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-around">
                            <a data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                class="btn btn-link text-dark w-50 shadow-0 py-1"><i class="fas fa-image text-success"></i>
                                Photo</a>
                            <a data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                class="btn btn-link text-dark w-50 shadow-0 py-1"><i class="fas fa-video text-danger"></i>
                                Video</a>
                        </div>
                    </div>
                </div>

                <!-- Create post Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel"><i class="fas fa-plus-circle"></i> Create
                                    Post
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
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
                        <div class="card-header d-flex mt-1">

                            {{-- heading options --}}
                            <div class="d-flex align-items-center">
                                <a href="{{ route('user.profile', $item->user_id) }}">
                                    <img src="@if ($item->user_image) {{ asset('images/users') . '/' . $item->user_image }} @else {{ asset('images/asset_img/user-icon.png') }} @endif"
                                        alt="" class="rounded-circle" style="width: 50px; height:50px">
                                </a>

                                <div class="ms-3">
                                    <a href="{{ route('user.profile', $item->user_id) }}">
                                        <h5 class="card-title text-dark">{{ $item->name }} @if ($item->department)
                                                <i class="fas fa-check-circle fa-xs text-primary"></i>
                                            @endif
                                        </h5>
                                    </a>
                                    @if ($item->visibility == 1)
                                        <span class="badge rounded-pill badge-success">&#127758; Public</span>
                                    @else
                                        <span class="badge rounded-pill badge-warning">&#128274; Only me</span>
                                    @endif
                                    <small class="card-subtitle mb-2 text-muted">
                                        {{ date('d F, Y | h:i A', strtotime($item->post_date)) }}
                                    </small>
                                </div>
                            </div>

                            {{-- More option: edit, delete --}}
                            @if (Auth::user()->id == $item->user_id)
                                <div class="dropdown dropstart ms-auto">
                                    <button class="btn shadow-0 p-2" type="button" id="dropdownMenuButton"
                                        data-mdb-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-lg"></i>
                                    </button>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        <li><a class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="{{ '#EditPostModal' . $item->id }}"><i
                                                    class="fas fa-edit text-success"></i>
                                                Edit</a></li>

                                        <li>
                                            <a class="dropdown-item p-0">
                                                <form action="{{ route('posts.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit"
                                                        class="delete btn bg-transparent shadow-0 px-3 py-2"
                                                        style="font-size: 14px"><i
                                                            class="fas fa-trash-alt text-danger"></i>
                                                        Detete</button>
                                                </form>
                                            </a>
                                        </li>
                                    </ul>
                                </div>


                                <!-- Edit post Modal -->
                                <div class="modal fade" id="{{ 'EditPostModal' . $item->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="{{ 'EditPostModal' . $item->id . 'Label' }}" aria-hidden="true">

                                    <div class="modal-dialog  modal-dialog-centered">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel"><i
                                                        class="fas fa-edit"></i>
                                                    Edit Post
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('posts.update', $item->id) }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="_method" value="put">

                                                <div class="modal-body">
                                                    <!-- Message input -->
                                                    <div class="form-outline mb-4">
                                                        <textarea class="form-control" id="form4Example3" rows="4" name="post_text">{{ $item->post_text }}</textarea>
                                                        <label class="form-label" for="form4Example3">Whats on your
                                                            mind,
                                                            {{ Auth::user()->name }}?</label>
                                                    </div>
                                                    <div class="input-group ">
                                                        <span class="input-group-text"><i
                                                                class="bi bi-image text-success"></i></span>
                                                        <input type="file" class="form-control" name="image"
                                                            id="image" />
                                                        <input type="hidden" name="old_image"
                                                            value="{{ $item->image }}">
                                                    </div>
                                                    <div class="text-center my-2">or,</div>
                                                    <div class="input-group ">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-video text-danger"></i></span>
                                                        <input type="file" class="form-control" name="video"
                                                            id="video" />
                                                        <input type="hidden" name="old_video"
                                                            value="{{ $item->video }}">
                                                    </div>

                                                    <select class="form-select form-select-sm mt-3 w-25"
                                                        name="visibility">
                                                        <option @if ($item->visibility == 1) selected @endif
                                                            value="1">&#127758; Public</option>
                                                        <option @if ($item->visibility == 0) selected @endif
                                                            value="0">&#128274; Only me</option>
                                                    </select>
                                                </div>

                                                <div class="modal-footer">
                                                    <!-- Submit button -->
                                                    <button type="submit"
                                                        class="btn btn-primary bg-gradient btn-block ">Update Post</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="card-body py-3">
                            <p class="card-text">{{ $item->post_text }}</p>
                        </div>
                        @if ($item->image)
                            <a data-bs-toggle="modal" data-bs-target="{{ '#postImg' . $item->id }}">
                                <img src="{{ asset('images/posts/image') . '/' . $item->image }}" class="post_img"
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
                                            <img src="{{ asset('images/posts/image') . '/' . $item->image }}"
                                                class="img-fluid" alt="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif ($item->video)
                            <video controls class="img-fluid w-100"
                                src="{{ asset('images/posts/video') . '/' . $item->video }}" alt="video">
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
                                data-bs-target="{{ '#postCmnt' . $item->id }}"><i class="fa-regular fa-comment"></i>
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
                                                                                <h6 class="">{{ $cmnt->name }}
                                                                                </h6>
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
                                                    alt="" class="rounded-circle"
                                                    style="width: 40px; height: 40px">
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


                            {{-- Share --}}
                            <div class="vr"></div>
                            <a href="" class="btn btn-link w-100 text-dark px-0" data-bs-toggle="modal"
                                data-bs-target="{{ '#postLink' . $item->id }}"><i class="far fa-share-square"></i></a>

                            <!-- Modal for copy link -->
                            <div class="modal fade" id="{{ 'postLink' . $item->id }}" tabindex="-1"
                                aria-labelledby="{{ 'postLink' . $item->id . 'Label' }}" aria-hidden="true"
                                data-bs-backdrop="static" data-bs-keyboard="false">
                                <div class="modal-dialog  modal-dialog-centered modal-">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="staticBackdropLabel">Copy Link Address</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="input-group input-group-lg mt-3 mb-5">
                                                <input type="text" class="form-control copyTxt"
                                                    value="{{ route('home') . '#post' . $item->id }}" />
                                                <button onclick="cpyTxt()" class="btn btn-primary">
                                                    <i class="fas fa-copy"></i> Copy </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        {{-- post comment form --}}
                        <div class="card-footer d-flex p-2 px-4">
                            <img src="@if (Auth::user()->user_image) {{ asset('images/users') . '/' . Auth::user()->user_image }} @else {{ asset('images/asset_img/user-icon.png') }} @endif"
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
                @endforeach

                {{-- pagination --}}
                {{ $posts->links('pagination::bootstrap-5') }}
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
