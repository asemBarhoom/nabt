<?php

namespace App\Models;

use App\Models\Traits\Categoriable;
use App\Models\Traits\Favorable;
use App\Models\Traits\Imageable;
use App\Models\Traits\SharedTrait;
use App\Models\Traits\Testimonialsable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Faq extends Model
{
    use HasFactory,SharedTrait,Categoriable;
    public array $translatable = ['title', 'body'];

    protected $fillable = [
        'image',
        'title',
        'type',
        'body',
        'category_id'
    ];

}
