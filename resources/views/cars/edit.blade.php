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
                    <label for="reg_number" class="form-label">{{ __('messages.reg_number') }}</label>
                    <input type="text" name="reg_number" class="form-control @error('reg_number') is-invalid @enderror" value="{{ old('reg_number', $car->reg_number) }}" placeholder="{{ __('messages.enter_reg_number') }}">
                    @error('reg_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">{{ __('messages.reg_number_help') }}</small>
                </div>
                <div class="mb-3">
                    <label for="brand" class="form-label">{{ __('messages.brand') }}</label>
                    <input type="text" name="brand" class="form-control @error('brand') is-invalid @enderror" value="{{ old('brand', $car->brand) }}" placeholder="{{ __('messages.enter_brand') }}">
                    @error('brand')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="model" class="form-label">{{ __('messages.model') }}</label>
                    <input type="text" name="model" class="form-control @error('model') is-invalid @enderror" value="{{ old('model', $car->model) }}" placeholder="{{ __('messages.enter_model') }}">
                    @error('model')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="owner_id" class="form-label">{{ __('messages.owner') }}</label>
                    <select name="owner_id" class="form-select @error('owner_id') is-invalid @enderror">
                        <option value="">{{ __('messages.select_owner') }}</option>
                        @foreach($owners as $owner)
                            <option value="{{ $owner->id }}" {{ (old('owner_id', $car->owner_id) == $owner->id) ? 'selected' : '' }}>
                                {{ $owner->name }} {{ $owner->surname }}
                            </option>
                        @endforeach
                    </select>
                    @error('owner_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary me-2">{{ __('messages.update') }}</button>
                    <a href="{{ route('cars.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                </div>
            </form>

            <!-- Photos section -->
            <div class="mt-5">
                <h5>{{ __('messages.car_photos') }}</h5>

                <div class="row">
                    @forelse($car->photos as $photo)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <img src="{{ asset('storage/car_photos/' . $photo->filename) }}" class="card-img-top" alt="{{ $photo->original_filename }}">
                                <div class="card-body">
                                    <p class="card-text small">{{ $photo->original_filename }}</p>
                                    <form action="{{ route('car.photos.destroy', $photo->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('messages.delete_confirm') }}')">
                                            {{ __('messages.delete') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p>{{ __('messages.no_photos') }}</p>
                        </div>
                    @endforelse
                </div>

                <form action="{{ route('car.photos.store', $car->id) }}" method="POST" enctype="multipart/form-data" class="mt-3">
                    @csrf
                    <div class="mb-3">
                        <label for="photos" class="form-label">{{ __('messages.upload_photos') }}</label>
                        <input type="file" name="photos[]" id="photos" class="form-control @error('photos') is-invalid @enderror @error('photos.*') is-invalid @enderror" multiple>
                        @error('photos')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @error('photos.*')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">{{ __('messages.allowed_image_types_help') }}</small>
                    </div>
                    <button type="submit" class="btn btn-success">{{ __('messages.upload') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
