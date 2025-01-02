<?php

namespace App\Models;

use App\Models\Traits\Imageable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory,Imageable;


    // Polymorphic relationship
    public function imageable()
    {
        return $this->morphTo();
    }
}
