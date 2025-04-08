<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }
    public function index()
    {
        $owners = Owner::all();
        return view('owners.index', compact('owners'));
    }


    public function create()
    {
        return view('owners.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        Owner::create($request->all());
        return redirect()->route('owners.index')
            ->with('success', __('messages.created_succesfully', ['item'=>__('messages.owner')]));
    }


    public function show(Owner $owner)
    {
        return view('owners.show', compact('owner'));
    }


    public function edit(Owner $owner)
    {
        return view('owners.edit', compact('owner'));
    }

    public function update(Request $request, Owner $owner)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        $owner->update($request->all());
        return redirect()->route('owners.index')
            ->with('success', __('messages.updated_succesfully', ['item'=>__('messages.owner')]));
    }

    public function destroy(Owner $owner)
    {
        $owner->delete();
        return redirect()->route('owners.index')
            ->with('success', __('messages.deleted', ['item'=>__('messages.owner')]));
    }
}
