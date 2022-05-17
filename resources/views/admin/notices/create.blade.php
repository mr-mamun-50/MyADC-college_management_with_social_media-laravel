@extends('admin.layouts.app')
@section('title')
    Create Video
@endsection
<?php $menu = 'videos'; $submenu = 'add_vid'; ?>

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-default text-dark py-2 px-4 d-flex justify-content-between align-items-center">
                    <b>Add new Video</b>
                    <a href="{{ route('videos.index') }}" class="btn btn-primary btn-sm">All Videos</a>
                </div>
                <div class="p-2">

                    <form action="{{ route('videos.store') }}" method="post">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="video_title">Title</label>
                                <input class="form-control @error('video_title') is-invalid @enderror" type="text"
                                    name="video_title" value="{{ old('video_title') }}">
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
                                            <option value="{{ $subcat->id }}"> >{{ $subcat->subcategory_name }}
                                            </option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="video_link">Video YouTube Link</label>
                                <input type="text" class="form-control @error('video_link') is-invalid @enderror"
                                    name="video_link" value="{{ old('video_link') }}">
                                @error('video_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="video_tags">Tags</label>
                                <input class="form-control @error('video_tags') is-invalid @enderror" type="text"
                                    name="video_tags" value="{{ old('video_tags') }}">
                                @error('video_tags')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="video_status" value="1">
                                    Publish now
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn">Reset</button>
                            <button type="submit" class="btn hor-grd btn-grd-primary">Add Video</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
