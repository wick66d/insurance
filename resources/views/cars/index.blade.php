@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ __('messages.cars') }}</h5>
            <div>
                <a href="{{route('owners.index')}}" class="btn btn-info me-2">{{ __('messages.owners') }}</a>
                @can('create', App\Models\Owner::class)
                <a href="{{route('cars.create')}}" class="btn btn-success">{{ __('messages.add_new_car') }}</a>
                @endcan
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>{{ __('messages.id') }}</th>
                        <th>{{ __('messages.reg_number') }}</th>
                        <th>{{ __('messages.brand') }}</th>
                        <th>{{ __('messages.model') }}</th>
                        <th>{{ __('messages.owner') }}</th>
                        <th>{{ __('messages.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($cars as $car)
                        <tr>
                            <td>{{$car->id}}</td>
                            <td>{{$car->reg_number}}</td>
                            <td>{{$car->brand}}</td>
                            <td>{{$car->model}}</td>
                            <td>
                                <a href="{{route('owners.show', $car->owner_id)}}">
                                    {{ $car->owner->name }} {{$car->owner->surname}}
                                </a>
                            </td>
                            <td>
                                <form action="{{route('cars.destroy', $car->id)}}" method="POST">
                                    <a class="btn btn-info btn-sm" href="{{route('cars.show', $car->id) }}">{{ __('messages.view') }}</a>
                                    @can('update', $car)
                                    <a class="btn btn-primary btn-sm" href="{{route('cars.edit', $car->id)}}">{{ __('messages.edit') }}</a>
                                    @endcan
                                    @can('delete', $car)
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this car?')">{{ __('messages.delete') }}</button>
                                    @endcan
                                </form>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">{{ __('messages.no_cars_found') }}</td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
