<?php

namespace App\Models;

use App\Models\Traits\Imageable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory,Imageable;

    public static $rules = [
        'image' => 'required|mimes:png,gif,jpeg,jpg,bmp,svg,ico,mp4'
    ];

    public static $messages = [
        'image.mimes' => 'الملف الذي تحاول رفعه له صيغة غير مدعومة',
        'image.required' => 'الصورة مطلوبة'
    ];

    // Polymorphic relationship
    public function imageable()
    {
        return $this->morphTo();
    }
}
