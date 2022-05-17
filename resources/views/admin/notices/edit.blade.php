@extends('admin.layouts.app')
@section('title')
    Edit video
@endsection
<?php $menu = 'videos';
$submenu = 'manage_vid'; ?>

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-default text-dark py-2 px-4 d-flex justify-content-between align-items-center">
                    <b>{{ $video->title }}</b>
                    <a href="{{ route('videos.index') }}" class="btn btn-primary btn-sm">All videos</a>
                </div>
                <div class="p-2">

                    <form action="{{ route('videos.update', $video->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="put">

                        <div class="modal-body">

                            <div class="form-group">
                                <label for="video_title">Title</label>
                                <input class="form-control @error('video_title') is-invalid @enderror" type="text"
                                    name="video_title" value="{{ $video->title }}">
                                @error('video_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subcategory_id">Category</label>
                                <select name="subcategory_id" class="form-control" id="">
                                    <option disabled selected>Choose Category</option>
                                    @foreach ($category as $item)
                                        @php
                                            $subcategories = DB::table('subcategories')
                                                ->where('category_id', $item->id)
                                                ->get();
                                        @endphp
                                        <option value="{{ $item->id }}" class="text-info font-weight-bold" disabled>
                                            {{ $item->category_name }}</option>
                                        @foreach ($subcategories as $subcat)
                                            <option value="{{ $subcat->id }}"
                                                @if ($subcat->id == $video->subcategory_id) selected @endif>
                                                >{{ $subcat->subcategory_name }}
                                            </option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="video_link">Video YouTube Link</label>
                                <input type="text" class="form-control @error('video_link') is-invalid @enderror"
                                    name="video_link" value="{{ $video->video_link }}">
                                @error('video_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="video_tags">Tags</label>
                                <input class="form-control @error('video_tags') is-invalid @enderror" type="text"
                                    name="video_tags" value="{{ $video->tags }}">
                                @error('video_tags')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="video_status" value="1"
                                        @if ($video->status) checked @endif>
                                    Publish now
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn hor-grd btn-grd-primary">Update video</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
