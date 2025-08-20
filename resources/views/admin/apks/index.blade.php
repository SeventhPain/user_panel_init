@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col">
            <h2>APKs</h2>
        </div>
        <div class="col-auto">
            <a href="{{ route('admin.apks.create') }}" class="btn btn-primary">Create APK</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Package</th>
                    <th>Version</th>
                    <th>File</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($apks as $apk)
                <tr>
                    <td>{{ $apk->id }}</td>
                    <td>{{ $apk->name }}</td>
                    <td>{{ $apk->type->name }}</td>
                    <td>{{ $apk->package_name }}</td>
                    <td>{{ $apk->version }}</td>
                    <td>
                        @if($apk->file_path)
                            <a href="{{ Storage::url($apk->file_path) }}" 
                               class="btn btn-sm btn-success"
                               download>
                                <i class="fas fa-download"></i> Download
                            </a>
                        @else
                            <span class="text-muted">No file</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.apks.edit', $apk->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.apks.destroy', $apk->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection