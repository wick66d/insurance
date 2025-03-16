@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Cars</h5>
            <div>
                <a href="{{route('owners.index')}}" class="btn btn-info me-2">View Owners</a>
                <a href="{{route('cars.create')}}" class="btn btn-success">Add new car</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Registration Number</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Owner</th>
                        <th>Actions</th>
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
                                    <a class="btn btn-info btn-sm" href="{{route('cars.show', $car->id)}}">View</a>
                                    <a class="btn btn-primary btn-sm" href="{{route('cars.edit', $car->id)}}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this car?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No cars found</td>
                    </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
