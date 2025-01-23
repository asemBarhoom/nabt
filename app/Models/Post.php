<?php

namespace App\Models;

use App\Models\Traits\Categoriable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Post extends Model
{
    use HasFactory,Categoriable;
    public array $translatable = ['title', 'body'];

    protected $fillable = [
        'title',
        'body',
        'image',
        'status',
        'system_admin_id',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class,'post_categories');
    }

    public function systemAdmin()
    {
        return $this->belongsTo(SystemAdmin::class,'system_admin_id','id','system_admins');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
