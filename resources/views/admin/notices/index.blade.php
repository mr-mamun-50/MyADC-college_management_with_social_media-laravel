@extends('admin.layouts.app')
@section('title')
    Notices
@endsection
<?php $menu = 'Notice';
$submenu = ''; ?>

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <b>Notices</b>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn  btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                        <i class="fas fa-plus"></i> Add Notice
                    </button>
                </div>
            </div>
            <div class="card-body">

                <table class="table table-bordered table-striped" id="example1">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Subject</th>
                            <th>Notice by</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notice as $index => $item)
                            <tr>
                                <td>{{ ++$index }}</td>
                                <td>{{ $item->subject }}</td>
                                <td>
                                    {{ $item->author }}
                                    <div class="text-muted">
                                        <small><i>Designation:</i></small><br>
                                        {{ $item->author_designation }}
                                    </div>
                                </td>
                                <td><?php echo $item->description; ?></td>
                                <td>
                                    @if ($item->visibility)
                                        <span class="badge badge-success">Public</span>
                                    @else
                                        <span class="badge badge-warning">Private</span>
                                    @endif
                                    <div class="text-muted">
                                        <small><i><b>Created:</b></i><br>
                                            {{ date('d F, Y | h:i A', strtotime($item->post_date)) }}</small>
                                        @if ($item->update_date)
                                            <br> <small><i><b>Updated:</b></i><br>
                                                {{ date('d F, Y | h:i A', strtotime($item->update_date)) }}</small>
                                        @endif
                                    </div>
                                </td>

                                <td class="d-flex justify-content-center">

                                    <a href="{{ route('notice.show', $item->id) }}" class="btn btn-info mr-1 px-1 py-0"
                                        target="blank"><i class="bi bi-printer"></i></a>

                                    <button type="button" class="btn btn-primary mr-1 px-1 py-0" data-toggle="modal"
                                        data-target="{{ '#editNotice' . $item->id }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>

                                    <form action="{{ route('notice.destroy', $item->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger delete px-1 py-0"><i
                                                class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>


                            <!-- Modal for edit notice -->
                            <div class="modal fade" id="{{ 'editNotice' . $item->id }}" data-backdrop="static"
                                data-keyboard="false" tabindex="-1"
                                aria-labelledby="{{ 'editNotice' . $item->id . 'Label' }}" aria-hidden="true">

                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-default text-dark rounded">
                                            <h5 class="modal-title" id="{{ 'editNotice' . $item->id . 'Label' }}">
                                                {{ $item->subject }}</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <form action="{{ route('notice.update', $item->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="put">
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="subject">Subject</label>
                                                    <input class="form-control @error('subject') is-invalid @enderror"
                                                        type="text" name="subject" value="{{ $item->subject }}"
                                                        placeholder="notice subject">
                                                    @error('subject')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <b>Notice by</b> <br>
                                                <div class="row mt-2">
                                                    <div class="form-group col">
                                                        <input class="form-control @error('author') is-invalid @enderror"
                                                            type="text" name="author" value="{{ $item->author }}"
                                                            placeholder="enter name">
                                                        @error('author')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col">
                                                        <input
                                                            class="form-control @error('author_designation') is-invalid @enderror"
                                                            type="text" name="author_designation"
                                                            value="{{ $item->author_designation }}"
                                                            placeholder="enter designation">
                                                        @error('author_designation')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control @error('description') is-invalid @enderror summernote" name="description"
                                                        rows="10">{{ $item->description }}</textarea>
                                                    @error('description')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="visibility"
                                                            value="1" @if ($item->visibility) checked @endif>
                                                        Publish now
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn  btn-primary">Update Notice</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Modal for add notice -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-default text-dark rounded">
                            <h5 class="modal-title" id="staticBackdropLabel">Create New Notice</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="{{ route('notice.store') }}" method="post">
                            @csrf
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <input class="form-control @error('subject') is-invalid @enderror" type="text"
                                        name="subject" value="{{ old('subject') }}" placeholder="notice subject">
                                    @error('subject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <b>Notice by</b> <br>
                                <div class="row mt-2">
                                    <div class="form-group col">
                                        <input class="form-control @error('author') is-invalid @enderror" type="text"
                                            name="author" value="{{ old('author') }}" placeholder="enter name">
                                        @error('author')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col">
                                        <input class="form-control @error('author_designation') is-invalid @enderror"
                                            type="text" name="author_designation" value="{{ old('author_designation') }}"
                                            placeholder="enter designation">
                                        @error('author_designation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror summernote" name="description"
                                        rows="10">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="visibility" value="1">
                                        Publish now
                                    </label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn">Reset</button>
                                <button type="submit" class="btn  btn-primary">Add Notice</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
