<?php

namespace App\Models;

use App\Models\Traits\Favorable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Favorite extends Model
{
    use HasFactory,Favorable;
    protected $fillable = ['user_id', 'favorable_id', 'favorable_type'];
    public array $translatable = [];

    // Polymorphic relationship
    public function favorable()
    {
        return $this->morphTo();
    }
}
