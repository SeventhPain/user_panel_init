<!-- resources/views/admin/apks/edit.blade.php -->
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit APK</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.apks.update', $apk->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $apk->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="apk_type_id" class="form-label">Type</label>
                            <select class="form-select" id="apk_type_id" name="apk_type_id" required>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}" {{ $apk->apk_type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="package_name" class="form-label">Package Name</label>
                            <input type="text" class="form-control" id="package_name" name="package_name" value="{{ $apk->package_name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="version" class="form-label">Version</label>
                            <input type="text" class="form-control" id="version" name="version" value="{{ $apk->version }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ $apk->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="file_path" class="form-label">APK Download Link</label>
                            <input type="url" name="file_path" id="file_path" class="form-control"
                                value="{{ old('file_path', $apk->file_path ?? '') }}" required>
                            <small class="text-muted">Example: https://yourapklink/application_name.apk</small>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.apks.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection