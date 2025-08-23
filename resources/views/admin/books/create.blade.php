@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create News</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.books.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Eng Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required>
                            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="title_mm" class="form-label">MM Title</label>
                            <input type="text" class="form-control @error('title_mm') is-invalid @enderror" id="title_mm" name="title_mm" required>
                            @error('title_mm')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="book_type_id" class="form-label">Type</label>
                            <select class="form-control @error('book_type_id') is-invalid @enderror" id="book_type_id" name="book_type_id" required>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                            @error('book_type_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Eng Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3"></textarea>
                            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="description_mm" class="form-label">MM Description</label>
                            <textarea class="form-control @error('description_mm') is-invalid @enderror" id="description_mm" name="description_mm" rows="3"></textarea>
                            @error('description_mm')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="cover_image" class="form-label">Cover Image</label>
                            <input type="file" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image" name="cover_image">
                            @error('cover_image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="file" class="form-label">Book File</label>
                            <input type="file" class="form-control @error('file') is-invalid @enderror" id="file" name="file" required>
                            @error('file')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection