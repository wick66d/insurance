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

            <form action="{{ isset($owner) ? route('owners.update', $owner->id) : route('owners.store') }}" method="POST">
                @csrf
                @if(isset($owner))
                    @method('PUT')
                @endif
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('messages.name') }}</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $owner->name ?? '') }}" placeholder="{{__('messages.enter_name')}}">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="surname" class="form-label">{{ __('messages.surname') }}</label>
                    <input type="text" name="surname" class="form-control @error('surname') is-invalid @enderror" value="{{ old('surname', $owner->surname ?? '') }}" placeholder="{{__('messages.enter_surname')}}">
                    @error('surname')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">{{ __('messages.phone') }}</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $owner->phone ?? '') }}" placeholder="{{__('messages.enter_phone')}}">
                    @error('phone')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('messages.email') }}</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $owner->email ?? '') }}" placeholder="{{__('messages.enter_email')}}">
                    @error('email')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">{{ __('messages.address') }}</label>
                    <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="3" placeholder="{{__('messages.enter_address')}}">{{ old('address', $owner->address ?? '') }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary me-2"> {{ isset($owner) ? __('messages.update') : __('messages.submit') }}</button>
                    <a href="{{ route('owners.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
@endsection
