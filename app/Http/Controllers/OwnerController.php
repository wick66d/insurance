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
            'name' => 'required|string|max:50|min:2',
            'surname' => 'required|string|max:50|min:2',
            'phone' =>
                ['required', 'regex:/^\+?\d{8,15}$/'
            ],
            'email' => 'required|email|unique:owners',
            'address' => 'required|string|max:255|min:5'],[
                'name.required' => __('messages.name_required'),
            'name.min' => __('messages.name_min'),
            'surname.required' => __('messages.surname_required'),
            'surname.min' => __('messages.surname_min'),
            'phone.required' => __('messages.phone_required'),
            'phone.regex' => __('messages.phone_format'),
            'email.required' => __('messages.email_required'),
            'email.email' => __('messages.email_format'),
            'email.unique' => __('messages.email_unique'),
            'address.required' => __('messages.address_required'),
            'address.min' => __('messages.address_min'),
        ]);

        Owner::create($request->all());
        return redirect()->route('owners.index')
            ->with('success', __('messages.created_successfully', ['item'=>__('messages.owner')]));
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
            'name' => 'required|string|max:50|min:2',
            'surname' => 'required|string|max:50|min:2',
            'phone' => 'required|regex:/^\+?\d{8,15}$/',
            'email' => 'required|email|unique:owners,email,'.$owner->id,
            'address' => 'required|string|max:255|min:5',
        ],[
            'name.required' => __('messages.name_required'),
            'name.min' => __('messages.name_min'),
            'surname.required' => __('messages.surname_required'),
            'surname.min' => __('messages.surname_min'),
            'phone.required' => __('messages.phone_required'),
            'phone.regex' => __('messages.phone_format'),
            'email.required' => __('messages.email_required'),
            'email.email' => __('messages.email_format'),
            'email.unique' => __('messages.email_unique'),
            'address.required' => __('messages.address_required'),
            'address.min' => __('messages.address_min'),
        ]);

        $owner->update($request->all());
        return redirect()->route('owners.index')
            ->with('success', __('messages.updated_successfully', ['item'=>__('messages.owner')]));
    }

    public function destroy(Owner $owner)
    {
        $owner->delete();
        return redirect()->route('owners.index')
            ->with('success', __('messages.deleted_successfully', ['item'=>__('messages.owner')]));
    }
}
