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

    public function key($type)
    {
        return $this->where('key', $type)->first();
    }

    public function valueOf($type)
    {
        $this->updateOrCreate(['key'=>$type],[
            'key'=>$type
        ]);
        return (isset($this->key($type)->value)) ? $this->key($type)->value : '';
    }
}
