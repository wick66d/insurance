@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">{{ __('messages.add_new_owner') }}</h5>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('owners.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('messages.name') }}</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter name">
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label">{{ __('messages.surname') }}</label>
                    <input type="text" name="surname" class="form-control" value="{{ old('surname') }}" placeholder="Enter surname">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">{{ __('messages.phone') }}</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="Enter phone number">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('messages.email') }}</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter email">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">{{ __('messages.address') }}</label>
                    <textarea name="address" class="form-control" rows="3" placeholder="Enter address">{{ old('address') }}</textarea>
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary me-2">{{ __('messages.submit') }}</button>
                    <a href="{{ route('owners.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
@endsection
