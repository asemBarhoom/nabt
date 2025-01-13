<?php

namespace App\Models;

use App\Helpers\FileHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Country extends Model
{
    use HasFactory;
    public array $translatable = ['name'];

    protected $fillable = [
        'name',
        'flag',
        'prefix',
        'alpha_3'
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public static function getFlagByPrefix($prefix)
    {
        $flag =  self::where('prefix', $prefix)->value('flag');
        return !empty($flag) ? FileHelper::getFullPathSingleAsset($flag) : null;
    }
}
