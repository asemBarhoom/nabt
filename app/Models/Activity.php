<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use App\Models\BaseModel as Model;

class Activity extends Model
{
    use HasFactory;

    /**
     * Attributes that support translations.
     *
     * @var array
     */
    public array $translatable = ['title', 'description'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'image',
        'description',
        'start_time',
        'end_time',
        'date',
        'activable_id',
        'activable_type',
    ];

    /**
     * Get the owning activable model.
     *
     * @return MorphTo
     */
    public function activable(): MorphTo
    {
        return $this->morphTo();
    }
}
