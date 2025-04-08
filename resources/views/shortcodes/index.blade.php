@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ __('messages.shortcodes') }}</h5>
        @if(Auth::user()->isAdmin())
            <a href="{{route('shortcodes.create')}}" class="btn btn-success">{{ __('messages.add_new_shortcode') }}</a>
        @endif
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>{{ __('messages.id') }}</th>
                    <th>{{ __('messages.shortcode') }}</th>
                    <th>{{ __('messages.replace_text') }}</th>
                    <th>{{ __('messages.actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($shortcodes as $shortcode)
                    <tr>
                        <td>{{$shortcode->id}}</td>
                        <td>{{$shortcode->$shortcode}}</td>
                        <td>{{ Str::limit($shortcode->replace, 50) }}</td>
                        <td>
                            <form action="{{route('shortcodes.destroy', $shortcode->id)}}" method="POST">
                                <a class="btn btn-info btn-sm" href="{{route('shortcodes.show', $shortcode->id)}}">{{ __('messages.view') }}</a>

                                @if(Auth::user()->isAdmin())
                                    <a class="btn btn-primary btn-sm" href="{{route('shortcodes.edit', $shortcode->id)}}">{{ __('messages.edit') }}</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm__('Are you sure you want to delete this shortcode?')">{{ __('messages.delete') }}</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">{{ __('messages.no_shortcodes_found') }}</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
