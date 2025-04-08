@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ __('messages.car_details') }}</h5>
            <a href="{{ route('cars.index') }}" class="btn btn-secondary">{{ __('messages.back') }}</a>
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">{{ __('messages.registration_number') }}:</div>
                <div class="col-md-9">{{ $car->reg_number }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">{{ __('messages.brand') }}:</div>
                <div class="col-md-9">{{ $car->brand }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">{{ __('messages.model') }}:</div>
                <div class="col-md-9">{{ $car->model }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">{{ __('messages.owner') }}:</div>
                <div class="col-md-9">
                    <a href="{{ route('owners.show', $car->owner_id) }}">
                        {{ $car->owner->name }} {{ $car->owner->surname }}
                    </a>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-primary">{{ __('messages.edit') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
