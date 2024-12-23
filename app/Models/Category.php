<?php

namespace App\Models;

use Database\Seeders\DestinationSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Category extends Model
{
    use HasFactory;
    public array $translatable = ['name', 'body'];

    protected $fillable = [
        'name',
        'body',
        'rating',
        'image',
        'status',
    ];

    public function destinations()
    {
        return $this->hasMany(DestinationSeeder::class);
    }
}
