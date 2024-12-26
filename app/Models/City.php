<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class City extends Model
{
    use HasFactory;
    public array $translatable = ['name'];

    protected $fillable = [
        'name',
        'alpha_3',
        'country_id',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

}
