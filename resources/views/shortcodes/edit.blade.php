@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">{{ __('messages.edit_shortcode') }}</h5>
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

            <form action="{{route('shortcodes.update', $shortcode->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="shortcode" class="form-label">{{ __('messages.shortcode') }}</label>
                    <input type="text" name="shortcode" class="form-control" value="{{$shortcode->shortcode}}" placeholder="Enter shortcode without brackets">
                    <small class="form-text text-muted">This will be used as [[YourShortCode]] in your content.</small>
                </div>
                <div class="mb-3">
                    <label for="replace" class="form-label">{{ __('messages.replace_text') }}</label>
                    <textarea name="replace" class="form-control" rows="5" placeholder="Enter text to replace shortcode with">{{$shortcode->replace}}</textarea>
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary me-2">{{ __('messages.update') }}</button>
                    <a href="{{route('shortcodes.index')}}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
@endsection
