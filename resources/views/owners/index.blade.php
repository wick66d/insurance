@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">[[COMPANY_NAME]] - Car Insurance Owners</h5>
            @if(Auth::user()->isAdmin())
            <a href="{{ route('owners.create') }}" class="btn btn-success">Add New Owner</a>
            @endif
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th width="280px">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($owners as $owner)
                        <tr>
                            <td>{{ $owner->id }}</td>
                            <td>{{ $owner->name }}</td>
                            <td>{{ $owner->surname }}</td>
                            <td>{{ $owner->phone }}</td>
                            <td>{{ $owner->email }}</td>
                            <td>{{ $owner->address }}</td>
                            <td>
                                <form action="{{ route('owners.destroy', $owner->id) }}" method="POST">
                                    <a class="btn btn-info btn-sm" href="{{ route('owners.show', $owner->id) }}">View</a>

                                    @if(Auth::user()->isAdmin())
                                    <a class="btn btn-primary btn-sm" href="{{ route('owners.edit', $owner->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this owner?')">Delete</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No owners found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
