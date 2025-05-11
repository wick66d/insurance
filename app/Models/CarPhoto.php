<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarPhoto extends Model
{
    use HasFactory;
    protected $fillable = [
        'car_id',
        'filename',
        'original_filename',
        'mime_type',
    ];

    public function car(){
        return $this->belongsTo(Car::class);
    }
}
