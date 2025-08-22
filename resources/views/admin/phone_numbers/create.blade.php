@extends('admin.layouts.app')

@section('title', 'Create Phone Number')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Phone Number</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.phone-numbers.store') }}">
                        @csrf

                        {{-- Name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input 
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                id="name" 
                                name="name" 
                                value="{{ old('name') }}" 
                                required
                            >
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Telegram --}}
                        <div class="mb-3">
                            <label for="telegram" class="form-label">Telegram</label>
                            <input 
                                type="text" 
                                class="form-control @error('telegram') is-invalid @enderror" 
                                id="telegram" 
                                name="telegram" 
                                value="{{ old('telegram') }}"
                            >
                            @error('telegram')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Viber --}}
                        <div class="mb-3">
                            <label for="viber" class="form-label">Viber</label>
                            <input 
                                type="text" 
                                class="form-control @error('viber') is-invalid @enderror" 
                                id="viber" 
                                name="viber" 
                                value="{{ old('viber') }}"
                            >
                            @error('viber')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Contact URL --}}
                        <div class="mb-3">
                            <label for="contact_url" class="form-label">Contact URL</label>
                            <input 
                                type="url" 
                                class="form-control @error('contact_url') is-invalid @enderror" 
                                id="contact_url" 
                                name="contact_url" 
                                value="{{ old('contact_url') }}"
                            >
                            @error('contact_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea 
                                class="form-control @error('description') is-invalid @enderror" 
                                id="description" 
                                name="description" 
                                rows="3"
                            >{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Buttons --}}
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.phone-numbers.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
