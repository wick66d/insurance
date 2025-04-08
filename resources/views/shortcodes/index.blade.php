@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">ShortCodes</h5>
        @if(Auth::user()->isAdmin())
            <a href="{{route('shortcodes.create')}}" class="btn btn-success">Add new ShortCode</a>
        @endif
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>ShortCode</th>
                    <th>Replace Text</th>
                    <th>Actions</th>
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
                                <a class="btn btn-info btn-sm" href="{{route('shortcodes.show', $shortcode->id)}}">View</a>

                                @if(Auth::user()->isAdmin())
                                    <a class="btn btn-primary btn-sm" href="{{route('shortcodes.edit', $shortcode->id)}}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this shortcode?')">Delete</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No shortcodes found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
