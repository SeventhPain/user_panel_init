<!-- resources/views/admin/books/index.blade.php -->
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col">
            <h2>News</h2>
        </div>
        <div class="col-auto">
            <a href="{{ route('admin.books.create') }}" class="btn btn-primary">Create Book</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>MM Title</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>MM Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>
                        @if($book->cover_image)
                            <img src="{{ asset('/storage/' . $book->cover_image) }}" alt="Cover" width="50">
                        @else
                            No cover
                        @endif
                    </td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->title_mm }}</td>
                    <td>{{ $book->type->name }}</td>
                    <td>{{ Str::limit($book->description, 50) }}</td>
                    <td>{{ Str::limit($book->description_mm, 50) }}</td>
                    <td>
                        <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection