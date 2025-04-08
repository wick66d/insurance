@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">{{ __('messages.edit_car') }}</h5>
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

            <form action="{{ route('cars.update', $car->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="reg_number" class="form-label">{{ __('messages.registration_number') }}</label>
                    <input type="text" name="reg_number" class="form-control" value="{{ $car->reg_number }}" placeholder="Enter registration number">
                </div>
                <div class="mb-3">
                    <label for="brand" class="form-label">{{ __('messages.brand') }}</label>
                    <input type="text" name="brand" class="form-control" value="{{ $car->brand }}" placeholder="Enter brand">
                </div>
                <div class="mb-3">
                    <label for="model" class="form-label">{{ __('messages.model') }}</label>
                    <input type="text" name="model" class="form-control" value="{{ $car->model }}" placeholder="Enter model">
                </div>
                <div class="mb-3">
                    <label for="owner_id" class="form-label">{{ __('messages.owner') }}</label>
                    <select name="owner_id" class="form-select">
                        <option value="">{{ __('messages.select_owner') }}</option>
                        @foreach($owners as $owner)
                            <option value="{{ $owner->id }}" {{ $car->owner_id == $owner->id ? 'selected' : '' }}>
                                {{ $owner->name }} {{ $owner->surname }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary me-2">{{ __('messages.update') }}</button>
                    <a href="{{ route('cars.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
@endsection
