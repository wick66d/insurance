@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ __('messages.owner_details') }}</h5>
            <a href="{{ route('owners.index') }}" class="btn btn-secondary">{{ __('messages.back') }}</a>
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">{{ __('messages.name') }}:</div>
                <div class="col-md-9">{{ $owner->name }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">{{ __('messages.surname') }}:</div>
                <div class="col-md-9">{{ $owner->surname }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">{{ __('messages.phone') }}:</div>
                <div class="col-md-9">{{ $owner->phone }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">{{ __('messages.email') }}:</div>
                <div class="col-md-9">{{ $owner->email }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">{{ __('messages.address') }}:</div>
                <div class="col-md-9">{{ $owner->address }}</div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    @can('update', $owner)
                    <a href="{{ route('owners.edit', $owner->id) }}" class="btn btn-primary">{{ __('messages.edit') }}</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
