@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">{{ __('messages.add_new_shortcode') }}</h5>
    </div>
    <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

            <form action="{{route('shortcodes.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="shortcode" class="form-label">{{ __('messages.shortcode') }}</label>
                    <input type="text" name="shortcode" class="form-control" value="{{old('shortcode')}}" placeholder="{{ __('messages.enter_shortcode_without_brackets') }}">
                    <small class="form-text text-muted">{{__('messages.this_willbeused')}}</small>
                </div>
                <div class="mb-3">
                    <label for="replace" class="form-label">{{ __('messages.replace_text') }}</label>
                    <textarea name="replace" class="form-control" rows="5">{{old('replace')}}</textarea>
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary me-2">{{ __('messages.submit') }}</button>
                    <a href="{{route('shortcodes.index')}}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                </div>
            </form>
    </div>
</div>
@endsection
