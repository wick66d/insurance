<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->authorizeResource(Car::class, 'car');
    }

    public function index(){
        if(Auth::user()->isRegular()){
            $userOwnerIds = Owner::where('user_id', Auth::id())->pluck('id');
            $cars = Car::whereIn('owner_id', $userOwnerIds)->with('owner')->get();
        } else {
            $cars = Car::with('owner')->get();
        }
        return view('cars.index', compact('cars'));
    }

    public function create(){
        if(Auth::user()->isRegular()){
            $owners = Owner::where('user_id', Auth::id())->get();
        } else{
            $owners = Owner::all();
        }
        return view('cars.create', compact('owners'));
    }

    public function store(Request $request){
        $request->validate([
            'reg_number' => 'required|unique:cars,reg_number|regex:/^[A-Z]{3}\d{3}$/',
            'brand' => 'required|string|max:50|min:2',
            'model' => 'required|string|max:50|min:1',
            'owner_id' => 'required|exists:owners,id',
        ], [
            'reg_number.required' => __('messages.reg_number_required'),
            'reg_number.unique' => __('messages.reg_number_unique'),
            'reg_number.regex' => __('messages.reg_number_format'),
            'brand.required' => __('messages.brand_required'),
            'brand.min' => __('messages.brand_min'),
            'model.required' => __('messages.model_required'),
            'model.min' => __('messages.model_min'),
            'owner_id.required' => __('messages.owner_id_required'),
            'owner_id.exists' => __('messages.owner_not_exist'),
        ]);

        Car::create($request->all());
        return redirect()->route('cars.index')->
        with('success', __('messages.created_successfully', ['item' => __('messages.car')]));

    }

    public function show(Car $car){
        return view('cars.show', compact('car'));
    }

    public function edit(Car $car){
        if(Auth::user()->isRegular()){
            $owners = Owner::where('user_id', Auth::id())->get();
        } else {
            $owners = Owner::all();
        }
        return view('cars.edit', compact('car', 'owners'));
    }

    public function update(Request $request, Car $car){
        $request->validate([
            'reg_number' => 'required|regex:/^[A-Z]{3}\d{3}$/|unique:cars,reg_number,'.$car->id,
            'brand' => 'required|string|max:50|min:2',
            'model' => 'required|string|max:50|min:1',
            'owner_id' => 'required|exists:owners,id',
        ],[
            'reg_number.required' => __('messages.reg_number_required'),
            'reg_number.unique' => __('messages.reg_number_unique'),
            'reg_number.regex' => __('messages.reg_number_format'),
            'brand.required' => __('messages.brand_required'),
            'brand.min' => __('messages.brand_min'),
            'model.required' => __('messages.model_required'),
            'model.min' => __('messages.model_min'),
            'owner_id.required' => __('messages.owner_id_required'),
            'owner_id.exists' => __('messages.owner_not_exist'),
        ]);

        $car->update($request->all());
        return redirect()->route('cars.index')->
        with('success', __('messages.updated_successfully', ['item' => __('messages.car')]));
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index')->with('success', __('messages.deleted_successfully', ['item' => __('messages.car')]));
    }
}
