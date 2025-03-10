@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Owner Details</h5>
            <a href="{{ route('owners.index') }}" class="btn btn-secondary">Back</a>
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">Name:</div>
                <div class="col-md-9">{{ $owner->name }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">Surname:</div>
                <div class="col-md-9">{{ $owner->surname }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">Phone:</div>
                <div class="col-md-9">{{ $owner->phone }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">Email:</div>
                <div class="col-md-9">{{ $owner->email }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">Address:</div>
                <div class="col-md-9">{{ $owner->address }}</div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <a href="{{ route('owners.edit', $owner->id) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
