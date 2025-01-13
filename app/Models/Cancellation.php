<?php

namespace App\Models;

use App\Models\Traits\Categoriable;
use App\Models\Traits\Favorable;
use App\Models\Traits\Imageable;
use App\Models\Traits\SharedTrait;
use App\Models\Traits\Testimonialsable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Cancellation extends Model
{
    use HasFactory,SharedTrait,Categoriable;
    public array $translatable = [];

    protected $fillable = [
        'image',
        'title',
        'body',
        'user_id',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

}
