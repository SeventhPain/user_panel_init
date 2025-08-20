<!-- resources/views/admin/dashboard.blade.php -->
@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Books</h5>
                <p class="card-text">{{ \App\Models\Book::count() }} books</p>
                <a href="{{ route('admin.books.index') }}" class="text-white">View all</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-danger mb-3">
            <div class="card-body">
                <h5 class="card-title">APKs</h5>
                <p class="card-text">{{ \App\Models\Apk::count() }} APKs</p>
                <a href="{{ route('admin.apks.index') }}" class="text-white">View all</a>
            </div>
        </div>
    </div>
</div>
@endsection