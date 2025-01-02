<?php

namespace App\Models\Traits;

use App\Models\Image;

trait Imageable
{
    // Define the polymorphic relationship
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    // Add an image to the model
    public function addImage($imagePath)
    {
        return $this->images()->create(['image_path' => $imagePath]);
    }

    // Remove a specific image from the model
    public function removeImage($imageId)
    {
        return $this->images()->where('id', $imageId)->delete();
    }

    // Get the first image (e.g., for a thumbnail)
    public function getFirstImage()
    {
        return $this->images()->first();
    }

    // Remove all images related to the model
    public function clearImages()
    {
        return $this->images()->delete();
    }
}
