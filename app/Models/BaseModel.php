<?php

namespace App\Models;

use App\Models\Traits\SharedTrait;
use Carbon\Carbon;
use App\Helpers\Constant;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

use Illuminate\Database\Eloquent\Casts\Attribute;



class BaseModel extends Model
{
    use HasTranslations,SharedTrait;




    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Carbon::parse($value)->format(Constant::RESPONSE_DATE_FORMAT),
        );
    }

    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Carbon::parse($value)->format(Constant::RESPONSE_DATE_FORMAT),
        );
    }

}
