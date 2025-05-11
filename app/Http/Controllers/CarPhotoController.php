<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarPhotoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Request $request, Car $car){
        $request->validate([
            'photos' => 'required',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'photos.required' => __('messages.photos_required'),
            'photos.*.image' => __('messages.file_must_be_image'),
            'photos.*.mimes' => __('messages.allowed_image_types'),
            'photos.*.max' => __('messages.image_max_size'),
        ]);
        if($request->hasFile('photos')){
            foreach($request->file('photos') as $photo){
                $originalFilename = $photo->getClientOriginalName();
                $filename = time() . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();

                $photo->storeAs('car_photos', $filename, 'public');

                CarPhoto::create([
                    'car_id' => $car->id,
                    'filename' => $filename,
                    'original_filename' => $originalFilename,
                    'mime_type' => $photo->getMimeType(),
                ]);
            }
        }

        return redirect()->route('cars.edit', $car->id)
            ->with('success', __('messages.photos_uploaded'));

    }

    public function destroy(Carphoto $photo){
        $car_id = $photo->car_id;

        Storage::disk('public')->delete('car_photos/' . $photo->filename);

        $photo->delete();

        return redirect()->route('cars.edit', $car_id)
            ->with('success', __('messages.photo_deleted'));
    }
}
