<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OwnerResource;
use App\Models\Owner;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $owners = Owner::with('cars')->get();
        return OwnerResource::collection($owners);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50|min:2',
            'surname' => 'required|string|max:50|min:2',
            'phone' => 'required|regex:/^\+?\d{8,15}$/',
            'email' => 'required|email|unique:owners',
            'address' => 'required|string|max:255|min:5',
            'user_id' => 'nullable|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error.',
                'errors' => $validator->errors()
            ], 422);
        }

        $owner = Owner::create($validator->validated());

        return new OwnerResource($owner);
    }

    /**
     * Display the specified resource.
     */
    public function show(Owner $owner)
    {
        return new OwnerResource($owner->load('cars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Owner $owner)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50|min:2',
            'surname' => 'required|string|max:50|min:2',
            'phone' => 'required|regex:/^\+?\d{8,15}$/',
            'email' => 'required|email|unique:owners,email,' . $owner->id,
            'address' => 'required|string|max:255|min:5',
            'user_id' => 'nullable|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation Error.',
                'errors' => $validator->errors()
            ], 422);
        }

        $owner->update($validator->validated());

        return new OwnerResource($owner);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owner $owner)
    {
        $owner->delete();

        return response()->json([
            'success' => true,
            'message' => 'Owner deleted successfully.'
        ]);
    }
}
