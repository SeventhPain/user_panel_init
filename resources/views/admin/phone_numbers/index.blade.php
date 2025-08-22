@extends('admin.layouts.app')

@section('title', 'Phone Numbers')

@section('content')
<div class="container">
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col">
            <h2>Phone Numbers</h2>
        </div>
        <div class="col-auto">
            <a href="{{ route('admin.phone-numbers.create') }}" class="btn btn-primary">Add New</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Telegram</th>
                    <th>Viber</th>
                    <th>Contact URL</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($phoneNumbers as $phoneNumber)
                <tr>
                    <td>{{ $phoneNumber->id }}</td>
                    <td>{{ $phoneNumber->name }}</td>
                    <td>{{ $phoneNumber->telegram }}</td>
                    <td>{{ $phoneNumber->viber }}</td>
                    <td>
                        @if($phoneNumber->contact_url)
                            <a href="{{ $phoneNumber->contact_url }}" target="_blank">{{ $phoneNumber->contact_url }}</a>
                        @endif
                    </td>
                    <td>{{ Str::limit($phoneNumber->description, 50) }}</td>
                    <td>
                        <a href="{{ route('admin.phone-numbers.edit', $phoneNumber->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.phone-numbers.destroy', $phoneNumber->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                Delete
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
