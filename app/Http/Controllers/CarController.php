<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(){
        $cars = Car::with('owner')->get();
        return view('cars.index', compact('cars'));
    }

    public function create(){
        $owners = Owner::all();
        return view('cars.create', compact('owners'));
    }

    public function store(Request $request){
        $request->validate([
            'reg_number' => 'required|unique:cars',
            'brand' => 'required',
            'model' => 'required',
            'owner_id' => 'required|exists:owners,id',
        ]);

        Car::create($request->all());
        return redirect()->route('cars.index')->with('success', 'Car created successfully!');

    }

    public function show(Car $car){
        return view('cars.show', compact('car'));
    }

    public function edit(Car $car){
        $owners = Owner::all();
        return view('cars.edit', compact('car', 'owners'));
    }

    public function update(Request $request, Car $car){
        $request->validate([
            'reg_number' => 'required|unique:cars,reg_number,'.$car->id,
            'brand' => 'required',
            'model' => 'required',
            'owner_id' => 'required|exists:owners,id',
        ]);

        $car->update($request->all());
        return redirect()->route('cars.index')->with('success', 'Car updated successfully!');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully!');
    }
}
