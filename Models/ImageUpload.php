<?php

namespace Dwsproduct\ImageUpload\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageUpload extends Model
{
    use HasFactory;
    protected $fillable = [
        'image', 'original_image',
    ];
}
