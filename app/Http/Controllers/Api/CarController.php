<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::with('owner')->get();
        return CarResource::collection($cars);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reg_number' => 'required|regex:/^[A-Z]{3}\d{3}$/|unique:cars',
            'brand' => 'required|string|max:50|min:2',
            'model' => 'required|string|max:50|min:1',
            'owner_id' => 'required|exists:owners,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $car = Car::create($validator->validated());

        return new CarResource($car->load('owner'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return new CarResource($car->load('owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $validator = Validator::make($request->all(), [
            'reg_number' => 'required|regex:/^[A-Z]{3}\d{3}$/|unique:cars,reg_number,' . $car->id,
            'brand' => 'required|string|max:50|min:2',
            'model' => 'required|string|max:50|min:1',
            'owner_id' => 'required|exists:owners,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $car->update($validator->validated());

        return new CarResource($car->load('owner'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return response()->json([
            'success' => true,
            'message' => 'Car deleted successfully'
        ]);
    }
}
