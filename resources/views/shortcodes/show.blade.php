@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ __('messages.shortcode_details') }}</h5>
        <a href="{{route('shortcodes.index')}}" class="btn btn-secondary">{{ __('messages.back') }}</a>
    </div>
    <div class="card-body">
        <div class="row mb-2">
            <div class="col-md-3 fw-bold">{{ __('messages.id') }}:</div>
            <div class="col-md-9">{{$shortcode->id}}</div>
        </div>

        <div class="row mb-2">
            <div class="col-md-3 fw-bold">{{ __('messages.shortcode') }}:</div>
            <div class="col-md-9">{{$shortcode->shortcode}}</div>
        </div>

        <div class="row mb-2">
            <div class="col-md-3 fw-bold">{{ __('messages.usage') }}:</div>
            <div class="col-md-9"><code>[[{{$shortcode->$shortcode}}]]</code></div>
        </div>

        <div class="row mb-4">
            <div class="col-md-3 fw-bold">{{ __('messages.replace_text') }}:</div>
            <div class="col-md-9">{{$shortcode->replace}}</div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                @if(Auth::user()->isAdmin())
                    <a href="{{route('shortcodes.edit', $shortcode->id)}}" class="btn btn-primary">{{ __('messages.edit') }}</a>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
