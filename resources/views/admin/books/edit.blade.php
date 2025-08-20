<!-- resources/views/admin/books/edit.blade.php -->
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Book</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.books.update', $book->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="book_type_id" class="form-label">Type</label>
                            <select class="form-select" id="book_type_id" name="book_type_id" required>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}" {{ $book->book_type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ $book->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="cover_image" class="form-label">Cover Image</label>
                            <input type="file" class="form-control" id="cover_image" name="cover_image">
                            @if($book->cover_image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Current Cover" width="100">
                                    <p class="text-muted">Current cover image</p>
                                </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="file" class="form-label">Book File</label>
                            <input type="file" class="form-control" id="file" name="file">
                            <div class="mt-2">
                                <p class="text-muted">Current file: {{ basename($book->file_path) }}</p>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection