@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">{{ __('messages.add_new_car') }}</h5>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                <form action="{{ isset($car) ? route('cars.update', $car->id) : route('cars.store') }}" method="POST">
                    @csrf
                    @if(isset($car))
                        @method('PUT')
                    @endif
                    <div class="mb-3">
                        <label for="reg_number" class="form-label">{{ __('messages.reg_number') }}</label>
                        <input type="text" name="reg_number" class="form-control @error('reg_number') is-invalid @enderror" value="{{old('reg_number',$car->reg_number ?? '')}}" placeholder="{{__('messages.enter_reg_number')}}">
                        @error('reg_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">{{ __('messages.reg_number_help') }}</small>
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label">{{ __('messages.brand') }}</label>
                        <input type="text" name="brand" class="form-control @error('brand') is-invalid @enderror" value="{{old('brand', $car->brand ?? '')}}" placeholder="{{__('messages.enter_brand')}}">
                        @error('brand')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="model" class="form-label">{{ __('messages.model') }}</label>
                        <input type="text" name="model" class="form-control @error('model') is-invalid @enderror" value="{{old('model', $car->model ?? '')}}" placeholder="{{__('messages.enter_model')}}">
                        @error('model')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="owner_id" class="form-label">{{ __('messages.owner') }}</label>
                        <select name="owner_id" class="form-select @error('owner_id') is-invalid @enderror">
                            <option value="">{{ __('messages.select_owner') }}</option>
                            @foreach($owners as $owner)
                                <option value="{{ $owner->id }}" {{old('owner_id', $car->owner_id ?? '') == $owner->id ? 'selected' : ''}}>
                                    {{$owner->name}} {{$owner->surname}}
                                </option>
                            @endforeach
                        </select>
                        @error('owner_id')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="d-flex">
                        <button type="submit" class="btn btn-primary me-2">{{ isset($car) ? __('messages.update') : __('messages.submit') }}</button>
                        <a href="{{route('cars.index')}}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                    </div>
                </form>
        </div>
    </div>
@endsection
