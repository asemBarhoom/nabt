<?php

namespace App\Models;

use App\Models\Traits\Categoriable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\BaseModel as Model;

class Comment extends Model
{
    use HasFactory,Categoriable;
    public array $translatable = [];

    protected $fillable = [
        'body',
        'post_id',
        'user_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


}
