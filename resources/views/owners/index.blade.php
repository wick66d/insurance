@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">[[COMPANY_NAME]] - {{ __('messages.car_insurance') }} {{ __('messages.owners') }}</h5>
            @can('create', App\Models\Owner::class)
            <a href="{{ route('owners.create') }}" class="btn btn-success">{{ __('messages.add_new_owner') }}</a>
            @endcan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>{{ __('messages.id') }}</th>
                        <th>{{ __('messages.name') }}</th>
                        <th>{{ __('messages.surname') }}</th>
                        <th>{{ __('messages.phone') }}</th>
                        <th>{{ __('messages.email') }}</th>
                        <th>{{ __('messages.address') }}</th>
                        <th width="280px">{{ __('messages.actions') }}</th>
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
                                    <a class="btn btn-info btn-sm" href="{{ route('owners.show', $owner->id) }}">{{ __('messages.view') }}</a>

                                    @can('update', $owner)
                                    <a class="btn btn-primary btn-sm" href="{{ route('owners.edit', $owner->id) }}">{{ __('messages.edit') }}</a>
                                    @endcan

                                    @can('delete', $owner)
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this owner?')">{{ __('messages.delete') }}</button>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">{{ __('messages.no_owners_found') }}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
