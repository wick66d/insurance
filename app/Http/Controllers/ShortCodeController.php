<?php

namespace App\Http\Controllers;

use App\Models\ShortCode;
use Illuminate\Http\Request;

class ShortCodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }
    public function index()
    {
        $shortcodes = ShortCode::all();
        return view('shortcodes.index', compact('shortcodes'));
    }

    public function create(){
        return view('shortcodes.create');
    }

    public function store(Request $request){
        $request->validate([
            'shortcode' => 'required|unique:short_codes,shortcode',
            'replace' => 'required'
        ]);

        ShortCode::create($request->all());
        return redirect()->route('shortcodes.index')->with('success', 'Shortcode created!');
    }

    public function show(ShortCode $shortcode){
        return view('shortcodes.show', compact('shortcode'));
    }

    public function edit(ShortCode $shortcode){
        return view('shortcodes.edit', compact('shortcode'));
    }

    public function update(Request $request, ShortCode $shortcode){
        $request->validate([
            'shortcode' => 'required|unique:short_codes,shortcode,'.$shortcode->id,
            'replace' => 'required'
        ]);

        $shortcode->update($request->all());
        return redirect()->route('shortcodes.index')->with('success', 'Shortcode updated!');
    }

    public function destroy(ShortCode $shortcode){
        $shortcode->delete();
        return redirect()->route('shortcodes.index')->with('success', 'Shortcode deleted!');
    }
}
