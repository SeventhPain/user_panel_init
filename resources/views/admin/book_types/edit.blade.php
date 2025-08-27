<!-- resources/views/admin/book_types/edit.blade.php -->
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Book Type</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.book-types.update', $bookType->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $bookType->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ $bookType->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="name_mm" class="form-label">MM Name</label>
                            <input type="text" class="form-control" id="name_mm" name="name_mm" value="{{ $bookType->name_mm }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description_mm" class="form-label">MM Description</label>
                            <textarea class="form-control" id="description_mm" name="description_mm" rows="3">{{ $bookType->description_mm }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.book-types.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection