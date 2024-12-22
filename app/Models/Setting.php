<?php

namespace App\Models;

use App\Models\Traits\SharedTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory,SharedTrait;
    protected $fillable = [
        'key',
        'value',
    ];
}
