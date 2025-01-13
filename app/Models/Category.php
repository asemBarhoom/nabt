<?php

namespace App\Models;

use App\Models\Traits\SharedTrait;
use Database\Seeders\DestinationSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Category extends Model
{
    use HasFactory,SharedTrait;
    public array $translatable = ['name', 'body'];

    protected $fillable = [
        'name',
        'body',
        'image',
        'status',
        'categoriable_type',
    ];

    public function destinations()
    {
        return $this->hasMany(Destination::class);
    }

    public function getCanDelAttribute()
    {
        return $this->destinations()->count()==0;
    }
}
