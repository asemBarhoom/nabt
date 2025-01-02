<?php

namespace App\Models\Traits;

use App\Models\Favorite;

trait Favorable
{
    // Define the inverse polymorphic relationship
    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favorable');
    }

    // Check if a specific user has favorited this model
    public function isFavoritedBy($user)
    {
        return $this->favorites()->where('user_id', $user->id)->exists();
    }

    // Add a favorite
    public function addFavorite($user)
    {
        return $this->favorites()->firstOrCreate(['user_id' => $user->id]);
    }

    // Remove a favorite
    public function removeFavorite($user)
    {
        return $this->favorites()->where('user_id', $user->id)->delete();
    }
}
