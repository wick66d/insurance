@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ __('messages.car_details') }}</h5>
            <a href="{{ route('cars.index') }}" class="btn btn-secondary">{{ __('messages.back') }}</a>
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">{{ __('messages.reg_number') }}:</div>
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

            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="mb-0">{{ __('messages.car_photos') }}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse($car->photos as $photo)
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <img src="{{ asset('storage/car_photos/' . $photo->filename) }}" class="card-img-top" alt="{{ $photo->original_filename }}">
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <p>{{ __('messages.no_photos') }}</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    @can('update', $car)
                    <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-primary">{{ __('messages.edit') }}</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
